<?php
session_start();
?>

          <?php

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

$dbhost='localhost';
$dbname='e_Health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

if(isset($_POST['delete'])){

 $id = $_SESSION['id'];

  $result=mysqli_query($conn,"SELECT * FROM appointment where emailid = '$id' ");
 

 $queryresult = mysqli_num_rows($result);
    if($queryresult > 0 ){

while($row=mysqli_fetch_array($result) )
{
$status=$row['status'];
     
     $aid= $row['aid'];

    echo $_GET['aid'];


                $pname= $row['pname'];
                $dept= $row['dept'];
                $dname= $row['dname'];
                $date= $row['date'];
                $time= $row['time'];
                
                //$date=$_POST['date1'];

if( $aid =="" )
         
          {
            $msg = "enter all fields";
            echo "<script>alert('enter all fields');</script>";
            //header("location:enquiry.php?msg=".$msg);
          }
 else{
                $sql=mysqli_query($conn,"DELETE FROM appointment where aid = '$aid'");
                 
                 if ($sql)
                    {
                        //echo " record successfully DELETED!";
                    //header("location:customer.php");
echo "<script>alert('Appointment Canceled');</script>";
                    } 
                    
                 else 
                     
                    {
                        echo "Error: " . $sql . "
                        " . mysqli_error($conn);
                    }
            }
        

}
}
 }
 mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>E-Health</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
   
    <link rel="stylesheet" href="assets/css/style1.css">
    
    <link rel="stylesheet" href="assets/css/demo1.css">  -->   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="Doctor_dashboard.php" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Life Care</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <!-- <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                     --><!-- <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
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
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                    <span id="user"></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="Doctor_view.php">My Profile</a>
                        <a class="dropdown-item" href="Doctor_profile.php">Edit Profile</a>
                        <a class="dropdown-item" href="change_pass.php">Change Password</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="Doctor_view.php">My Profile</a>
                    <a class="dropdown-item" href="Doctor_profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="change_pass.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="Doctor_Dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-user-md"></i> <span>Add Prescription</span></a>
                        </li> -->
                        <li>
                            <a href="view_history.php"><i class="fa fa-pencil-square-o"></i> <span>View Patient History</span></a>
                        </li> 
                         <li>
                            <a href="add_schedule.php"><i class="fa fa-pencil-square-o"></i> <span>Add Schedules</span></a>
                        </li>
                        <!-- <li>
                            <a href="edit_appointment.php"><i class="fa fa-calendar"></i> <span> Edit Appointments</span></a>
                        </li> -->
                        <!-- <li>
                            <a href=""><i class="fa fa-calendar"></i> <span>View Appointments</span></a>
                        </li> -->
                        <!-- <li>
                            <a href="calendar.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li>  -->
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
                    </ul>-->
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">   
                <form action="" method="POST">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Appointments</h4>
                    </div>
                    <!-- <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="appointment.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Appointment ID</th>
                                        <th>Patient Name</th>
                                       
                                        <th>Doctor Name</th>
                                        <th>Department</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$dbhost='localhost';
$dbname='e_health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");
  

 $id = $_SESSION['id'];


  $result=mysqli_query($conn,"SELECT * FROM appointment where demail = '$id' ");
 

 $queryresult = mysqli_num_rows($result);
    if($queryresult > 0 ){

while($row=mysqli_fetch_array($result) )
{
$status=$row['status'];
echo '<tr>';
   echo '<td name="aid"><Strong class="aid">'.$row['aid'].'</Strong></td>';
   echo '<td>'  .$row['pname'].'</td>';
   echo '<td>' .$row['dname'].'</td>';
   echo '<td>' .$row['dept'].'</td>';
   echo '<td>' .$row['date'].'</td>';
  echo '<td>' .$row['time'].'</td>';
  if ($status == 'Pending') {
      # code...
    echo '<td><span class="custom-badge status-red">'.$row['status'].'</span> </td>';
  }
  elseif ($status == 'Under Treatment') {
      # code...
    echo '<td><span class="custom-badge status-orange">'.$row['status'].'</span> </td>';
  }
  elseif ($status == 'Rejected') {
      # code...
    echo '<td><span class="custom-badge status-red">'.$row['status'].'</span> </td>';
  }
  elseif ($status == 'Approved') {
      # code...
    echo '<td><span class="custom-badge status-green">'.$row['status'].'</span> </td>';
  }
      # code...
  
  else {
      # code...
    echo '<td><span class="custom-badge status-green">'.$row['status'].'</span> </td>';
  }
  
  
  echo '<td class="text-right">';
                                           echo '<div class="dropdown dropdown-action">';
                                                echo '<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>';
                                               echo ' <div class="dropdown-menu dropdown-menu-right">';
                                                   echo '<a class="dropdown-item" href="edit_appointment.php?aid='.$row["aid"].'"><i class="fa fa-pencil m-r-5"></i> Edit</a>';

                                                   /*echo '<a class="dropdown-item" href="edit_appointment.php?aid='.$row["aid"].'"><i class="fa fa-pencil m-r-5"></i>Add Prescription</a>';*/
         
         echo '<a  href="#loginModal?aid='.$row["aid"].'" class="btnSelect dropdown-item" data-toggle="modal" data-target="#loginModal"><i class="fa fa-pencil m-r-5"></i>Add Prescription</a> ';                                    

/*echo '<button type="button" class="dropdown-item" data-toggle="modal" data-target="#loginModal"><i class="fa fa-pencil m-r-5"></i>
    Add Prescription
  </button>';*/
                        /*$aid1=$row["aid"];*/
                     /* echo $aid1;*/

                                     
                                        echo '</td>';

 /* echo '<td>' .$row['status'].'</td>';
  echo '<td>' .$row['vid'].'</td>';
  echo '<td>' .$row['vname'].'</td>';
  echo '<td>' .$row['vmobile'].'</td>';
  echo '<td>' .$row['gstno'].'</td>';
  echo '<td>' .$row['company'].'</td>';
  echo '<td>' .$row['emailid'].'</td>';
  echo '<td>' .$row['address'].'</td>';
 // echo '<td>' .$row['cname'].'</td>';*/
 // echo '<td>' .$row['cid'].'</td>';
 //  echo '<td>' .$row['cmobile'].'</td>';
 //  echo '<td>' .$row['emailid'].'</td>';
   // echo '<td>' .$row['total'].'</td>';
  echo '</tr>';

}
}


            $dbhost='localhost';
$dbname='e_Health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");

          if(isset($_POST['add'])){
                  $aid=$_POST['aid'];
             $sql ="SELECT * from appointment where aid = '$aid'";
    $result = mysqli_query($conn,$sql);

   $queryresult = mysqli_num_rows($result);
    if($queryresult > 0){
 while($row = mysqli_fetch_assoc($result)){
    
  
     $demail=$row['demail'];
    $emailid=$row['emailid'];
    
     $date=$row['date'];
    $time=$row['time'];
    
           
/*  $phone=$_POST['phone'];
$query = "SELECT * from doctor_profile where phone = '$phone'";
$result = mysqli_query($conn,$query);
//$row = mysqli_fetch_array($result);
$queryresult = mysqli_num_rows($result);
*/
// $row = mysqli_fetch_array($result);

/*$demail=$row['emailid'];*/
        //$opass=$_REQUEST['opass'];\


      $bp=$_POST['bp'];   
     $suger=$_POST['suger'];
    $temprature=$_POST['temprature'];
   /* $_SESSION['aid']=$aid; */  
      $prescription=$_POST['prescription'];
      $aid=$_POST['aid'];
      /*echo "<script> alert('$aid1')</script>";*/
       /*$date=$_POST['date'];   
      $time=$_POST['time'];
       $phone=$_POST['phone'];   
     
        $id = $_SESSION['id'];
      $msg=$_POST['msg'];
      $status=$_POST['status'];*/
            $sql=mysqli_query($conn,"INSERT INTO prescription(aid,bp,sugar,temprature,prescription,demail,emailid,date,time) VALUES ('$aid','$bp','$suger','$temprature','$prescription','$demail','$emailid','$date','$time')");
         
                 if ( $sql)
                   {

                      echo "";
                       
                      echo "'<script> alert('Prescription Added'); window.location.href='Doctor_dashboard.php'; </script>'";
                         
                              } 
         
                   else 
           
                     {
                          echo "Error: " . $sql . "
                          " . mysqli_error($conn);
                        }

}
}
                    
}
  // $sr = $row['oid'];
 // $pname = $row['pname'];
 // echo ($row['pname']);
  // $saleprice = $row['saleprice'];
  // $quantity = $row['quantity'];
  // $total = $row['total'];
   
 

 ?> 




                                   <!--  <tr>
                                        <td>APT0001</td>
                                        <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> Denise Stevens</td>
                                        <td>35</td>
                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>
                                        <td>10:00am - 11:00am</td>
                                        <td><span class="custom-badge status-red">Inactive</span></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>APT0002</td>
                                        <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> Denise Stevens</td>
                                        <td>35</td>
                                        <td>Henry Daniels</td>
                                        <td>Cardiology</td>
                                        <td>30 Dec 2018</td>
                                        <td>10:00am - 11:00am</td>
                                        <td><span class="custom-badge status-green">Active</span></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        

            </div>
        <!-- <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>98</h3>
                                <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>1072</h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>72</h3>
                                <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>618</h3>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Patient Total</h4>
                                    <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
                                </div>  
                                <canvas id="linegraph"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Patients In</h4>
                                    <div class="float-right">
                                        <ul class="chat-user-total">
                                            <li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
                                            <li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
                                        </ul>
                                    </div>
                                </div>  
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="d-none">
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Doctor Name</th>
                                                <th>Timing</th>
                                                <th class="text-right">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">B</a>
                                                    <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0">Appointment With</h5>
                                                    <p>Dr. Cristina Groves</p>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">Timing</h5>
                                                    <p>7.00 PM</p>
                                                </td>
                                                <td class="text-right">
                                                    <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">B</a>
                                                    <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0">Appointment With</h5>
                                                    <p>Dr. Cristina Groves</p>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">Timing</h5>
                                                    <p>7.00 PM</p>
                                                </td>
                                                <td class="text-right">
                                                    <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">B</a>
                                                    <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0">Appointment With</h5>
                                                    <p>Dr. Cristina Groves</p>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">Timing</h5>
                                                    <p>7.00 PM</p>
                                                </td>
                                                <td class="text-right">
                                                    <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">B</a>
                                                    <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0">Appointment With</h5>
                                                    <p>Dr. Cristina Groves</p>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">Timing</h5>
                                                    <p>7.00 PM</p>
                                                </td>
                                                <td class="text-right">
                                                    <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">B</a>
                                                    <h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0">Appointment With</h5>
                                                    <p>Dr. Cristina Groves</p>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">Timing</h5>
                                                    <p>7.00 PM</p>
                                                </td>
                                                <td class="text-right">
                                                    <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Doctors</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">John Doe</span>
                                                <span class="contact-date">MBBS, MD</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Miles</span>
                                                <span class="contact-date">MD</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">John Doe</span>
                                                <span class="contact-date">BMBS</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Miles</span>
                                                <span class="contact-date">MS, MD</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">John Doe</span>
                                                <span class="contact-date">MBBS</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Miles</span>
                                                <span class="contact-date">MBBS, MD</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.html" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table mb-0 new-patient-table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>John Doe</h2>
                                                </td>
                                                <td>Johndoe21@gmail.com</td>
                                                <td>+1-202-555-0125</td>
                                                <td><button class="btn btn-primary btn-primary-one float-right">Fever</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>Richard</h2>
                                                </td>
                                                <td>Richard123@yahoo.com</td>
                                                <td>202-555-0127</td>
                                                <td><button class="btn btn-primary btn-primary-two float-right">Cancer</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>Villiam</h2>
                                                </td>
                                                <td>Richard123@yahoo.com</td>
                                                <td>+1-202-555-0106</td>
                                                <td><button class="btn btn-primary btn-primary-three float-right">Eye</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>Martin</h2>
                                                </td>
                                                <td>Richard123@yahoo.com</td>
                                                <td>776-2323 89562015</td>
                                                <td><button class="btn btn-primary btn-primary-four float-right">Fever</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="hospital-barchart">
                            <h4 class="card-title d-inline-block">Hospital Management</h4>
                        </div>
                        <div class="bar-chart">
                            <div class="legend">
                                <div class="item">
                                    <h4>Level1</h4>
                                </div>
                                
                                <div class="item">
                                    <h4>Level2</h4>
                                </div>
                                <div class="item text-right">
                                    <h4>Level3</h4>
                                </div>
                                <div class="item text-right">
                                    <h4>Level4</h4>
                                </div>
                            </div>
                            <div class="chart clearfix">
                                <div class="item">
                                    <div class="bar">
                                        <span class="percent">16%</span>
                                        <div class="item-progress" data-percent="16">
                                            <span class="title">OPD Patient</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="bar">
                                        <span class="percent">71%</span>
                                        <div class="item-progress" data-percent="71">
                                            <span class="title">New Patient</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="bar">
                                        <span class="percent">82%</span>
                                        <div class="item-progress" data-percent="82">
                                            <span class="title">Laboratory Test</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="bar">
                                        <span class="percent">67%</span>
                                        <div class="item-progress" data-percent="67">
                                            <span class="title">Treatment</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="bar">
                                        <span class="percent">30%</span>                                    
                                        <div class="item-progress" data-percent="30">
                                            <span class="title">Discharge</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <div class="notification-box">
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
            </div>-->
             <form action="" method="post">  
                <div class="container">
   
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Prescription</h4>
        </div>
        <div class="d-flex flex-column text-center">
        
                <div class="form-group">
              <input type="hidden" class="form-control" id="aid" name="aid" placeholder="">
            </div>
                <div class="form-group">
              <input type="text" class="form-control" id="bp" name="bp" placeholder="Blood Pressure">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="suger" name="suger" placeholder="Enter Suger">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="temprature" name="temprature" placeholder="Enter Temprature">
            </div>
            <div class="form-group">
                <label>Add Prescription</label>
              <textarea type="text" class="form-control" name="prescription" id="prescription" placeholder=""></textarea>
            </div>
            <input  type="submit" name="add" class="btn btn-info btn-block btn-round" value="ADD">


          <!-- <div class="text-center text-muted delimiter">or use a social network</div>
          <div class="d-flex justify-content-center social-buttons">
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
              <i class="fab fa-twitter"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fab fa-facebook"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
              <i class="fab fa-linkedin"></i>
            </button>
          </div>
 -->        </div>
      </div>
    </div>
      <!-- <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
      </div> -->
  </div>
</div>
            <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img src="assets/img/sent.png" alt="" width="50" height="46">
                            <h3>Are you sure want to delete this Appointment?</h3>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            </form>
        </div>
    </div> 
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>



</body>

<script type="text/javascript">

   document.getElementById("user").innerHTML="<?php echo @$_SESSION['id']?>";


$(document).ready(function(){ $("#myTable").on('click', '.btnSelect', function() { // get the current row 
var currentRow = $(this).closest("tr"); var col1 = currentRow.find(".aid").html(); // get current row 1st table cell TD value 
var data = col1 ; 
alert(data); 

var a=data;
 //$("#temprature").html(data); 
//$("input:text").val(data);
document.getElementById("aid").value=a;
});
});
      </script>
<!-- index22:59-->
</html>