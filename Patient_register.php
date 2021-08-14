	
<?php
$dbhost='localhost';
$dbname='e_Health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

if(isset($_POST['register'])){
 
 $email= $_POST['email']; 
 // $pass= $_POST['pass'];
  $cpass=mysqli_real_escape_string($conn,$_POST['cpass']);

$pass=mysqli_real_escape_string($conn,$_POST['pass']);

        
     // $cpass=$_POST['cpass'];

        //$opass=$_REQUEST['opass'];
        if($pass==""||$email==""||$cpass==""){
          echo "<script>alert('Enter all detalis');</script>";  

        }
        else{
          if($pass==$cpass){
            $cpass=md5($cpass);
            $pass=md5($pass);
            $sql=mysqli_query($conn,"INSERT INTO patient_login(emailid,password,cpassword) VALUES ('$email','$pass','$cpass')");
         
                 if ( $sql)
                   {
                      echo "";
                       echo "<script>alert('Register Sucssefully');</script>";  
                       header("location:Patient_Login.php");
                       //$pass= "";

        $email= "";
      $cpass="";
      header("location:Patient_login.php");
       // $opass="";
                   } 
          
                   else 
           
                     {
                          echo "Error: " . $sql . "
                          " . mysqli_error($conn);
                        }
                    }
                  else{
                    echo "<script>alert('Password Miss-match');</script>";  

          }
        }
      }
  
?>

<!DOCTYPE html>

<html lang="en">


<!-- register24:03-->
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
    <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="" class="form-signin" method="post">
						<div class="account-logo">
                            <a href=""><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <!--  <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control">
                        </div>-->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Enter Email Id" class="form-control" autofocus="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password-field" name="pass" placeholder="Enter Password" class="form-control" autofocus="" required>
                             <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>        
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="password-field1" name="cpass" placeholder="Enter Confirm Password" class="form-control" autofocus="" required>
                            <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password1"></span> 
                        </div>
                        <!-- <div class="form-group checkbox">
                            <label>
                                <input type="checkbox"> I have read and agree the Terms & Conditions
                            </label>
                        </div> -->
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" name="register" type="submit">Signup</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="Patient_login.php">Login</a>
                        </div>
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


   $(".toggle-password1").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<!-- register24:03-->
</html>