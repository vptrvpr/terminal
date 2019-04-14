<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    /**
     * @return Slider[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        $sliders = Slider::all();

        return $sliders;
    }


    /**
     * @param Request $request
     */
    public function save(Request $request)
    {
        $sliders = $request->get('sliders');
        $sliders = collect($sliders);

        $newSliders = $sliders->where('id', 0);

        foreach ($newSliders as $newSlider) {
            $slider = new Slider();
            $slider->title = $newSlider['title'];
            $slider->comment = $newSlider['comment'];
            $slider->href = $newSlider['href'];
            $slider->image = 'images/sliders/' . $newSlider['image'];
            $slider->save();
        }
    }


    /**
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $sliderId = $request->get('slider_id');

        Slider::where('id',$sliderId)->delete();
    }
}
