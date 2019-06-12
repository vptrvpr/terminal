<?php

namespace App;


class ProductHelper
{
    public function getProductsForPage()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $product->specifications_get = $product->specifications;
            $product->categorie_id = $product->categorie;
            $product->category = $product->categorie;
            $product->new_category = '';
        }

        return $products;
    }
}
