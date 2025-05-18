<!-- to edit item -->

<?php
include("connection.php");
include("admin_sidebar.php");

// save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web,"select * from admin where AdminID = $sess_aid");
$row=mysqli_fetch_assoc($result);

if(!isset($_SESSION["ad_id"]))
{
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
<title>Edit</title>

<script>
function validate(){
  if (document.Editfrm.search.value = "") {
    alert("Key in the code or the name of the medicine");
    document.Editfrm.search.value.focus();
    return false;
  }
}
</script>
</head>
<body>

<div class="container-3">
<div class="wrapper-1">
<div class="title">
Edit Item
</div>

<form method="post"  enctype="multipart/form-data" action="1admin_editupload.php">
<table>
<tr>
  
  <td ><input style="width:10px;" type="text" name="prodid" hidden="hidden" value="<?php echo $row_answer["ProductID"] ?>" readonly="readonly"/>
</td>
</tr>
<tr>
<td><span style="font-weight:bold;">Product Picture</span></td>
<td>:</td>
<td>  <img src="<?php echo $row_answer["ProductImage"]; ?>" height="200px" width="200px"/></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td><input type="file" name="file" ></td>
</tr>
<tr>
  <td><span style="font-weight:bold;">Code Of Item</span></td>
  <td>:</td>
  <td><input type="text" name="code_of_medicine" placeholder="Code of Medicine" value="<?php echo $row_answer["ProductCode"]; ?>"/></td>
</tr>
<tr>
  <td><span style="font-weight:bold;">Name</span></td>
  <td>:</td>
  <td> <input type="text" name="name" placeholder="Product Name" value="<?php echo $row_answer["ProductName"]; ?>"/></td>
</tr>
<tr>
  <td><span style="font-weight:bold;">Quantity</span></td>
  <td>:</td>
  <td> <input type="number" name="number" placeholder="Number" value="<?php echo $row_answer["ProductQuantity"]; ?>"/></td>
</tr>
<tr>
  <td><span style="font-weight:bold;">Price</span></td>
  <td>:</td>
  <td> <input type="number" name="price" placeholder="price" step="0.01" pattern="\d+(\.\d{1,2})?" min="0"  value="<?php echo $row_answer["ProductPrice"]; ?>"/></td>
</tr>
<tr>
  <td><span style="font-weight:bold;">Description</span></td>
  <td>:</td>
  <td><textarea name="description" placeholder="Description"><?php echo $row_answer["ProductDescription"]; ?></textarea><td>
</tr>
<tr style="mar">
  <td></td>
  <td></td>
  <td>
  <input class="btn-4" type="submit" name="btnconfirm" value="Confirm">
  <input class="btn-4" type="button" name="btncancel" value="Cancel" onclick="window.location.href='1admin_manageitem.php'">
  </td>
</tr>
</table>

</form>
</div>

</div>

</body>
</html>
