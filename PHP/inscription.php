<html>

<head>
    <meta charset="utf-8">
    <title>Module de connexion</title>
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
    <br><br><br>

</header>

<?php
if (isset($_GET['reg_err'])) {
    $err = htmlspecialchars($_GET['reg_err']);

    switch ($err) {
        case 'password':
?>
            <div class="box-erreur">
                <strong>Erreur</strong> mot de passe différent
            </div>
        <?php
            break;

        case 'pseudo_length':
        ?>
            <div class="box-erreur">
                <strong>Erreur</strong> pseudo trop long
            </div>
        <?php
            break;

        case 'already':
        ?>
            <div class="box-erreur">
                <strong>Erreur</strong> compte deja existant
            </div>

        <?php
            break;

        case 'empty':
        ?>
            <div class="box-erreur">
                <strong>Erreur</strong> certain champs sont vide
            </div>
<?php
            break;
    }
}
?>


<!-- Formulaire HTML-->

<body class="inscription">

    <form method="post" class="box" action="inscription-traitement.php">

        <h1 class=box-titre>INSCRIPTION</h1>
        <br><br>


        <input type="text" placeholder="Nom" id="name" name="login">
        <br> <br><br>

        <input type="text" placeholder="Prénom" id="name" name="prenom">
        <br> <br><br>
        <input type="text" placeholder="Nom" id="name" name="nom">
        <br> <br><br>
        <input type="password" placeholder="Mot de passe" id="name" name="pass">
        <br> <br><br>
        <input type="password" placeholder="Confirmer mot de passe" id="name" name="pass2">
        <br> <br><br>
        <input type="submit" value="s'inscrire">
        <br> <br><br>
    </form>
</body>

<!-- fin Formulaire HTML -->



</html>