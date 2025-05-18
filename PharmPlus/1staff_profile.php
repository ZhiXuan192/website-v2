<!-- to display staff profile info -->

<?php
    include("connection.php");
    include("staff_sidebar.php");

    // save the session variable in another variable
$sess_sid = $_SESSION["staff_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web,"select * from staff where StaffID = $sess_sid");
$row=mysqli_fetch_assoc($result);

if(!isset($_SESSION["staff_id"]))
{
 header("location:1staff_dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="content.css">

    <title>Profile</title>
</head>

<body>
    <section class="user-details">
        <div class="wrapper-3">
            <div class="user">
            <img src="<?php echo $row["StaffImage"]; ?>"  alt="profile picture">
            <p><i class="fas fa-user"></i><span><?php echo $row["StaffName"]; ?></span></p>
            <p><i class="fa-solid fa-user-tie"></i><span><?php echo $row["StaffUsername"]; ?></span></p>
            <p><i class="fa-solid fa-mars-and-venus"></i><span><?php echo $row["StaffGender"]; ?></span></p>
            <p><i class="fa-brands fa-pagelines"></i><span><?php echo $row["StaffAge"]; ?></span></p>
            <p><i class="fas fa-envelope"></i><span><?php echo $row["StaffEmail"]; ?></span></p>
            <p><i class="fa-sharp fa-regular fa-id-card"></i><?php echo $row["StaffIC"]; ?></span></p>
            <p><i class="fa-solid fa-address-card"></i><span><?php echo $row["StaffContactNo"]; ?></span><br/><br/></p>
            <a href="1staff_editprofile.php" class="btn">edit profile</a>
            </div>  
        </div>
    </section>
</body>
</html>