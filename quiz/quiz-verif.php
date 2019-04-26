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

$reponse = $bdd->query('SELECT * FROM quizz');
$donnees = $reponse->fetch();
$_SESSION["n"] = 1;
$theme = $_GET["theme"];



header("location:quiz-".$theme.".php?n=1&theme=".$theme);
