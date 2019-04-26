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


$req = $bdd->prepare('SELECT question FROM quizz WHERE theme = ? AND nquestion = ? ');
$req->execute(array($_GET['theme'],$_SESSION["n"]));

$donnees = $req->fetch();

$reqre = $bdd->prepare('SELECT * FROM quizz WHERE theme = ? AND nquestion = ? ');
$reqre->execute(array($_GET['theme'],$_SESSION["n"]));

$reponse = $reqre->fetch();

$num = $_GET["n"];
$theme = $_GET["theme"];

$juste = "faux";
$_SESSION["theme"] = $theme;


$arrayrepo = array($reponse["reponse1"] , $reponse["reponse2"] , $reponse["vreponse"] , $reponse["reponse4"]);



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="main-quizz.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>quiz:<?php echo $_GET["theme"]; ?></title>
  
</head>

<body>
    <center><h1><?php echo $_GET["theme"]; ?></h1></center>
    
    <div class="card">
        <p class="numero">Question n.<?php echo $_GET["n"] ; ?> /5</p>
        <h3 class="question"><?php echo $donnees["question"]; ?></h3>
   
 </div>
 <div class="div-expl">
 <h4 id="explication" class="hidden expli"><?php   echo $reponse["explication"]    ?></h4>
</div>
 <div class="timer">
    <div class="circle-timer">
        <div class="timer-slot">
            <div class="timer-lt"> </div>
        </div>
        <div class="timer-slot">
            <div class="timer-rt"></div>
        </div>
        <div class="count"></div>
    </div>

<form action="code-verif/vrai.php" methode="post">
<input type="hidden" id="time" name="time<?php echo $_GET["n"] ?>" value="">
<input type ="hidden" id="okt" name="v" value="">
<input type ="hidden" id="okst" name="v<?php echo $_GET["n"] ?>" value="">
<input type="submit" id="oks"  value="suivant"  class="bouton3 hidden">

 </form> 
 
</div>
<?php 
$repon1 = $reponse["reponse1"] ;
$repon2 = $reponse["reponse2"] ;
$repon3 = $reponse["reponse4"] ;
$reponv = $reponse["vreponse"] ;

$question = $donnees["question"];
$array = array("ok" => $reponv,
                "bad1" => $repon1,
                "bad2" => $repon2,
                "bad3" => $repon3
              );
$i = 0;
$m = 1;
$r = 1;
while (count($array) > 0) {
    $elem = array_rand($array);
    $answer = $array[$elem];

    if ($elem === "ok") {
        
       echo '<input name="vrai" value="1" type="hidden"></input><button type="submit" id="ok" class="reponse'.$m.' reponse btn-lg" onclick="repv()">'. $answer .'</button>';
      
    } else {
        
        echo ' <button type="submit" id="repo' . $r . '" class="reponse'.$m.' reponse btn-lg" onclick="rep'.$r.'()" >'.$answer.'</button>';
      
        
        $i++;
        if ($r == 3) {
            $r = 3;
        }
   
        else {
            $r++;
            
        }
  
    
    }
 

$m++; 
    
    unset($array[$elem]);
    
}

?>
</body>








<script>
    let expl = document.querySelector("#explication");
    let repo1 = document.querySelector("#repo1");
let repo2 = document.querySelector("#repo2");
let repov = document.querySelector("#ok");
let repo3 = document.querySelector("#repo3");
let okt = document.querySelector("#okt");
let okst = document.querySelector("#okst");
let ok = document.querySelector("#oks");
let inp = false;
let timet = document.querySelector("#time")
var initialCount 	= 9,
 	  count 			  = initialCount,
 	  timerPause		= false;

function timer() {	    	
	if (!inp) {
	  	count = count - 1;
	  	if (count <= -1) {
	
    repo1.classList.add("faux");
    repo2.classList.add("faux");
    repov.classList.add("vrai");
    repo3.classList.add("faux");
    timet.value= count;
    okt.value= 0;
    okst.value= 0;
    ok.classList.remove("hidden");
    expl.classList.remove("hidden");
    repov.classList.removeAttribute("onclick");
    
	  	} 
	  	$(".timer .count").text(count);
      }
    
}

setInterval(timer, 1000);



function rep1 () {
    repo1.classList.add("faux-no-hidden");
    repo2.classList.add("faux");
    repov.classList.add("vrai");
    repo3.classList.add("faux");
    timet.value= count;
    okt.value= 0;
    okst.value= 0;
    inp = true;
    ok.classList.remove("hidden");
    repov.classList.removeAttribute("onclick");
}
function rep2 () {
    repo1.classList.add("faux");
    repo2.classList.add("faux-no-hidden");
    repov.classList.add("vrai");
    repo3.classList.add("faux");
    timet.value= count;
    okt.value= 0;
    okst.value= 0;
    inp = true;
    ok.classList.remove("hidden");
   repov.classList.removeAttribute("onclick");
}


function repv () {
    repo1.classList.add("faux");
    repo2.classList.add("faux");
    repov.classList.add("vrai");
    repo3.classList.add("faux");
    timet.value= count;
    okt.value= 1;
    okst.value= 1;
    inp = true;
    ok.classList.remove("hidden");
    repov.classList.removeAttribute("onclick");
    
}

function rep3 () {
    repo1.classList.add("faux");
    repo2.classList.add("faux");
    repov.classList.add("vrai");
    repo3.classList.add("faux-no-hidden");
    timet.value= count;
     okt.value= 0;
     okst.value= 0;
     inp = true;
    ok.classList.remove("hidden");
     repov.classList.removeAttribute("onclick");
   
}


</script> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>

