<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

$abc = mysqli_connect("localhost","root","","northwind");
	
$query = "select * from customers";
$hasil  = mysqli_query($abc, $query);

if(mysqli_num_rows($hasil) > 0 ){
	$customers = array();
	while($x = mysqli_fetch_array($hasil)){
		$h['CustomerID'] = $x["CustomerID"];
		$h['CompanyName'] = $x["CompanyName"];
		$h['ContactName'] = $x["ContactName"];
		$h['ContactTitle'] = $x["ContactTitle"];
		$h['Address'] = $x["Address"];
		$h['City'] = $x["City"];
		array_push($customers, $h);		
	}
	
}else {
	$customers["message"]="tidak ada data";
	echo json_encode($customers);
}
	$hehe = [
		"took" => 123,
		"code" => 200,
		"message" => "Response Successfully",
		"data" => $customers];
	
	echo json_encode($hehe);
?>