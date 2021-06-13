<?php
function errore($response_code, $message)
{
    http_response_code($response_code);
    header("Content-type: application/json; charset: UTF-8");
    echo ("{'error':$response_code, 'description':'$message'}");
    die;
}
	session_start();
    if (!isset($_REQUEST["Nickname"]) || strlen($_REQUEST["Nickname"])==0) errore(400,"Parametri errati. Nickname expected");

	if (!isset($_REQUEST["ID"]) || strlen($_REQUEST["ID"])==0) errore(400,"Parametri errati. ID expected");
try {

    $hostname = " ";
    $dbname = " ";
    $user = " ";
    $pass = "";
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    errore(500, "SERVER ERROR. PDO connection failed: " . $e->getMessage());
}

try {
	$sql = $db->prepare("INSERT INTO player (ID, Nickname, NomeInGame, Mail) VALUES (?,?,?,?);");
    $sql->execute([NULL,$_REQUEST["Nickname"],"",""]);    
    $Stringa = "SELECT ID FROM player WHERE Nickname='".$_REQUEST['Nickname']."'";
    $sql1 = $db->prepare($Stringa);
	$sql1->execute();
	while ($data = $sql1->fetch(PDO::FETCH_ASSOC)){
	$ID=$data["ID"];
    }
    
    
    $sql2 = $db->prepare("INSERT INTO vince (ID, ID_Torneo, ID_Player) VALUES (?,?,?);");
    $sql2->execute([NULL,$_REQUEST["ID"],$ID]);    
    http_response_code(200);
    
} catch (PDOException $e) {
    errore(500, $e->getMessage());
}

?>

