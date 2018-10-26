<?php

    // Utilisateur
    $admin = false;

    // Connection à la base de données
    require_once(__DIR__.'/config/database.php');

    // BDD : On va chercher la pizza sélectionnée
    if (!empty($_GET['id']))
    {
        $id_pizza = intval($_GET['id']);
        $query = $db->prepare('SELECT * FROM pizza WHERE id = :id_pizza');
        $query->bindValue(':id_pizza', $id_pizza, PDO::PARAM_STR);
        $query->execute();
        $pizza = $query->fetch();

        // Pizza introuvable - On se redirige vers la liste des pizzas (Erreur 404)
        if (!($pizza))
        {
            // Erreur 404
            require_once(__DIR__.'/404.php');
        }

        // Title
        $currentPageTitle = 'Ma pizza';

        // Header du site web
        require_once(__DIR__.'/partials/header.php');
?>

    <main class="container">

        <h1 class="page-title">Ma pizza <?= $pizza['name']; ?></h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="<?= $pizza['image']; ?>" alt=<?php echo $pizza['name']; ?>>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= 'pizza_single.php?id='.$pizza['id']; ?>" class="btn btn-danger">Commandez</a>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </main><!-- /.container -->

<?php

    }  //empty(id)
    else
    {
        echo "404 - Pizza introuvable !";
    }

    // Footer du site web
    require_once(__DIR__.'/partials/footer.php');
?>
