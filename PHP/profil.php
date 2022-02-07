<?php
session_start();
include('config.php');


if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit;
}
$check = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$check->execute(array($_SESSION['id']));
$data = $check->fetch();
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../CSS/style.css" />
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mon profil</title>

</head>

<header>

  <nav class=admin>
    <ul class=admin>
      <li> <a href="profil.php">vous êtes déjà Inscris</a></li>
      <li> <a href="accueil.php">Accueil</a></li>
      <li> <a href="profil.php">Vous êtes déjà connectez</a></li>
      <li> <a href="logout.php">Déconnexion</a></li>
    </ul>
  </nav>
  <br><br><br>

</header>


<body>
<?php
if (isset($_GET['err_profil'])) {
  $error = $_GET['err_profil'];
  switch ($error) {
    case 'confirm':
      echo "Veuillez rentrer une confirmation de mot de passe valide";
      break;
    
    case 'password':
      echo "Le mot de passe n'est pas le bon";
      break;

    case 'empty':
      echo "Veuillez compléter tout les champs";
      break;
    case 'success': 
      echo "Vos informations ont été modifié avec succés";
      break;
  }
}
?>

  <form method="POST" class="box" action="profil_traitement.php">


    <h1 class=box-titre>Modifier son profil</h1>

    <br>

    <label for="login">Login</label>
    <input type="text" name="login" value="<?= $data['login']; ?> " required>
    <br><br>

    <label for="nom">Nom</label>
    <input type="text" name="nom" placeholder="Nom" value="<?= $data['nom']; ?> " required>
    <br><br>

    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" placeholder="Prénom" value="<?= $data['prenom']; ?> " required>
    <br><br>

    <label for="password">Mot de passe</label>
    <input type="password" placeholder="Mot de passe" name="password" required>
    <br><br>

    <label for="newpassword">Nouveau mot de passe</label>
    <input type="password" placeholder="Nouveau mot de passe" name="newpassword" required>
    <br><br>

    <label for="confirmer">Confirmation</label>
    <input type="password" placeholder="confirmer nouveau mot de passe " name="confirmer" required>
    <br><br>

    <input type="submit" name="submitprofil" value="Envoyer">

  </form>
</body>

</html>