<!-- to return item and sell item -->

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

if(isset($_POST["ReturnItem"]))
{
  $c = $_POST["ProdCode"];
  $query = mysqli_query($web,"select * from product where ProductCode = '$c'");
  $row2 = mysqli_fetch_assoc($query);
  $q = $row2["ProductQuantity"];
  $quantity = $_POST["quantity"];
  $rItem = $q + $quantity;

  mysqli_query($web,"update product set ProductQuantity = $rItem where ProductCode = '$c'");
  ?>

		<script type="text/javascript">
			alert("Return <?php echo $quantity; ?> Items ");
		</script>

	<?php

}

if(isset($_POST["Itemsold"]))
{
  $c = $_POST["ProdCode"];
  $query = mysqli_query($web,"select * from product where ProductCode = '$c'");
  $row2 = mysqli_fetch_assoc($query);
  $id = $row2["ProductID"];
  $q = $row2["ProductQuantity"];
  $quantity = $_POST["quantity"];
  $sItem = $q - $quantity;
  date_default_timezone_set('Asia/Kuala_Lumpur');
   $sdate = date('Y-m-d');;
   $stime = date("h:i:s A");

  mysqli_query($web,"update product set ProductQuantity = $sItem where ProductCode = '$c'");
  mysqli_query($web,"insert into sales (SalesQuantity,SalesDate,SalesTime,ProductID,StaffID) values ('$quantity','$sdate','$stime',$id,$sess_sid)");
  ?>

		<script type="text/javascript">
			alert("Sold <?php echo $quantity; ?> Items ");
		</script>

	<?php

}
?>
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="content.css">

    <title>Search</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="wrapper-1">
                <div class="title">
                    Search
                </div>
                <form name="searchfrm" method="POST">
                <div class="form">
                    <div class="input-field">
                        <label>Search by:</label>
                        <select name="searchby">
                        <option value="Code of medicine">Code of Item</option>
                        <option value="Name">Name</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <input type="text" name="search" class="input">
                        <input type="submit" name="btnupdate" value="Search" class="btn">
                    </div>

                    <?php
if(isset($_POST["btnupdate"]))
{
  $search = $_POST["search"];
  if($_POST["searchby"] == "Code of medicine")
  {
    $answer = mysqli_query($web,"select * from product where ProductCode = '$search' ");
    $row1 = mysqli_fetch_assoc($answer);
    if(mysqli_num_rows($answer) > 0)
    {
?>
<table>
  <tr>
    <td><img src="<?php echo $row1['ProductImage'] ?>" width="120px" style="border-style:solid;border-width:1px;margin-top:100px;margin-bottom:10px;"/></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Code of Item</span></td>
    <td>:</td>
    <td><input type="text" name="ProdCode" value="<?php echo $row1['ProductCode']; ?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Name</span> </td>
    <td>:</td>
    <td><?php echo $row1['ProductName']; ?></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Price</span></td>
    <td>:</td>
    <td>RM <?php echo $row1['ProductPrice']; ?></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Quantity</span></td>
    <td>:</td>
    <td><input type="number" name="quantity" placeholder="quantity" min="1"/></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Decription</span></td>
    <td>:  &nbsp;</td>
    <td><?php echo $row1['ProductDescription']; ?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <span style="margin-left:100px;"><input type="submit" name="ReturnItem" value="Return Item" class="btn"> 
      <input type="submit" name="Itemsold" value="Item sold" class="btn"></span>
    </td>
  </tr>
    </table>
<?php
}
else {
  ?>

    <script type="text/javascript">
      alert("No Result Found...");
    </script>

  <?php
}
}
elseif ($_POST["searchby"] == "Name")
{
 $answer = mysqli_query($web,"select * from product where ProductName = '$search' ");
 $row1 = mysqli_fetch_assoc($answer);
 if(mysqli_num_rows($answer) > 0){
 ?>

<table>
  <tr>
    <td><img src="<?php echo $row1['ProductImage'] ?>" width="120px" style="border-style:solid;border-width:1px;margin-top:100px;"/></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Code of Item</span></td>
    <td>:</td>
    <td><input type="text" name="ProdCode" value="<?php echo $row1['ProductCode']; ?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Name</span> </td>
    <td>:</td>
    <td><?php echo $row1['ProductName']; ?></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Price</span></td>
    <td>:</td>
    <td>RM <?php echo $row1['ProductPrice']; ?></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Quantity</span></td>
    <td>:</td>
    <td><input type="number" name="quantity" placeholder="quantity" min="1"/></td>
  </tr>
  <tr>
    <td><span style="font-weight:bold;">Decription</span></td>
    <td>:</td>
    <td><?php echo $row1['ProductDescription']; ?></td>
    </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <span style="margin-left:100px;"><input type="submit" class="btn" name="ReturnItem" value="Return Item"> 
      <input type="submit" class="btn" name="Itemsold" value="Item sold"></span>
    </td>
  </tr>
</table>
 <?php
 }
else {
  ?>

    <script type="text/javascript">
      alert("No Result Found...");
    </script>

  <?php
}
}
}
 ?>

                
                </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>