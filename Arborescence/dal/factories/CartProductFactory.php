<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/CartProduct.php'));

class CartProductFactory extends FactoryBase
{
    //Get tout les produits d'un panier
    public function GetAllProductsFromToken($token)
    {
        $produits = null;

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM tp1_panier WHERE Token = ?');
        $stmt->execute([$token]);

        while ($row = $stmt->fetch()) {
            $produits[] = new CartProduct($row);
        }

        $stmt->closeCursor();

        return $produits;
    }

    //Ajoute un nouveau produit au panier
    public function Addproduct($id, $qte, $token)
    {
        $db = $this->dbConnect();
        $stmt = $db->prepare("INSERT INTO tp1_panier(ProduitId, Quantite, Token) VALUES (? , ? , ?)");
        $stmt->execute([$id, $qte, $token]);

        $stmt->closeCursor();
    }

    //Verifie si un produit existe deja dans un panier
    public function CheckProduct($id, $token)
    {
        $resp = null;

        $db = $this->dbConnect();
        $stmt = $db->prepare("SELECT Quantite FROM tp1_panier WHERE ProduitId = ? AND Token = ?");
        $stmt->execute([$id, $token]);

        if ($row = $stmt->fetch()) {
            $resp = $row;
        }

        $stmt->closeCursor();

        return $resp;
    }

    //Update un produit deja existant dans un panier
    public function UpdateProduct($id, $qte, $token)
    {

        $db = $this->dbConnect();
        $stmt = $db->prepare("UPDATE tp1_panier SET Quantite = ? WHERE ProduitId = ? AND Token = ?");
        $stmt->execute([$qte, $id, $token]);
        $stmt->closeCursor();
    }

    //Delete un produit du panier
    public function DeleteProduct($id)
    {
        $db = $this->dbConnect();
        $stmt = $db->prepare("DELETE FROM tp1_panier WHERE Id = ?");
        $stmt->execute([$id]);
        $stmt->closeCursor();
    }
}
