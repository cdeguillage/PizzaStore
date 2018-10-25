<?php
    // Header du site web
    require_once(__DIR__.'/partials/header.php');

    // header("location: pizza_list.php");  // Code 302 puis 200
    http_response_code(404);
    require_once(__DIR__.'/partials/header.php');
    echo '<main class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-6">';
    echo '<h1 class="page-title">404 - Page inexistante</h1>';
    echo '<h2>Redirection dans 5 secondes...</h2>';
    echo '</div>';
    echo '</div>';
    echo '</main>';  ?>
    <script>
        setTimeout(function() {
            window.location = 'pizza_list.php';
        }, 5000);
    </script>
    <?php
    require_once(__DIR__.'/partials/footer.php');
    die();
