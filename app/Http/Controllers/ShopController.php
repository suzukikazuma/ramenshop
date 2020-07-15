<?php

namespace App\Http\Controllers;

use App\Models\Stock;

use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() 
   {
       $stocks = Stock::Paginate(6);
       return view('welcome',compact('stocks'));
   }

  public function myCart(Cart $cart)
   {
       $my_carts = $cart->showCart();
       return view('mycart',compact('my_carts'));
   }
   
     public function addMycart(Request $request,Cart $cart)
   {

       //カートに追加の処理
       $stock_id=$request->stock_id;
       $message = $cart->addCart($stock_id);

       //追加後の情報を取得
       $my_carts = $cart->showCart();

       return view('mycart',compact('my_carts' , 'message'));

   }
   
   public function about(){
     return view("about");
   }

   public function contact(){
     return view("contact");
   }
}
