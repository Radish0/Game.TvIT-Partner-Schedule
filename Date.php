<?php
function errore($response_code, $message)
{
    http_response_code($response_code);
    header("Content-type: application/json; charset: UTF-8");
    echo ("{'error':$response_code, 'description':'$message'}");
    die;
}
	session_start();
try {

    $hostname = "localhost";
    $dbname = "my_radicig";
    $user = "root";
    $pass = "";
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    errore(500, "SERVER ERROR. PDO connection failed: " . $e->getMessage());
}
$Stringa="SELECT gioco.Gioco FROM gioco, community, gestore WHERE community.Nome='".$_SESSION["Community"]."' And gioco.ID = community.Gioco";
$sql = $db->prepare($Stringa);
try {
    $sql->execute();
    $result=array();
	while ($data = $sql->fetch(PDO::FETCH_ASSOC)){
	array_push($result, $data["Gioco"]);
    }
    
    http_response_code(200);
    header("Content-type: application/json; charset: UTF-8");
    echo json_encode($result);
    
} catch (PDOException $e) {
    errore(500, $e->getMessage());
}
?>

