<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Product;
use App\Specification;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{
    /**
     * Выбать все продукты
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProductsAll()
    {
        return $this->getProductsForPage();
    }


    /**
     * Сформировать все продукты
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProductsForPage()
    {
        $products = Product::all();

        foreach( $products as $product ) {
            $product->specifications_get = $product->specifications;
            $product->categorie_id       = $product->categorie;
            $product->category           = $product->categorie;
            $product->new_category       = '';
        }

        return $products;
    }


    /**
     * Выбать продукт по категории
     *
     * @param $categoryId
     *
     * @return array
     */
    public function getProductByCategory( $categoryId )
    {
        $category   = Categorie::where( 'id', $categoryId )->first();
        $categories = Categorie::all();
        foreach( $categories as $category ) {
            if( $category->id == $categoryId ) {
                $category->products_count = $category->products->count();
                $category->show           = TRUE;
                $category->is_style       = TRUE;
            } else {
                $category->show     = FALSE;
                $category->is_style = FALSE;
            }

        }
        $products    = $category->products;
        $productsAll = Product::all();
        $data        = [
            'categories' => [
                'categories'        => $categories,
                'product_count_all' => $productsAll->count(),
            ],
            'products'   => $products,

        ];

        return $data;
    }


    /**
     * Удалить продукт
     *
     * @param $id
     */
    public function deleteProduct( $id )
    {
        Product::where( 'id', $id )->delete();
    }


    /**
     * ВЫбрать рекомендованные
     *
     * @return mixed
     */
    public function getRecomended()
    {
        $products = Product::limit( 4 )->get();
        return $products;
    }





    /**
     * Сохранить новый продукт
     *
     * @param Request $request
     */
    public function saveNewProduct( Request $request )
    {
        $productRequest = $request->get( 'product' );

        $product               = new Product();
        $product->name         = $productRequest[ 'name' ];
        $product->description  = $productRequest[ 'description' ];
        $product->video        = $productRequest[ 'video' ];
        $product->price        = $productRequest[ 'price' ];
        $product->categorie_id = $productRequest[ 'category' ];
        $product->img          = $productRequest[ 'img' ];
        $product->save();

        foreach( $productRequest[ 'specifications_get' ] as $specification ) {
            $specificationNew             = new Specification();
            $specificationNew->name       = $specification[ 'name' ];
            $specificationNew->parameter  = $specification[ 'parameter' ];
            $specificationNew->product_id = $product->id;
            $specificationNew->save();
        }

    }


    /**
     * Сохранить отредактированный проудкт
     *
     * @param Request $request
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function productChangesSave( Request $request )
    {
        $product = $request->get( 'product' );

        $productEdit = Product::where( 'id', $product[ 'id' ] )->first();

        $productEdit->name         = $product[ 'name' ];
        $productEdit->description  = $product[ 'description' ];
        $productEdit->video        = $product[ 'video' ];
        $productEdit->price        = $product[ 'price' ];
        $productEdit->categorie_id = $product[ 'category' ][ 'id' ];
        $productEdit->save();

        foreach( $product[ 'specifications_get' ] as $specification ) {
            if( isset( $specification[ 'isNew' ] ) ) {
                $specificationNew             = new Specification();
                $specificationNew->name       = $specification[ 'name' ];
                $specificationNew->parameter  = $specification[ 'parameter' ];
                $specificationNew->product_id = $productEdit->id;
                $specificationNew->save();

            } else {
                $specificationEdit            = Specification::where( 'id', $specification[ 'id' ] )->first();
                $specificationEdit->name      = $specification[ 'name' ];
                $specificationEdit->parameter = $specification[ 'parameter' ];
                $specificationEdit->save();
            }
        }

        return $this->getProductsForPage();

    }


    public function productEditLoadImage( Request $request )
    {
        if( $request->hasFile( 'file' ) ) {
            $image     = $request->file( 'file' );
            $productId = $request->get( 'id' );

            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->save( public_path( '/images/products/' . $filename ) );

            $product      = Product::where( 'id', $productId )->first();
            $product->img = $filename;
            $product->save();
        }

        return $this->getProductsForPage();

    }


    public function showProduct()
    {
        return view( 'product.show' );
    }


    public function getProductById( $productId )
    {
        $product = Product::where( 'id', $productId )->first();

        $product->all_specifications = $product->specifications;

        return $product;
    }


    public function searchTitle(){
        return view('product.search');
    }

    public function getProductByTitle($title){
        $title = str_replace('+',' ',$title);

        $products = Product::where('name', 'LIKE', '%'.$title.'%')->limit(100)->get();

        return [
          'products'=> $products,
          'title' => $title
        ];

    }

}
