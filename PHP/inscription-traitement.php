<?php

require_once 'config.php'; //  Apel bdd

// Si les variables existent et qu'elles ne sont pas vides

if (!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['pass']) && !empty($_POST['pass2'])) {

    // je crée des variable pour chaque donné 

    $login = htmlspecialchars($_POST['login']);

    $prenom = htmlspecialchars($_POST['prenom']);

    $nom = htmlspecialchars($_POST['nom']);

    $pass = htmlspecialchars($_POST['pass']);

    $pass2 = htmlspecialchars($_POST['pass2']);


    // On vérifie si l'utilisateur existe deja 

    $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');

    $check->execute(array($login));

    $data = $check->fetch();

    $row = $check->rowCount();

    if ($row == 0) {
        if (strlen($login) <= 100) { // caractére depasse pas <= 100

            if ($pass === $pass2) { // si les deux mdp sont identique 

                // On hash le mot de passe avec Bcrypt, via un coût de 12
                $cost = ['cost' => 12];
                $pass = password_hash($pass, PASSWORD_BCRYPT, $cost);


                // On l'insère dans la base de données

                $insert = $bdd->prepare('INSERT INTO utilisateurs(login,prenom,nom,password) VALUES(:login, :prenom, :nom, :password)');
                $insert->execute(array(
                    'login' => $login,
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'password' => $pass,
                ));

                // On redirige avec le message de succès
                header('Location:../index.php?reg_err=success');
                die();
            } else {
                header('Location: inscription.php?reg_err=password');
                die();
            }
        } else {
            header('Location: inscription.php?reg_err=pseudo_length');
            die();
        }
    } else {
        header('Location: inscription.php?reg_err=already');
        die();
    }
} else {
    header('Location: inscription.php?reg_err=empty');
    die();
}

