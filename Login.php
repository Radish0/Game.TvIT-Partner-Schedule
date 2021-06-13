<?php
session_start();

function errore($response_code, $message)
{
    http_response_code($response_code);
    header("Content-type: application/json; charset: UTF-8");
    echo ('{"Status":"'.$response_code.'", "description":"'.$message.'"}');
    die;
}

if (!isset($_REQUEST["Mail"]) || strlen($_REQUEST["Mail"]) == 0) errore(400, "Parametri errati. Mail expected");

if (!isset($_REQUEST["Password"]) || strlen($_REQUEST["Password"]) == 0) errore(400, "Parametri errati. Password expected");

try {
    $hostname = " ";
    $dbname = " ";
    $user = " ";
    $pass = "";
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    errore(500, "SERVER ERROR. PDO connection failed: " . $e->getMessage());
}

$sql = $db->prepare("SELECT Password,Tipo,Community FROM gestore WHERE Mail=?");
try {
    $sql->execute([$_REQUEST["Mail"]]);
    $result = array();
    while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
        array_push($result, $data);
    }
    if (count($result) == 0) {
        errore(400, "Not registered");
    } else {
        if (password_verify($_REQUEST["Password"], $result[0]["Password"])) {            
            $_SESSION["Mail"] = $_REQUEST["Mail"];
            $_SESSION["Password"] = $_REQUEST["Password"];
            $_SESSION["Tipo"] = $result[0]["Tipo"];
            $_SESSION["Community"] = $result[0]["Community"];
            errore(200, $result[0]["Tipo"]);
        } else {
            errore(401, "Bad Password");
        }
    }
} catch (PDOException $e) {
    errore(500, $e->getMessage());
}

