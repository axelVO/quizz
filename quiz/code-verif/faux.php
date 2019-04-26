<?php
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
$n = $_GET["n"] + 1;
$theme = "nature";


if ($n == 6) {
    header("location:../quiz/score.php");
}
else {
    header("location:quiz-".$theme.".php?n=".$n."&theme=".$theme);
}