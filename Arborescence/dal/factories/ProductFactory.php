<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/Product.php'));

class ProductFactory extends FactoryBase
{
    //Va chercher tout les produits de la bd
    public function GetAllProducts()
    {
        $produits = array();

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM tp1_produits ORDER BY Id');
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $produits[] = new Product($row);
        }

        $stmt->closeCursor();

        return $produits;
    }

    //Va chercher un produit avec l'id
    public function GetProduitParId($id)
    {

        $db = $this->dbConnect();
        $sql = "SELECT * FROM tp1_produits WHERE Id = ? ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        if ($row = $stmt->fetch()) {
            $user = new Product($row);
        }

        $stmt->closeCursor();

        return $user;
    }
}
