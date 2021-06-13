<?php
function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}
session_start();
if (!isset($_REQUEST["Data"]) || strlen($_REQUEST["Data"])==0) errore(400,"Parametri errati. Data expected");

if (!isset($_REQUEST["Mod"]) || strlen($_REQUEST["Mod"])==0) errore(400,"Parametri errati. Mod expected");
try {

	$hostname = " ";
    $dbname = " ";
    $user = " ";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
$sql = $db->prepare("INSERT INTO torneo (ID, Realtà, Modalità, Data) VALUES (NULL,?,?,?)");
try
{ 
 $sql->execute([$_SESSION["Community"],$_REQUEST["Mod"],$_REQUEST["Data"]]);
  http_response_code(200);
  header("Content-type: application/json; charset: UTF-8");
  }
catch(PDOException $e)
{
  errore(500,$e->getMessage());
}

exit;
?>
