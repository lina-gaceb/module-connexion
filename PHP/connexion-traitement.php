<?php
session_start();
require_once 'config.php'; //  Apel bdd

// champs non vide 

if (!empty($_POST['login']) && !empty($_POST['pass'])) {

    // recupere le login et password avec html special char 
    $login = htmlspecialchars($_POST['login']);

    $pass = htmlspecialchars($_POST['pass']);

    $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');

    $check->execute(array($login));

    $data = $check->fetch();

    $row = $check->rowCount();

    // Si > 0 alors l'utilisateur existe
    if ($row > 0) {
        // on verifie Si le mot de passe est le meme

        if (password_verify($pass, $data['password'])) {
            // On ouvre la session et on redirige sur index.php

            $_SESSION['id'] = $data['id'];
            $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['login'] = $data['login'];

            header('Location: accueil.php');
            die();
        } else {
            header('Location: ../index.php?login_err=password');
            die();
        }
    } else {
        header('Location: ../index.php?login_err=already');
        die();
    }
} else {
    header('Location: ../index.php?login_err=empty');
    die();
} // si le formulaire est envoyé sans aucune données
