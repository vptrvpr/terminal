<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Slack;

class SlackController extends Controller
{
    public function sendOrder(Request $request){
        $contacts = $request->get('contacts');

        $product = Product::where('id',$contacts['product_id'])->first();

//        Slack::to('#orders')->send(
//            "Телефон:  " . $contacts['number'] . "\n" .
//            "Имя:  " . $contacts['name'] . "\n" .
//            "Продукт:  " . $product->name . "\n" .
//            "Цена:  " . $product->price . "\n" .
//            "Время отправки:  " . Carbon::now()
//        );


        return $contacts;
    }
}
