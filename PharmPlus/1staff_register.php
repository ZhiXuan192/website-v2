<!-- to register new staff -->

<?php
    include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content.css">

    <title>Edit Profile</title>

    <script type="text/javascript">
function validate() {
	if (document.registerfrm.fullname.value == "") {
		alert ("Name: Enter your name!");
		document.registerfrm.fullname.focus();
		return false;
	}
  if (document.registerfrm.UserName.value == "") {
    alert ("Username: Enter your preferable username")
    document.registerfrm.focus();
    return false;
  }
	if (!/^[a-zA-Z\s]+$/g.test(document.registerfrm.fullname.value)){
		alert("Name: Enter alphabets only!");
		document.registerfrm.name.focus();
		return false;
	}
  if (document.registerfrm.password.value == "") {
    alert ("Password: Please enter your password!");
    document.registerfrm.password.focus();
    return false;
  }
	if ((document.registerfrm.age.value =="") || isNaN(document.registerfrm.age.value)) {
		alert ("Age: Enter your age / Numeric only!");
		document.registerfrm.age.focus();
		return false;
	}
	if ((document.registerfrm.identification.value == "") || isNaN(document.registerfrm.identification.value) || document.registerfrm.identification.value.length != 12 ) {
		alert("IC: Please enter your IC in 12 NUMERIC!");
		document.registerfrm.identification.focus();
		return false;
	}
	if ((document.registerfrm.contactNumber.value == "") || isNaN(document.registerfrm.contactNumber.value)) {
		alert("Phone: Please enter your Contact Number!")
		document.registerfrm.contactNumber.focus();
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
                    Register
                </div>
                <form name="registerfrm" method="POST" enctype="multipart/form-data" action="1staff_confirmregister.php">
                    <div class="form">
                        <div class="input-field">
                            <label>Profile Picture</label>
                            <input type="file" name="file" class="input">
                        </div>
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="input">
                        </div>
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="UserName" class="input">
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" class="input">
                        </div>
                        <div class="input-field">
                            <label>Age</label>
                            <input type="number" name="age" min=18 max=100 class="input">
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" class="input">
                        </div>
                        <div class="input-field">
                            <label>Identification No/IC</label>
                            <input type="text" name="identification" maxlength="12" class="input">
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <input type="radio" name="gender" value="Male" class="input">Male
                            <input type="radio" name="gender" value="Female" class="input">Female
                        </div>
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="text" name="contactNumber" class="input">
                        </div>
                        <div class="input-field">
                            <input type="submit" name="register" value="Register"  onclick="return validate()" class="btn"> 
                            <input type="button" name="cancel" value="Cancel" class="btn"  onclick="location.href='login.php';">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>