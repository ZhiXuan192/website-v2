<!-- to edit admin profile info -->

<?php
include("connection.php");
include("admin_sidebar.php");

//save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web,"select * from admin where AdminID = $sess_aid");
$row=mysqli_fetch_assoc($result);

if(!isset($_SESSION["ad_id"]))
{
 header("location:1admin_dashboard.php");
}

//only can update fullname and email address 
if(isset($_POST["btnupdate"]))
{
  $name = $_POST["fullname"];
  $email =$_POST["email"];

  mysqli_query($web,"update admin set AdminName = '$name', AdminEmail = '$email' where AdminID = $sess_aid");
  header("location:1admin_profile.php");
}

if(isset($_POST["btncancel"]))
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
                        <input type="text" name="fullname" placeholder="Your full name" value="<?php echo $row["AdminName"] ?>" class="input">
                    </div>
                    <div class="input-field">
                        <label>User Name</label>
                        <input type="text" name="UserName" placeholder="Your Username" value="<?php echo $row["AdminUsername"] ?>" readonly="readonly" class="input">
                    </div>
                    <div class="input-field">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Your Email Address" value="<?php echo $row["AdminEmail"] ?>" class="input">
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