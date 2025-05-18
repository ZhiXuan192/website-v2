<!-- to update admin profile image -->

<?php

include("connection.php");
include("admin_sidebar.php");


// save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web, "select * from admin where AdminID = $sess_aid");
$row=mysqli_fetch_assoc($result);

if(!isset($_SESSION["ad_id"]))
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

<div class="container-3">
<div class="wrapper-1">
<div class="title">
Update Profile Image
</div>
<form action="upload_2.php" method="post" enctype="multipart/form-data">
  <table width="100%">
    <tr>
      <td><img src="<?php echo $row["AdminImage"]; ?>" height="250px" width="210px"></td>
    </tr>
    <tr>
      <td>Select image to upload</td>
    <td></td>
    </tr>
    <tr>
      <td><input type="file" name="file"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><input type="submit" value="Update Image" name="submit" class="btn-1"></td>
    </tr>
  </table>
</form>
</div>


</div>
</body>
</html>
