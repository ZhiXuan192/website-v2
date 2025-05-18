<!-- TO CONFIRM REGISTER -->

<?php
include("connection.php");

if(isset($_POST["btnconfirm"]))
{
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content.css">
<title>Register Confirmation</title>

<body>
    <div class="container-3">
    <div class="wrapper-1">
    <div class="title">
    Confirmation
    </div>

    <form method="post">
<?php

  $name = $_POST["fullname"];
  $username = $_POST["UserName"];
  $identification = $_POST["identification"];
  $gender = $_POST["gender"];
  $contact = $_POST["contactNumber"];
  $age = $_POST["age"];
  $email = $_POST["email"];
  $password = $_POST["password"];

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
        
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "StaffPic/" . $_FILES["file"]["name"]);

        $path = "StaffPic/" . $_FILES["file"]["name"];


    echo "<span style='font-family:Century Gothic;font-size:10.5pt;' >Profile Picture:<img style='height:200px; width:200px;'src=\"$path\" alt=\"Profile Picture\"></span><br>";
    echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Full Name: $name</span><br>";
    echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Username:  $username</span><br>";
    echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Age: $age</span><br>";
    echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Email:  $email</span><br>";
    echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Identification No/IC: $identification</span><br>";
    echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Gender:  $gender</span><br>";
    echo "<span style='font-family:Century Gothic;font-size:10.5pt;'>Contact Number:  $contact</span><br>";

    mysqli_query($web,"insert into staff (StaffName,StaffPassword,StaffUsername,StaffEmail,StaffAge,StaffGender,StaffIC,StaffContactNo,StaffImage) values('$name','$password','$username','$email',$age,'$gender','$identification','$contact','$path')");
    
}
  }
else {
  echo "No image is selected";
}


?>
<p class="submit"><input type="submit" name="btnconfirm" value="Confirm" class="btn"/></p>
</form>
</div>
</div>
</body>
</html>



