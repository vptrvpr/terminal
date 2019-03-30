<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recommended;

class RecommendedController extends Controller
{
    /**
     * @return Recommended[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        $recommended = Recommended::all();

        return $recommended;
    }


    /**
     * @param Request $request
     */
    public function save(Request $request)
    {
        $recommendeds = $request->get('recommended');
        $recommendeds = collect($recommendeds);

        $newRecommendeds = $recommendeds->where('id', 0);

        foreach ($newRecommendeds as $newRecommended) {
            $recommended = new Recommended();
            $recommended->product_id = $newRecommended['product_id'];
            $recommended->save();
        }
    }


    /**
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $recommendedId = $request->get('recommended_id');

        Recommended::where('id',$recommendedId)->delete();
    }



    public function getPage(){
        $products = [];
        $recommendeds = Recommended::all();

        foreach ($recommendeds as $recommended) {
            $products[] = $recommended->product;
        }

        return $products;
    }
}
