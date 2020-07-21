<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
        use SoftDeletes; //ソフトデリート準備
        protected $fillable = ['user_id', 'stock_id', 'quantity'];
        protected $table= 'carts';

        public function stock() {
                //リレーション
                return $this->belongsTo('App\Models\Stock', 'stock_id');
        }
        
        //public function user(){
                //return $this->belongsTo('App\Models\User', 'user_id');
        //}
        
        public function all_get() {
                //ログインユーザーのカートデータ読み込み
                
                $auth_id = Auth::id();
                $carts = $this->where('user_id', $auth_id)->get();
                return $carts;
        }
        public function add_db(int $stock_id, $quantity) {
                $stock = Stock::findOrFail($stock_id);
                $qty = $stock->quantity;
                //在庫なしバリデーション
                if ($qty <= 0 || $qty < $quantity) {
                        return false;
                }
                $cart = $this->firstOrCreate(['user_id' => Auth::id(), 'stock_id' => $stock_id, 'quantity' => $quantity]);
                //$cart->increment('quantity', $add_qty);
                //$stock->decrement('quantity', $add_qty);
                // session()->forget('id');
                return $cart;
        }
        public function soft_delete_db($cart_id) {
                $cart = $this->find($cart_id);
                if ($cart->user_id == Auth::id()) {
                        $stock_id = $cart->stock_id;
                        $qty = $cart->quantity;
                        $cart->delete();
                        $stock = (new Stock)->find($stock_id);
                        $stock->increment('quantity', $qty);
                        return true;
                }
                return false;
        }
        public function subtotal() {
                $result = $this->stock->price * $this->quantity;
                return $result;
        }
        
       
        public function checkoutCart()
   {
       $user_id = Auth::id(); 
       $checkout_items=$this->where('user_id', $user_id)->get();
       $this->where('user_id', $user_id)->delete();

       return $checkout_items;     
   }
}