<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=quiz;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$theme = $_SESSION["theme"];


$n = $_SESSION["n"] +1;

$_SESSION["time".$_SESSION["n"]] -= $_GET["time".$_SESSION["n"]];

$_SESSION["v".$_SESSION["n"]] = $_GET["v".$_SESSION["n"]];

$_SESSION["n"] = $n;

$_SESSION["v"] += $_GET["v"];



if ($n == 6) {
    header("location:../score.php?theme=".$theme);
}
else {
    header("location:../quiz-".$theme.".php?n=".$n."&theme=".$theme);
}