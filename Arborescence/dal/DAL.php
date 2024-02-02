<?php

require_once(realpath(__DIR__ . '/factories/ProductFactory.php'));
require_once(realpath(__DIR__ . '/factories/CartProductFactory.php'));

class DAL
{
    private $productFact = null;


    public function ProductFact()
    {
        if ($this->productFact == null) {
            $this->productFact = new ProductFactory();
        }

        return $this->productFact;
    }

    private $cartProductFact = null;

    public function CartProductFact()
    {
        if ($this->cartProductFact == null) {
            $this->cartProductFact = new CartProductFactory();
        }

        return $this->cartProductFact;
    }
}
