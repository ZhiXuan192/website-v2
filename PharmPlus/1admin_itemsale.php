<!-- to display item sales -->

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
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content.css">

    <title>Item Sale</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="wrapper-1">
                <div class="title">
                    Item Sale
                </div>
                <div class="form">
                    <form name="slaesfrm" method="post">
                    <div class="input-field">
                        <p>View by:</p>
                    </div>
                    <div class="input-field">
                        
                        <input type="submit" name="btnselect" value="List" class="btn">
                        <input type="submit" name="btnselect" value="Month" class="btn">
                    </div>
                    

                    <?php
if(isset($_POST["btnselect"])){
    $btnselect = $_POST["btnselect"];
    if($btnselect == "List"){
    ?>

    <h1 style="margin-top: 50px; margin-bottom: 10px;">List of Record</h1>

    <?php
     $answer2 = mysqli_query($web, "SELECT SalesDate, SalesTime,salesID, ProductCode, Productname, salesquantity AS Quantity
from sales, product
where product.productID = sales.productID order by salesdate;");
?>
  <table width="100%">
  <tr style="text-align: left;">
    <th>Date</th>
    <th>Time</th>
    <th>Sales ID</th>
    <th>Code of Item</th>
    <th>Item Name</th>
    <th>Quantity</th>
   
  </tr>

  <?php
  while ($row2 = mysqli_fetch_assoc($answer2)) 
  {
  ?>

    

    <tr>
      <td><?php echo $row2['SalesDate']; ?></td>
      <td><?php echo $row2['SalesTime']; ?></td>
      <td><?php echo $row2['salesID']; ?></td>
      <td><?php echo $row2['ProductCode']; ?></td>
      <td><?php echo $row2['Productname']; ?></td>
      <td><?php echo $row2['Quantity']; ?></td>
      
    </tr>
  <?php
  }
  ?>

  </table>
<?php
}



if ($btnselect == "Month") {

?>
 <h1 style="margin-top: 50px; margin-bottom: 10px;">Monthly record</h1>

<?php
  $answer2 = mysqli_query($web, "SELECT salesID, product.ProductID, ProductCode, Productname, SUM(salesquantity) AS Total, MONTHNAME(salesdate) AS Month FROM sales, product WHERE product.productid = sales.ProductID GROUP BY MONTHNAME(salesdate),product.productid ORDER BY MONTH(salesdate);");
?>
  <table width="100%">
  <tr style="text-align: left;">
    <th>Month</th>
    <th>Sales ID</th>
    <th>Code of Item</th>
    <th>Item Name</th>
    <th>Total</th>
  </tr>

  <?php
  while ($row2 = mysqli_fetch_assoc($answer2)) 
  {
  ?>

  
  <tr>
      <td><?php echo $row2['Month']; ?></td>
      <td><?php echo $row2['salesID']; ?></td>
      <td><?php echo $row2['ProductCode']; ?></td>
      <td><?php echo $row2['Productname']; ?></td>
      <td><?php echo $row2['Total']; ?></td>
      
  </tr>
  <?php
  }
  ?>

  </table>

<?php
}
}
?>

                    </form>

                </div>
            </div>
        </div>
    </section>

</body>
</html>