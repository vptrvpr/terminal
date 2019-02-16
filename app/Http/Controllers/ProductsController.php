<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function getCategoryAll(){
        $categories = Categorie::all();
        $products = Product::all();
        foreach ($categories as $category){
            $category->products_count = $category->products->count();
            $category->show = false;
        }
        $data['categories'] = $categories;
        $data['product_count_all'] = $products->count();
        return $data;
    }
    public function getProductsAll(){
        $products = Product::all();
        foreach ($products as $product) {
            $product->categorie_id = $product->categorie;
        }
        return $products;
    }
    public function getProductByCategory($categoryId){
        $categorie = Categorie::where('id',$categoryId)->first();
        $categories = Categorie::all();
        foreach ($categories as $category) {
            if ($category->id == $categoryId){
                $category->products_count = $category->products->count();
                $category->show = true;
                $category->is_style = true;
            }else{
                $category->show = false;
                $category->is_style = false;
            }

        }
        $products = $categorie->products;
        $productsAll = Product::all();
        $data = [
            'categories' => [
                'categories' => $categories,
                'product_count_all'=> $productsAll->count()
            ],
            'products' =>$products,

        ];

        return $data;
    }
    public function deleteProduct($id){
        Product::where('id',$id)->delete();
    }
    public function getRecomended(){
       $products = Product::limit(4)->get();
        return $products;
    }
}
