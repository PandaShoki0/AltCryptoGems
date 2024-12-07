<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.seo')
        
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js" id="trading-view-tv"></script>

    <script>
        window.darkMode = "{{ $plat->system->dark_mode ?? 0 }}";
    </script>
    <script>
        function setTheme() {
            if (!('color-theme' in localStorage)) {
                // Set theme from database and save it to local storage
                localStorage.setItem('color-theme', window.darkMode === '1' ? 'dark' : 'light');
            }

            const theme = localStorage.getItem('color-theme');

            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                window.theme = 'dark';
            } else {
                document.documentElement.classList.remove('dark');
                window.theme = 'light';
            }
        }

        setTheme();
    </script>
    
    <script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{ asset('userassets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="#" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link rel="stylesheet" href="{{ asset('css/cryptofont.css?v=878052') }}" />
    <link href="{{ asset('userassets/css/app.min.css?v=695605') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('userassets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" type="text/css" href="/css/custom.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body class="font-sans antialiased text-slate-500 dark:text-slate-400 dashboardBgColor">


    <div id="app"></div>

    <script>
        window.usermenuData = [@json(getUserMenu())]
        window.VUE_APP_I18N_LOCALE = "{{ env('VUE_APP_I18N_LOCALE') ?? null }}";
        window.VUE_APP_I18N_FALLBACK_LOCALE = "{{ env('VUE_APP_I18N_FALLBACK_LOCALE') ?? null }}";
        window.PUSHER_APP_KEY = "{{ env('PUSHER_APP_KEY') ?? null }}";
        window.PUSHER_APP_CLUSTER = "{{ env('PUSHER_APP_CLUSTER') ?? null }}";
        window.gnl = @json($general);
        window.cors = gnl.cors ? gnl.cors : '';
        window.plat = @json(@$plat);
        window.ext = @json(getExts());
        window.provider = '{{ @$provider }}';
        window.providerFutures = "{{ @$providerFutures ?? 'kucoinfutures' }}";
        window.tradingWallet = '{{ $tradingWallet ?? 1 }}';
        window.siteName = '{{ $siteName }}';
        window.cur_rate = '{{ @$gnl_cur->rate }}';
        window.cur_symbol = '{{ @$gnl_cur->code }}';
        window.walletconnectid = "{{ env('VUE_APP_WALLET_CONNECT_PROJECT_ID') }}"
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

    <script src="{{ asset('assets/vendor_components/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}"></script>       
    <script src="{{ asset('userassets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @if (@$provider === 'bitget')
        <script type="text/javascript" src="https://cdn.ccxt.com/latest/bitget.min.js"></script>
    @elseif (@$provider === 'binanceus' || @$provider === 'coinbasepro' || @$providerFutures !== null)
        <script type="text/javascript" src="/js/ccxt.browser.js"></script>
    @else
        <script type="text/javascript" src="https://cdn.ccxt.com/latest/{{ @$provider }}.min.js"></script>
    @endif
    @vite('resources/src/user.js')
    @include('partials.notify')

    @if (getScripts()->count() > 0)
        @foreach (getScripts() as $row)
            {!! htmlspecialchars_decode($row->code) !!}
        @endforeach
    @endif

    {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/64d538c094cf5d49dc69acb9/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>     --}}

    
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'f918881d5a8a3e63506f0a64567cfce0d45f81b9';
window.smartsupp||(function(d) {
var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
s=d.getElementsByTagName('script')[0];c=d.createElement('script');
c.type='text/javascript';c.charset='utf-8';c.async=true;
c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
        <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
</body>

</html>
