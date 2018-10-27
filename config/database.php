<?php

    // On crée une connexion à la BDD
    try
    {
        $db = new PDO('mysql:host=localhost;port=3306;dbname=pizzastore;charset=utf8', 'pizza', '',
                    [
                    // Activation de la gestion des messages d'erreur xdebug
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    // Charset
                    // PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    // Choix des clés retournés dans les tableaux FETCH et FETCHALL
                    // PDO::FETCH_NUM ou PDO::FETCH_ASSOC
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
        );
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        // header('Location: https://www.google.fr/search?q='.$e->getMessage());
        echo "<img src='assets/img/john-travolta.gif' alt='Where is my database ?!?'>";

        die();  // ON TAPE SUR LE BOUTON ROUGE D'URGENCE !!!
    }
