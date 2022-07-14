<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/favicon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/favicon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/favicon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/favicon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/favicon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/favicon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/favicon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon/favicon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="/img/favicon/favicon-144x144.png">
    <meta name="theme-color" content="#000000">
</head>
<body>
    <div class="fog fog--one"></div>
    <div class="fog fog--two"></div>

    <main class="wrapper" id="app">
        <header class="header">
            <div class="header__logo">
                <router-link to="/" class="header__logo__official">
                    <img src="/img/logo.png" alt="Ragnarok" title="Ragnarok">
                </router-link>

                <span class="header__logo__version" >{{ __('common.app.version', [ 'rules' => '3.0' ] ) }}</span>
            </div>
        </header>

        <nav class="nav">
            <ul class="nav__languages">
                @foreach ( config('app.authorized_locales') as $locale )
                    @if ( App::getLocale() === $locale )
                        <li><span>{{ ucfirst( $locale ) }}</span></li>
                    @else
                        <li><a href="{{ route('get.index', [ $locale ]) }}" @if ( $locale !== 'fr' ) class="is-disabled" @endif>{{ ucfirst( $locale ) }}</a></li>
                    @endif
                @endforeach
            </ul>
        </nav>

        <div class="body loading">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>

        <footer class="footer">
            <div class="footer__left">
                <r-animation-link class="footer__animation-link">{{ __('common.app.animation') }}</r-animation-link>

                <r-music-player class="footer__music-player">{{ __('common.app.music') }}</r-music-player>
            </div>


            <div class="footer__right">
                <router-link to="/credits">{{ __('common.app.credits') }}</router-link>

                <span>-</span>

                <a href="https://github.com/anthonypauwels/ragnarok" target="_blank" rel="noreferrer nofollow">Github</a>

                <span>-</span>

                <a href="https://anthonypauwels.be/" class="footer__copyright" target="_blank" rel="noreferrer nofollow" title="{{ __('common.app.copyright') }} Anthony Pauwels">
                    {{ __('common.app.copyright') }} <span>Anthony Pauwels</span>
                </a>
            </div>
        </footer>

        <r-cookie-bar></r-cookie-bar>
    </main>

    <script>
        window.routes = {{ Illuminate\Support\Js::from( export_routes() ) }};
        {!! javascript()->render( false ); !!}
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>