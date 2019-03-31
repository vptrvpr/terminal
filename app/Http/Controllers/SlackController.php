<?php

namespace App\Http\Controllers;

use App\mailingEmail;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Slack;

class SlackController extends Controller
{
    /**
     * Новый заказ
     *
     * @param Request $request
     */
    public function sendOrder( Request $request )
    {
        $contacts = $request->get( 'contacts' );

        $product = Product::where( 'id', $contacts[ 'product_id' ] )->first();

        Slack::to( '#orders' )->send(
            "Телефон:  " . $contacts[ 'number' ] . "\n" .
            "Имя:  " . $contacts[ 'name' ] . "\n" .
            "Продукт:  " . $product->name . "\n" .
            "Цена:  " . $product->price . "\n" .
            "Время отправки:  " . Carbon::now()
        );


    }


    /**
     * Связаться с нами
     *
     * @param Request $request
     */
    public function sendContact( Request $request )
    {
        $contacts = $request->get( 'contact' );

        $mailingEmail = new mailingEmail();
        $mailingEmail->email = $contacts[ 'email' ];
        $mailingEmail->save();

        Slack::to( '#contacts' )->send(
            "Имя:  " . $contacts[ 'name' ] . "\n" .
            "Телефон:  " . $contacts[ 'number' ] . "\n" .
            "Почта:  " . $contacts[ 'email' ] . "\n" .
            "Сообщение:  " . $contacts[ 'message' ] . "\n" .
            "Время отправки:  " . Carbon::now()
        );



    }


}
