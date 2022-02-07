<!DOCTYPE html>
<html>
<?php session_start();
require('config.php');
?>

<head>
  <link href="../CSS/style.css" rel="stylesheet">
</head>

<header>
  <nav class=admin>
    <ul class=admin>
      <li> <a href="inscription.php">Inscription</a></li>
      <li> <a href="accueil.php">Accueil</a></li>
      <li> <a href="../index.php">Connexion</a></li>
      <li> <a href="profil.php">Profil</a></li>
    </ul>
  </nav>

</header>

<body>
  <div class="sucess">
    <?php

    if (isset($_SESSION['prenom'])) {
      $prenom = $_SESSION['prenom'];
      echo "<br><br> <h1 class=\"box-titre\"> Bienvenue $prenom !</h1>
      <br><br>
      <p class= \"toncompte\"> C'est ton compte TKT</p> <br><br> <p class=\"box-register\"><a href=\"logout.php\">Déconnexion</a></p> ";
    } else {
      echo '<h1 class="box-titre">' . 'Bienvenue ! pour continuer plus loin je te conseille de te connecter !' . '</h1>
        <br><br>';
    }; ?>




  </div>
  <?php
  if (isset($_SESSION['login']) == 'admin') {
    echo "<a style=\"
    text-decoration: none;
    background-color: white;
    border: 2px solid orange;
    border-radius: 5px;
    padding: 1%;
    font-size: 200%;
    margin-left:25%;
    \" href=\"admin.php\">Admin</a>";
  }
  ?>
</body>

</html>