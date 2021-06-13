<?php
function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}
session_start();
try {

	$hostname = " ";
    $dbname = " ";
    $user = " ";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
try
{ 
    $sql = $db->prepare('SELECT * FROM torneo where Realtà=?');
    $sql ->execute([$_SESSION["Community"]]);
    $result=array();
	while ($data = $sql->fetch(PDO::FETCH_ASSOC)){
	array_push($result, $data);
    }
    
    http_response_code(200);
    header("Content-type: application/json; charset: UTF-8");
    echo json_encode($result);
  }
catch(PDOException $e)
{
  errore(500,$e->getMessage());
}
?>
