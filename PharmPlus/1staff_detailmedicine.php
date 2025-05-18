<!-- to view item -->

<?php
    include("connection.php");
    include("staff_sidebar.php");

    // save the session variable in another variable
    $sess_aid = $_SESSION["staff_id"];

    // finding the specific member record based on the session variable
    $result = mysqli_query($web,"select * from staff where StaffID = $sess_aid");
    $row=mysqli_fetch_assoc($result);

    if(!isset($_SESSION["staff_id"]))
    {
    header("location:1staff_dashboard.php");
    }

    if(isset($_GET['pid']))
    {
    $pid = $_GET["pid"];
    $result2 = mysqli_query($web,"select * from product where ProductID = '$pid' ");
    $row_answer = mysqli_fetch_assoc($result2);

    $image=$row_answer["ProductImage"];
    $code=$row_answer["ProductCode"];
    $name=$row_answer["ProductName"];
    $quantity=$row_answer["ProductQuantity"];
    $price=$row_answer['ProductPrice'];
    $info=$row_answer['ProductDescription'];
    }

?>
<?php
if(isset($_POST["Back"]))
{
 header("location:1staff_viewitem.php");
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

    <title>View</title>
</head>

<body>
    <div class="container-3">
        <div class="wrapper-1">
        <div class="title">
        View Item
        </div>
        <form method="post">
        <table>
            <tr>
            <td colspan="3"><img src="<?php echo $image ?>" title="Item" width="200px" height="200px" style="border-style:solid;border-width:1px;margin-top:80px;"/></td>
            </tr>
            <tr>
            <td><span style="font-weight:bold;">Code of Item</span></td>
            <td>:</td>
            <td><?php echo $code; ?></td>
            </tr>
            <tr>
            <td><span style="font-weight:bold;">Name</span> </td>
            <td>:</td>
            <td><?php echo $name; ?></td>
            </tr>
            <tr>
            <td><span style="font-weight:bold;">Price</span></td>
            <td>:</td>
            <td>RM <?php echo $price; ?></td>
            </tr>
            <tr>
            <td><span style="font-weight:bold;">Quantity</span></td>
            <td>:</td>
            <td><?php echo $quantity; ?></td>
            </tr>
            <tr>
            <td><span style="font-weight:bold;">Description</span></td>
            <td>:</td>
            <td><?php echo $info; ?></td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td><input style="width: 100%; margin-left:0;" class="button" type="submit" name="Back" value="Back"/></td>
            </tr>
        </table>
        </form>
</div>
</div>
</body>
</html>

