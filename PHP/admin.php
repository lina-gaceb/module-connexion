<!DOCTYPE html>
<html>
<?php
session_start();
if ($_SESSION['login'] == 'admin') {
    echo "Bienvenue admin";
} else {
    header('Location:../index.php');
}
?>
<-- header -->
<head>
    <title>Administrateur page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css" />
</head>

<header>
    <nav class=admin>
        <ul class=admin>
            <li> <a href="inscription.php">Inscription</a></li>
            <li> <a href="accueil.php">Accueil</a></li>
            <li> <a href="../index.php">Connexion</a></li>
            <li> <a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>

</header>


<body>
    <!-- CONNECTION ET SELECTION DE LA DB -->
    <?php
    require_once 'config.php'; // ajout connexion base de donnée 

    // On récupere les données de l'utilisateur
    $req = $bdd->query('SELECT * FROM utilisateurs ');
    ?>

    <!-- CREATION DU TABLEAU -->

    <table class="box">
        <h1 class="box-titre"> Espace Administrateur </h1>
        <!-- entete du tableau -->
        <thead>

            <tr>
                <th scope="col">id</th>
                <th scope="col">login</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">password</th>
            </tr>
        </thead>
        <!-- corps du tableau -->
        <tbody>
            <?php
            while ($donnees = $req->fetch()) {
                //On affiche l'id et le nom du client en cours
                echo "</TR>";
                echo "<TH> $donnees[id] </TH>";
                echo "<TH> $donnees[login] </TH>";
                echo "<TH> $donnees[prenom] </TH>";
                echo "<TH> $donnees[nom] </TH>";
                echo "<TH> $donnees[password] </TH>";
                echo "</TR>";
            }
            ?>

        </tbody>
    </table>
</body>

</html>