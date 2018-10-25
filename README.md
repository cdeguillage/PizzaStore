"# PizzaStore" 

PizzaStore - E-boutique de pizzas
==

## Récupérer un backup de la BDD pizzastore
L'intérêt est de pouvoir recréer la structure de la base à tout moment.
- Dump (ou) - Backup
- phpmyadmin : pizzastore / Exporter / personnalisée / décocher Données

## Au niveau du PHP, on va créer quelques fichiers / dossier :
- config/database.php -> Connexion à la base de données en PDO, sera inclus dans
- config/config.php -> Stocke toutes les variables globales
tous les fichiers PHP
- partials/header.php -> Le header du site à inclure dans toutes les pages (Bootstrap CDN)
- partials/footer.php -> Le footer du site à inclure dans toutes les pages
- index.php -> La page d'accueil du site
- pizza_list.php -> Lister toutes les pizzas de la base de données
- pizza_single.php -> La page d'une pizza seule

## Au niveau du front
- assets/ -> Dossier qui contiendra le css, js, images
- assets/css/style.css
- assets/js/script.js
- assets/img

## Ajout d'une pizza
- Créer la page pizza_add.php (permettra d'ajouter une pizza back-office)
- Ne pas oublier le header et le footer
- Ajouter un titre "Ajouter une pizza"
- Ajouter un formulaire avec les champs suivants :
    - Nom : Saisie libre
    - Prix : Entre 5 et 19.99
    - Image : Saisie libre
    - Description : Saisie libre
    - Catégorie : Select
    - Bouton
- Faire le traitement du formulaire (vérifier les données)
- Modifier la base de données pour ajouter le champ description et catégorie (VARCHAR et ENUM) dans la table pizza
- Ajouter la pizza dans la base avec une requête quand on clique sur le submit du formulaire

