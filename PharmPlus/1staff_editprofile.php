<!-- to edit staff profile info -->

<?php
include("connection.php");
include("staff_sidebar.php");


//save the session variable in another variable
$sess_aid = $_SESSION["staff_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web,"select * from  staff where StaffID = $sess_aid");
$row=mysqli_fetch_assoc($result);

if(!isset($_SESSION["staff_id"]))
{
 header("location:1staff_dashboard.php");
}

//only can update fullname and email address 
if(isset($_POST["btnupdate"]))
{
  $name = $_POST["fullname"]; 
  $age =$_POST["age"];
  $email =$_POST["email"];
  $identification =$_POST["identification"];
  $contact =$_POST["contactNumber"];

  mysqli_query($web,"update staff set StaffName = '$name', StaffEmail = '$email', StaffAge = '$age', StaffIC = '$identification', StaffContactNo = '$contact' where StaffID = $sess_aid");
  header("location:1staff_profile.php");
}

if(isset($_POST["btncancel"]))
{
  header("location:1staff_profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content.css">

    <title>Edit Profile</title>
</head>

<body>
    <section>
        <div class="container-3">
            <div class="wrapper-1">
                <div class="title">
                    Edit Profile
                </div>
                <form method="post" name="Editfrm">
                <div class="form">
                    <div class="input-field">
                        <label>Full Name</label>
                        <input type="text" name="fullname" value="<?php echo $row['StaffName']; ?>" class="input">
                    </div>
                    <div class="input-field">
                        <label>User Name</label>
                        <input type="text" name="UserName" value="<?php echo $row['StaffUsername']; ?>" readonly="readonly" class="input">
                    </div>
                    <div class="input-field">
                        <label>Age</label>
                        <input type="number" name="age" value="<?php echo $row['StaffAge']; ?>" min=18 max=100 class="input">
                    </div>
                    <div class="input-field">
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo $row['StaffEmail']; ?>" class="input">
                    </div>
                    <div class="input-field">
                        <label>Identification No/IC</label>
                        <input type="text" name="identification" value="<?php echo $row['StaffIC']; ?>" maxlength="12" class="input">
                    </div>
                    <div class="input-field">
                        <label>Gender</label>
                        <input type="text" name="gender" readonly="readonly" value="<?php echo $row['StaffGender']; ?>" class="input">
                    </div>
                    <div class="input-field">
                        <label>Contact Number</label>
                        <input type="text" name="contactNumber" value="<?php echo $row['StaffContactNo']; ?>" class="input">
                    </div>
                    <div class="input-field">
                        <input type="submit" name="btnupdate" value="Update" onclick="return validate();" class="btn">
                        <input type="submit" name="btncancel" value="Cancel" class="btn">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>