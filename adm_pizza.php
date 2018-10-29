<?php

    // Titre de la page / Utilisateur
    $currentPageTitle = "Gestion des pizzas";

    // Utilisateur
    $admin = true;

    // Connection à la base de données
    require_once(__DIR__.'/config/database.php');

    // Header du site web
    require_once(__DIR__.'/partials/header.php');

    // Traitement du formulaire
    $name = $price = $image = $category = $description = null;

    // Insertion dans la BDD
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $price = str_replace(',', '.', $_POST['price']); // on remplace la , par un . pour le prix
        $image = empty($_FILES['image']) ? 'no-logo.png' : $_FILES['image'];
        $category = $_POST['category'];
        $description = $_POST['description'];

        // Raccourci avec l'interpolation des variables
        // ${'variable'} = 'valeur';
        // $key = 'variable';
        // ${key} = 'valeur';
        // foreach($_POST as $key => $field) {
        //     $key = $field;
        // }

        // var_dump($_POST);
        // var_dump($_FILES);

        // Pour la gestion des erreurs
        $errors = [];

        // Vérifier le nom
        if (empty($name))
        {
            $errors['name'] = 'Le nom n\'est pas valide';
        }

        // Vérifier le price
        if (!is_numeric($price) || $price < 5 || $price > 19.99) {
            $errors['price'] = 'Le prix n\'est pas valide';
        }

        // Vérifier l'image
        if ($image['error'] === 4)
        {
            $error['image'] = '\'image n\'est pas valide';
        }

        // Vérifier la catégorie
        if (empty($category) || !in_array($category, ['Classique', 'Spicy', 'Hot', 'Végétarienne']))
        {
            $errors['category'] = 'La catégorie n\'est pas valide';
        }

        // Vérifier la description
        if (strlen($description) < 10)
        {
            $errors['description'] = 'La description n\'est pas valide';
        }

        // Upload de l'image
        // if (empty($errors))
        // {
            $file = $image['tmp_name']; // Emplacement du fichier temporaire
            $fileName = "assets/img/pizzas/".$image['name'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);   // Permet d'ouvrir un fichier
            $mimeType = finfo_file($finfo, $file);
            $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
            // Si l'extension n'est pas autorisée, il y a une erreur
            if (!in_array($mimeType, $allowedExtensions))
            {
                $errors['image'] = 'Ce type de fichier n\'est pas autorisé';
            }

            // On vérifie la taille de l'image (en Ko)
            if ($image['size'] / 1024 > 500)
            {
                $errors['image'] = 'L\'image est trop lourde';
            }
        // }

        if (!isset($errors['image']))
        {
                // On déplace le fichier uploadé où on le souhaite
                move_uploaded_file($file, __DIR__."/".$fileName);
        }

        // Aucune erreur dans le formulaire - On insère
        if (empty($errors)) {
            $query = $db->prepare('
                        INSERT INTO pizza (`name`, `price`, `image`, `category`, `description`) VALUES (:name, :price, :image, :category, :description)
            ');
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':price', $price, PDO::PARAM_STR);
            $query->bindValue(':image', $fileName, PDO::PARAM_STR);
            $query->bindValue(':category', $category, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            
            if ($query->execute()) {
                $success = true;
                // Envoyer un mail ?
                // Logger la création de la pizza
            }

        }


    }

?>
    <main class="container">

        <h1 class="text-success page-title-adm"><?= $currentPageTitle ?></h1>

        <?php if (isset($success) && $success) { ?>
            <div class="alert alert-success alert-dismissible fade show">
                La pizza <strong><?php echo $name; ?></strong> a bien été ajouté avec l'id <strong><?php echo $db->lastInsertId(); ?></strong> !
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">
            <div class='card-body bg-white'>
                <div class="row">
                    <!-- Colonne 1 -->
                    <div class="col">
                        <div class="form-group p-3">
                            <label for="name">Nom :</label>
                            <input type="text" name="name" id="name" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : null; ?>" value="<?php echo $name; ?>">
                            <?php if (isset($errors['name'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['name'];
                                echo '</div>';
                            } ?>

                            <label for="price">Prix :</label>
                            <input type="text"  name="price" id="price" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : null; ?>" value="<?php echo $price; ?>">
                            <?php if (isset($errors['price'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['price'];
                                echo '</div>';
                            } ?>

                            <label for="image">Image :</label>
                            <input type="file" name="image" id="image" class="form-control" value="<?php echo empty($filename) ? '' : $filename; ?>">
                            <?php if (isset($errors['image'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['image'];
                                echo '</div>';
                            } ?>
                        </div>
                    </div>
                    <!-- Colonne 2 -->
                    <div class="col">
                        <div class="form-group p-3">
                            <label for="category">Catégorie :</label>
                            <select name="category" id="category" class="form-control <?php echo isset($errors['category']) ? 'is-invalid' : null; ?>">
                                <option value="">Choisir la catégorie</option>
                                <option <?php echo ($category === 'Classique' ? 'selected' : ''); ?>value="Classique" selected>Classique</option>
                                <option <?php echo ($category === 'Spicy' ? 'selected' : ''); ?>value="Spicy">Spicy</option>
                                <option <?php echo ($category === 'Hot' ? 'selected' : ''); ?>value="Hot">Hot</option>
                                <option <?php echo ($category === 'Végétarienne' ? 'selected' : ''); ?>value="Végétarienne">Végétarienne</option>
                            </select>
                            <?php if (isset($errors['category'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['category'];
                                echo '</div>';
                            } ?>

                            <label for="description">Description :</label>
                            <textarea name="description" id="description" class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : null; ?>" rows="4" minlength="10" maxlength="45"><?php echo $description; ?></textarea>
                            <?php if (isset($errors['description'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['description'];
                                echo '</div>';
                            } ?>
                        </div>
                    </div>
                    </div>
                        <button type="submit" class="btn btn-success btn-block text-uppercase">Ajouter</button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.card-body -->
        </form>
    </main><!-- /.container -->

<?php
    // Footer du site web
    require_once(__DIR__.'/partials/footer.php');
?>
