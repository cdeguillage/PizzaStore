<?php
    // header("location: pizza_list.php");  // Code 302 puis 200
    http_response_code(404);

    // Header du site web
    require_once(__DIR__.'/partials/header.php');
?>
    <main class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-title">404 - Page inexistante</h1>
                <h2 class="stitle-redirection">Redirection dans 5 secondes...</h2>
            </div>
        </div>
    </main>
    <!-- Redirection automatique vers la liste des pizzas -->
    <script>redirection_timer('pizza_list.php', 5000);</script>
<?php
    require_once(__DIR__.'/partials/footer.php');
    die();
?>