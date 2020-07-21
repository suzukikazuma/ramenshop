@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:black;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::user()->name }}さんご購入ありがとうございました</h1>

           <div style="text-align:center">
               <p>ご登録頂いたメールアドレスへ決済情報をお送りしております。お手続き完了次第商品を発送致します。</p>
               <a href="/">商品一覧へ</a>
           </div>

           </div>
       </div>
   </div>
</div>
@endsection
