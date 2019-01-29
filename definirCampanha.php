<?php
session_start();

$campanhaSession = (isset($_POST["nomeCampanha"])) ? $_POST["nomeCampanha"] : "";

if($campanhaSession == ""){
    header("Location: index.php?dados='sua campanha não foi definida'");
}else{
    $_SESSION["campanha"] = $campanhaSession;
    header("Location: campanha.php");
}
?>