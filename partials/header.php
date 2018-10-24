<?php
  // Fichier de configuration globale
  require_once(__DIR__.'/../config/config.php');
  // Connection à la base de données
  require_once(__DIR__.'/../config/database.php');
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>
    <?php
      if (empty($currentPageTitle))  // Si on est sur index
      {
        echo $siteName." - ".$slogan;
      }
      else   // Si on est sur autre page que index
      {
        echo $currentPageTitle." - ".$siteName;
      }
    ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php"><?=$siteName;?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-pizzastore">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-pizzastore">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo $currentPageUrl === 'index' ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item <?php echo $currentPageUrl === 'pizza_list' ? 'active' : ''; ?>">
            <a class="nav-link" href="pizza_list.php">Liste des pizzas</a>
          </li>
        </ul>
      </div>
    </nav>