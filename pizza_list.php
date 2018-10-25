<?php
    // Title
    $currentPageTitle = 'Nos pizzas';

    // Header du site web
    require_once(__DIR__.'/partials/header.php');

    // BDD : On va chercher la liste des pizzas
    $query = $db->query('SELECT * FROM pizza ORDER BY id DESC');
    $pizzas = $query->fetchAll();

    /*
    $price = '13.00';
    $price = str_replace('.', ',', $price);
    $explodePrice = explode(',', $price);
    echo $eplodePrice[0].',<span style="font-size: 12px">'.$explodePrice[1].'</span>';
    */

?>

    <main class="container">
        <h1 class="page-title">Liste des pizzas</h1>

        <div class="row">
            <?php
            foreach($pizzas as $pizza) { ?>
                <div class="col-md-3">
                    <div class="card mb-4">

                        <div class="card-img-top-container">
                            <span class="card-price"><?= formatPrice($pizza['price']); ?></span>
                            <img class="card-img-top card-img-top-zoom-effect" src="<?php echo $pizza['image']; ?>" alt=<?php echo $pizza['name']; ?>>
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title font-h3"><?php echo $pizza['name']; ?></h3>
                            <a href="<?= 'pizza_single.php?id='.$pizza['id']; ?>" class="btn btn-danger">Commandez</a>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div><!-- /.row -->
    </main><!-- /.container -->

<?php
    // Footer du site web
    require_once(__DIR__.'/partials/footer.php');
?>
