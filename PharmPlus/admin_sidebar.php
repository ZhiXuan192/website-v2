<!-- to display admin sidebar -->

<?php 
    require_once('connection.php');

    // save the session variable in another variable
    $sess_aid = $_SESSION["ad_id"];

    // create a MySQLi connection
    $connection = new mysqli($host, $user, $password, $database);

    $query = "SELECT * FROM admin"; // 

    $result = $connection->query("SELECT * FROM admin WHERE AdminID = $sess_aid");

    // handle the query result
    $row = $result->fetch_assoc();

 ?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="sidebar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="js\sidebar.js"></script>
</head>

<body>
<div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="logo">
                    <a href="#" class="logo">
                        <img src="images\PharmPlus.jpg" alt="PharmPlus" class="logopicture">
                    </a>
                </div>
                <div class="date">Date:<?php date_default_timezone_set("Asia/Kuala_Lumpur");echo date("d-m-Y H:i:s");?></div>
            </div>
             
        </div>
        <div class="sidebar">
            <div class="profile">
                <img src="<?php echo $row["AdminImage"]; ?>" alt="profile_picture">
                </br><?php echo $row["AdminName"]; ?></br>
                <?php echo $row["AdminUsername"]; ?>
            </div>
            <ul>
                <li>
                    <a href="1admin_dashboard.php">
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="1admin_manageitem.php">
                        <span class="item">Manage Item</span>
                    </a>
                </li>
                <li>
                    <a href="1admin_additem.php">
                        <span class="item">Add Item</span>
                    </a>
                </li>
                <li>
                    <a href="1admin_itemsale.php">
                        <span class="item">Item Sales</span>
                    </a>
                </li>
                <li>
                    <a href="1admin_profile.php">
                        <span class="item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="1admin_editimage.php">
                        <span class="item">Update Profile Image</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- <div class="section">
            <div class="top_navbar">
                <div class="pharmacy">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
        </div> -->
        <script src="js\sidebar.js"></script>
    </div>
</body>
</html>