<?php

    // Utilisateur
    $admin = false;

    // Header du site web
    require_once(__DIR__.'/partials/header.php');
?>

    <main class="container">
        <h1 class="page-title">Pizza Store</h1>

        <div class="row">
            <div class="col p-3">
                <div class="card-body bg-white p-3 card-round">
                    <br />
                    <span>C'est en 1780 que la première <strong>pizza</strong> d'Italie moderne voit le jour, la <span class="mi-md-color">pizza Margherita (pain, tomates, fromage)</span>, faite par Raffaele Esposito en l'honneur de la reine Margherite qui appréciait beaucoup ses pizzas.</span>
                    <br /><br />
                    <span><strong>Venez nombreux déguster la spécialité de la maison Trattoria ...</strong></span>
                    <br /><br />
                </div>
            </div>
        </div><!-- ./row -->

        <div class="row">
        <div class="col p-3">
                <div class="card-body bg-white p-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2907.993117551492!2d2.4420618156536267!3d43.20963368901716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12ae2a146518fafb%3A0x67ee4dc3e68c287e!2sTrattoria+Napoli!5e0!3m2!1sfr!2sfr!4v1540635320077" width="100%" height="185px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col p-3">
                <div class="card-body bg-white p-3 card-round">
                    <div class="row">
                        <div class="col text-center">
                            <br /><br />
                            <span class="mi-md-font-title mi-md-color"><strong>Trattoria Italia</strong></span>
                            <p>
                            12 Avenue Pierre Curie<br />
                            11800 Trèbes<br />
                            ITALIA
                            </p>
                            <br />
                        </div>
                        <div class="col text-center">
                            <br />
                            <i class="material-icons mi-md-color">contact_phone</i><br /><a class="mi-md-font-contact mi-md-font-color" href="tel:+76 123.154.236">+76 123.154.236</a><br />
                            <br />
                            <i class="material-icons mi-md-color">contact_mail</i><br /><a class="mi-md-font-contact mi-md-font-color" href="mailto:bellavitapizza@trattoria.it">bellavitapizza@trattoria.it</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ./row -->

    </main><!-- /.container -->

<?php
    // Footer du site web
    require_once(__DIR__.'/partials/footer.php');
?>
