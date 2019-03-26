<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class HelperController extends Controller
{
    public function loadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');

            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(322)->save(public_path('/images/products/' . $filename));

            return $filename;
        }
    }


    /**
     * Универсальное сохраниение картиники
     *
     * @param Request $request
     * @return string
     */
    public function loadImageUniversal(Request $request)
    {
        $resizeWidth = $request->get('resize_width');

        if ($request->has('path')) {
            $path = $request->get('path');
            if ($request->hasFile('file')) {
                $image = $request->file('file');

                $filename = time() . '.' . $image->getClientOriginalExtension();

                if ($resizeWidth){
                    Image::make($image)->resize($resizeWidth)->save(public_path($path . $filename));
                }else{
                    Image::make($image)->save(public_path($path . $filename));
                }


                return $filename;
            }

        }
    }
}
