<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('title') | OIC PIZZA</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="/js/common/util.js" charset="utf-8"></script>
        <script src="/js/common/main.js" charset="utf-8"></script>
        <link rel="stylesheet" href="/plug/fontawesome/css/font-awesome.min.css" media="screen" title="no title">
        <link rel="stylesheet" href="/css/common/reset.css" media="all" title="no title">
        <link rel="stylesheet" href="/css/common/main.css" media="all" title="no title">
        @yield('css')
        @yield('plug')
    </head>
    <body id="app">
        <div id="loading">
            <div class="inner">
                <div class="sk-cube-grid">
                  <div class="sk-cube sk-cube1"></div>
                  <div class="sk-cube sk-cube2"></div>
                  <div class="sk-cube sk-cube3"></div>
                  <div class="sk-cube sk-cube4"></div>
                  <div class="sk-cube sk-cube5"></div>
                  <div class="sk-cube sk-cube6"></div>
                  <div class="sk-cube sk-cube7"></div>
                  <div class="sk-cube sk-cube8"></div>
                  <div class="sk-cube sk-cube9"></div>
                </div>
                <span>Now Loading..</span>
            </div>
        </div>
        <div id="info">
            <div class="wrap">
            @if (Auth::guest())
                <a href="/login"><i class="fa fa-lock" aria-hidden="true"></i>ログイン</a>
                <a href="/register">新規会員登録</a>
                @else
                <div id="mypage">
                    <a href="/mypage/order/history"><i class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }} 様</a>
                    <div class="list">
                        <ul>
                            <li><a href="/mypage/detail">会員情報確認</a></li>
                            <li><a href="/mypage/edit?">会員情報更新</a></li>
                            <li><a href="/mypage/order/history">注文履歴</a></li>
                        </ul>
                    </div>
                </div>

                <a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-unlock-alt" aria-hidden="true"></i>ログアウト</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                @endif
            </div>
        </div>
        <header id="header">
            <div class="wrap">
                <h1><a href="/"><img src="/images/common/logo.png" alt="OIC PIZZA" /></a></h1>
                <nav id="gNav">
                    <ul>

                        <li id="gTop"><a href="/">TOP</a></li>
                        <li id="gMenu"><a href="/menu">MENU</a></li>
                        <li id="gTopics"><a href="/topic">TOPICS</a></li>
                        <li id="gContact"><a href="/contact">CONTACT</a></li>
                        <li id="cart"><a href="/cart">
                            <div id="cartCount"></div>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        <li id="gMenubar"><i class="fa fa-bars" aria-hidden="true"></i></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div id="spMenu">
            <div class="inner">
                <ul>
                    <li><a href="/"><span><i class="fa fa-home" aria-hidden="true"></i><br>TOP</span></a></li>
                    <li><a href="/menu"><span><i class="fa fa-list-alt" aria-hidden="true"></i><br>MENU</span></a></li>
                    <li><a href="#"><span><i class="fa fa-th-list" aria-hidden="true"></i><br>TOPICS</span></a></li>
                    <li><a href="/contact"><span><i class="fa fa-envelope-o" aria-hidden="true"></i><br>CONTACT</span></a></li>
                </ul>
            </div>
        </div>

        <main id="main">
            <div class="container">
                @yield('main')
            </div>
        </main>

        <div id="arrow"><a href="#app"><i class="fa fa-chevron-up" aria-hidden="true"></i></a></div>
        <footer id="footer">
            <div class="wrap container">
                <div class="nav">
                    <ul>
                        <li><a href="/company">会社概要</a></li>
                        <li><a href="/privacypolicy">個人情報保護方針</a></li>
                        <li><a href="/agreement">会員規約</a></li>
                        <li><a href="/faq">よくある質問</a></li>
                        <li><a href="/contact">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <div id="copyright">
            Copyright (c) 2016 Copyright Holder All Rights Reserved.
        </div>
        @yield('script')
    </body>
</html>
