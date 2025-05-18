<!-- to display staff dashboard -->

<?php
    include("connection.php");
    include("staff_sidebar.php");
?>


<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="content.css">
    <script src="js\userpreventreturn.js"></script>

    <title>Dashboard</title>
</head>

<body>
<section>
         <div class="container-4">
            <div class="wrapper">
               <div class="title">
                     Most Popular Products
               </div>

                <?php
               //retrieve information from database
               $result = mysqli_query($web,"select * from product limit 8");

               while($row=mysqli_fetch_assoc($result)){
                  $image = $row['ProductImage'];
                  $name = $row['ProductName'];
                  $price = $row['ProductPrice'];
                  $code = $row['ProductCode'];

               ?>
               
               <div class="box-1">
                  <img class="itemimage" src="<?php echo $image; ?>">
                  <h1 class="itemtitle"><?php echo $name; ?></h1>
                  <h1 class="itemprice">RM <?php echo $price; ?></h1>
                  <h1 class="codeofmedicine"><?php echo $code; ?></h1>
               </div>
               <?php
               }
               ?>
               
               <div class="clearfix"></div>
            </div>
         </div>
    </section>
</body>
</html>