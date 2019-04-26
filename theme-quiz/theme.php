<?php
session_start();
unset($_SESSION["v"]);
unset($_SESSION["n"]);
unset($_SESSION["theme"]);
$_SESSION["v"] = 0;
$_SESSION["time1"] = 10;
$_SESSION["time2"] = 10;
$_SESSION["time3"] = 10;
$_SESSION["time4"] = 10;
$_SESSION["time5"] = 10;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="theme.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="stylish-portfolio.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <script src="main.js"></script>
</head>
<body>
<div class="fake-page">
<header class="masthead d-flex">
    <div class="container">
      <h1 class="mb-1">Quizzons</h1>
      <h3 class="mb-5">
        <em>le pire quiz du monde</em>
      </h3>    </div>
      <a class="theme-link" href="../reindex.php"><strong class="titre">Thèmes</strong></a>

    <div class="overlay"></div>

  </header>

</div>


<div class="form">
  <form action="../quiz/quiz-verif.php" method="GET">
<button  type="submit" value="nature" name="theme"  class="b1 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-leaf"></i> <span class="theme-text">NATURE</span></button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="jeux-vidéo" name="theme" class="b2 b btn  btn-primary btn-outline-warning btn-lg"><i class="fas fa-gamepad"></i> <span class="theme-text">JEUX VIDEOS</span></button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="musique" name="theme" class="b3 b btn  btn-primary btn-outline-warning btn-lg"><i class="fas fa-music"></i>  <span class="theme-text">MUSIQUE</span></button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="litterature" name="theme" class="b4 b btn  btn-primary btn-outline-warning btn-lg"><i class="fas fa-book"></i>  <span class="theme-text">LITTERATURE</span></button>
</form>
<br>
<form action="../quiz/quiz-verif.php">
<button  type="submit" value="science" name="theme" class="b5 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-microscope"></i>  <span class="theme-text">SCIENCE</span></button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="sport" name="theme" class="b6 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-basketball-ball"></i>  <span class="theme-text">SPORT</span></button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="people" name="theme" class="b7 b btn-primary btn-outline-warning btn-lg"><i class="far fa-star"></i><span class="theme-text"> PEOPLE</span></button>
</form>
<br>
<form action="../quiz/quiz-verif.php">
<button  type="submit" value="art" name="theme" class="b8 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-paint-brush"></i> <span class="theme-text">ART</span></button>
</form>

<form action="../quiz/quiz-verif.php">
<button  type="submit" value="cinema" name="theme" class="b9 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-film"></i><span class="theme-text"> CINEMA</span></button>
<form>

<form action="../quiz/quiz-verif.php">  
<button  type="submit" value="informatique" name="theme" class="b10 b btn btn-primary btn-outline-warning btn-lg"><i class="fas fa-mobile-alt"></i> <span class="theme-text">INFORMATIQUE</span></button>
</form>  
  
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
