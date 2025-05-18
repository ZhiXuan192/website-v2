<!-- TO UPLOAD ADMIN PROFILE PICTURE -->
<?php

include("connection.php");
include("admin_sidebar.php");

// save the session variable in another variable
$sess_sid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web,"select * from admin where AdminID = $sess_sid");
$row=mysqli_fetch_assoc($result);

if(!isset($_SESSION["ad_id"]))
{
 header("location:1admin_dashboard.php");
}
if(isset($_POST["upload"]))
{
 header("location:1admin_profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content.css">
<title>Update Profile Image</title>

</head>
<body>
 
<div class="container-3">
  <div class="wrapper-1">
  <div class="title">
  Upload Profile Image
  </div>
  <form method="post">
  <?php
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
  && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
      echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Return Code: " . $_FILES["file"]["error"] . "</span><br>";
    } else {
      
        //move the uploaded image to AdminPic folder
      move_uploaded_file($_FILES["file"]["tmp_name"],
        "AdminPic/" . $_FILES["file"]["name"]);

        $path = "AdminPic/" . $_FILES["file"]["name"];
        
  	  mysqli_query($web,"update admin set AdminImage='$path' where AdminID = $sess_sid");

      ?>
      <img src="<?php echo $path; ?>" alt="Admin Image" width="200px" height="200px">
      <br><br>
      <?php
      echo "Stored in: " . $path;
      
      }
    }
  else {
    echo "No image is selected.";
  }


  ?>
  <p class="submit"><input type="submit" class="button" name="upload" value="Confirm"/></p>
  </form>
  </div>

  </div>
</body>
</html>
