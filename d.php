<?php
$dbhost='localhost';
$dbname='e_health';
$dbusername='root';
$dbpass='';

$conn = mysqli_connect("$dbhost", "$dbusername", "$dbpass", "$dbname");
         
if(isset($_POST['save'])){
    
                            $phone=$_POST['phone'];
 							$fname= $_POST['fname']; 
  							$lname= $_POST['lname'];
   							$emailid= $_POST['email']; 	
   							$sql=mysqli_query($conn,"INSERT INTO demo(fname,lname,email) VALUES ('$fname','$lname','$emailid')");
				 
				 
				 if ($sql) 
					{
						//echo "New record successfully Inserted!";
						$msg = "";
						echo "<script>alert('Record inserted successfully');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="d.php" method="post">
<input type="text" name="fname">
<input type="text" name="lname">
<input type="text" name="email">
<input type="text" name="phone">
<input type="submit" name="save" value="ok">
</form>
</body>
</html>