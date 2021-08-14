



<?php
header('Content-Type: application/json');
$conn = mysqli_connect("localhost","root","","e_health");


//$sqlQuery = "SELECT DISTINCT dname FROM (SELECT total FROM feedback)";
 
//$result = mysqli_query($conn,$sqlQuery);

$sql ="SELECT DISTINCT date from appointment";
    $result1 = mysqli_query($conn,$sql);

   $queryresult = mysqli_num_rows($result1);
    if($queryresult > 0){
 while($row1 = mysqli_fetch_assoc($result1)){
    

    $date= $row1['date'];
           
    
$sqlQuery = "SELECT date,count(aid) AS 'Rounded' 
FROM appointment where date='$date'";
//echo $dname;

$result = mysqli_query($conn,$sqlQuery);
//echo $result;
$queryresult = mysqli_num_rows($result);
    if($queryresult > 0){
    	
    }
 //while($row1 = mysqli_fetch_assoc($result1)){

$data[] = array();
 while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
	//print_r(array_filter($data));

}

}

}

mysqli_close($conn);

echo json_encode(array_filter($data));
?>