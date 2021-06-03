<?php
function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}

if (!isset($_REQUEST["Name"]) || strlen($_REQUEST["Name"])==0) errore(400,"Parametri errati. Name expected");

if (!isset($_REQUEST["Game"]) || strlen($_REQUEST["Game"])==0) errore(400,"Parametri errati. Game expected");

if (!isset($_REQUEST["GuildName"]) || strlen($_REQUEST["GuildName"])==0) errore(400,"Parametri errati. GuildName expected");

if (!isset($_REQUEST["Link"]) || strlen($_REQUEST["Link"])==0) errore(400,"Parametri errati. Link expected");

if (!isset($_REQUEST["Mail"]) || strlen($_REQUEST["Mail"])==0) errore(400,"Parametri errati. Mail expected");

if (!isset($_REQUEST["Description"]) || strlen($_REQUEST["Description"])==0) errore(400,"Parametri errati. Description expected");

try {

	$hostname = "localhost";
    $dbname = "my_radicig";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
$sql = $db->prepare("INSERT INTO community (Nome, Gioco, NomeGilda, Link, Mail, Descrizione,Stato) VALUES (?,?,?,?,?,?,?)");
try
{ 
  $sql->execute([$_REQUEST["Name"], $_REQUEST["Game"], $_REQUEST["GuildName"], $_REQUEST["Link"], $_REQUEST["Mail"], $_REQUEST["Description"],"Pending"]);
  http_response_code(200);
  header("Content-type: application/json; charset: UTF-8");
  }
catch(PDOException $e)
{
  errore(404,"database not exists");
}

exit;
?>
