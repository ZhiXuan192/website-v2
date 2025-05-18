<!-- to confirm delete item -->

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

 


if(isset($_POST["Delete"]))
{
  $ppid = $_POST["proid"];
  // delete sales records first
  mysqli_query($web, "delete from sales where ProductID = $ppid");
  //delete product record
  mysqli_query($web,"delete from product where ProductID= $ppid ");
  
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
    Delete successfully
  </div>
 <form method="post">
<table>
<tr>
<td></td>
<td></td>
<td><input style="width: 100%; margin-left:0;" class="button" type="submit" name="upload" value="Okay"/></td>
</tr>
</table>
</form>
  </div>
</div>
</body>
</html>



