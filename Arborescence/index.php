<?php $page_title = "Accueil";
require_once(realpath(__DIR__ . '/dal/DAL.php'));

if (!isset($_COOKIE["token"])) {
    setcookie("token", generateToken());
}
?>

<?php ob_start(); ?>

<?php
$produits = array();

$dal = new DAL();

$produits = $dal->ProductFact()->GetAllProducts();
?>

<!--Affiche la liste des produits disponible à l'épicerie-->
<div class="product-list">
    <?php
    foreach ($produits as $prod) {
    ?>
        <div class="product-item">
            <div class="product-image">
                <img src="img/<?= $prod->image ?>">
            </div>

            <div class="product-name">
                <?= $prod->nom ?>
            </div>

            <div class="standard-button">
                <a href="product-view.php?id=<?= $prod->id ?>">Voir l'article</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>

<?php
function generateToken($length = 16)
{
    $string = uniqid(rand());
    $randomString = substr($string, 0, $length);
    return $randomString;
}
?>