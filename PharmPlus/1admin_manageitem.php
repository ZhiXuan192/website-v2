<!-- to search, view, edit and delete items -->

<?php
include("connection.php");
include("admin_sidebar.php");

// save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web,"select * from admin where AdminID = $sess_aid");
$row=mysqli_fetch_assoc($result);

if (!isset($_SESSION["ad_id"])) {
    header("location:1admin_dashboard.php");
}

// run the query to fetch the product records
$answer = mysqli_query($web,"select * from product");

// check if the search form is submitted
if (isset($_GET['search'])) {
  $searchQuery = $_GET['search'];

//  to search for matching records
  $searchResult = mysqli_query($web, "SELECT * FROM product WHERE ProductCode LIKE '%$searchQuery%' OR ProductName LIKE '%$searchQuery%'");

// to check if any results are found
  $rowCount = mysqli_num_rows($searchResult);
}else {
// if no search is performed, set rowCount to 0
  $rowCount = 0;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content.css">

    <title>Manage Item</title>
</head>

<body>

    <section>

     <form method="GET">
        <input type="text" name="search" style="width:20%; margin-left:20%; margin-top:20px; height:20px" placeholder="Search by Medicine Code or Item Name">
        <input type="submit" value="Search">
    </form>

    <?php
         $count = 1;
        // display search results if available
        if ($rowCount > 0) {
        while ($row_answer = mysqli_fetch_array($searchResult)) {
    ?>

        <div class="container-4">
            <div class="box-1">
                <img class="itemimage" src="<?php echo $row_answer['ProductImage']; ?>">
                <h1 class="itemtitle"><?php echo $row_answer['ProductName']; ?></h1>
                <h1 class="itemprice">RM <?php echo $row_answer['ProductPrice']; ?></h1>
                <h1 class="codeofmedicine"><?php echo $row_answer['ProductCode']; ?></h1>
                <div>
                    <a href="1admin_detailmedicine.php?pid=<?php echo $row_answer['ProductID'];?>"><button class="button">view</button></a>
                    <a href="1admin_edititem.php?pid=<?php echo $row_answer['ProductID'];?>"><button class="button">edit</button></a>
                    <a href="1admin_deleteitem.php?pid=<?php echo $row_answer['ProductID'];?>"><button class="button">delete</button></a>
                </div>
            </div>
        <div class="clearfix"></div>
        </div>
           

            <?php
             $count++;
            }

            } elseif ($rowCount == 0 && !isset($_GET['search'])) {
            // display the first 8 records if no search is performed
            while ($row_answer = mysqli_fetch_array($answer)) {
            ?>

            <div class="container-4">
            <div class="box-1">
                <img class="itemimage" src="<?php echo $row_answer['ProductImage']; ?>">
                <h1 class="itemtitle"><?php echo $row_answer['ProductName']; ?></h1>
                <h1 class="itemprice">RM <?php echo $row_answer['ProductPrice']; ?></h1>
                <h1 class="codeofmedicine"><?php echo $row_answer['ProductCode']; ?></h1>
                <div>
                    <a href="1admin_detailmedicine.php?pid=<?php echo $row_answer['ProductID'];?>"><button class="button">view</button></a>
                    <a href="1admin_edititem.php?pid=<?php echo $row_answer['ProductID'];?>"><button class="button">edit</button></a>
                    <a href="1admin_deleteitem.php?pid=<?php echo $row_answer['ProductID'];?>"><button class="button">delete</button></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

            <?php
            $count++;
            }
            } 
            else {
            echo "<h3 style='margin-left:20%; margin-top:5%; font-size: 18px;'>No results found, please try to search again.</h3>";
            }
            ?>

        
    </section>
</body>
</html>