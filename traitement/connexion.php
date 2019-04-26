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

$req = $bdd->prepare('SELECT name FROM joueur WHERE password = ? ');
$req->execute(array($_POST["password"]));

$donnees = $req->fetch();

if ($donnees["name"] == $_POST["name"]) {
   $_SESSION["name"] = $_POST["name"];
   header("location:../index.php");

}
else {

   header("location:../index.php?erreur=500"); 
}