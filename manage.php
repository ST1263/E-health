<?php
session_start();
?>
<?php
if(isset($_SESSION['id']))
{
  $id = $_SESSION['id'];
 
}
else
 {
    header("location:home.php");
 }
?>
<?php
$dbhost='localhost';
$dbname='e_health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");
if(isset($_POST['search']))
{
  $s = $_POST['uname1'];
   
  //$s = $_POST['ser'];
    $sql ="SELECT * from login where username = '$s'";
    $result = mysqli_query($conn,$sql);

   $queryresult = mysqli_num_rows($result);
    if($queryresult > 0){
 while($row = mysqli_fetch_assoc($result)){
    
  
     $uname=$row['username'];
    $npass=$row['password'];
    $cpass=$row['cpassword'];
    $email=$row['emailid'];
    
}
}
else{
  echo"<script>alert('not found');</script>";
}
}







if(isset($_POST['insert'])){
 $uname=$_POST['uname'];
 $email= $_POST['email']; 
 $cpass=mysqli_real_escape_string($conn,$_POST['cpass']);

$npass=mysqli_real_escape_string($conn,$_POST['npass']);
        //$opass=$_REQUEST['opass'];
        if($npass==""||$email==""||$cpass==""){
          echo "<script>alert('Enter all detalis');</script>";  

        }
        else{
          if($npass==$cpass){
            $npass=md5($npass);
            $cpass=md5($cpass);
            $sql=mysqli_query($conn,"INSERT INTO login(username,password,cpassword,emailid) VALUES ('$uname','$npass','$cpass','$email')");
         
                 if ( $sql)
                   {
                      echo "";
                       echo "<script>alert('Doctor Added');</script>";  
                       $npass= "";

        $email= "";
      $cpass="";
     // header("location:Patient_login.php");
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

if(isset($_POST['update'])){
 // $npass= $_POST['npass'];
        $id = $_SESSION['id'];
       $cpass=mysqli_real_escape_string($conn,$_POST['cpass']);

$npass=mysqli_real_escape_string($conn,$_POST['npass']);
       $email=$_POST['email'];
        //$opass=$_POST['opass'];
        if($npass==""||$cpass=="")
{
   echo "<script>alert('Enter all fields');</script>";
}

  $sql ="SELECT * from login where emailid = '$id' ";
    $result = mysqli_query($conn,$sql);
    //$a=$sql;
   $queryresult = mysqli_num_rows($result);

    if($queryresult > 0){

 while($row = mysqli_fetch_assoc($result)){
    
   
   //$opass1 = $row['cpassword'];
  $id=$row['emailid'];
  
}
//if ($cpass==$opass1) {
  # code...
if($npass==$cpass){
        $npass=md5($npass);
        $cpass=md5($cpass);
        $sql=mysqli_query($conn,"UPDATE login set cpassword ='$cpass' , password ='$npass' where emailid ='$email'");
         
         if ( $sql)
          {
            echo "";
          echo "<script>alert('Password Changed Successfully');</script>"; 
            $userid= "";
            $pass= "";
       
      $cpass="";
        $opass="";
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
  else{
     echo "<script>alert('UserId Incorrect');</script>";  
  }
   


        


    


    }
    if(isset($_POST['delete']))
        {
                
             $email=$_POST['email'];
if( $email =="" )
         
          {
            $msg = "enter all fields";
            echo "<script>alert('enter all fields');</script>";
            //header("location:enquiry.php?msg=".$msg);
          }
 else{
                $sql=mysqli_query($conn,"DELETE FROM login where emailid = '$email'");
                 
                 if ($sql)
                    {
                        //echo " record successfully DELETED!";
                    //header("location:customer.php");
echo "<script>alert('Record Deleted');</script>";
                    } 
                    
                 else 
                     
                    {
                        echo "Error: " . $sql . "
                        " . mysqli_error($conn);
                    }
            }
        }

 mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">


<!-- change-password24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>E-Health</title>
     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">   
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="Admindashboard.php" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Life Care</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <!-- <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid rounded-circle">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">V</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">L</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">G</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">V</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li> -->
                <!-- <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li> -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
                            <span class="status online"></span></span>
                        <span id="user"></span>
                    </a>
                    <div class="dropdown-menu">
                       <a class="dropdown-item" href="manage.php">Manage Doctor</a>
                        <a class="dropdown-item" href="change.php">Change Password</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="manage.php">Manage Doctor</a>
                    <a class="dropdown-item" href="change.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="Admin_dashboard.php"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                        </li>
                        <li class="menu-title">Settings</li>
                        <!-- <li>
                            <a href="settings.html"><i class="fa fa-building"></i> <span>Company Settings</span></a>
                        </li>
                        <li>
                            <a href="localization.html"><i class="fa fa-clock-o"></i> <span>Localization</span></a>
                        </li>
                        <li>
                            <a href="theme-settings.html"><i class="fa fa-picture-o"></i> <span>Theme Settings</span></a>
                        </li>
                        <li>
                            <a href="roles-permissions.html"><i class="fa fa-key"></i> <span>Roles & Permissions</span></a>
                        </li>
                        <li>
                            <a href="email-settings.html"><i class="fa fa-envelope-o"></i> <span>Email Settings</span></a>
                        </li>
                        <li>
                            <a href="invoice-settings.html"><i class="fa fa-pencil-square-o"></i> <span>Invoice Settings</span></a>
                        </li>
                        <li>
                            <a href="salary-settings.html"><i class="fa fa-money"></i> <span>Salary Settings</span></a>
                        </li>
                        <li>
                            <a href="notifications-settings.html"><i class="fa fa-globe"></i> <span>Notifications</span></a>
                        </li> -->
                        <!-- <li class="active">
                            <a href="change-password.html"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li> -->
                        <!-- <li>
                            <a href="leave-type.html"><i class="fa fa-cogs"></i> <span>Leave Type</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h4 class="page-title">Manage Doctor</h4>
                        <form action="" method="post">


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label></label>
                                        <input type="text" placeholder="Enter Username" name="uname1" class="form-control" autofocus="">
                                        <div class="col-sm-2 text-center m-t-20">
                                    <button type="submit" name="search" class="btn btn-primary submit-btn">Search</button>
                                </div>
                                    </div>
                                </div>
                               

                            </div>

                                <!-- <div class="row ">
      <div class="col-8 offset-4 ">
      <div class="input-group-prepend">
        <span class="input-group-text">Search</span>
      
        <input type="text" name="ser" class="ser" placeholder="Search Customer ID" style="width:18rem;">

        <button type="submit" name="search"><i class="fa fa-search" style="color:#910E80;"></i></button>
        </div>
      </div>
    </div> -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" placeholder="Enter Username" name="uname" value="<?php echo @$uname;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="Enter Email" value="<?php echo @$email;?>" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>New password</label>
                                        <input type="password" name="npass" placeholder="Enter New Password" value="<?php echo @$npass;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" name="cpass" placeholder="Enter Confirm Password" value="<?php echo @$cpass;?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-center m-t-20">
                                    <button type="submit" name="insert" class="btn btn-primary submit-btn">Add Doctor</button>
                                </div>
                              <div class="col-sm-6 text-center m-t-20">
                                    <button type="submit" name="update" class="btn btn-primary submit-btn">Change Password</button>
                                </div>
                                <div class="col-sm-6 text-center m-t-20">
                                    <button type="submit" name="delete" class="btn btn-primary submit-btn">Delete Doctor</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">See all messages</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>
<script type="text/javascript">
   
   document.getElementById("user").innerHTML="<?php echo @$_SESSION['id']?>";
      </script>

<!-- change-password24:06-->
</html>