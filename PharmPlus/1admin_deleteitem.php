<!-- to delete item -->

<?php
include("connection.php");
include("admin_sidebar.php");

// save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

//finding the specific member record based on the session variable
$result = mysqli_query($web,"select * from admin where AdminID = $sess_aid");
$row=mysqli_fetch_assoc($result);


if (!isset($_SESSION["ad_id"])) {
    header("location:1admin_dashboard.php");
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

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="content.css">
<title>Delete</title>

</head>
<body>

  <div class="container-3">
  <div class="wrapper-1">
  <div class="title">
    Delete Item
  </div>
  <form method="post" name="Deletefrm" action="1admin_deleteupload.php">
    <table>

    <tr>
      <td><input type="text" name="proid" value="<?php echo $row_answer["ProductID"]; ?>" hidden="hidden"/></td>
    </tr>
    <tr>
      <td><img src="<?php echo $row_answer['ProductImage'] ?>" width="120px" style="border-style:solid;border-width:1px;margin-top:100px;"/></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Code of Item</span></td>
      <td>:</td>
      <td><input type="text" name="ProdCode" value="<?php echo $row_answer['ProductCode']; ?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Name</span> </td>
      <td>:</td>
      <td><?php echo $row_answer['ProductName']; ?></td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Price</span></td>
      <td>:</td>
      <td>RM <?php echo $row_answer['ProductPrice']; ?></td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Quantity</span></td>
      <td>:</td>
      <td><?php echo $row_answer['ProductQuantity']; ?></td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Decription</span></td>
      <td>:</td>
      <td><?php echo $row_answer['ProductDescription']; ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><span style="margin-left:100px;">
      <input type="submit" name="Delete" value="Delete" class="btn-3"> 
      <input type="button" name="Cancel" value="Cancel"  class="btn-3" onclick="window.location.href='1admin_manageitem.php'"/></span></td>
    </tr>

    </table>
  </form>
  </div>


  </div>

</body>
</html>
