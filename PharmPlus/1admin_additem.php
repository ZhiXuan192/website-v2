<!-- to add item -->

<?php
include("connection.php");
include("admin_sidebar.php");

// save the session variable in another variable
$sess_aid = $_SESSION["ad_id"];

// finding the specific member record based on the session variable
$result = mysqli_query($web, "select * from admin where AdminID = $sess_aid");
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

    <title>Add Item</title>

    <script type="text/javascript">
    function validate() {
	if (document.Addfrm.Name.value == "") {
		alert ("Please enter the product name");
		document.Addfrm.Name.focus();
		return false;
	}
	if ((document.Addfrm.number.value =="") || isNaN(document.Addfrm.number.value)) {
		alert ("Please enter the product quantity");
		document.Addfrm.number.focus();
		return false;
	}
	if ((document.Addfrm.price.value == "") || isNaN(document.Addfrm.price.value)) {
		alert("Please enter the price of the product");
		document.Addfrm.price.focus();
		return false;
	}
	if (document.Addfrm.Description.value == "") {
		alert("Please descript the product in the description box")
		document.Addfrm.Description.focus();
		return false;
	}
}
</script>
</head>

<body>
    <section>
        <div class="container-3">
            <div class="wrapper-1">
                <div class="title">
                    Add item
                </div>
                <form method="POST" name="AddFrm" enctype="multipart/form-data" action="admin_upload.php">
                    <div class="form">
                        <div class="input-field">
                            <label>Product Picture</label>
                            <input type="file" name="file" class="file">
                        </div>
                        <div class="input-field">
                            <label>Code of Item</label>
                            <input type="text" name="code_of_medicine" class="input">
                        </div>
                        <div class="input-field">
                            <label>Item Name</label>
                            <input type="text" name="name" class="input">
                        </div>
                        <div class="input-field">
                            <label>Quantity</label>
                            <input type="number" name="number" min="0" class="input">
                        </div>
                        <div class="input-field">
                            <label>Price</label>
                            <input type="number" step="0.01" pattern="\d+(\.\d{1,2})?" min="0" name="price" class="input">
                        </div>
                        <div class="input-field">
                            <label>Description</label>
                            <textarea name="description" placeholder="Description" class="textarea"></textarea>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="btnadd" value="Add" onclick="return validate();" class="btn">
                            <input type="reset" name="btncancel" value="Reset" class="btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>