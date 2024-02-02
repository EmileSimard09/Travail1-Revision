<!DOCTYPE html>

<head>
    <title><?= $page_title ?></title>
    <meta charset="utf-8" />
    <link href="css/site.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon/favicon-16x16.png">
</head>

<html lang="fr">

<body>
    <div class="container">
        <header>
            <h1>Mon epicerie en ligne</h1>
            <div class="menu">
                <i class="fa-sharp fa-solid fa-house"></i><a href="index.php">Accueil</a> | <i class=" fa-solid fa-cart-shopping"></i><a href="cart-view.php">Mon panier</a>
            </div>
        </header>

        <main>
            <?= $content ?>
        </main>

        <footer>
            <p class="your-name">Émile Simard</p>
            <p>Tous droits réservés © cchic.ca</p>
        </footer>
    </div>
</body>

</html>