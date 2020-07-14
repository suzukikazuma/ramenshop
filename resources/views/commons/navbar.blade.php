<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">RAMEN SHOP</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="nav navbar-nav navbar-right">
                    {{-- ユーザ登録ページへのリンク --}}
                    <li>{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li><a href="#">Login</a></li>
                </ul>
        </div>
    </nav>
</header>