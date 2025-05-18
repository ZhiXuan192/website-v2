<!-- to display staff sidebar -->

<?php 
    require_once('connection.php');

    // save the session variable in another variable
    $sess_sid = $_SESSION["staff_id"];

    // Create a MySQLi connection
    $connection = new mysqli($host, $user, $password, $database);

    $query = "SELECT * FROM actual_table_name"; // Replace "your_table" with the actual table name

    $result = $connection->query("SELECT * FROM staff WHERE StaffID = $sess_sid");

    // Handle the query result
    $row = $result->fetch_assoc();

 ?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="sidebar.css"/>
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
                <img src="<?php echo $row["StaffImage"]; ?>" alt="profile_picture">
                </br><?php echo $row["StaffName"]; ?></br>
                <?php echo $row["StaffUsername"]; ?>
            </div>
            <ul>
                <li>
                    <a href="1staff_dashboard.php">
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="1staff_viewitem.php">
                        <span class="item">View Item</span>
                    </a>
                </li>
                <li>
                    <a href="1staff_search.php">
                        <span class="item">Search</span>
                    </a>
                </li>
                <li>
                    <a href="1staff_profile.php">
                        <span class="item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="1staff_editimage.php">
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
        
    </div>
    <script src="js\sidebar.js"></script>
</body>
</html>