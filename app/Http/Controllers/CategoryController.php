<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * ВЫбрать все категории
     *
     * @return mixed
     */
    public function getCategoryAll()
    {

        $categories = Categorie::where( 'under_categories', 0 )->get();

        foreach( $categories as $category ) {
            $under_category = Categorie::where( 'under_categories', 1 )->where( 'parent_category_id', $category->id )->get();

            $category->products_count   = $category->products->count();
            $category->show             = $category->id == 2 ? TRUE : FALSE;
            $category->products_page    = $category->products;
            $category->under_categories = $under_category;

        }
        $data[ 'categories' ] = $categories;
        return $data;
    }


    /**
     * Сохранить категорию / админка
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function saveCategories( Request $request )
    {
        $categories = $request->get( 'categories' );

        foreach( $categories as $category ) {
            if( isset( $category[ 'isNew' ] ) ) {

                $newCategory                     = new Categorie();
                $newCategory->name               = $category[ 'name' ];
                $newCategory->img                = $category[ 'img' ];
                $newCategory->description        = $category[ 'description' ];
                $newCategory->under_categories   = $category[ 'under_categories' ];
                $newCategory->parent_category_id = $category[ 'parent_category_id' ];
                $newCategory->save();
            }
        }

        $categoriesAll[ 'categories' ] = Categorie::all();
        return $categoriesAll;
    }


    /**
     * @param $categoryId
     *
     * @return mixed
     */
    public function deleteCategories( $categoryId )
    {
        Categorie::where( 'id', $categoryId )->delete();

        $categories[ 'categories' ] = Categorie::all();
        return $categories;
    }


    /**
     * @param Request $request
     */
    public function categoriesChangesSave( Request $request )
    {
        $category = $request->get( 'category_edit' );

        $categoryEdit                     = Categorie::where('id',$category['id'])->first();
        $categoryEdit->name               = $category[ 'name' ];
        $categoryEdit->img                = $category[ 'img' ];
        $categoryEdit->description        = $category[ 'description' ];
        $categoryEdit->under_categories   = $category[ 'under_categories' ];
        $categoryEdit->parent_category_id = $category[ 'parent_category_id' ];
        $categoryEdit->save();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryPage()
    {
        return view( 'category.index' );
    }


    /**
     * Выбарть под категорию по айди
     *
     * @param $categoryId
     *
     * @return mixed
     */
    public function getCategoryById( $categoryId )
    {
        $category = Categorie::where( 'id', $categoryId )->first();

        $under_category = Categorie::where( 'under_categories', 1 )->where( 'parent_category_id', $category->id )->get();

        $category->products_count   = $category->products->count();
        $category->show             = $category->id == TRUE;
        $category->products_page    = $category->products;
        $category->under_categories = $under_category;

        return $category;
    }
}
