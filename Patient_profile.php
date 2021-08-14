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
//$fileno-$_POST['fileno'];
// echo "string";
  $id = $_SESSION['id'];
  $sql ="SELECT * from information where emailid = '$id'";  
                $result = mysqli_query($conn,$sql);

                $queryresult = mysqli_num_rows($result);
                if($queryresult > 0){
                 while ($row = mysqli_fetch_assoc($result)) { 
                    $fileno=$row['fileno'];
 
 }
}             
else {
  # code...

$query = "SELECT * from information order by fileno desc limit 1";
$result = mysqli_query($conn,$query);
//$row = mysqli_fetch_array($result);
$queryresult = mysqli_num_rows($result);

// $row = mysqli_fetch_array($result);
if($queryresult > 0){
  while($row = mysqli_fetch_assoc($result)){
    
$lastid = $row['fileno'];

  $fileno = substr($lastid,1);
  $fileno = intval($fileno);
  $fileno = "F".($fileno+01);
  //$z=date('yy-m-d');
}
}
else
{
  
    
  $fileno = "F101";

//$z=date('yy-m-d');
}
  

}

if(isset($_POST['save'])){  
   // echo $fileno;
                          //  $fileno=$_POST['fileno'];
 							$fname= $_POST['fname'];
                   // $fileno=$_POST['fileno'];
             $_SESSION['fname']=$fname; 
  							$lname= $_POST['lname'];
                   
 $_SESSION['lname']=$lname;
                            $gender=$_POST['gender'];
                            $address= $_POST['address']; 
                            $state= $_POST['state'];
                             $country=$_POST['country'];
                            $pincode= $_POST['pincode']; 
                            $phone=$_POST['phone'];
                               $_SESSION['phone']=$phone; 
                            $ename= $_POST['ename']; 
                            
                            $relation= $_POST['relation'];
                            $ephone= $_POST['ephone'];
                            //$emailid=$_POST['emailid']; 
                            $height=$_POST['height'];
                            $weight= $_POST['weight']; 
                            $blood= $_POST['blood'];
                            $marital= $_POST['marital']; 
                            $dob= $_POST['dob'];
							$id = $_SESSION['id'];
							$img_name = $_FILES['my_image']['name'];
							$img_size = $_FILES['my_image']['size'];
							$tmp_name = $_FILES['my_image']['tmp_name'];
							$error = $_FILES['my_image']['error'];

 							$sql ="SELECT * from information where emailid = '$id'";	
    						$result = mysqli_query($conn,$sql);

   							$queryresult = mysqli_num_rows($result);
    						if($queryresult > 0){
                 while ($row = mysqli_fetch_assoc($result)) { 
                    $fileno=$row['fileno'];
                            //echo "string";
                                
    												//if ($error === 0) {
                                                        //echo "string";
																		/*if ($img_size > 12500000 ) {
																									$em = "Sorry, your file is too large.";
		    																						/*header("Location: Patient_profile.php?error=$em");*/
																								//}
																		
																				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
																				$img_ex_lc = strtolower($img_ex);

																				$allowed_exs = array("jpg", "jpeg", "png"); 

																				if (in_array($img_ex_lc, $allowed_exs)) {
																							$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
																							$img_upload_path = 'uploads/'.$new_img_name;
																							move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				//$sql=mysqli_query($conn,"INSERT INTO patient_profile(name,surname,profil_img) VALUES ('$fname','$lname','$file')");
        // $sql=mysqli_query($conn,"UPDATE  patient_profile set  name ='$fname',surname ='$lname',emailid ='$emailid',profile_img='$new_img_name' where emailid ='$id'");
																				}
// while($row = mysqli_fetch_assoc($result)){e
    																
                                        /* $sql=mysqli_query($conn,"UPDATE information set  profil_img ='$new_img_name',fname ='$fname' 
                                        where emailid ='$emailid'");*/

if($new_img_name == 0 || $new_img_name == '')
{
$id = $_SESSION['id'];
          $sql = "SELECT profile_img FROM information where emailid='$id'   ";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) { 
            $new_img_name=$images['profile_img'];

            $sql="UPDATE information SET profile_img='$new_img_name',fname='$fname',lname='$lname',fileno='$fileno',gender='$gender',marital='$marital',address='$address',state='$state',country='$country',pincode='$pincode',phone='$phone',ename='$ename',relation='$relation',ephone='$ephone',height='$height',weight='$weight',blood='$blood',dob='$dob' WHERE  emailid ='$id'";
           
                
     } }
     
}
else{
    $sql="UPDATE information SET profile_img='$new_img_name',fname='$fname',lname='$lname',fileno='$fileno',gender='$gender',marital='$marital',address='$address',state='$state',country='$country',pincode='$pincode',phone='$phone',ename='$ename',relation='$relation',ephone='$ephone',height='$height',weight='$weight',blood='$blood',dob='$dob' WHERE  emailid ='$id'";
           
}
//echo $img;
    
                                                                          /*'lname'='$lname','fileno'='$fileno','gender'='$gender','marital'='$marital','address'=''$address,'state'='$state','country'='$country','pincode'='$pincode','phone'='$phone','ename'=''$ename,'relation'='$relation','ephone'='$ephone','height'='$height','weight'='$weight','blood'='$blood','dob'='$dob'*/
 																		   
                                                                        mysqli_query($conn, $sql);    
                                                                //echo $sql;
                                                                 if ($sql) 
                                                                            {
                                                                            echo "<script>alert('Data Added');</script>";
                                                                                    }
 
												//	}
							}
              }		
							else{
									if ($error === 0) {
														if ($img_size > 1250000) {
																					$em = "Sorry, your file is too large.";
		    																		/*header("Location: Patient_profile.php?error=$em");*/
														}
														else {
																$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
																$img_ex_lc = strtolower($img_ex);

																$allowed_exs = array("jpg", "jpeg", "png"); 

																if (in_array($img_ex_lc, $allowed_exs)) {
																$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
																$img_upload_path = 'uploads/'.$new_img_name;
																move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				//$sql=mysqli_query($conn,"INSERT INTO patient_profile(name,surname,profil_img) VALUES ('$fname','$lname','$file')");
        // $sql=mysqli_query($conn,"UPDATE  patient_profile set  name ='$fname',surname ='$lname',emailid ='$emailid',profile_img='$new_img_name' where emailid ='$id'");
																}
														         // echo "string";
																/*$sql="INSERT INTO patient_profile(File_no,name,surname,gender,address,state,country,pincode,phone,e_name,relation,e_phone,emailid,height,weight,blood,marital,dob,profile_img) VALUES ('$fileno', '$fname','$lname','$gender','$address','$state','$country','$pincode','$phone',$ename','$relation','$ephone',$emailid','$height','$weight','$blood','$marital','$dob','$new_img_name')";*/
                                                                
                      $sql="INSERT INTO information(profile_img,emailid,fname,lname,fileno,gender,marital,address,state,country,pincode,phone,ename,relation,ephone,height,weight,blood,dob
                    ) VALUES ('$new_img_name','$id','$fname','$lname','$fileno','$gender','$marital','$address','$state','$country','$pincode','$phone','$ename','$relation','$ephone','$height','$weight','$blood','$dob')";                                   

                        /* $sql=mysqli_query($conn,"INSERT INTO information(fileno,fname,lname,profil_img,emailid) VALUES ('$fileno','$fname','$lname','$new_img_name','$emailid')");*/
                 
                 
															mysqli_query($conn, $sql);    
                                                                //echo $sql;
                                                                 if ($sql) 
                                                                            {
                                                                            echo "<script>alert('Data Added');</script>";
                                                                                    }

														/*		header("Location: patient_profile.php");*/
														}

										}else {
												$elsem = "You can't upload files of this type";
		        								/*header("Location: Patient_profile.php?error=$em");*/
										}
							}
	}/*else {
//		$em = "unknown error occurred!";
		header("Location: Patient_profile.php?error=$em");
	}*/

//}
//}
/*else {
	header("Location: Patient_profile.php");
}
*/


if(isset($_SESSION['id']))
{
  $id = $_SESSION['id'];
  //$s = $_POST['ser'];
    $sql ="SELECT * from information where emailid = '$id'";
    $result = mysqli_query($conn,$sql);

   $queryresult = mysqli_num_rows($result);
    if($queryresult > 0){
 while($row = mysqli_fetch_assoc($result)){
    
  
     $fname=$row['fname'];
    $lname=$row['lname'];
    $fileno1=$row['fileno'];
 							 $gender=$row['gender'];
                            $address= $row['address']; 
                            $state= $row['state'];
                             $country=$row['country'];
                            $pincode= $row['pincode']; 
                            $phone=$row['phone'];
                            $ename= $row['ename']; 
                            
                            $relation= $row['relation'];
                            $ephone= $row['ephone'];
                            $emailid=$row['emailid']; 
                            $height=$row['height'];
                            $weight= $row['weight']; 
                            $blood= $row['blood'];
                            $marital= $row['marital']; 
                            $dob= $row['dob'];
							//echo $gender;
    
}
}
else{
//  echo"<script>alert('Cu not found');</script>";
}
}

 
/*if(isset($_POST['save'])){
 
 $fname= $_POST['fname']; 
  $lname= $_POST['lname'];
       $file=$_FILES['image']['name'];

      //$cpass=$_POST['cpass'];
        //$opass=$_REQUEST['opass'];
        if($fname==""||$lname==""){
          echo "<script>alert('Enter all detalis');</script>";  

        }
        else{
         // if($pass==$cpass){
            $sql=mysqli_query($conn,"INSERT INTO patient_profile(name,surname,profil_img) VALUES ('$fname','$lname','$file')");
         
                 if ( $sql)
                   {
                      echo "";
                       echo "<script>alert('Register Sucssefully');</script>";  
                       $pass= "";
       // $email= "";
      //$cpass="";
       // $opass="";
                   } 
          
                   else 
           
                     {
                          echo "Error: " . $sql . "
                          " . mysqli_error($conn);
                        }
                    
                  
        }
      }
*/  
?>

<!DOCTYPE html>

<html lang="en">


<!-- edit-profile23:03-->
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
						<a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="Patient_profile.php">Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <a class="dropdown-item" href="Patient_profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="change_password.php">Change password</a>
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
						<!-- <li>
                            <a href="doctors.html"><i class="fa fa-user-md"></i> <span>View Prescription</span></a>
                        </li> -->
                        <li>
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
                        <!-- <li>
                            <a href="calendar.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li>  -->
                        <!-- <li>
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
                                <li><a class="active" href="profile.html"> Profile </a></li>
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
                    <div class="col-sm-12">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                </div>
                <form action="Patient_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="card-box">
                        <h3 class="card-title">Basic Informations</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap">
                                    <img class="inline-block" src="assets/img/user.jpg" alt="user">
                                    <div class="fileupload btn">
                                        
                                        

                                        
                                        <?php
$dbhost='localhost';
$dbname='e_Health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

$id = $_SESSION['id'];
          $sql = "SELECT profile_img FROM information where emailid='$id'	";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) { 
            $img=$images['profile_img'];

             ?>
             
            <div class="alb">
             	<img style="margin-left:-8%; width:115%;" src="uploads/<?=$images['profile_img']?>">
               <script> document.getElementById("img").innerHTML="<?php echo @$img?>";</script>
             	<!-- <img src="<?php// echo $images[//'profile_img'];?>"> -->
             </div>
          		
    <?php } }?>

                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">File No</label>
                                                <input type="text" name="fileno" value="<?php echo @$fileno;?>" class="form-control floating" value="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">First Name</label>
                                                <input type="text" name="fname" value="<?php echo @$fname;?>" class="form-control floating" value="" required>
                                                <!-- <label class="focus-label">Last Name</label>
                                                <input type="text" name="lname" value="<?php echo @$surname;?>" class="form-control floating" value="Doe"> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Last Name</label>
                                                <input type="text" name="lname" value="<?php echo @$lname;?>" class="form-control floating" value="Doe" required>
                                                <!-- <label class="focus-label">Birth Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control floating datetimepicker" type="text" value="">
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                                <label>Gender</label><br><br>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="gender" value="Male" <?php if(@$gender=="Male"){echo "checked";}?>><label class="avg" for="Male" style="margin-left: 5px; margin-top: -15px;">Male</label>
                                         <input type="radio" id="average" style="margin-left: 5px; margin-top: -11px;" name="gender" value="Female" <?php if(@$gender=="Female"){echo "checked";}?>><label class="avg" for="Below average" style="margin-left: 5px; margin-top: -15px;">Female</label>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="submit" 
                  name="submit"
                  value="Upload"> -->
                  <input class="upload" name="my_image" id="img" type="file" >
                    </div>
                    <div class="card-box">
                        <h3 class="card-title">Contact Informations</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Address</label>
                                    <input type="text" name="address" value="<?php echo @$address;?>" class="form-control floating" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">State</label>
                                    <input type="text" name="state" class="form-control floating" value="<?php echo @$state;?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Country</label>
                                    <input type="text" name="country" class="form-control floating" value="<?php echo @$country;?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Pin Code</label>
                                    <input type="text" name="pincode" class="form-control floating" value="<?php echo @$pincode;?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control floating" value="<?php echo @$phone;?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h3 class="card-title">In Case of Emergency</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Emetgency Contact Name</label>
                                    <input type="text" name="ename" class="form-control floating" value="<?php echo @$ename;?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Relationship</label>
                                    <input type="text" name="relation" class="form-control floating" value="<?php echo @$relation;?>" required>
                                </div>
                            </div>
                           <!--  <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Starting Date</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="01/06/2002">
									</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Complete Date</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="31/05/2006">
									</div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Contact Number</label>
                                    <input type="text" name="ephone" class="form-control floating" value="<?php echo @$ephone;?>" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Grade</label>
                                    <input type="text" class="form-control floating" value="Grade A">
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="add-more">
                            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Institute</a>
                        </div> -->
                    </div>
                    <div class="card-box">
                        <h3 class="card-title">Personal Informations</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Email Id</label>
                                    <input type="text"  class="form-control floating"  name="emailid" value="<?php echo @$id;?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Height</label>
                                    <input type="text" name="height" class="form-control floating" value="<?php echo @$height;?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Weight</label>
                                    <input type="text" name="weight" class="form-control floating" value="<?php echo @$weight;?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Blood Group</label>
                                    <input type="text" name="blood" class="form-control floating" value="<?php echo @$blood;?>" required>
                                </div>

                                <!-- <div class="form-group form-focus">
                                    <label class="focus-label">Period From</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="01/07/2007">
									</div>
                                </div> -->
                            </div>
                            <div class="col-md-6">

                                <label>Marital</label><br><br>
                                         <input type="radio" id="average"  name="marital" value="Married" <?php if(@$marital=="Married"){echo "checked";}?>><label class="avg" for="Male">Married</label>
                                         <input type="radio" id="average"  name="marital" value="Unmarried" <?php if(@$marital=="Unmarried"){echo "checked";}?>><label class="avg" for="Below average" >Unmarried</label>
                                <!-- <div class="form-group form-focus">
                                    <label class="focus-label">Period To</label>
									<div class="cal-icon">
										<input type="text" class="form-control floating datetimepicker" value="08/06/2018">
									</div>
                                </div> -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus select-focus">
                                                <label class="focus-label">Birth Date</label>
                                                <div class="cal-icon">
                                                    <input name="dob" class="form-control floating datetimepicker" value="<?php echo @$dob;?>" type="text" value="" required>
                                                </div> 
                                            </div>
                                <!-- <div class="form-group form-focus">
                                    <label class="focus-label">Period To</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="add-more">
                            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Experience</a>
                        </div> -->
                    </div>
                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" name="save" type="submit">Save</button>
                    </div>
                </form>
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
            </div>
        </div>
 -->    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

<script type="text/javascript">
   document.getElementById("user").innerHTML="<?php echo @$_SESSION['id']?>";
   document.getElementById("img").innerHTML="<?php echo @$img?>";

      </script>
<!-- edit-profile23:05-->

</html>
<?php


if(isset($_SESSION['id'])){

     $i=$_SESSION['id'];
     /*echo $_SESSION['lname'];
        echo $_SESSION['phone']; */
     //echo $i;
     
   /* if($i=="sarthak")
    {
      ?>
      <script type="text/javascript">
      document.getElementById("user").innerHTML="<?php echo @$_SESSION['id']?>";
      $("#update").removeAttr("disabled");
       $("#del").removeAttr("disabled");
      </script>

<?php
}

else{
  
  ?>
      <script type="text/javascript">
   document.getElementById("user").innerHTML="<?php echo @$_SESSION['id']?>";
      </script>
  <?php
}
   
}*/
}
?>
