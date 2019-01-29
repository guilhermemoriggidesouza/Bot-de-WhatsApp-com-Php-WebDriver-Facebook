<?php
//session_start();
require_once "Lista.php";

$file = $_FILES['arquivo'];
$sessao = $_SESSION["campanha"];

$obLista = new Lista("arquivos/excel/");
$obLista->adicionarNaPasta($file, $sessao);
header("Location: construirCampanha.php");

?>