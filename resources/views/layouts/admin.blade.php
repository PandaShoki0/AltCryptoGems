<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.seo')
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
    <style>
    .tile {
        background: unset !important;
    }
    .table-striped>tbody>tr:nth-of-type(odd) {
    --bs-table-accent-bg: unset !important;
        color: var(--bs-table-striped-color);
    }
    .table {
    --bs-table-striped-bg: unset !important;
    --bs-table-active-bg: unset !important;
    --bs-table-hover-bg: unset !important;
    }
    </style>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <link href="{{ asset('userassets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    @yield('page-style')
    @livewireStyles

    @php
        getAdminMenu();
        // getUserMenu();
    @endphp
</head>

<body class="font-sans antialiased dashboardBgColor text-slate-500 dark:text-slate-400">

    <div class="min-h-screen overflow-x-hidden" x-data="{
        sidebarCollapsed: $persist(true),
        sidebarHover: false,
        sidebarMobile: false,
    }">

        @include('panels.navigation-menu')

        <div id="app-content" class="flex overflow-hidden">

            @include('panels.sidebar-menu')
            <div id="main-content" class="relative mb-10 h-full w-full overflow-y-auto duration-300 lg:ml-[4rem]" style="padding: 1.25rem;"
                :class="{
                    'sidebar-main-expanded':
                        !sidebarCollapsed ||
                        (sidebarCollapsed && sidebarHover) ||
                        sidebarMobile,
                }">
                @if (Request::is('admin**') && !Request::is('admin/template/index') && !Request::is('admin/multiple-signals') && !Request::is('admin/trade-categories') && !Request::is('admin/coin-pairs'))
                    @include('partials.breadcrumb')
                @endif
                @yield('vendor-scripts')
                @yield('content')
            </div>

        </div>

        @include('panels.footer-menu')

        {{-- @include('partials.cookie') --}}
        @include('partials.notify')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @stack('modals')
        @yield('dropdowns')
        @stack('tooltips')
    </div>
    @vite(['resources/js/app.js'])
    @yield('page-scripts')

@if (session('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
<script type="text/javascript">
@if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>

    @if (getScripts()->count() > 0)
        @foreach (getScripts() as $row)
            {!! htmlspecialchars_decode($row->code) !!}
        @endforeach
    @endif

    @livewireScripts
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
    </script> --}}

    
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
