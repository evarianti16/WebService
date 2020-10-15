<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try{
	$conn = new PDO("mysql:host=$servername;dbname=$database",
							$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,
						PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Connection failed : ".$e->getMessage();
}
$sql = "SELECT * FROM customers";
$data = $conn->prepare($sql);
$data->execute();
$customers = [];
while($row = $data->fetch(PDO::FETCH_OBJ)){
	$customers[] = ["CustomerID=>$row->CustomerID",
					"CompanyName=>$row->CompanyName",
					"ContactName=>$row->ContactName",
					"ContactTitle=>$row->ContactTitle",
					"Address=>$row->Address",
					"City=>$row->City"];
}

	$hehe = [
		"took" => 123,
		"code" => 200,
		"message" => "Response Successfully",
		"data" => $customers
];
	

$abc=json_encode($hehe);
echo($abc);

?>