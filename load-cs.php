<?php

$conn = mysqli_connect("localhost","root","","e_health") or die("Connection failed");



                  
          
	
	if($_POST['type'] == ""){
				
		$sql = "SELECT DISTINCT specialization FROM doctor_profile"  ;

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		$str .= "<option value=''>Select</option>";
		while($row = mysqli_fetch_assoc($query)){

			
		  $str .= "<option value='{$row['specialization']}'>{$row['specialization']}</option>";
		}
	}else if($_POST['type'] == "stateData"){
		//echo "'<script> alert('yes')</script>'";
		/*$a=$_POST['name'];
		echo '<script>alert("'.$a.'")</script>';*/
			$sql = "SELECT * FROM doctor_profile WHERE specialization ='".$_POST['name']."'";

		//$sql = "SELECT * FROM doctor_profile WHERE id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		$str .= "<option value=''>Select</option>";
			while($row = mysqli_fetch_assoc($query)){

				?>
				<!-- <input class="form-control " id="fee" value="<?php echo @$row['fee'];?>" name="fee" type="text" readonly> -->
				<?php
			$dname=$row['dname'];
			$fee=$row['fee'];
			$dlname=$row['dlname'];
			$a=" ";
			$name=$dname.$a.$dlname;
				//echo "'<script> alert('yes')</script>'";

		  $str .= "<option value='{$name}'>{$name}</option>";

		  // $str .= "<input type='text' value='{$fee}'>";
		   //echo "{$row['fee']}";
		  
		    	
		 
		}
	}



	echo $str;
	
	

 ?>
