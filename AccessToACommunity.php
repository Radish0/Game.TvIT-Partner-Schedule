<?php
function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}

if (!isset($_REQUEST["Nome"]) || strlen($_REQUEST["Nome"])==0) errore(400,"Parametri errati. Name expected");

if (!isset($_REQUEST["Cognome"]) || strlen($_REQUEST["Cognome"])==0) errore(400,"Parametri errati. Surname expected");

if (!isset($_REQUEST["Mail"]) || strlen($_REQUEST["Mail"])==0) errore(400,"Parametri errati. Mail expected");

if (!isset($_REQUEST["Password"]) || strlen($_REQUEST["Password"])==0) errore(400,"Parametri errati. Password expected");

if (!isset($_REQUEST["Nickname"]) || strlen($_REQUEST["Nickname"])==0) errore(400,"Parametri errati. Nickname expected");

if (!isset($_REQUEST["Link"]) || strlen($_REQUEST["Link"])==0) errore(400,"Parametri errati. Link expected");

if (!isset($_REQUEST["Community"]) || strlen($_REQUEST["Community"])==0) errore(400,"Parametri errati. Community expected");

try {

	$hostname = " ";
    $dbname = " ";
    $user = " ";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
$sql = $db->prepare("INSERT INTO gestore (Nome, Cognome, Mail, Password, Nickname, Link, Community, Tipo) VALUES (?,?,?,?,?,?,?,?)");
try
{ 
 $sql->execute([$_REQUEST["Nome"], $_REQUEST["Cognome"], $_REQUEST["Mail"], password_hash($_REQUEST["Password"], PASSWORD_BCRYPT), $_REQUEST["Nickname"], $_REQUEST["Link"], $_REQUEST["Community"],"Gestore"]);
 http_response_code(200);
  header("Content-type: application/json; charset: UTF-8");
  }
catch(PDOException $e)
{
  errore(500,$e->getMessage());
}

exit;
?>
