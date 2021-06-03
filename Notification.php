<?php

function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}

if (!isset($_REQUEST["Mail"]) || strlen($_REQUEST["Mail"])==0) errore(400,"Parametri errati. Mail expected");

if (!isset($_REQUEST["Stato"]) || strlen($_REQUEST["Stato"])==0) errore(400,"Parametri errati. state expected");

if (!isset($_REQUEST["Name"]) || strlen($_REQUEST["Name"])==0) errore(400,"Parametri errati. Nome expected");

echo("ciao");

try {
	$hostname = "localhost";
    $dbname = "my_radicig";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}

$sql = $db->prepare("UPDATE community SET Stato = ? WHERE Mail = ?");
try
{ 
  $sql->execute([$_REQUEST["Stato"], $_REQUEST["Mail"]]);
  
  http_response_code(200);
  header("Content-type: application/json; charset: UTF-8");
  
if($_REQUEST["Stato"]=="Approved"){
  $to = $_REQUEST["Mail"]; // note the comma

  // Subject
  $subject = 'Game.tv Partner';

  // Message
  $message = '
  <html>
  <head>
    <title>Game.tv accepts your request for a new Partner</title>
  </head>
  <body>
    <p>Congratulation! Click the link below to start.</p>
    <a href=https://radicig.altervista.org/Esame/ReqToAcommunity.php?Nome='.$_REQUEST["Name"].'&Mail='.$_REQUEST["Mail"].'>Click here</a>
  </body>
  </html>
  ';

  // To send HTML mail, the Content-type header must be set
	$headers = 'From: Game.tv <partners@game.tv>' . "\r\n" .'Reply-To: noreplytothis@game.tv' . "\r\n" .'X-Mailer: PHP/' . phpversion() . "\r\n" .'Content-type: text/html';


  // Mail it
  mail($to, $subject, $message,$headers);
} else{
$to = $_REQUEST["Mail"]; // note the comma

  // Subject
  $subject = 'Game.tv Partner';

  // Message
  $message = "
  <html>
  <head>
    <title>Game.tv refuse your request for a new Partner</title>
  </head>
  <body>
  	<p>Your partner have been refused</p>
    <p>We are sorry but your community doesn't reflect our standard</p>
  </body>
  </html>
  ";

  // To send HTML mail, the Content-type header must be set
  $headers = 'From: Game.tv <partners@game.tv>' . "\r\n" .'Reply-To: noreplytothis@game.tv' . "\r\n" .'X-Mailer: PHP/' . phpversion() . "\r\n" .'Content-type: text/html';


  // Mail it
  mail($to, $subject, $message, $headers);

}
  }
catch(PDOException $e)
{
  errore(404,"database not exists");
}


?>
