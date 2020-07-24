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


   public function mycart() {
     /* TODO: 
        1. cartsテーブルから、ログインユーザーのIDに紐づくレコードを取得する
        2. 1で取得したレコードをarray_count_values関数に入れて、重複するラーメンの数を取得する
        3. 1と2の結果を組み合わせて、ラーメンのオブジェクトと出現回数を持つ連想配列を作る
        ex) $result = [
              {
                'data' => $data, // ラーメン(Itemオブジェクト)
                'count' => 1以上の整数 // 2でarray_count_valuesを実行したときの結果
              },
              ....
            ]
     */
                $carts = (new Cart)->all_get(Auth::id());
                $subtotals = $this->subtotals($carts);
                
                $totals = $this->totals($carts);
                $includeSendPrice = $this->includeSendPrice($carts);
                
                $quantitys = $this->quantitys($carts);
         
                return view('mycart', compact('carts', 'totals', 'subtotals','includeSendPrice','quantitys',));
        }
   
   private function subtotals($carts) {
                $result = 0;
                foreach ($carts as $cart) {
                        $result += $cart->subtotal();
                }
                return $result;
        }
  private function totals($carts) {
                $result = $this->subtotals($carts) + $this->tax($carts);
                return $result;
        }
        private function tax($carts) {
                $result = floor($this->subtotals($carts) * 0.1);
                return $result;
        }
        
        public function includeSendPrice($carts){
                $result = $this->totals($carts)+1000;
                return $result;
        }
        
         public function quantitys($carts) {
                 $result = 0;
              foreach ($carts as $cart){
                     $result += $cart->quantity;
              }
              return $result;
        }
        
        
        public function add(Request $request) {
                // 1. $requestにラーメンのIDがある（$request->stock_idでアクセスできる）
                // 2. 新しくcartsのレコードを生成する
                // 3. 結果をリターンする
                
                $result = (new Cart)->add_db($request->stock_id, $request->quantity);
                
                return $this->mycart($result);
        }
        public function delete(Request $request) {
                $cart_id = $request->input('cart_id');
                if ((new Cart)->soft_delete_db($cart_id)) {
                        $request->session()->regenerateToken();
                }
                return $this->mycart();
        }

   
   public function about()
   {
     return view("about");
   }

   public function contact(){
     return view("contact");
   }
   
  public function checkout(Cart $cart)
  {
       $checkout_info = $cart->checkoutCart();
       
       // TODO: 購入メール送信を購入者と管理者に送信する
       // 
       return view('checkout');
   }
}