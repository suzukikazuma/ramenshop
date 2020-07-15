@extends("layouts.app")

@section("content")
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:black; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                   
                   @foreach($stocks as $stock)
                   
                    <div class="col-sm-12 col-md-4">
                     <div class="mycart_box" style="color:#4c4c4c; margin-top:24px;padding:24px 8px; font-size:1.1em;background-color:#fefefe;">
                      <div style="text-align:center; font-weight:bold;">{{$stock->name}} <br></div>
                      <div style="text-align:center;">{{$stock->price}}円<br></div>
                      <img src="/image/{{$stock->imgpath}}" alt="" class="incart" style="height: 100%; object-fit: cover; width: 100%;display:block;">
                      
                       <div style="text-align:center;margin:15px;"><form action="mycart" method="post">
                             @csrf
                                <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                <input type="submit" value="カートに入れる">
                       </form></div>
                     </div>
                    <br>
                    </div>

                   @endforeach
                 </div>
               <div class="text-center" style="width: 200px;margin: 20px auto;">
               {{  $stocks->links()}} 
               </div>
           </div>
       </div>
   </div>
</div>


@endsection