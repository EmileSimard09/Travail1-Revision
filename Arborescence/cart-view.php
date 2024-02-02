<?php $page_title = "Panier";
require_once(realpath(__DIR__ . '/dal/DAL.php'));

$dal = new DAL();

$token = $_COOKIE["token"];

$produits = $dal->CartProductFact()->GetAllProductsFromToken($token);

$prixTot = 0;

?>

<?php ob_start(); ?>
<h1>Votre panier d'achat</h1>
<table>
    <!-- Foreach qui affiche touts les produits du panier ainsi que leurs informations -->
    <?php
    if (!is_null($produits)) {
        foreach ($produits as $prodPan) {
            $prod = $dal->ProductFact()->GetProduitParId($prodPan->produitId);
            $prixTot += $prodPan->quantite * $prod->prix;
    ?>
            <div class="PanierTable">
                <tr>
                    <td>
                        <div class="smallimg"><img src="img/<?= $prod->image ?>"></div>
                    </td>
                    <td><?= $prodPan->quantite ?> x <?= $prod->nom ?></td>
                    <td><?= $prodPan->quantite * $prod->quantite ?> <?= $prod->unite ?></td>
                    <td><?= number_format($prodPan->quantite * $prod->prix, 2) ?> $</td>
                    <td><a href="cart-process.php?action=remove&id=<?= $prodPan->id ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            </div>
    <?php
        }
    } else
        echo "<h3 class=\"center\">Panier Vide :(</h3>"
    ?>

    </div>
</table>

<h3 class="center">Cout Total : <?= number_format($prixTot, 2) ?> $</h3>
<div class="center">
    <div class="standard-button">
        <a href="index.php">Continuer votre magasinage</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>