<?php $page_title = "Produit";
require_once(realpath(__DIR__ . '/dal/DAL.php'));

if (!isset($_GET["id"])) {
    header("Location: index.php");
}

$id = $_GET["id"];

$dal = new DAL();

$produits = $dal->ProductFact()->GetProduitParId($id);

?>

<?php ob_start(); ?>
<h1><?= $produits->nom; ?></h1>

<!--Affiche toutes les infos du produits-->
<div class="flexProdView">
    <div class="imageProd">
        <img src="img/<?= $produits->image ?>">
    </div>
    <div class="infoProd">
        <form action="cart-process.php?action=add" method="post">
            <h2>Détail du Produit</h2>
            <p><?= $produits->quantite ?> <?= $produits->unite ?></p>
            <p><?= $produits->prix ?> $</p>
            <p>Quantité : <input type="number" id="qte" name="qte" min="1" max="10" required></p>
            <input type="hidden" id="id" name="id" value="<?= $produits->id ?>">
            <input class="standard-button" type="submit" value="Ajouter au panier">
        </form>

    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>