<?php

function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}

if ($_SERVER['REQUEST_METHOD']!=="GET") errore(405,"Method not allowed. Only method GET");

try {
	$hostname = " ";
    $dbname = " ";
    $user = " ";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT Nome FROM community" ;
  try
  { 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result=array();
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
	$result[]=$data;
    }
    
    http_response_code(200);
    header("Content-type: application/json; charset: UTF-8");
    echo json_encode($result);
    exit;
    
  }catch(PDOException $e)
  {
    errore(500,$e->getMessage());
  }
?>
