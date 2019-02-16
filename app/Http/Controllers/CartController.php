<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){
        return view('cart.index');
    }
    public function addCart($id)
    {
        $product = Product::where('id', $id)->first();
        Cart::add($product->id, $product->name, 1, $product->price);
        $data = $this->getInfoCart();
        $message =[
            'message'=> $this->MessageInfoCart()
        ];
        $data = array_merge($data,$message);

        return $data;
    }
    public function getInfoCart(){

        $data = [
            'total' => Cart::total(),
            'count_all' => Cart::count(),
            'content' => Cart::content(),

        ];

        return $data;
    }
    public function destroyCart(){
        Cart::destroy();
        $data = $this->getInfoCart();
        return $data;
    }
    public function MessageInfoCart(){
        $message = 'В корзине '.Cart::count().' товар на сумму '.Cart::total().' рублей.';
        return $message;
    }
    public function deleteCart($rowId){
        Cart::remove($rowId);
        $data = $this->getInfoCart();
        return $data;
    }

}
