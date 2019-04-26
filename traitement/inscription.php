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

  $name = $_POST['name'];
  $password = $_POST['password'];
 
  $req = $bdd->prepare("INSERT INTO joueur(name, password) VALUES(?, ?)");

  $reponse = $bdd->query('SELECT * FROM joueur');

  $donnees = $reponse->fetch();

  if ($_POST["name"] == $donnees["name"]) {
    header("location: ../index.php?erreur=200");
  }
  else{
  $req->execute(array($name, 
                      $password));
                      header("Location: ../index.php");
  }