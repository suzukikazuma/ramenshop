<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger"  >
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">RAMEN SHOP</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
        <ul class="navbar-nav mr-auto"></ul>
           <ul class="nav navbar-nav navbar-right" >
                @if (Auth::check())
                            {{-- ログアウトへのリンク --}}
                    {{--<li><a href="mycart"><img src="{{ asset("image/cart.jpeg") }}" style="width:30px;"></a></li>--}}
                    <li>{!! link_to_route("about","RAMEN SHOPについて",[], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route("/", "商品一覧へ",[], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route("mycart", "カート",[], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link ']) !!}</li>
                @else
                    <li>{!! link_to_route("about","RAMEN SHOPについて",[], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route("/", "商品一覧へ",[], ['class' => 'nav-link']) !!}</li>
                    {{-- ユーザ登録ページへのリンク --}}
                    <li>{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>