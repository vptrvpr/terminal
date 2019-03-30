<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use App\Specification;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{

    public function getCategoryAll()
    {

        $categories = Categorie::where('under_categories', 0)->get();

        foreach ($categories as $category) {
            $under_category = Categorie::where('under_categories', 1)->where('parent_category_id', $category->id)->get();

            $category->products_count = $category->products->count();
            $category->show = $category->id == 2 ? true : false;
            $category->products_page = $category->products;
            $category->under_categories = $under_category;

        }
        $data['categories'] = $categories;
        return $data;
    }


    public function getCategoryById($categoryId)
    {
        $category = Categorie::where('id', $categoryId)->first();

        $under_category = Categorie::where('under_categories', 1)->where('parent_category_id', $category->id)->get();

        $category->products_count = $category->products->count();
        $category->show = $category->id == true;
        $category->products_page = $category->products;
        $category->under_categories = $under_category;

        return $category;
    }


    public function getProductsAll()
    {
        return $this->getProductsForPage();
    }


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

        foreach ($categories as $category) {
            if (isset($category['isNew'])) {

                $newCategory = new Categorie();
                $newCategory->name = $category['name'];
                $newCategory->img = $category['img'];
                $newCategory->description = $category['description'];
                $newCategory->under_categories = $category['under_categories'];
                $newCategory->parent_category_id = $category['parent_category_id'];
                $newCategory->save();
            }
        }

        $categoriesAll['categories'] = Categorie::all();
        return $categoriesAll;
    }


    public function getFormNewProduct()
    {
        $product = new Product();
        $product->name = '';
        $product->description = '';
        $product->price = '';
        $product->categorie_id = '';
        $product->specifications_get = $product->specifications;
        $product->category = $product->categorie;
        $product->new_category = '';
        return $product;
    }


    public function saveNewProduct(Request $request)
    {
        $productRequest = $request->get('product');

        $product = new Product();
        $product->name = $productRequest['name'];
        $product->description = $productRequest['description'];
        $product->price = $productRequest['price'];
        $product->categorie_id = $productRequest['category'];
        $product->img = $productRequest['img'];
        $product->save();

        foreach ($productRequest['specifications_get'] as $specification) {
            $specificationNew = new Specification();
            $specificationNew->name = $specification['name'];
            $specificationNew->parameter = $specification['parameter'];
            $specificationNew->product_id = $product->id;
            $specificationNew->save();
        }

    }


    public function deleteCategories($categoryId)
    {
        Categorie::where('id', $categoryId)->delete();

        $categories['categories'] = Categorie::all();
        return $categories;
    }


    public function productChangesSave(Request $request)
    {
        $product = $request->get('product');

        $productEdit = Product::where('id', $product['id'])->first();

        $productEdit->name = $product['name'];
        $productEdit->description = $product['description'];
        $productEdit->price = $product['price'];
        $productEdit->categorie_id = $product['category']['id'];
        $productEdit->save();

        foreach ($product['specifications_get'] as $specification) {
            if (isset($specification['isNew'])) {
                $specificationNew = new Specification();
                $specificationNew->name = $specification['name'];
                $specificationNew->parameter = $specification['parameter'];
                $specificationNew->product_id = $productEdit->id;
                $specificationNew->save();

            } else {
                $specificationEdit = Specification::where('id', $specification['id'])->first();
                $specificationEdit->name = $specification['name'];
                $specificationEdit->parameter = $specification['parameter'];
                $specificationEdit->save();
            }
        }

        return $this->getProductsForPage();

    }


    public function productEditLoadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $productId = $request->get('id');

            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(322)->save(public_path('/images/products/' . $filename));

            $product = Product::where('id', $productId)->first();
            $product->img = $filename;
            $product->save();
        }

        return $this->getProductsForPage();

    }


    public function categoryPage()
    {
        return view('category.index');
    }


    public function showProduct()
    {
        return view('product.show');
    }


    public function getProductById($productId){
        $product = Product::where('id',$productId)->first();

        $product->all_specifications = $product->specifications;

        return $product;
    }

}
