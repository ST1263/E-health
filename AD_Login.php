<?php
session_start();
?>
<?php
      if(isset($_POST['insert'])){
$id=$_POST['id'];
  $_SESSION['id']=$id;
 //echo $_SESSION['id']; 
  //$pass=$_POST['pass'];
}
?>
<?php
$dbhost='localhost';
$dbname='e_Health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

//$id= $_POST['id'];
       // $edate= $_POST['edate'];
  
if(isset($_POST['id']))
{

 $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  $email = $_POST['id'];
   //$pass= $_POST['pass'];
  $pass=md5($pass);
    $sql ="SELECT * from login where emailid = '$email' AND cpassword='$pass' limit 1";
    $result = mysqli_query($conn,$sql);
    //$a=$sql;
   $queryresult = mysqli_num_rows($result);
    if($queryresult == 1){
    	while($row = mysqli_fetch_assoc($result)){
  $username = $row['username'];
    		# code...
    	
    	if ($username == "Admin") {

    		# code...
    		echo"<script>alert('you have successfully login');</script>";
 header("location:Admin_dashboard.php");
    	}
    	else{
    		echo"<script>alert('you have successfully login');</script>";
 header("location:Doctor_dashboard.php");
    	}
    }
 //while($row = mysqli_fetch_assoc($result)){
   
   //"<script>alert('incorrect id password');</script>";
   //exit(); 
  /*<input type="text" name="name" value=" <?php //echo "".$row. ""?>;"
    <!--<input type="text" name="name" value=" <?php  //echo $row['name'] ?>"/>-->*/
   }
   else{
    echo"<script>alert('you have type incorrect id or paasword');</script>";
   //   alert("you have type incorrect Password");
   //   exit();
   }
   } 
   

?>


<!DOCTYPE html>

<html lang="en">


<!-- login23:11-->
<head>
	<style type="text/css">
        .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>E-Health</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="" class="form-signin" method="post">
						<div class="account-logo">
                            <a href="AD_login.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Emailid</label>
                            <input name="id" type="email" placeholder="Enter Emailid" autofocus="" class="form-control" autofocus="" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="pass" id="password-field" type="password" placeholder="Enter Password" class="form-control" autofocus="" required="">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>       
                        </div>
                        <!-- <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div> -->
                        <div class="form-group text-center">
                            <button type="submit" name="insert" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <!-- <div class="text-center register-link">
                            Don’t have an account? <a href="Patient_register.php">Register Now</a>
                        </div> -->
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

<script type="text/javascript">
   $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<!-- login23:12-->
</html>