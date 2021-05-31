<?php

function errore($response_code,$message){
	http_response_code($response_code);
	header("Content-type: application/json; charset: UTF-8");
	echo("{'error':$response_code, 'description':'$message'}");
	die;
}
try {
	$hostname = "localhost";
    $dbname = "my_radicig";
    $user = "root";
    $pass = "";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
  errore(500,"SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if($_REQUEST["Type"]=="0"){
  $sql = "SELECT R.Nome, G.Gioco, R.NomeGilda, R.Link, R.Mail,R.Stato FROM community as R, gioco as G WHERE Stato = 'Pending' Group by R.Nome";

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
} else if($_REQUEST["Type"]=="1"){
  $sql = "SELECT R.Nome, G.Gioco, R.NomeGilda, R.Link, R.Mail, R.Stato FROM community as R, gioco as G WHERE Stato = 'Approved' or Stato = 'Rejected' Group by R.Nome";

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
  }else{
  http_response_code(401);
  }

	


?>
