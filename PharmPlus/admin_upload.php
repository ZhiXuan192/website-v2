<!-- to confirm add item -->

<?php

include("connection.php");
include("admin_sidebar.php");

// save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web, "SELECT * FROM admin WHERE AdminID = $sess_aid");
$row = mysqli_fetch_assoc($result);

if (!isset($_SESSION["ad_id"])) {
    header("location:1admin_dashboard.php");
    exit;
}

if (isset($_POST["upload"])) {
    header("location:1admin_manageitem.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content.css">
</head>
<body>

  <div class="container-3">
    <div class="wrapper-1">
      <div class="title">Confirmation</div>
  <form method="post">
  <?php
  $code = $_POST["code_of_medicine"];
  $name = $_POST["name"];
  $number = $_POST["number"];
  $price = $_POST["price"];
  $info = $_POST["description"];

  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);

  if ((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/jpg")
  || ($_FILES["file"]["type"] == "image/pjpeg")
  || ($_FILES["file"]["type"] == "image/x-png")
  || ($_FILES["file"]["type"] == "image/png"))
  && ($_FILES["file"]["size"] < 3000000)
  && in_array($extension, $allowedExts) && $code != "" && $name != "" && $number != "" && $price != "" && $info != "") {
    if ($_FILES["file"]["error"] > 0) {
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Return Code: " . $_FILES["file"]["error"] . "</span><br>";
    } else {

      move_uploaded_file($_FILES["file"]["tmp_name"],
        "Storage/" . $_FILES["file"]["name"]);

        $path = "Storage/" . $_FILES["file"]["name"];

  	mysqli_query($web,"insert into product (ProductCode,ProductName,ProductQuantity,ProductPrice,ProductDescription,ProductImage,AdminID) values ('$code','$name',$number,'$price','$info','$path',$sess_aid)");
     
     ?>
      <h3>Product Image</h3>
      <img src="<?php echo $path; ?>" alt="Product Image" width="200px" height="200px">
      <br><br>

      <h3>Code of Item: <?php echo $code; ?></h3>
      <h3>Product Name:<?php echo $name; ?></h3>
      <h3>Quantity:<?php echo $number; ?></h3>
      <h3>Price: RM<?php echo $price; ?></h3>
      <h3>Description:<?php echo $info; ?></h3>

      <?php
      
      }
    }
  else {
    echo "No image is selected.";
  }
  ?>
  <div class="input-field">
    <input style=" width: 50%;
    padding: 8px 10px;
    font-size: 15px;
    border: 0;
    background: #6097ea;
    color: #fff;
    cursor: pointer;
    border-radius: 3px;
    margin-left: 5px;
    margin-right: 5px;
    margin-top: 10px;" type="submit" name="upload" value="Okay"/>
  </div>
  </form>
  </div>
  </div>
</body>
</html>
