<!-- to confirm edited item -->

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
}
if (isset($_POST["upload"])) {
    header("location:1admin_manageitem.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="content.css">
  <title>Confirmation</title>
</head>
<body>

  
  
  <div class="container-3">
  <div class="wrapper-1">
  <div class="title">
  updated successfully
  </div>
  <form method="post">
  <?php
  $prodid = $_POST["prodid"];
  $code = $_POST["code_of_medicine"];
  $name = $_POST["name"];
  $number = $_POST["number"];
  $price = $_POST["price"];
  $info = $_POST["description"];

  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);

  if($_FILES["file"]["name"] > 0){
  if ((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/jpg")
  || ($_FILES["file"]["type"] == "image/pjpeg")
  || ($_FILES["file"]["type"] == "image/x-png")
  || ($_FILES["file"]["type"] == "image/png"))
  && ($_FILES["file"]["size"] < 2000000)
  && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Return Code: " . $_FILES["file"]["error"] . "</span><br>";
    } else {

      move_uploaded_file($_FILES["file"]["tmp_name"],
        "Storage/" . $_FILES["file"]["name"]);

        $path = "Storage/" . $_FILES["file"]["name"];
      
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;' >Product Image:<img style='height:200px; width:200px;'src=\"$path\" alt=\"Product Image\"></span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Code: $code</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Name: $name</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Quantity: $number</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Price: $price</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Description: $info</span><br>"; 
  	mysqli_query($web,"update product set ProductCode='$code',ProductName='$name',ProductQuantity=$number,ProductPrice='$price',ProductDescription='$info',ProductImage='$path',AdminID=$sess_aid where ProductID=$prodid");
      }
    }
  }
    else {
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Code: $code</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Name: $name</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Quantity: $number</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Price: RM $price</span><br>";
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Product Description: $info</span><br>";
      mysqli_query($web,"update product set ProductCode='$code',ProductName='$name',ProductQuantity=$number,ProductPrice='$price',ProductDescription='$info',AdminID=$sess_aid where ProductID=$prodid");
    }
  ?>
  <p class="submit"><input type="submit" class="button" name="upload" value="Okay"/></p>
  </form>
  </div>

  </div>
</body>
</html>
