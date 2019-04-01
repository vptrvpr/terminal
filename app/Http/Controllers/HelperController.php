<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\ProductHelper;

class HelperController extends Controller
{


    public function loadImage( Request $request,ProductHelper $productHelper )
    {

        if( $request->hasFile( 'file' ) ) {
            $image = $request->file( 'file' );

            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make( $image )->resize(FALSE,322)->save( public_path( '/images/products/' . $filename ) );

            if( $request->has( 'product_id' ) ) {
                $productEdit      = Product::where( 'id', $request->get( 'product_id' ) )->first();
                $productEdit->img = $filename;
                $productEdit->save();

                return [
                    'status' => 'edit',
                    'products' => $productHelper->getProductsForPage(),

                ];
            } else {
                return [
                    'status'=>'new',
                    'filename' => $filename
                ];
            }


        }
    }


    /**
     * Универсальное сохраниение картиники
     *
     * @param Request $request
     *
     * @return string
     */
    public function loadImageUniversal( Request $request )
    {
        $resizeWidth = $request->get( 'resize_width' );

        if( $request->has( 'path' ) ) {
            $path = $request->get( 'path' );
            if( $request->hasFile( 'file' ) ) {
                $image = $request->file( 'file' );

                $filename = time() . '.' . $image->getClientOriginalExtension();

                if( $resizeWidth ) {
                    Image::make( $image )->resize( $resizeWidth )->save( public_path( $path . $filename ) );
                } else {
                    Image::make( $image )->save( public_path( $path . $filename ) );
                }


                return $filename;
            }

        }
    }


    /**
     * @return mixed
     */
    public function getUrlSite()
    {
        return env( 'MIX_URL_SITE' );
    }
}
