<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function getCategoryAll()
    {
        $categories = Categorie::all();
        $products = Product::where('categorie_id',1)->get();

        foreach ($categories as $category) {

            $category->products_count = $category->products->count();
            $category->show = $category->id == 1 ? true : false;
            $category->products_page = $category->products;
        }
        $data['categories'] = $categories;
        return $data;
    }


    public function getProductsAll()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->categorie_id = $product->categorie;
            $product->category = $product->categorie;
        }
        return $products;
    }


    public function getProductByCategory($categoryId)
    {
        $category = Categorie::where('id', $categoryId)->first();
        $categories = Categorie::all();
        foreach ($categories as $category) {
            if ($category->id == $categoryId) {
                $category->products_count = $category->products->count();
                $category->show = true;
                $category->is_style = true;
            } else {
                $category->show = false;
                $category->is_style = false;
            }

        }
        $products = $category->products;
        $productsAll = Product::all();
        $data = [
            'categories' => [
                'categories' => $categories,
                'product_count_all' => $productsAll->count()
            ],
            'products' => $products,

        ];

        return $data;
    }


    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
    }


    public function getRecomended()
    {
        $products = Product::limit(4)->get();
        return $products;
    }


    public function saveCategories(Request $request)
    {
        $categories = $request->get('categories');

        foreach ($categories as $category){
            if (isset($category['isNew'])){

                $newCategory = new Categorie();
                $newCategory->name = $category['name'];
                $newCategory->img = $category['img'];
                $newCategory->save();
            }
        }

        $categoriesAll['categories'] = Categorie::all();
        return $categoriesAll;
    }

    public function deleteCategories($categoryId){
        Categorie::where('id',$categoryId)->delete();

        $categories['categories'] = Categorie::all();
        return $categories;
    }
}
