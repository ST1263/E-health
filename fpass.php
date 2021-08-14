<?php
$dbhost='localhost';
$dbname='e_health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

if(isset($_POST['submit'])){

  $email= $_POST['email'];
  //      $id = $_SESSION['id'];
      $fileno=$_POST['fileno'];
        $cpass=mysqli_real_escape_string($conn,$_POST['cpass']);

$npass=mysqli_real_escape_string($conn,$_POST['npass']);
        if($npass==""||$cpass=="")
{
   echo "<script>alert('Enter all fields');</script>";
}
  $sql ="SELECT * from information where emailid = '$email' AND fileno='$fileno' ";
  //echo $sql;
    $result = mysqli_query($conn,$sql);
    //$a=$sql;
   $queryresult = mysqli_num_rows($result);

    if($queryresult > 0){


        while($row = mysqli_fetch_assoc($result)){

            $email1=$row['emailid'];
            $fielno1=$row['fileno'];
            


           /* echo $email;
            echo $email1;
            echo $fielno;
            echo $fielno1;*/

            if ($email == $email1 && $fileno == $fielno1)
             {

        # code...
                    if ($npass == $cpass) {
                        # code...
                    $cpass=md5($cpass);
            $npass=md5($npass);
                          $sql=mysqli_query($conn,"UPDATE patient_login set cpassword ='$cpass' , password ='$npass' where emailid ='$email'");
         
         if ( $sql)
          {
            
          echo "<script>alert('Password Changed Successfully');</script>"; 
          header("location:Patient_Login.php");

                        }
                        
}
else
{
    echo "<script>alert('Password MissMatch');</script>"; 
}
                    
                    
                                  
                    
    
        }
    }
}
    
    else{
                            echo "<script>alert('Please Check Email OR File No');</script>"; 
                        }
}
?>


<!DOCTYPE html>
<html lang="en">


<!-- forgot-password24:03-->

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
                    <form class="form-signin" action="" method="POST">
						<div class="account-logo">
                            <a href="fpass.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email ID</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Your Email" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>File No</label>
                            <input type="text" class="form-control" name="fileno" placeholder="Enter Your File No" autofocus required="">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="password-field" class=" form-control " name="npass" placeholder="Enter Your New Password" autofocus required="">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>                      <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> -->
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="password-field1" class="form-control" name="cpass" placeholder="Enter Your Confirm Password" autofocus required="">
                            <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password1"></span>      
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" name="submit" type="submit">Reset Password</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="Patient_Login.php">Back to Login</a>
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
<!-- forgot-password24:03-->
</html>