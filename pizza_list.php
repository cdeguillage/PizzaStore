<?php
    // Title
    $currentPageTitle = 'Nos pizzas';

    // Header du site web
    require_once(__DIR__.'/partials/header.php');
?>

    <main class="container">
        <h1>Mon site Pizza Store</h1>
    </main><!-- /.container -->

<?php
    $query = $db->query('SELECT * FROM pizza');
    if ($__DEBUG__) var_dump($query);
    $pizzas = $query->fetchAll();
    if ($__DEBUG__) var_dump($pizzas);
    foreach($pizzas as $pizza) {
        echo '<hr>';
        // echo $pizza['id'].' / '.$pizza['name'].' / '.$pizza['price'].' / '.$pizza['image'];
        echo '<h5>'.$pizza['name'].'</h5>';
    }



    // Footer du site web
    require_once(__DIR__.'/partials/footer.php');
?>
