<!-- to display admin profile info -->

<?php
include("connection.php");
include("admin_sidebar.php");
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
            <img src="<?php echo $row["AdminImage"]; ?>" alt="profile picture">
            <p><i class="fas fa-user"></i><span><?php echo $row["AdminName"]; ?></span></p>
            <p><i class="fa-solid fa-user-tie"></i><span><?php echo $row["AdminUsername"]; ?></span></p>
            <p><i class="fas fa-envelope"></i><span><?php echo $row["AdminEmail"]; ?></span><br/><br/></p>
            <a href="1admin_editprofile.php" class="btn">edit profile</a>
            </div>
        </div>
     </section>
</body>
</html>