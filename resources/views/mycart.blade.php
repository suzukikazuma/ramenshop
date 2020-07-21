@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 class="text-center font-weight-bold" style="color:black;font-size:1.2em; padding:24px 0px;">
                {{ Auth::user()->name }}さんのカートの中身</h1>
                    <div class="">
                        
                            <div class="d-flex flex-row flex-wrap">
                                <div class="col-sm-12 col-md-12">
                                    <p>{{ $message ?? ''   }}</p>
                                    @if (0 < $carts->count())
                                        @foreach($carts as $cart)
                                            
                                            <div style="background-color:#fefefe; font-size:1.1em;text-align:center;
                                                         margin-top:24px;padding: 24px 8px;">
                                              
                                                  <table border="1" align="center"width="85%">
                                                    <tr>
                                                        <th>商品名</th>
                                                        <td>{{ $cart->stock->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>数量</th>
                                                        <td>{{ $cart->quantity }}個</td>
                                                    </tr>
                                                    <tr>
                                                        <th>合計金額（税抜）</th>
                                                        <td>{{ $cart->subtotal() }}円</td>
                                                    </tr>
                                                </table>
                                                
                                              
                                                <img src="/image/{{$cart->stock->imgpath}}" style="margin-top:30px; height: auto; object-fit: cover; width: 50%;" >
                           
                                                    <form action="cartdelete" method="post" style="margin-top:15px;">
                                                        @csrf
                                                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                                    <input type="submit" value="カートから削除する">
                                                    </form>
                                           
                                            </div>
                                           @endforeach 
                              
                                            <table border="1" align="center" width="75%" style="text-align:center; background-color:white; margin:50px auto; 
                                                                                                font-size:1.5em">
                                                <tr>
                                                    <th>総数量</th>
                                                    <td>{{ $quantitys }}個</td>
                                                </tr>
                                                <tr>
                                                    <th>送料</th>
                                                    <td>1,000円</td>
                                                </tr>
                                                <tr>
                                                    <th>合計金額（税込)</th>
                                                    <td>{{ $includeSendPrice }}円</td>
                                                </tr>
                                                
                                            </table>
                        
                                            <form action="checkout" method="POST" style="text-align:center;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>
                                            </form>
                                   
                                                   @else
                                            <p style="text-align:center; font-weight:bold">カートの中身は何もありません。</p>
                                                   @endif
                                     </div>
                                </div>
                            <div><a href="/">商品一覧へ</a></div>
                            </div>
        </div>
    </div>
</div>
@endsection