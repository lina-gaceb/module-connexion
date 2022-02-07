<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title class=box-titre>Module de connexion</title>
    <link href="CSS/style.css" rel="stylesheet">
</head>

<!--header-->
<header>
    <nav class=admin>
        <ul class=admin>
            <li> <a href="PHP/inscription.php">Inscription</a></li>
            <li> <a href="PHP/accueil.php">Accueil</a></li>
            <li> <a href="index.php">Connectez-vous pour avoir accès a votre profil </a></li>
            <li> <a href="index.php">Vous n'êtes pas connecter </a></li>
        </ul>
    </nav>

</header>

<!-- Formulaire HTML-->
<br><br><br>

<body class="inscription">
    <?php
    if (isset($_GET['reg_err'])) {
        $err = htmlspecialchars($_GET['reg_err']);

        switch ($err) {

            case 'success':
    ?>
                <div class="box-erreur">
                    <strong>Succès</strong> inscription réussie !
                </div>
    <?php
                break;
        }
    }
    ?>

    <form class="box" method="post" action="PHP/connexion-traitement.php">

        <h1 class=box-titre>CONNEXION</h1>



        <input type="text" class="box-input" id="name" name="login" placeholder="Nom d'utilisateur">

        <input type="password" class="box-input" id="name" name="pass" placeholder="Mot de passe">

        <?php
        if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);
            switch ($err) {


                case 'empty':
        ?>
                    <div class="box-erreur">
                        <strong>Erreur</strong> certain champs sont vide
                    </div>
                <?php
                    break;

                case 'password':
                ?>
                    <div class="box-erreur">
                        <strong>Erreur</strong> le mot de passe est incorrect
                    </div>
                <?php
                    break;

                case 'already':
                ?>
                    <div class="box-erreur">
                        <strong>Erreur</strong> cette utilisateur n'existe pas
                    </div>
        <?php
                    break;
            }
        }
        ?>



        <input type="submit" class="box-button" value="connexion">
        <p class="box-register">Pas de compte ? <a href="PHP/inscription.php">Inscrivez vous ici</a></p>

    </form>
</body>
</html>
<!-- fin Formulaire HTML -->