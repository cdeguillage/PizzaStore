<?php
  // Inclusion du fichier functions
  require_once(__DIR__.'/../config/functions.php');
  // Fichier de configuration globale
  require_once(__DIR__.'/../config/config.php');
  // Connection à la base de données
  require_once(__DIR__.'/../config/database.php');
?>

<!doctype html>
<html lang="fr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|BenchNine" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

    <!-- JS LOAD -->
    <script src="assets/js/script_load.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark <?php echo $admin === false ? 'bg-danger ' : 'bg-success '; ?>fixed-top">
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
          <li class="nav-item <?php echo substr($currentPageUrl, 0, 12) === 'pizza_single' ? 'active' : 'd-none'; ?>">
            <a class="nav-link" href="">Ma pizza</a>
          </li>
        </ul>

        <!-- BACKOFFICE - Administrateur  d-none (caché) -->
        <ul class="navbar-nav float-right">
          <li class="nav-item dropdown <?php
                                          echo substr($currentPageUrl, 0, 4) === 'adm_' ? 'active ' : ' ';
                                          // echo $admin === false ? 'd-none ' : ' ';
                                        ?>">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Administration</a>
            <div class="dropdown-menu  <?php
                                          echo substr($currentPageUrl, 0, 4) === 'adm_' ? 'bg-success ' : 'bg-danger ';
                                          // echo $admin === false ? 'd-none ' : ' ';
                                        ?>">
              <a class="dropdown-item" href="adm_pizza.php">Pizzas</a>
              <a class="dropdown-item" href="adm_category.php">Catégories</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="adm_user.php">Utilisateur</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="adm_order.php">Commandes / Factures</a>
            </div>
          </li>
                </ul>

      </div>
    </nav>