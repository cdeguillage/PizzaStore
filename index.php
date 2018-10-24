<?php

// On crée une connexion à une BDD
// $db = new PDO('mysql:host=localhost;port=3306;dbname=pizzastore;charset=utf8'; 'root', '');
try
{
    $db = new PDO('mysql:host=localhost;port=3306;dbname=pizzastore', 'root', '',
                [
                // Activation de la gestion des messages d'erreur xdebug
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                // Charset
                 PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                // Choix des clés retournés dans les tableaux FETCH et FETCHALL
                // PDO::FETCH_NUM ou PDO::FETCH_ASSOC
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
    );
}
catch( Exception $e)
{
    echo $e->getMessage();
    header('Location: https://www.google.fr/search?q='.$e->getMessage());
}
// ******************************************************************************
// FORMULAIRE - Choix pizza



// ******************************************************************************
if (!empty($_GET['id']))
{
    // intval() - Contre les injections SQL uniquement pour les numériques
    $id_pizza = intval($_GET['id']);
    if (is_numeric($id_pizza))
    {        
        //$query = $db->query('SELECT * FROM pizza WHERE id='.$id_pizza));
        $query = $db->prepare('SELECT * FROM pizza WHERE id=:id_pizza');
        // $query->bindParam(':id_pizza', $id_pizza);
        // $id_pizza = $_GET['id'];
        $query->bindValue(':id_pizza', $id_pizza, PDO::PARAM_STR);
        $query->execute();

        $pizza = $query->fetch();
        // Pizza identifié (ou pas) !
        if ($pizza != false)
        {
            echo '<h1>'.$pizza['name'].'</h1><br />';
        }
        else   // Pizza inexistante
        {
            echo '<h1>Pizza inconnu - ERREUR 404 #3 - Identifiant non trouvé en base ;-(</h1>';
        }
    }
    else
    {
        // Sortie de la page en cas d'anomalie
        echo '<h1>Pizza inconnu - ERREUR 404 #2 - Identifiant non numérique ;-(</h1>';
    }
}
else
{
    // Sortie de la page en cas d'anomalie
    echo '<h1>Pizza inconnu - ERREUR 404 #1 - Identifiant non déterminé  ;-(</h1>';
}




?>