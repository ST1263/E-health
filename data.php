



<?php
header('Content-Type: application/json');
$conn = mysqli_connect("localhost","root","","e_health");


//$sqlQuery = "SELECT DISTINCT dname FROM (SELECT total FROM feedback)";
 
//$result = mysqli_query($conn,$sqlQuery);

$sql ="SELECT DISTINCT dname from feedback";
    $result1 = mysqli_query($conn,$sql);

   $queryresult = mysqli_num_rows($result1);
    if($queryresult > 0){
 while($row1 = mysqli_fetch_assoc($result1)){
    

    $dname= $row1['dname'];
           
    
$sqlQuery = "SELECT dname, AVG (total), 
ROUND (AVG (total),	3) AS 'Rounded' 
FROM feedback where dname='$dname'";
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