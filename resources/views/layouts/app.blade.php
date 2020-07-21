<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>RAMEN SHOP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>
    
    <body style="background-color:#FFFAF0; min-height:100vh; box-sizing: border-box; position: relative;padding-bottom:160px;">

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
        
        <footer style="background-color:#DC3545;  width:100%; position: absolute; bottom: 0; text-align: center;">
      
           <p style="font-size:0.5em; line-height:50px">©︎ 2020 ramen</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
