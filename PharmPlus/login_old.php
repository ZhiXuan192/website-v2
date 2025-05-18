<!-- to allow user login or register -->

<?php
include("connection.php");

$alertMessage = ""; // Variable to store the alert message

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["login"])) {
        if (isset($_POST["type"]) && $_POST["type"] === "staff") {
            $susrname = trim($_POST["username"]);
            $spass = $_POST["password"];

            $connection = new mysqli($host, $user, $password, $database);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $result = $connection->query("SELECT * FROM staff WHERE StaffUsername = '$susrname' AND StaffPassword = '$spass'");
            if ($result->num_rows != 0) {
                $row = $result->fetch_assoc();
                $_SESSION["staff_id"] = $row["StaffID"];
                header("Location:1staff_dashboard.php");
                exit;
            } else {
                $alertMessage = "Invalid Username or Password"; // Set the alert message
            }

            $connection->close();
        } elseif (isset($_POST["type"]) && $_POST["type"] === "manager") {
            $ausrname = trim($_POST["username"]);
            $apass = $_POST["password"];

            $connection = new mysqli($host, $user, $password, $database);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $answer = $connection->query("SELECT * FROM admin WHERE AdminUsername = '$ausrname' AND AdminPassword = '$apass'");
            if ($answer->num_rows != 0) {
                $row = $answer->fetch_assoc();
                $_SESSION["ad_id"] = $row["AdminID"];
                header("Location:1admin_dashboard.php");
                exit;
            } else {
                $alertMessage = "Invalid Username or Password"; // Set the alert message
            }

            $connection->close();
        } else {
            $alertMessage = "Invalid User Type"; // Set the alert message
        }
    } elseif (isset($_POST["register"])) {
        header("location:1staff_register.php");
        exit;
    } elseif (isset($_POST["cancel"])) {
        header("location:login.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pharm.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>

</head>
<body>
   <div class="box">
    <div class="container">

        <form method="POST">

        <div class="top">
            <header>PharmPlus</header>
            <span>Login</span>
        </div>

        <div class="input-field" style="position:relative; margin-bottom:15px; height:50px;">
            <input style=" min-height: 100%;" type="text" name="username" class="input" placeholder="Username">
            <i class='bx bx-user' style="position:absolute; top: 50%; transform: translateY(-50%);"></i>
        </div>

        <div class="input-field" style="position:relative; margin-bottom:15px;  height:50px;">
            <input  style="min-height: 100%;" type="password" name="password" class="input" placeholder="Password">
            <i class='bx bx-lock-alt' style="position:absolute; top: 50%; transform: translateY(-50%);"></i>
        </div>

        <div class="input-field-2">
            <div class="input-container">
                <input type="radio" name="type" value="manager">
                <div class="radio-tile">
                    <label for="">> Admin</label>
                </div>
            </div>
            <div class="input-container">
                <input type="radio" name="type" value="staff">
                <div class="radio-tile">
                    <label for="">> Staff</label>
                </div>
            </div>
        </div>

        <div class="three-col">
            <div class="one">
                <input type="submit" name="login" class="submit" value="login" id="">
            </div>
            <div class="two">
                <input type="submit" name="cancel" class="submit" value="cancel" id="">
            </div>
            <div class="three">
                <input type="submit" name="register" class="submit" value="register" id="">
            </div>
        </div>
        </form>
    </div>
</div>  
<?php
    // display the alert box if the alert message is not empty
    if (!empty($alertMessage)) {
        echo '<script type="text/javascript">alert("' . $alertMessage . '");</script>';
    }
    ?>
</body>
</html>