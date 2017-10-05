<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charSet="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Pokaż swój pomysł, by stać się legendą  i wygraj 10 000 zł, lub odbierz golarkę podróżną za każdy zakup!"/>
    <meta name="keywords" content="Remington, konkurs, promocja, golarka, trymer, golarka podróżna, stylizacja brody"/>

{{--    <!--Facebook Like Button OpenGraph Settings Start-->--}}

{{--    <meta property="og:type" content="website"/>--}}

{{--    {if $app}--}}

{{--    {if $us->isSSL()}--}}
{{--    <meta property="og:url" content="{$smarty.const.CANONICAL_URL_HTTPS}/zgloszenie/id,{$app.id}"/>--}}
{{--    {else}--}}
{{--    <meta property="og:url" content="{$smarty.const.CANONICAL_URL}/zgloszenie/id,{$app.id}"/>--}}
{{--    {/if}--}}

{{--    {if $app.fotoimg}--}}
{{--    <meta property="og:image" content="{$smarty.const.CANONICAL_URL}{$smarty.const.CSS_UP_DIR}/tip/330x330-{$app.fotoimg}"/>--}}
{{--    {else}--}}
{{--    {if $app.video_type eq 1}--}}
{{--    <meta property="og:image" content="https://img.youtube.com/vi/{$app.video_image_id}/default.jpg"/>--}}
{{--    {/if}--}}
{{--    {if $app.video_type eq 2}--}}
{{--    <meta property="og:image" content="https://i.vimeocdn.com/video/{$app.video_image_id}_640.jpg"/>--}}
{{--    {/if}--}}
{{--    {if $app.video_type eq 3}--}}
{{--    <meta property="og:image" content="https://graph.facebook.com/{$app.video_image_id}/picture"/>--}}
{{--    {/if}--}}
{{--    {/if}--}}
{{--    <meta property="og:image:width" content="330" />--}}
{{--    <meta property="og:image:height" content="330" />--}}

{{--    <meta property="fb:app_id" content="869984166500416" />--}}

{{--    <meta property="og:site_name" content="{$app.title}"/>--}}
{{--    <meta property="og:title" content="{$app.title}"/>--}}
{{--    <meta name="dcterms.Title" content="{$app.title}" />--}}
{{--    <meta name="dcterms.Subject" content="{$app.title}" />--}}

{{--    <meta property="og:description" content="{$app.message}" />--}}

{{--    {else}--}}

{{--    {if $us->isSSL()}--}}
{{--    <meta property="og:url" content="{$smarty.const.CANONICAL_URL_HTTPS}"/>--}}
{{--    {else}--}}
{{--    <meta property="og:url" content="{$smarty.const.CANONICAL_URL}"/>--}}
{{--    {/if}--}}

{{--    <!--<meta property="og:image" content="{$smarty.const.CANONICAL_URL}{$smarty.const.CSS_UP_DIR}/tip/330x330-{$app.fotoimg}"/>-->--}}

{{--    <meta property="og:image" content="{$smarty.const.CANONICAL_URL}{$smarty.const.CSS_IMG_DIR}/kv-men.jpg"/>--}}

{{--    <meta property="og:image:width" content="330" />--}}
{{--    <meta property="og:image:height" content="330" />--}}

{{--    <meta property="fb:app_id" content="760216744164895" />--}}

{{--    <meta property="og:site_name" content="Zostań legendą i wygraj 10 000 zł!"/>--}}
{{--    <meta property="og:title" content="Zostań legendą i wygraj 10 000 zł!"/>--}}
{{--    <meta name="dcterms.Title" content="Zostań legendą i wygraj 10 000 zł!" />--}}
{{--    <meta name="dcterms.Subject" content="Zostań legendą i wygraj 10 000 zł!" />--}}

{{--    <meta property="og:description" content="Masz pomysł, jak zostać legendą? Weź udział w konkursie i wygraj 10 000 zł na realizację swojego legendarnego planu! Podziel się nim z nami! Zrób zdjęcie lub nagraj film i przekonaj Jury, że właśnie Twój pomysł powinien zostać zrealizowany." />--}}

{{--    {/if}--}}

{{--    <!--Facebook Like Button OpenGraph Settings End-->--}}

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}" defer></script>
    <script src="{{ asset('js/selectbox/jquery.selectbox-0.2.js') }}" defer></script>
    <script src="{{ asset('js/owl/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/jkit/jquery.jkit.1.2.16.js') }}" defer></script>
    <script src="{{ asset('js/slidepushmenu/classie.js') }}" defer></script>
    <script src="{{ asset('js/slidepushmenu/modernizr.custom.js') }}" defer></script>
    <script src="{{ asset('js/mcustomscrollbar/jquery.mCustomScrollbar.js') }}" defer></script>
    <script src="{{ asset('js/starter.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <script src="https://use.typekit.net/ule5nuh.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/hover-min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/rabbits.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/selectbox/jquery.selectbox.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/owl/owl.carousel.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/owl/owl.theme.default.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/mcustomscrollbar/jquery.mCustomScrollbar.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/hamburger/hamburgers.min.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/starter.css') }}" type="text/css">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">



{{--    <script type="text/javascript">--}}
{{--        {if $us->isSSL()}--}}
{{--        var url_home = '{$smarty.const.CANONICAL_URL_HTTPS}';--}}
{{--        {else}--}}
{{--        var url_home = '{$smarty.const.CANONICAL_URL}';--}}
{{--        {/if}--}}
{{--    </script>--}}
</head>

@isset($include_body_class)
    <body class="cbp-spmenu-push {{ $include_body_class }}">
@else
    <body class="cbp-spmenu-push">
@endisset



    <div class="loader" id="loader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>

    <section class="top" id="top">
        <div class="container">
            <nav id="site-navigation" class="main-navigation">
                <div class="xs-container sm-container">
                    <a href="/" class="navbar-brand">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </a>

                    <button class="hamburger hamburger--collapse hidden-md hidden-lg pull-right" type="button">
				  <span class="hamburger-box">
				    <span class="hamburger-inner"></span>
				  </span>
                    </button>
                </div>
                <div class="menu-container">
                    <ul class="nav navbar-nav menu nav-menu pull-right">
                        <li><a href="/nagrody/" role="presentation" data-href="#prizes">nagrody</a></li>
                        <li><a href="/wez-udzial/" role="presentation" data-href="#take">weź udział</a></li>
                        <li><a href="/zgloszenia-tygodnia/" role="presentation" data-href="#week">zgloszenia tygodnia</a></li>
                        <li><a href="/zgloszenia/" role="presentation" data-href="#applications">zgłoszenia</a></li>
                        <li><a href="/nasze-produkty/" role="presentation" data-href="#products">produkty</a></li>
                        <li><a href="/kontakt/" role="presentation" data-href="#contact">kontakt</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>

    @yield('content')

    <section class="partner buy" id="partner">
        <div class="wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.euro.com.pl/" title="KUP TERAZ" data-shop="3" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.oleole.pl/" title="KUP TERAZ" data-shop="4" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.mediaexpert.pl/" title="KUP TERAZ" data-shop="11" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.electro.pl/" title="KUP TERAZ" data-shop="12" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.avans.pl/" title="KUP TERAZ" data-shop="13" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://mediamarkt.pl/" title="KUP TERAZ" data-shop="2" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://saturn.pl/" title="KUP TERAZ" data-shop="1" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://www.neonet.pl/" title="KUP TERAZ" data-shop="8" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.neo24.pl/" title="KUP TERAZ" data-shop="9" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://allegro.pl/listing/user/listing.php?us_id=1680&id=67418" title="KUP TERAZ" data-shop="19" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.komputronik.pl/" title="KUP TERAZ" data-shop="20" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://www.al.to/" title="KUP TERAZ" data-shop="23" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.emag.pl/" title="KUP TERAZ" data-shop="5" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://www.morele.net/" title="KUP TERAZ" data-shop="6" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://agdwarszawa.pl/" title="KUP TERAZ" data-shop="7" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://mediadomek.pl/" title="KUP TERAZ" data-shop="10" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://selgros24.pl/" title="KUP TERAZ" data-shop="14" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.zakupy-eleclerc.pl/" title="KUP TERAZ" data-shop="15" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://www.payback.pl" title="KUP TERAZ" data-shop="16" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.zadowolenie.pl/" title="KUP TERAZ" data-shop="17" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.kakto.pl/" title="KUP TERAZ" data-shop="18" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://strefa.enea.pl/" title="KUP TERAZ" data-shop="21" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://sklep.energa.pl/" title="KUP TERAZ" data-shop="22" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://mambonus.pl/" title="KUP TERAZ" data-shop="24" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.mycenter.pl/" title="KUP TERAZ" data-shop="25" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="https://redcoon.pl/" title="KUP TERAZ" data-shop="26" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://www.juka.pl/" title="KUP TERAZ" data-shop="27" class="shop" target="_blank"></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="shop-content">
                            <a href="http://partneragdrtv.com.pl/" title="KUP TERAZ" data-shop="28" class="shop" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center social">
                <a href="Https://www.facebook.com/Remington-dla-M%C4%99%C5%BCczyzn-1569625203326882/?fref=ts" title="facebook.com" class="b1"></a>
                <a href="http://instagram.com/RemingtonStyle" title="instagram.com" class="b2"></a>
                <a href="http://www.pinterest.com/RemingtonPolska/" title="printerest.com" class="b3"></a>
                <a href="http://www.youtube.com/user/remingtonpolska" title="youtube.com" class="b4"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12 text-center copy">
                <p>© 2017 REMINGTON Polska <br />ul. Bitwy Warszawskiej 1920 r. 7A <br />Warszawa 02-366</p>
                <p><a href="/polityka-prywatnosci/" title="polityka prywatnosci">polityka prywatności</a></p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
