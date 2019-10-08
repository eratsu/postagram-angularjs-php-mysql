<?php
header("Access-Control-Allow-Origin: *");
include 'config.php';

$datas = $database->select("users", "*" , ["ORDER" => ["id" => "DESC"]]);


header('Content-Type: application/json');
	echo '{ "records":' . json_encode($datas) . '}';


?>