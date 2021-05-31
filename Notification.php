<?php

function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}

if (!isset($_REQUEST["Mail"]) || strlen($_REQUEST["Mail"])==0) errore(400,"Parametri errati. Mail expected");

if (!isset($_REQUEST["Stato"]) || strlen($_REQUEST["Stato"])==0) errore(400,"Parametri errati. state expected");

try {
	$hostname = "localhost";
    $dbname = "my_radicig";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
echo $_REQUEST["State"];
echo $_REQUEST["Mail"];
$sql = $db->prepare("UPDATE community SET Stato = ? WHERE Mail = ?");
try
{ 
  $sql->execute([$_REQUEST["Stato"], $_REQUEST["Mail"]]);
  
  http_response_code(200);
  header("Content-type: application/json; charset: UTF-8");
  exit;}
catch(PDOException $e)
{
  errore(404,"database not exists");
}


?>
