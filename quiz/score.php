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
$TIME = $_SESSION["time1"] + $_SESSION["time2"] + $_SESSION["time3"] + $_SESSION["time4"] + $_SESSION["time1"];


$req = $bdd->prepare('SELECT question FROM quizz WHERE theme = ? AND nquestion = ? ');
$req->execute(array($_GET['theme'] , 1));
$donneesq1 = $req->fetch();

$req = $bdd->prepare('SELECT question FROM quizz WHERE theme = ? AND nquestion = ? ');
$req->execute(array($_GET['theme'] , 2));
$donneesq2 = $req->fetch();

$req = $bdd->prepare('SELECT question FROM quizz WHERE theme = ? AND nquestion = ? ');
$req->execute(array($_GET['theme'] , 3));
$donneesq3 = $req->fetch();

$req = $bdd->prepare('SELECT question FROM quizz WHERE theme = ? AND nquestion = ? ');
$req->execute(array($_GET['theme'] , 4));
$donneesq4 = $req->fetch();

$req = $bdd->prepare('SELECT question FROM quizz WHERE theme = ? AND nquestion = ? ');
$req->execute(array($_GET['theme'] , 5));
$donneesq5 = $req->fetch();


$reqre = $bdd->prepare('SELECT * FROM quizz WHERE theme = ? AND nquestion = ? ');
$reqre->execute(array($_GET['theme'],1));

$reponse = $reqre->fetch();

$reqrett = $bdd->prepare('INSERT INTO pointt (namej , pointj ,temps , theme) VALUES(  ? , ? , ? , ? )');

$point = 0;
if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
}
else {
    $name = "inconnue";
}

if ($_SESSION["v1"] == 1) {
    $point += 1;
}
if ($_SESSION["v2"] == 1) {
    $point += 1;
}
if ($_SESSION["v3"] == 1) {
    $point += 1;
}
if ($_SESSION["v4"] == 1) {
    $point += 1;
}
if ($_SESSION["v5"] == 1) {
    $point += 1;

}

$reqrett->execute(array($name , $point , $TIME , $_GET["theme"]));

$arrayrepo = array($reponse["reponse1"] , $reponse["reponse2"] , $reponse["vreponse"] , $reponse["reponse4"]);



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="score-quizz.css">
    
<link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
<style>



</style>
</head>
<body>

<a href="../theme-quiz/theme.php"><input type="button" value="Liste Thème" class="bouton2" ></a>
<a href="../index.php"><input type="button" value="Accueil" class="bouton1" ></a>

<?php   
$TIME = $_SESSION["time1"] + $_SESSION["time2"] + $_SESSION["time3"] + $_SESSION["time4"] + $_SESSION["time1"];

echo "<h2 class='bonnerep'>".$_SESSION["v"]."/5</h2>";
echo "<br>";
echo "<p> en ". $TIME ." seconde</p>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
?>
<?php
if ($_SESSION["time1"] >= 10) {
    $_SESSION["time1"] = 10;
}
if ($_SESSION["time2"] >= 10) {
    $_SESSION["time2"] = 10;
}
if ($_SESSION["time3"] >= 10) {
    $_SESSION["time3"] = 10;
}
if ($_SESSION["time4"] >= 10) {
    $_SESSION["time4"] = 10;
}
if ($_SESSION["time5"] >= 10) {
    $_SESSION["time5"] = 10;
}
?>
<div class="question1 ">1
    <br>
    <?php echo $_SESSION["time1"] ."'s"?>
</div>
<div class="question2 ">2
    <br>
    <?php echo $_SESSION["time2"] ."'s"?>
</div>
<div class="question3 ">3
    <br>
    <?php echo $_SESSION["time3"] ."'s"?>
</div>
<div class="question4 ">4
    <br>
    <?php echo $_SESSION["time4"] ."'s"?>
</div>
<div class="question5">5
    <br>
    <?php echo $_SESSION["time5"] ."'s"?>
</div>



<script>
    let quest1 = document.querySelector('.question1')
    let quest2 = document.querySelector('.question2')
    let quest3 = document.querySelector('.question3')
    let quest4 = document.querySelector('.question4')
    let quest5 = document.querySelector('.question5')
<?php
if ($_SESSION["v1"] == 1) {
 
    echo "quest1.classList.add('vrai');";
    echo "quest1.classList.add('time-".$_SESSION["time1"]."');";
   
    
}
else {
    
    echo "quest1.classList.add('faux');";
    echo "quest1.classList.add('time-".$_SESSION["time1"]."');";
    
}
if ($_SESSION["v2"] == 1) {
 
    echo "quest2.classList.add('vrai');";
    echo "quest2.classList.add('time-".$_SESSION["time2"]."');";
    
}
else {
    
    echo "quest2.classList.add('faux');";
    echo "quest2.classList.add('time-".$_SESSION["time2"]."');";
    
}if ($_SESSION["v3"] == 1) {
 
    echo "quest3.classList.add('vrai');";
    echo "quest3.classList.add('time-".$_SESSION["time3"]."');";
    
}
else {
    
    echo "quest3.classList.add('faux');";
    echo "quest3.classList.add('time-".$_SESSION["time3"]."');";
    
}if ($_SESSION["v4"] == 1) {
 
    echo "quest4.classList.add('vrai');";
    echo "quest4.classList.add('time-".$_SESSION["time4"]."');";
    
}
else {
    
    echo "quest4.classList.add('faux');";
    echo "quest4.classList.add('time-".$_SESSION["time4"]."');";
    
}
if ($_SESSION["v5"] == 1) {
 
    echo "quest5.classList.add('vrai');";
    echo "quest5.classList.add('time-".$_SESSION["time5"]."');";
    
}
else {
    
    echo "quest5.classList.add('faux');";
    echo "quest5.classList.add('time-".$_SESSION["time5"]."');";
    
}

?></script>
</body>
</html>



<!-- // try
// {
// 	$bdd = new PDO('mysql:host=127.0.0.1;dbname=quiz;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// }
// catch (Exception $e)
// {
//     die('Erreur : ' . $e->getMessage());
// }
// $reponse = $bdd->query('SELECT * FROM quizz');
// $donnees = $reponse->fetch();

// echo $_SESSION["point"]; -->
