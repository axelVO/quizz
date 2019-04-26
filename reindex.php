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
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Quizzont</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="remain.css">
  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="stylish-portfolio.css" rel="stylesheet">

</head>

<body id="page-top">


  <!-- Header -->
  <div class="masthead d-flex">
<?php
if(isset($_GET["erreur"])){
if ($_GET["erreur"] == 500) {
  echo "<p class='erreur'>erreur ".$_GET["erreur"].": ce compte n'existe pas!</p>";
  echo '
  <div btn-modal>
  <button type="button" class="btn-modal btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <img src="https://img.icons8.com/color/50/000000/inscription.png"></button>
  </div>';
}
}
elseif (isset($_SESSION["name"])){
  echo $_SESSION["name"];
echo '
<form action="deco.php">
<div btn-modal>
<button type="submit" class="btn-modal-1 btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<img src="https://img.icons8.com/nolan/50/000000/shutdown.png"></button>
</div>
</form>';}
else{
  echo '
  <div btn-modal>
  <button type="button" class="btn-modal btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <img src="https://img.icons8.com/color/50/000000/inscription.png"></button>
  </div>';
}
if(isset($_GET["erreur"])){
if ($_GET["erreur"]== 200) {
  echo "<p class='erreur'>erreur ".$_GET["erreur"].": ce compte existe deja!</p>";
  
}
}


?>
           <!-- Button trigger modal -->
           <div btn-modal>
<button type="button" class="btn-modal btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<img src="https://img.icons8.com/color/50/000000/inscription.png"></button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">connexion | inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- Nav -->
<nav>
 
  <div class="nav nav-tabs" id="nav-tab" role="tablist">

    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">connexion</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">inscription</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
  <div class="form-group">
    <form action="traitement/connexion.php" method="post">
    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="name">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="password1" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Enter</button>
</form>
</div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><br>
  <div class="form-group">
    <form action="traitement/inscription.php" method="post">
    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="name">
  </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control" id="password1" placeholder="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
<div class="tab-content" id="pills-tabContent">

</nav>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


    <div class="container text-center my-auto ">
      <h1 class="mb-1">Quizzons</h1>
      <h3 class="mb-5">
        <em>le pire quiz du monde</em>
      </h3>
      <a class="theme-link" href="theme-quiz/theme.php"><strong>Thème</strong></a>

    </div>
    <div class="overlay"></div>
    
</div>
<div class="fake">

<form action="../quiz/quiz-verif.php" method="GET">
<button  type="submit" value="nature" name="theme"  class="b1 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-leaf"></i> NATURE</button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="jeux-vidéo" name="theme" class="b2 b btn  btn-primary btn-outline-warning btn-lg"><i class="fas fa-gamepad"></i> JEUX VIDEOS</button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="music" name="theme" class="b3 b btn  btn-primary btn-outline-warning btn-lg"><i class="fas fa-music"></i>  MUSIQUE</button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="litterature" name="theme" class="b4 b btn  btn-primary btn-outline-warning btn-lg"><i class="fas fa-book"></i>  LITTERATURE</button>
</form>
<br>
<form action="../quiz/quiz-verif.php">
<button  type="submit" value="science" name="theme" class="b5 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-microscope"></i>  SCIENCE</button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="sport" name="theme" class="b6 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-basketball-ball"></i>  SPORT</button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="people" name="theme" class="b7 b btn-primary btn-outline-warning btn-lg"><i class="far fa-star"></i>  PEOPLE</button>
</form>
<br>
<form action="../quiz/quiz-verif.php">
<button  type="submit" value="art" name="theme" class="b8 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-paint-brush"></i>  ART</button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="cinema" name="theme" class="b9 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-film"></i> CINEMA</button>
<form>

<form action="../quiz/quiz-verif.php">  
<button  type="submit" value="informatique" name="theme" class="b10 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-mobile-alt"></i> INFORMATIQUE</button>
</form>  
  
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>

</body>

</html>

