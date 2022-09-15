<header>
    <div class='fixed-top'>
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
            <div class='container-fluid'>
                <ul class='navbar-nav'>
                    @guest
                        <li class='nav-item'><a class='nav-link' href='/signup'>サインアップ</a></li>
                    @endguest
                    @guest
                        <li class='nav-item'><a class='nav-link' href='/login'>ログイン</a></li>
                    @endguest
                    @auth
                        <li class='nav-item'><a class='nav-link' href='/logout'>ログアウト</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
