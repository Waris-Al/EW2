<?php include("NavigationBar.php"); 
//admin login is required , as it checks if the username and password match those in the database

//following code is for error messages, if input is incorrect/null
$nameErr = $pwderr = $invalidMesg = "";

if (isset($_POST['submit'])) {

    if ($_POST['username']==null) {
        $nameErr = "Username is required";
      } 
      
      if ($_POST['password']==null) {
        $pwderr = "password is required";
      }

    if($_POST['username'] != null && $_POST['password'] !=null)
    {
          header("Location: checkAdminLogin.php");
          exit();
    }
}

?>


<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">


  </head>
  <body class="bgColor">
  <div>
<?php 
//this is the input boxes for the login
?>
thi
        <form method="post">
                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name = "username">
                        <span style="color: red"><?php echo $nameErr; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="password" name = "password">
                        <span style="color: red"><?php echo $pwderr; ?></span>
                   </div>
                   <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="submit" name ="submit">
                   </div>
                </form>
  </body>
  
<?php include("Footer.php"); ?>
</html>

