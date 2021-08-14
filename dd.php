<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","e_Health");


$sqlQuery = "SELECT * FROM appointment ORDER BY aid";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
