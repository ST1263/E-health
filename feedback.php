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
$dbname='e_Health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

if(isset($_POST['save'])){
 

        //$opass=$_REQUEST['opass'];
      $dept=$_POST['dept'];   
      $dname=$_POST['dname'];
      $scale=$_POST['scale']; 
      $scale1=$_POST['scale1']; 
      $scale2=$_POST['scale2']; 
      $scale3=$_POST['scale3']; 
      $scale4=$_POST['scale4'];
      $msg=$_POST['msg'];  
        $id = $_SESSION['id'];
      $msg=$_POST['msg'];
      $a=0;
      $b=0;
      $c=0;
      $d=0;
      $e=0;
      if ($scale == "average" ) {
                            $a = 3;

                            # code...
                        }
                        if ($scale == "Below average") {
                            $a = 2;

                            # code...
                        }
                        if ($scale == "Unacceptable" ) {
                            $a = 1;

                            # code...
                        }
                        if ($scale == "good" ) {
                            $a = 4;

                            # code...
                        }
                        if ($scale == "excellent") {
                            $a = 5;

                            # code...
                        }
       
       if ($scale1 == "average" ) {
                            $b = 3;

                            # code...
                        }
                        if ($scale1 == "Below average") {
                            $b = 2;

                            # code...
                        }
                        if ($scale1 == "Unacceptable" ) {
                            $b = 1;

                            # code...
                        }
                        if ($scale1 == "good" ) {
                            $b = 4;

                            # code...
                        }
                        if ($scale1 == "excellent") {
                            $b = 5;

                            # code...
                        }
                        
                      
      if ($scale2 == "average" ) {
                            $c = 3;

                            # code...
                        }
                        if ($scale2 == "Below average") {
                            $c = 2;

                            # code...
                        }
                        if ($scale2 == "Unacceptable" ) {
                            $c = 1;

                            # code...
                        }
                        if ($scale2 == "good" ) {
                            $c = 4;

                            # code...
                        }
                        if ($scale2 == "excellent") {
                            $c = 5;

                            # code...
                        }
      
      if ($scale3 == "average" ) {
                            $d = 3;

                            # code...
                        }
                        if ($scale3 == "Below average") {
                            $d = 2;

                            # code...
                        }
                        if ($scale3 == "Unacceptable" ) {
                            $d = 1;

                            # code...
                        }
                        if ($scale3 == "good" ) {
                            $d = 4;

                            # code...
                        }
                        if ($scale3 == "excellent") {
                            $d = 5;

                            # code...
                        }
                         if ($scale4 == "average" ) {
                            $e = 3;

                            # code...
                        }
                        if ($scale4 == "Below average") {
                            $e == 2;

                            # code...
                        }
                        if ($scale4 == "Unacceptable" ) {
                            $e = 1;

                            # code...
                        }
                        if ($scale4 == "good" ) {
                            $e = 4;

                            # code...
                        }
                        if ($scale4 == "excellent") {
                            $e = 5;

                            # code...
                        }
      
      
                        $total=0;
                        $tot=$a + $b +$c + $d +$e;
                        $total=$tot/5;
                        //echo "<script>alert('$total');</script>";  

            $sql=mysqli_query($conn,"INSERT INTO feedback(dept,dname,please_rate,please,plz,plz_rate,plz_overall,msg,total) VALUES ('$dept','$dname','$scale','$scale1','$scale2','$scale3','$scale4','$msg','$total')");

         
                 if ( $sql)
                   {
                      echo "";
                       echo "<script>alert('Feedback Submit');</script>";  
       
                        
       // $opass="";
                   } 
          
                   else 
           
                     {
                          echo "Error: " . $sql . "
                          " . mysqli_error($conn);
                        }
                    }

if(isset($_SESSION['id']))
{
  $id = $_SESSION['id'];
/*$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];  */
/*$n=" ";
    $name=$fname.$n.$lname; */
$sql ="SELECT * from information where emailid = '$id'";
    $result = mysqli_query($conn,$sql);

   $queryresult = mysqli_num_rows($result);
    if($queryresult > 0){
 while($row = mysqli_fetch_assoc($result)){
    
  
    
    $fileno=$row['fileno'];
}
}
else{
//  echo"<script>alert('Cu not found');</script>";
}
if ($fileno == 0 || $fileno == "") {
        # code...
    /*echo"<script>alert('complete your profile');</script>";
*/
    echo '<script>
alert("Compe your profile");
window.location.href="Patient_profile.php";
</script>';
    /*$em = "Sorry, your file is too large.";
    header("Location: Patient_profile.php?error=$em");*/

}

}

$dbhost='localhost';
$dbname='e_health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

$query = "SELECT * from appointment order by aid desc limit 1";
$result = mysqli_query($conn,$query);
//$row = mysqli_fetch_array($result);
$queryresult = mysqli_num_rows($result);

// $row = mysqli_fetch_array($result);
if($queryresult > 0){
  while($row = mysqli_fetch_assoc($result)){
    
$lastid = $row['aid'];

  $aid = substr($lastid,1);
  $aid = intval($aid);
  $aid = "A".($aid+01);
  //$z=date('yy-m-d');
}
}
else
{
  
  
  $aid = "A101";
//$z=date('yy-m-d');
}


/*if(isset($_POST['save'])){
 

        //$opass=$_REQUEST['opass'];
      $dept=$_POST['dept'];   
      $dname=$_POST['dname'];
       $aid=$_POST['aid'];   
      $pname=$_POST['pname'];
       $date=$_POST['date'];   
      $time=$_POST['time'];
       $phone=$_POST['phone'];   
     
        $id = $_SESSION['id'];
      $msg=$_POST['msg'];
            $sql=mysqli_query($conn,"INSERT INTO appointment(dept,dname,aid,pname,date,time,emailid,phone,msg) VALUES ('$dept','$dname','$aid','$pname','$date','$time','$id','$phone','$msg')");
         
                 if ( $sql)
                   {
                      echo "";
                       echo "<script>alert('Register Sucssefully');</script>";  
       
       // $opass="";
                   } 
          
                   else 
           
                     {
                          echo "Error: " . $sql . "
                          " . mysqli_error($conn);
                        }
                    }
*/
?>

<!DOCTYPE html>
<html lang="en">


<!-- add-appointment24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>E-Health</title>
           <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
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
				<a href="Patient_dashboard.php" class="logo">
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
                </li>-->
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
						<a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="Patiet_profile.php">Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div> 
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <a class="dropdown-item" href="Patiet_profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="Patient_dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
					<!-- 	<li>
                            <a href="d"><i class="fa fa-user-md"></i> <span>View Prescription</span></a>
                        </li> -->
                      <li class="active">
                            <a href="feedback.php"><i class="fa fa-pencil-square-o"></i> <span>Feedback</span></a>
                        </li>
                        <li>
                            <a href="appointment.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                         <li>
                            <a href="doctor.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-user-md"></i> <span>Doctors Schedule</span></a>
                        </li>
                       <!--  <li>
                            <a href="schedule.html"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>
                        <li>
                            <a href="departments.html"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                        </li>
						<li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employees.html">Employees List</a></li>
								<li><a href="leaves.html">Leaves</a></li>
								<li><a href="holidays.html">Holidays</a></li>
								<li><a href="attendance.html">Attendance</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="invoices.html">Invoices</a></li>
								<li><a href="payments.html">Payments</a></li>
								<li><a href="expenses.html">Expenses</a></li>
								<li><a href="taxes.html">Taxes</a></li>
								<li><a href="provident-fund.html">Provident Fund</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary.html"> Employee Salary </a></li>
								<li><a href="salary-view.html"> Payslip </a></li>
							</ul>
						</li>
                        <li>
                            <a href="chat.html"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="incoming-call.html">Incoming Call</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.html">Compose Mail</a></li>
                                <li><a href="inbox.html">Inbox</a></li>
                                <li><a href="mail-view.html">Mail View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog View</a></li>
                                <li><a href="add-blog.html">Add Blog</a></li>
                                <li><a href="edit-blog.html">Edit Blog</a></li>
                            </ul>
                        </li>
						<li>
							<a href="assets.html"><i class="fa fa-cube"></i> <span>Assets</span></a>
						</li>
						<li>
							<a href="activities.html"><i class="fa fa-bell-o"></i> <span>Activities</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="expense-reports.html"> Expense Report </a></li>
								<li><a href="invoice-reports.html"> Invoice Report </a></li>
							</ul>
						</li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="menu-title">UI Elements</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-laptop"></i> <span> Components</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="uikit.html">UI Kit</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="tabs.html">Tabs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                <li><a href="form-input-groups.html">Input Groups</a></li>
                                <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                <li><a href="form-vertical.html">Vertical Form</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-table"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatables.html">Data Table</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li>
                        <li class="menu-title">Extras</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.html"> Login </a></li>
                                <li><a href="register.html"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="change-password2.html"> Change Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                                <li><a href="profile.html"> Profile </a></li>
                                <li><a href="gallery.html"> Gallery </a></li>
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                                <li><a href="blank-page.html"> Blank Page </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                            <ul style="display: none;">
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span>Level 1</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Feedback</h4>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-lg-8 offset-lg-2">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="select" name="dept" id="dept">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="select" name="dname" id="dname">
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
										<label><b>Q1. PLEASE RATE YOUR EXPERIENCE WITH THE CONSULTANT/DOCTOR.</b></label><br><br>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale" value="Unacceptable" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="Unacceptable" style="margin-left: 5px; margin-top: -15px;">Unacceptable</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale" value="Below average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="Below average" style="margin-left: 5px; margin-top: -15px;">Below average</label>
										 <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale" value="average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Average</label> <input type="radio" id="good" style="margin-left: 5px; margin-top: -11px;" name="scale" value="good" <?php if(@$z1=="good"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="good">Good</label><input type="radio" id="excellent" style="margin-left: 5px; margin-top: -11px;" name="scale" value="excellent" <?php if(@$z1=="excellent"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="excellent">Excellent</label>
									</div>
                                </div>
                                <!-- <div class="col-md-6">
									<div class="form-group">
										<label>Patient Name</label>
                                        <input class="form-control" name="pname" value="<?php echo @$name;?>" type="text" name="pname" value="" disabled>
                                        <option>Select</option>
	 -->									<!-- <select class="select">
											
											<option>Jennifer Robinson</option>
											<option>Terry Baker</option>
										</select> -->
									<!-- </div>
                                </div>  -->
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label><b>Q2.PLEASE RATE YOUR EXPERIENCE FOR BOOKING APPOINTMENTS?.</b></label><br><br>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale1" value="Unacceptable" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Unacceptable</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale1" value="Below average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Below average</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale1" value="average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Average</label> <input type="radio" id="good" style="margin-left: 5px; margin-top: -11px;" name="scale1" value="good" <?php if(@$z1=="good"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="good">Good</label><input type="radio" id="excellent" style="margin-left: 5px; margin-top: -11px;" name="scale1" value="excellent" <?php if(@$z1=="excellent"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="excellent">Excellent</label>

                                    </div>
                                </div>
                                 <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="select" name="dname" id="dname">
                                           
                                        </select>
                                    </div>
                                </div>  -->
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                <label><b>Q3. PLEASE RATE YOUR EXPERIENCE FOR DOCTOR'S TREATMENTS?.</b></label><br><br>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale2" value="Unacceptable" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="Unacceptable" style="margin-left: 5px; margin-top: -15px;">Unacceptable</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale2" value="Below average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="Below average" style="margin-left: 5px; margin-top: -15px;">Below average</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale2" value="average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Average</label> <input type="radio" id="good" style="margin-left: 5px; margin-top: -11px;" name="scale2" value="good" <?php if(@$z1=="good"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="good">Good</label><input type="radio" id="excellent" style="margin-left: 5px; margin-top: -11px;" name="scale2" value="excellent" <?php if(@$z1=="excellent"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="excellent">Excellent</label>
                                     </div>
                                 </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="text" name="date" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="time-icon">
                                            <input type="text" name="time" class="form-control" id="datetimepicker3">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                <label><b>Q4. PLEASE RATE YOUR EXPERIENCE FOR EXPLENATION OF MEDICINE BY DOCTORS IS SATISFACTORY OR NOT?.</b></label><br><br>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale3" value="Unacceptable" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Unacceptable</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale3" value="Below average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Below average</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale3" value="average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Average</label> <input type="radio" id="good" style="margin-left: 5px; margin-top: -11px;" name="scale3" value="good" <?php if(@$z1=="good"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="good">Good</label><input type="radio" id="excellent" style="margin-left: 5px; margin-top: -11px;" name="scale3" value="excellent" <?php if(@$z1=="excellent"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="excellent">Excellent</label>
                                     </div>
                                 </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                <label><b>Q5. PLEASE RATE YOUR EXPERIENCE HOW MUCH DO YOU RATE US.</b></label><br><br>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale4" value="Unacceptable" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Unacceptable</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale4" value="Below average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Below average</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="scale4" value="average" <?php if(@$z1=="average"){echo "checked";}?>><label class="avg" for="average" style="margin-left: 5px; margin-top: -15px;">Average</label> <input type="radio" id="good" style="margin-left: 5px; margin-top: -11px;" name="scale4" value="good" <?php if(@$z1=="good"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="good">Good</label><input type="radio" id="excellent" style="margin-left: 5px; margin-top: -11px;" name="scale4" value="excellent" <?php if(@$z1=="excellent"){echo "checked";}?>><label class="avg" style="margin-left: 5px; margin-top: -15px;" for="excellent">Excellent</label>
                                     </div>
                                 </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Email</label>
                                        <input class="form-control" value="<?php echo @$_SESSION['id'];?>" name="emailid" type="email" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Phone Number</label>
                                        <input class="form-control" value="<?php echo @$_SESSION['phone'];?>" name="phone" type="text" disabled>
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" name="msg" class="form-control"></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label class="display-block">Appointment Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="product_active" value="option1" checked>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="product_inactive" value="option2">
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
                            </div> -->
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="save">Save Feedback</button>
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
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    function loadData(type, name){
        $.ajax({
            url : "load-cs.php",
            type : "POST",
            data: {type : type, name : name},
            success : function(data){
                if(type == "stateData"){
            //echo "string";

                    $("#dname").html(data);
          
                }else{
                    $("#dept").html(data);
                }
                
            }
        });
    }

    loadData();

    $("#dept").on("change",function(){
        var country = $("#dept").val();

        if(country != ""){
            loadData("stateData", country);
        }else{
            $("#dname").html("");
        }

        
    })
  });
</script>
<script type="text/javascript">
   document.getElementById("user").innerHTML="<?php echo @$_SESSION['id']?>";
      </script>
<!-- add-appointment24:07-->
</html>
