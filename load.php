<?php

$conn = mysqli_connect("localhost","root","","e_health") or die("Connection failed");



                  
          
	
	

if($_POST['type1'] == "doctor"){

		//$a=$_POST['name'];
		
			$sql = "SELECT * FROM doctor_profile WHERE name ='".$_POST['name1']."'";

		//$sql = "SELECT * FROM doctor_profile WHERE id = {$_POST['id']}";

		$query1 = mysqli_query($conn,$sql) or die("Query Unsuccessful.");
		$queryresult = mysqli_num_rows($query1);

		$str1 = "";
		$str2 = "";
		if($queryresult > 0){
			
			while($row = mysqli_fetch_assoc($query1)){
				


				?>
				<!-- <input class="form-control " id="fee" value="<?php echo @$row['fee'];?>" name="fee" type="text" readonly> -->
				<?php
			
			$emailid=$row['emailid'];
			$fee=$row['fee'];
	
				//echo "'<script> alert('".$emailid."')</script>'";

		  $str1 .= "<input type='hidden' name='emailid' value='{$emailid}'>";
		   $str2 .= "<input type='text' name='fee' value='{$fee}' readonly>";


		  // $str .= "<input type='text' value='{$fee}'>";
		   //echo "{$row['fee']}";
		  
		    
		 
		}
	}

}

	
	echo $str1;
	echo $str2;
	

 ?>
