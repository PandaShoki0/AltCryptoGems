@extends('frontends.liquid-vestor.custom_layout')
@section('content')

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

<style>
    .active {
        background-color: #fff !important;
        color: #000;
        --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 4px 6px -1px #0000001a, 0 2px 4px -2px #0000001a;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        /* or any active state color */
    }

    .dark .wallet-icon svg {
        fill: #fff !important;
    }

    .wallet-icon svg {
        fill: #000 !important;
    }

    .bg-dot-light {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='16' height='16' fill='none'%3e%3ccircle fill='rgb(0 0 0 / 0.2)' id='pattern-circle' cx='10' cy='10' r='1.6257413380501518'%3e%3c/circle%3e%3c/svg%3e");

    }

    .bg-dot-light .main-div {
        -webkit-mask-image: radial-gradient(ellipse at center, transparent 20%, black);
        mask-image: radial-gradient(ellipse at center, transparent 20%, black);
    }

    /* Dark mode background */
    .dark .bg-dot-dark {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='16' height='16' fill='none'%3e%3ccircle fill='rgb(255 255 255 / 0.2)' id='pattern-circle' cx='10' cy='10' r='1.6257413380501518'%3e%3c/circle%3e%3c/svg%3e");
    }



    .explore .explore-title {
        font-size: 40px;
        font-weight: bold;
        line-height: 56px;
    }

    .explore .explore-label {
        margin: 14px 0 59px;
        font-size: 18px;
        line-height: 25px;
    }

    .explore .explore-content {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        margin: auto;
    }

    .explore .explore-content>div {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 26px 32px 32px 26px;
        width: 360px;
        border: 1px solid;
        border-color: #EEEEEE;
        border-radius: 20px;
        position: relative;
    }

    .explore .explore-content>div:hover {
        cursor: pointer;
        border-color: #262626;
    }

    .explore .explore-content>div:hover>.more {
        -webkit-transform: scale(1.3);
        transform: scale(1.3);
        color: #557BFA;
    }

    .explore .explore-content>div>img {
        width: 74px;
        height: 74px;
    }

    .explore .explore-content>div>.title-box {
        min-height: 160px;
    }

    .explore .explore-content>div>.title-box>.title {
        margin-top: 32px;
        font-size: 20px;
        font-weight: bold;
        line-height: 28px;
    }

    .explore .explore-content>div>.title-box>.label {
        margin-top: 10px;
        line-height: 24px;
    }

    /* my code  */


    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .explore .explore-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .explore .explore-content>div {
            width: 100%;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .explore .explore-content>div>.title-box {
            min-height: auto;
            padding: 15px;
        }

        .explore .explore-content>div>.title-box>.title {
            font-size: 18px;
            margin-top: 20px;
        }

        .explore .explore-content>div>.title-box>.label {
            font-size: 14px;
            line-height: 20px;
        }

        .explore .explore-content>div .more {
            font-size: 16px;
            margin-top: 15px;
        }
    }



    /* till */

    .explore .explore-content>div>.more {
        -webkit-transition: -webkit-transform 0.4s;
        transition: -webkit-transform 0.4s;
        transition: transform 0.4s;
        transition: transform 0.4s, -webkit-transform 0.4s;
        text-align: right;
        font-size: 14px;
        position: absolute;
        right: 32px;
        bottom: 12px;
    }

    .explore .explore-content>div>.more>i {
        margin-left: 5px;
    }

    .tokenicon-image {
        display: block;
        position: relative;
        overflow: hidden;
        text-align: center;
        height: auto;
        width: 35px;
    }

    .tokenicon-image.default {
        display: flex;
        flex-direction: row;
        justify-items: center;
        justify-content: center;
        border-radius: 100%;
        letter-spacing: -1px;
        width: 35px;
        line-height: 35px;
        transform: rotate(-25deg);
    }

    .text-danger polyline {
        stroke: #d92626;
    }

    polyline {
        stroke: #789;
    }

    .chakra-link, .css-1vvtfcp {
        display: none !important;
    }
    iframe .tradingview-widget-copyright {
        display: none !important ;
    }
</style>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>


<div
    class=" top-navigation-wrapper relative min-h-screen transition-all duration-300 dark:bg-muted-950/[0.96] pt-16 lg:pt-4 pb-20  bg-white/[0.96] !pb-0 !pe-0 !pt-0">
    <div class="mx-auto flex h-full min-h-screen flex-col [&amp;>div]:h-full [&amp;>div]:min-h-screen">
        <div class="">
            <section
                class="w-full dark:bg-black bg-white flex flex-col md:flex-row bg-dot-light bg-dot-dark items-center justify-center md:h-auto relative">
                <div
                    class="absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
                </div>
                <div class="max-w-7xl relative pt-12 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <div class="grid lg:grid-cols-2 gap-12 :dark:text-white">
                        <div class="text-center md:text-left flex flex-col justify-center">
                            <h1 class="text-6xl md:text-8xl lg:text-10xl font-bold text-muted-800 dark:text-muted-200"
                                style="opacity: 1; transform: none;">Find the Next <span
                                    class="bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">Crypto
                                    Gem</span>
                                on AltCryptoGems</h1>
                            <br>
                            <p class="mt-4 text-lg md:text-xl text-muted-600 dark:text-muted-400"
                                style="opacity: 1; transform: none;">We provide the latest information on the best
                                cryptocurrencies to
                                invest in.</p>
                            <!-- <p class="mt-4 text-lg md:text-xl text-muted-600 dark:text-muted-400"
                                style="opacity: 1; transform: none;">Welcome back</p> -->
                                <div  class="notlogin-content mt-4 justify-center  md:justify-start" style="display:flex">
                                    <div  class="input-name el-input">
                                        <input type="text" id="registerUsername" autocomplete="off" placeholder="Email/Mobile Number" class="rounded-3xl h-14 p-1 py-2 mr-4 border border-black dark:border-white text-white dark:text-black">
                                    </div>
                                    <div  class="go-register less-btn2 dark:text-white text-black border border-black dark:border-white px-8 py-2 rounded-lg cursor-pointer" onClick="redirectToRegister()">
                                            <span  class="text">Register now</span>
                                    </div>
                                </div>
                        </div>
                        <div class="w-full h-[20rem] sm:h-[30rem] lg:h-[35rem] overflow-hidden rounded-lg"
                            style="perspective: 700px;">
                            <div class="grid grid-cols-3 gap-12 w-[60rem] sm:w-[80rem] lg:w-[50rem] h-[55rem] md:h-[90rem] lg:h-[75rem] overflow-hidden origin-[50%_0%]"
                                style="transform: translate3d(7%, -2%, 0px) scale3d(0.9, 0.8, 1) rotateX(15deg) rotateY(-9deg) rotateZ(32deg);">
                                <div class="grid gap-9 w-full h-[440px] animation-sliding-img-up-1"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/6.webp" alt="Image 1"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/6.webp" alt="Image 1"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/13.webp" alt="Image 2"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/13.webp" alt="Image 2"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/9.webp" alt="Image 3"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/9.webp" alt="Image 3"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/16.webp" alt="Image 4"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/16.webp" alt="Image 4"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/6.webp" alt="Image 5"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/6.webp" alt="Image 5"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/13.webp" alt="Image 6"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/13.webp" alt="Image 6"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/9.webp" alt="Image 7"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/9.webp" alt="Image 7"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/16.webp" alt="Image 8"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/16.webp" alt="Image 8"></div>
                                <div class="grid gap-9 w-full h-[440px] animation-sliding-img-down-1"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/10.webp" alt="Image 1"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/10.webp" alt="Image 1"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/7.webp" alt="Image 2"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/7.webp" alt="Image 2"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/11.webp" alt="Image 3"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/11.webp" alt="Image 3"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/14.webp" alt="Image 4"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/14.webp" alt="Image 4"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/12.webp" alt="Image 5"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/12.webp" alt="Image 5"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/5.webp" alt="Image 6"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/5.webp" alt="Image 6"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/10.webp" alt="Image 7"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/10.webp" alt="Image 7"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/7.webp" alt="Image 8"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/7.webp" alt="Image 8"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/11.webp" alt="Image 9"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/11.webp" alt="Image 9"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/14.webp" alt="Image 10"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/14.webp" alt="Image 10"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/12.webp" alt="Image 11"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/12.webp" alt="Image 11"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/5.webp" alt="Image 12"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/5.webp" alt="Image 12"></div>
                                <div class="grid gap-9 w-full h-[440px] animation-sliding-img-up-2"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/1.webp" alt="Image 1"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/1.webp" alt="Image 1"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/4.webp" alt="Image 2"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/4.webp" alt="Image 2"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/8.webp" alt="Image 3"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/8.webp" alt="Image 3"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/15.webp" alt="Image 4"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/15.webp" alt="Image 4"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/2.webp" alt="Image 5"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/2.webp" alt="Image 5"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/1.webp" alt="Image 6"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/1.webp" alt="Image 6"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/4.webp" alt="Image 7"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/4.webp" alt="Image 7"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/8.webp" alt="Image 8"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/8.webp" alt="Image 8"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/15.webp" alt="Image 9"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/15.webp" alt="Image 9"><img
                                        class="w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:hidden border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero/2.webp" alt="Image 10"><img
                                        class="hidden w-full object-cover shadow-lg rounded-lg dark:shadow-neutral-900/80 dark:block border border-muted-200 dark:border-muted-800   hover:border hover:border-primary-500 dark:hover:border dark:hover:border-primary-400 transition-all duration-300"
                                        src="/assets/frontends/home/hero-dark/2.webp" alt="Image 10"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto dark:bg-black bg-white bg-dot-light bg-dot-dark dark:bg-dot-white/[0.1] bg-dot-black/[0.1] relative">
                <div
                    class="main-div absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_70%,black)]">
                </div>
                <div class="max-w-7xl relative pt-6 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <div class="grid items-center lg:grid-cols-12 gap-6 lg:gap-12">
                        <div class="lg:col-span-4">
                            <div class="lg:pe-6 xl:pe-12 flex flex-col items-center lg:items-start">
                                <p class="text-6xl font-bold leading-10 text-blue-600"
                                    style="opacity: 1; transform: none;">92%<span
                                        class="ms-1 inline-flex items-center gap-x-1 bg-gray-200 font-medium text-gray-800 text-xs leading-4 rounded-full py-0.5 px-2 dark:bg-neutral-800 dark:text-neutral-300"><svg
                                            class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z">
                                            </path>
                                        </svg>+7% this month</span></p>
                                <p class="mt-2 sm:mt-3 text-gray-500 dark:text-neutral-500"
                                    style="opacity: 1; transform: none;">of
                                    users have traded cryptocurrencies using our platform</p>
                            </div>
                        </div>
                        <div
                            class="lg:col-span-8 relative lg:before:absolute lg:before:top-0 lg:before:-start-12 lg:before:w-px lg:before:h-full lg:before:bg-gray-200 lg:before:dark:bg-neutral-700">
                            <div class="grid gap-6 grid-cols-2 md:grid-cols-4 lg:grid-cols-3 sm:gap-8">
                                <div class="text-center" style="opacity: 1; transform: none;">
                                    <p class="text-3xl font-semibold text-blue-600">99.95%</p>
                                    <p class="mt-1 text-gray-500 dark:text-neutral-500">successful transactions</p>
                                </div>
                                <div class="text-center" style="opacity: 1; transform: none;">
                                    <p class="text-3xl font-semibold text-blue-600">2,000+</p>
                                    <p class="mt-1 text-gray-500 dark:text-neutral-500">cryptocurrencies supported</p>
                                </div>
                                <div class="text-center" style="opacity: 1; transform: none;">
                                    <p class="text-3xl font-semibold text-blue-600">85%</p>
                                    <p class="mt-1 text-gray-500 dark:text-neutral-500">customer satisfaction rate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="currency-list-chart"
                class="w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto dark:bg-black bg-white bg-dot-light bg-dot-dark dark:bg-dot-white/[0.1] bg-dot-black/[0.1] relative">
                <div
                    class="main-div absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_70%,black)]">
                </div>
                <div class="max-w-7xl relative pt-6 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <script src="https://price-static.crypto.com/latest/public/static/widget/index.js"></script> <div id="crypto-widget-CoinBlocks" data-transparent="true" data-design="classic" data-coin-ids="382,166,136,418,1120,29,1986"></div>
                </div>
                
            </section>
            <section id="currency-list"
                class="w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto dark:bg-black bg-white bg-dot-light bg-dot-dark dark:bg-dot-white/[0.1] bg-dot-black/[0.1] relative">
                <div
                    class="main-div absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_70%,black)]">
                </div>
                <div class="max-w-7xl relative pt-6 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <!-- <div class="card relative overflow-x-auto" id="market-table">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead>
                                <tr
                                    class="bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                    <th scope="col" class="px-6 py-3" style="width: 15%;">Symbol</th>
                                    <th scope="col" class="px-6 py-3" style="width: 20%;">Price</th>
                                    <th scope="col" class="px-6 py-3" style="width: 25%;">Change</th>
                                    <th scope="col" class="px-6 py-3"></th>
                                    <th scope="col" class="px-6 py-3" style="width: 25%;">Volume</th>
                                    <th scope="col" class="px-6 py-3" style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="market-data">
                                
                            </tbody>
                        </table>
                    </div> -->
                    <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                        {
                        "height": 490,
                        "defaultColumn": "overview",
                        "screener_type": "crypto_mkt",
                        "displayCurrency": "USD",
                        "colorTheme": "dark",
                        "locale": "in"
                        }
                        </script>
                        </div>
<!-- TradingView Widget END -->
                </div>


            </section>
            <section id="trading-experiance"
                class="bg-dot-light bg-dot-dark w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto dark:bg-black bg-white dark:bg-dot-white/[0.2] bg-dot-black/[0.2] relative">
                <div
                    class="main-div absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
                </div>
                <div class="max-w-7xl relative p-6 md:p-16 px-4 sm:px-6 lg:px-8 mx-auto">
                    <div class="relative z-10 lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
                        <div class="mb-10 lg:mb-0 lg:col-span-6 lg:col-start-8 lg:order-2">
                            <h2 class="text-2xl text-muted-800 font-bold sm:text-3xl dark:text-muted-200">Make the most
                                of your
                                trading experience</h2>
                            <nav class="grid gap-4 mt-5 md:mt-10 dark:text-white" aria-label="Tabs" role="tablist">
                                <button type="button"
                                    class=" border-transparent dark:bg-muted-800 text-start p-4 md:p-5 rounded-xl active"
                                    id="tabs-with-card-item-0" data-hs-tab="#tabs-with-card-0"
                                    aria-controls="tabs-with-card-0" role="tab" style="opacity: 1; transform: none;">
                                    <span class="flex">
                                        <!-- SVG icon here -->
                                        <svg class="flex-shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-muted-800 dark:hs-tab-active:text-blue-500 dark:text-muted-200"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path>
                                            <path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path>
                                            <path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path>
                                            <path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path>
                                            <path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"></path>
                                        </svg>
                                        <span class="grow ms-6">
                                            <span class="block text-lg font-semibold">Advanced Charting Tools</span>
                                            <span class="block mt-1">Utilize sophisticated charting tools...</span>
                                        </span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="hover:bg-muted-200 dark:hover:bg-muted-800 text-start p-4 md:p-5 rounded-xl"
                                    id="tabs-with-card-item-1" data-hs-tab="#tabs-with-card-1"
                                    aria-controls="tabs-with-card-1" role="tab" style="opacity: 1; transform: none;">
                                    <span class="flex">
                                        <svg class="flex-shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-muted-800 dark:hs-tab-active:text-blue-500 dark:text-muted-200"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m12 14 4-4"></path>
                                            <path d="M3.34 19a10 10 0 1 1 17.32 0"></path>
                                        </svg>
                                        <!-- SVG icon here -->
                                        <span class="grow ms-6">
                                            <span class="block text-lg font-semibold">Real-Time Market Data</span>
                                            <span class="block mt-1">Stay ahead with real-time updates...</span>
                                        </span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="hover:bg-muted-200 dark:hover:bg-muted-800 text-start p-4 md:p-5 rounded-xl"
                                    id="tabs-with-card-item-2" data-hs-tab="#tabs-with-card-2"
                                    aria-controls="tabs-with-card-2" role="tab" style="opacity: 1; transform: none;">
                                    <span class="flex">
                                        <!-- SVG icon here -->
                                        <svg class="flex-shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-muted-800 dark:hs-tab-active:text-blue-500 dark:text-muted-200"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z">
                                            </path>
                                            <path d="M5 3v4"></path>
                                            <path d="M19 17v4"></path>
                                            <path d="M3 5h4"></path>
                                            <path d="M17 19h4"></path>
                                        </svg>
                                        <span class="grow ms-6">
                                            <span class="block text-lg font-semibold">Powerful Trading Algorithms</span>
                                            <span class="block mt-1">Deploy advanced trading algorithms...</span>
                                        </span>
                                    </span>
                                </button>
                            </nav>
                        </div>
                        <div class="lg:col-span-6">
                            <div class="relative">
                                <div>
                                    <div id="tabs-with-card-0" role="tabpanel" aria-labelledby="tabs-with-card-item-0"
                                        class="shadow-xl shadow-muted-200 rounded-xl dark:shadow-muted-900/20 "
                                        style="opacity: 1;"><img src="/assets/frontends/home/chart.webp"
                                            alt="Advanced Charting Tools" class="w-full h-auto rounded-xl"></div>
                                    <div id="tabs-with-card-1" role="tabpanel" aria-labelledby="tabs-with-card-item-1"
                                        class="shadow-xl shadow-muted-200 rounded-xl dark:shadow-muted-900/20 hidden"
                                        style="opacity: 0;">
                                        <img src="/assets/frontends/home/markets.webp" alt="Real-Time Market Data"
                                            class="w-full h-auto rounded-xl">
                                    </div>
                                    <div id="tabs-with-card-2" role="tabpanel" aria-labelledby="tabs-with-card-item-2"
                                        class="shadow-xl shadow-muted-200 rounded-xl dark:shadow-muted-900/20 hidden"
                                        style="opacity: 0;">
                                        <img src="/assets/frontends/home/order.webp" alt="Powerful Trading Algorithms"
                                            class="w-full h-auto rounded-xl">
                                    </div>
                                </div>
                                <div class="hidden absolute top-0 end-0 translate-x-20 md:block lg:translate-x-20"><svg
                                        class="w-16 h-auto text-orange-500" width="121" height="135"
                                        viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"></path>
                                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"></path>
                                        <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round"></path>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-0 grid grid-cols-12 size-full">
                        <div
                            class="col-span-full lg:col-span-7 lg:col-start-6 bg-muted-100 w-full h-5/6 rounded-xl sm:h-3/4 lg:h-full dark:bg-muted-900">
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="bg-dot-light bg-dot-dark w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto dark:bg-black bg-white dark:bg-dot-white/[0.2] bg-dot-black/[0.2] relative">
                <div
                    class="absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
                </div>
                <div class="max-w-7xl relative pt-12 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <div>
                        <h1 class="text-6xl md:text-8xl lg:text-10xl font-bold text-muted-800 dark:text-muted-200">
                            Trade cryptocurrencies on AltCryptoGems</h1>
                        <div class="introduce-label text-muted-800 dark:text-muted-200">Focus on asset security,
                            emphasize trading experience</div>
                    </div>
                    <div class="grid lg:grid-cols-2 gap-12" style="padding: 60px 20px;">
                        <div class="text-gray-800 dark:text-white">
                            <div class="p-4 flex">
                                <div>
                                    <h2 class="mt-4 text-lg font-semibold">World-leading</h2>
                                    <p class="mt-2 ">Rich digital assets and derivatives trading, a one-stop digital
                                        asset comprehensive service platform</p>
                                </div>
                            </div>
                            <div class="p-4 flex">
                                <div>
                                    <h2 class="mt-4 text-lg font-semibold ">Stable & Secure</h2>
                                    <p class="mt-2 ">Offline storage, multi-level encryption management, 24/7 protection
                                        of user assets</p>
                                </div>
                            </div>
                            <div class="p-4 flex">
                                <div>
                                    <h2 class="mt-4 text-lg font-semibold">Easy to use</h2>
                                    <p class="mt-2">Trusted by users in multiple countries and regions, multi-language
                                        support, fast and simple digital asset trading anytime, anywhere</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="text-content-wrap">
                                <div class="left-text">
                                    <div class="item dark:text-white wallet-icon"
                                        style="display:flex; justify-content: center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="300px" height="300px"
                                            viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1">
                                            <path
                                                d="M935.974 815.98h-166.006c-11.264 0-25.17-6.514-32.386-15.17l-59.498-71.402c-8.154-9.764-8.154-25.076 0-34.842l59.498-71.402c7.216-8.654 21.124-15.17 32.386-15.17h166.006c13.234 0 23.998 10.766 23.998 23.998v159.99c0 13.234-10.764 23.998-23.998 23.998z m-166.006-191.988c-6.42 0-15.982 4.484-20.108 9.422l-59.496 71.402c-3.188 3.812-3.188 10.532 0 14.344l59.496 71.4c4.124 4.938 13.688 9.422 20.108 9.422h166.006c4.406 0 8-3.594 8-8v-159.99c0-4.406-3.594-8-8-8h-166.006z"
                                                fill="" />
                                            <path
                                                d="M807.982 767.984c-30.874 0-55.996-25.124-55.996-55.996s25.124-55.996 55.996-55.996 55.998 25.124 55.998 55.996-25.124 55.996-55.998 55.996z m0-95.994c-22.06 0-39.998 17.936-39.998 39.998 0 22.06 17.938 39.996 39.998 39.996s39.998-17.936 39.998-39.996c0-22.062-17.938-39.998-39.998-39.998z"
                                                fill="" />
                                            <path
                                                d="M807.982 735.986c-13.232 0-23.998-10.766-23.998-23.998 0-13.234 10.766-24 23.998-24 13.234 0 23.998 10.766 23.998 24 0 13.232-10.764 23.998-23.998 23.998z m0-31.998c-4.404 0-7.998 3.594-7.998 8s3.594 8 7.998 8c4.406 0 8-3.594 8-8s-3.594-8-8-8zM312.49 304.012c-4.414 0-8.078-3.578-8.078-8 0-4.422 3.5-8 7.922-8h0.156a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8zM312.49 272.014c-4.414 0-8.078-3.578-8.078-8 0-4.422 3.5-8 7.922-8h0.156a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8zM312.49 240.016c-4.414 0-8.078-3.578-8.078-8 0-4.422 3.5-8 7.922-8h0.156a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8zM312.49 208.018c-4.414 0-8.078-3.578-8.078-8 0-4.422 3.5-8 7.922-8h0.156a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8zM312.49 176.02c-4.414 0-8.078-3.578-8.078-8 0-4.422 3.5-8 7.922-8h0.156a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8zM312.49 144.022c-4.414 0-8.078-3.578-8.078-8 0-4.422 3.5-8 7.922-8h0.156a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M583.996 352.01c-4.422 0-8-3.578-8-8V79.23c-15.654-3.204-27.996-15.546-31.184-31.202H255.21c-3.188 15.656-15.544 27.998-31.194 31.202v264.78c0 4.422-3.578 8-7.998 8-4.422 0-8-3.578-8-8V72.028c0-4.422 3.578-8 8-8 13.232 0 23.998-10.766 23.998-23.998 0-4.422 3.578-8 8-8h303.98c4.422 0 8 3.578 8 8 0 13.232 10.766 23.998 23.998 23.998 4.422 0 8 3.578 8 8v271.982a7.992 7.992 0 0 1-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M615.994 352.01a7.994 7.994 0 0 1-7.998-8V16.03H192.02v327.98c0 4.422-3.578 8-7.998 8-4.422 0-8-3.578-8-8V8.032c0-4.422 3.578-8 8-8h431.972c4.422 0 8 3.578 8 8v335.978c0 4.422-3.578 8-8 8z"
                                                fill="" />
                                            <path
                                                d="M488.002 320.012c-4.422 0-8-3.578-8-8V120.024c0-4.42 3.578-8 8-8s8 3.578 8 8v191.988c0 4.422-3.578 8-8 8zM440.006 304.012h-79.996c-4.422 0-8-3.578-8-8 0-4.422 3.578-8 8-8h79.996a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8zM416.006 256.016h-31.998c-17.646 0-31.998-14.358-31.998-31.998s14.352-31.998 31.998-31.998h31.998c17.648 0 31.998 14.358 31.998 31.998s-14.35 31.998-31.998 31.998z m-31.998-47.998c-8.818 0-15.998 7.17-15.998 16s7.18 16 15.998 16h31.998c8.82 0 16-7.17 16-16s-7.18-16-16-16h-31.998zM416.006 176.02h-31.998c-17.646 0-31.998-14.358-31.998-31.998s14.352-31.998 31.998-31.998h31.998c17.648 0 31.998 14.358 31.998 31.998s-14.35 31.998-31.998 31.998z m-31.998-47.996c-8.818 0-15.998 7.172-15.998 16s7.18 16 15.998 16h31.998c8.82 0 16-7.172 16-16s-7.18-16-16-16h-31.998z"
                                                fill="" />
                                            <path
                                                d="M376.01 320.012a7.976 7.976 0 0 1-5.656-2.344l-16-16a8 8 0 1 1 11.312-11.312l15.998 16a8 8 0 0 1-5.654 13.656zM440.006 320.012c-4.422 0-8-3.578-8-8v-31.998c0-4.42 3.578-8 8-8a7.994 7.994 0 0 1 7.998 8v31.998c0 4.422-3.578 8-7.998 8zM735.52 352.01c-0.688 0-1.376-0.094-2.062-0.266a7.994 7.994 0 0 1-5.656-9.812l43.714-163.146c-6.984-3.454-12.794-8.89-16.78-15.78-3.984-6.906-5.782-14.656-5.282-22.436l-98.682-26.436a7.994 7.994 0 0 1-5.656-9.812c1.124-4.25 5.562-6.704 9.782-5.656l105.65 28.31c2.062 0.562 3.81 1.89 4.874 3.734s1.344 4.032 0.782 6.078c-1.656 6.202-0.812 12.67 2.39 18.216s8.376 9.5 14.578 11.156a7.986 7.986 0 0 1 5.658 9.812l-45.592 170.114a8.002 8.002 0 0 1-7.718 5.924z"
                                                fill="" />
                                            <path
                                                d="M768.672 352.01c-0.688 0-1.376-0.094-2.062-0.266a7.984 7.984 0 0 1-5.654-9.796L818.78 126.024l-168.006-45.012a7.992 7.992 0 0 1-5.656-9.812c1.124-4.25 5.562-6.704 9.782-5.656l175.738 47.09a7.982 7.982 0 0 1 5.656 9.796l-59.902 223.642c-0.938 3.578-4.188 5.938-7.72 5.938zM903.976 512c-4.422 0-8-3.578-8-8 0-39.7-32.292-71.996-71.994-71.996-4.422 0-8-3.578-8-8 0-4.422 3.578-8 8-8 48.528 0 87.994 39.482 87.994 87.994a7.996 7.996 0 0 1-8 8.002z"
                                                fill="" />
                                            <path
                                                d="M823.982 1023.968H120.026c-4.422 0-8-3.578-8-8s3.578-8 8-8h703.958c39.702 0 71.994-32.292 71.994-71.994 0-4.422 3.578-8 8-8s8 3.578 8 8c-0.002 48.512-39.468 87.994-87.996 87.994z"
                                                fill="" />
                                            <path
                                                d="M903.976 441.348c-4.422 0-8-3.578-8-8v-25.342c0-39.7-32.292-71.996-71.994-71.996-4.422 0-8-3.578-8-8 0-4.422 3.578-8 8-8 48.528 0 87.994 39.482 87.994 87.994v25.342a7.996 7.996 0 0 1-8 8.002z"
                                                fill="" />
                                            <path
                                                d="M120.026 432.004c-30.874 0-55.998-25.124-55.998-55.998 0-4.42 3.578-8 8-8s8 3.578 8 8c0 22.062 17.944 39.998 39.998 39.998a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M120.026 1023.968c-30.874 0-55.998-25.124-55.998-55.996 0-4.422 3.578-8 8-8s8 3.578 8 8c0 22.06 17.944 39.996 39.998 39.996 4.42 0 7.998 3.578 7.998 8s-3.578 8-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M72.028 384.008c-4.422 0-8-3.578-8-8 0-30.874 25.124-55.996 55.998-55.996a7.994 7.994 0 0 1 7.998 8c0 4.42-3.578 8-7.998 8-22.054 0-39.998 17.936-39.998 39.998a7.994 7.994 0 0 1-8 7.998z"
                                                fill="" />
                                            <path
                                                d="M823.982 432.004H120.026c-4.422 0-8-3.578-8-8 0-4.422 3.578-8 8-8h703.958a7.994 7.994 0 0 1 7.998 8 7.998 7.998 0 0 1-8 8z"
                                                fill="" />
                                            <path
                                                d="M807.982 384.008H136.024c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h671.958c4.422 0 8 3.578 8 8 0 4.422-3.578 8-8 8z"
                                                fill="" />
                                            <path
                                                d="M72.028 975.972c-4.422 0-8-3.578-8-8V376.008c0-4.42 3.578-8 8-8s8 3.578 8 8v591.964c0 4.422-3.578 8-8 8z"
                                                fill="" />
                                            <path
                                                d="M823.982 336.01h-16a7.994 7.994 0 0 1-7.998-8c0-4.422 3.578-8 7.998-8h16a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M152.024 336.01H120.026c-4.422 0-8-3.578-8-8 0-4.422 3.578-8 8-8h31.998a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M152.024 480.002h-16c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h16a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8zM776.734 480.002h-31.216a7.984 7.984 0 0 1-7.998-8c0-4.42 3.56-8 7.998-8h31.216c4.438 0 8 3.578 8 8 0 4.422-3.562 8-8 8z m-62.464 0h-31.232a7.994 7.994 0 0 1-7.998-8c0-4.42 3.576-8 7.998-8h31.232c4.422 0 8 3.578 8 8 0 4.422-3.578 8-8 8z m-62.466 0h-31.248c-4.406 0-8-3.578-8-8 0-4.42 3.594-8 8-8h31.248c4.406 0 8 3.578 8 8 0 4.422-3.594 8-8 8z m-62.48 0h-31.232c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h31.232c4.422 0 8 3.578 8 8 0 4.422-3.578 8-8 8z m-62.472 0H495.62c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h31.232a7.984 7.984 0 0 1 7.992 8c0 4.422-3.562 8-7.992 8z m-62.474 0h-31.232c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h31.232c4.422 0 8 3.578 8 8 0 4.422-3.578 8-8 8z m-62.472 0h-31.232c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h31.232c4.422 0 8 3.578 8 8 0 4.422-3.578 8-8 8z m-62.472 0h-31.232c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h31.232c4.422 0 8 3.578 8 8 0 4.422-3.578 8-8 8z m-62.474 0h-31.232c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h31.232a7.994 7.994 0 0 1 7.998 8c0 4.422-3.576 8-7.998 8z m-62.472 0H183.256c-4.422 0-8-3.578-8-8 0-4.42 3.578-8 8-8h31.232a7.994 7.994 0 0 1 7.998 8c0 4.422-3.576 8-7.998 8zM823.982 480.002h-16a7.994 7.994 0 0 1-7.998-8c0-4.42 3.578-8 7.998-8h16a7.994 7.994 0 0 1 7.998 8c0 4.422-3.578 8-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M152.024 975.988h-16c-4.422 0-8-3.578-8-8s3.578-8 8-8h16c4.42 0 7.998 3.578 7.998 8s-3.578 8-7.998 8zM776.734 975.988h-31.216c-4.438 0-7.998-3.578-7.998-8s3.56-8 7.998-8h31.216c4.438 0 8 3.578 8 8s-3.562 8-8 8z m-62.464 0h-31.232c-4.422 0-7.998-3.578-7.998-8s3.576-8 7.998-8h31.232c4.422 0 8 3.578 8 8s-3.578 8-8 8z m-62.466 0h-31.248c-4.406 0-8-3.578-8-8s3.594-8 8-8h31.248c4.406 0 8 3.578 8 8s-3.594 8-8 8z m-62.48 0h-31.232c-4.422 0-8-3.578-8-8s3.578-8 8-8h31.232c4.422 0 8 3.578 8 8s-3.578 8-8 8z m-62.472 0H495.62c-4.422 0-8-3.578-8-8s3.578-8 8-8h31.232c4.43 0 7.992 3.578 7.992 8s-3.562 8-7.992 8z m-62.474 0h-31.232c-4.422 0-8-3.578-8-8s3.578-8 8-8h31.232c4.422 0 8 3.578 8 8s-3.578 8-8 8z m-62.472 0h-31.232c-4.422 0-8-3.578-8-8s3.578-8 8-8h31.232c4.422 0 8 3.578 8 8s-3.578 8-8 8z m-62.472 0h-31.232c-4.422 0-8-3.578-8-8s3.578-8 8-8h31.232c4.422 0 8 3.578 8 8s-3.578 8-8 8z m-62.474 0h-31.232c-4.422 0-8-3.578-8-8s3.578-8 8-8h31.232c4.422 0 7.998 3.578 7.998 8s-3.576 8-7.998 8z m-62.472 0H183.256c-4.422 0-8-3.578-8-8s3.578-8 8-8h31.232c4.422 0 7.998 3.578 7.998 8s-3.576 8-7.998 8zM823.982 975.988h-16c-4.42 0-7.998-3.578-7.998-8s3.578-8 7.998-8h16c4.42 0 7.998 3.578 7.998 8s-3.578 8-7.998 8z"
                                                fill="" />
                                            <path
                                                d="M903.976 591.996c-4.422 0-8-3.578-8-8V504c0-4.42 3.578-8 8-8s8 3.578 8 8v79.996c0 4.422-3.578 8-8 8z"
                                                fill="" />
                                            <path
                                                d="M903.976 943.972c-4.422 0-8-3.578-8-7.998V839.98c0-4.422 3.578-8 8-8s8 3.578 8 8v95.994a7.994 7.994 0 0 1-8 7.998z"
                                                fill="" />
                                        </svg>
                                    </div>
                                    <!-- <p>24/7 asset security</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- my code  -->


            <section class="bg-white dark:bg-black w-full pb-10 px-4 sm:px-6 lg:px-8 md:pb-20 mx-auto relative pt-16">
                <div
                    class="main-div absolute pointer-events-none inset-0 flex items-center justify-center bg-white dark:bg-black [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
                </div>
                <div class="max-w-7xl relative pt-6 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <div class="max-w-5xl mx-auto p-10 text-center">
                        <h1 class="text-4xl md:text-4xl lg:text-7xl font-bold text-muted-800 dark:text-muted-200">
                            Anytime, anywhere, support for multiple platforms
                        </h1>
                        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">
                            Stay updated with the latest market trends and news through our app and desktop client
                        </p>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-8">
                            <div class="w-full md:w-1/2">
                                <img src="/assets/frontends/home/home-beige-img.png" alt="Laptop and Mobile Display"
                                    class="w-full h-auto">
                            </div>

                            <div class="w-full md:w-1/2 text-left">
                                <div
                                    class="flex items-center justify-center border border-gray-800 dark:border-gray-200 rounded-lg p-4 mb-8">
                                    <div class="relative">
                                        <img src="/assets/frontends/home/home-qr.webp" alt="QR Code" class="w-36 h-36">
                                        <!-- <img src="/assets/frontends/home/qr-logo.png" alt="QR Logo"
                                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-8"> -->
                                    </div>
                                    <p class="ml-4 font-bold text-gray-800 dark:text-white text-center">
                                        IOS & Android<br>Scan to Download
                                    </p>
                                </div>

                                <div class="flex flex-wrap gap-4 justify-center">
                                    <a href="#" 
                                        class="flex flex-col items-center text-gray-800 dark:text-white text-sm">
                                        <svg height="25" viewBox="0 0 512 512" width="25" class="app-store"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                            <title />
                                            <path
                                                d="M256,32C132.26,32,32,132.26,32,256S132.26,480,256,480,480,379.74,480,256,379.74,32,256,32ZM171,353.89a15.48,15.48,0,0,1-13.46,7.65,14.91,14.91,0,0,1-7.86-2.16,15.48,15.48,0,0,1-5.6-21.21l15.29-25.42a8.73,8.73,0,0,1,7.54-4.3h2.26c11.09,0,18.85,6.67,21.11,13.13Zm129.45-50L200.32,304H133.77a15.46,15.46,0,0,1-15.51-16.15c.32-8.4,7.65-14.76,16-14.76h48.24l57.19-97.35h0l-18.52-31.55C217,137,218.85,127.52,226,123a15.57,15.57,0,0,1,21.87,5.17l9.9,16.91h.11l9.91-16.91A15.58,15.58,0,0,1,289.6,123c7.11,4.52,8.94,14,4.74,21.22l-18.52,31.55-18,30.69-39.09,66.66v.11h57.61c7.22,0,16.27,3.88,19.93,10.12l.32.65c3.23,5.49,5.06,9.26,5.06,14.75A13.82,13.82,0,0,1,300.48,303.92Zm77.75.11H351.09v.11l19.82,33.71a15.8,15.8,0,0,1-5.17,21.53,15.53,15.53,0,0,1-8.08,2.27A15.71,15.71,0,0,1,344.2,354l-29.29-49.86-18.2-31L273.23,233a38.35,38.35,0,0,1-.65-38c4.64-8.19,8.19-10.34,8.19-10.34L333,273h44.91c8.4,0,15.61,6.46,16,14.75A15.65,15.65,0,0,1,378.23,304Z" />
                                        </svg>
                                        <span>App Store</span>
                                    </a>
                                    <a href="#"
                                        class="flex flex-col items-center text-gray-800 dark:text-white text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="play-store"
                                            fill="currentColor">
                                            <path
                                                d="m12.954 11.616 2.957-2.957L6.36 3.291c-.633-.342-1.226-.39-1.746-.016l8.34 8.341zm3.461 3.462 3.074-1.729c.6-.336.929-.812.929-1.34 0-.527-.329-1.004-.928-1.34l-2.783-1.563-3.133 3.132 2.841 2.84zM4.1 4.002c-.064.197-.1.417-.1.658v14.705c0 .381.084.709.236.97l8.097-8.098L4.1 4.002zm8.854 8.855L4.902 20.91c.154.059.32.09.495.09.312 0 .637-.092.968-.276l9.255-5.197-2.666-2.67z">
                                            </path>
                                        </svg>

                                        <span>Google Play</span>
                                    </a>
                                    <a href="#"
                                        class="flex flex-col items-center text-gray-800 dark:text-white text-sm">
                                        <svg enable-background="new 0 0 56.693 56.693" id="android" height="25"
                                            fill="currentColor" width="25" version="1.1" viewBox="0 0 56.693 56.693"
                                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g>
                                                <path
                                                    d="M35.021,8.568l0.547-0.819l0.537-0.808l1.209-1.813c0.148-0.223,0.088-0.523-0.133-0.672   c-0.225-0.149-0.525-0.089-0.674,0.135l-1.295,1.944l-0.545,0.817L34.114,8.18c-1.752-0.679-3.705-1.06-5.768-1.06   c-2.061,0-4.014,0.381-5.766,1.06L22.03,7.352l-0.545-0.817L20.188,4.59c-0.148-0.223-0.449-0.283-0.673-0.135   c-0.222,0.148-0.282,0.449-0.134,0.672l1.208,1.813l0.539,0.808l0.547,0.819c-4.115,1.916-6.898,5.546-6.898,9.701h27.142   C41.919,14.114,39.136,10.484,35.021,8.568z M22.532,14.391c-0.805,0-1.455-0.651-1.455-1.454s0.65-1.453,1.455-1.453   c0.803,0,1.453,0.65,1.453,1.453S23.335,14.391,22.532,14.391z M34.163,14.391c-0.803,0-1.453-0.651-1.453-1.454   s0.65-1.453,1.453-1.453c0.805,0,1.455,0.65,1.455,1.453S34.968,14.391,34.163,14.391z" />
                                                <path
                                                    d="M14.986,20.208h-0.209v2.418v1.973v16.936c0,1.693,1.376,3.07,3.069,3.07h2.216c-0.074,0.256-0.116,0.527-0.116,0.807   v0.162v0.969v5.01c0,1.605,1.303,2.908,2.909,2.908s2.908-1.303,2.908-2.908v-5.01v-0.969v-0.162c0-0.279-0.043-0.551-0.115-0.807   h5.4c-0.074,0.256-0.115,0.527-0.115,0.807v0.162v0.969v5.01c0,1.605,1.303,2.908,2.908,2.908s2.908-1.303,2.908-2.908v-5.01   v-0.969v-0.162c0-0.279-0.041-0.551-0.115-0.807h2.215c1.693,0,3.07-1.377,3.07-3.07V24.599v-1.973v-2.418H41.71H14.986z" />
                                                <path
                                                    d="M9.929,20.208c-1.606,0-2.908,1.301-2.908,2.909v12.439c0,1.605,1.302,2.908,2.908,2.908c1.605,0,2.908-1.303,2.908-2.908   V23.116C12.837,21.509,11.535,20.208,9.929,20.208z" />
                                                <path
                                                    d="M46.767,20.208c-1.607,0-2.908,1.301-2.908,2.909v12.439c0,1.605,1.301,2.908,2.908,2.908c1.605,0,2.906-1.303,2.906-2.908   V23.116C49.673,21.509,48.372,20.208,46.767,20.208z" />
                                            </g>
                                        </svg>

                                        <span>Android APK</span>
                                    </a>
                                    <a href="#"
                                        class="flex flex-col items-center text-gray-800 dark:text-white text-sm">
                                        <svg role="img" fill="currentColor" viewBox="0 0 24 24" class="windows"
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25">
                                            <title />
                                            <path
                                                d="M0 3.449L9.75 2.1v9.451H0m10.949-9.602L24 0v11.4H10.949M0 12.6h9.75v9.451L0 20.699M10.949 12.6H24V24l-12.9-1.801" />
                                        </svg>
                                        <span>Windows</span>
                                    </a>
                                    <a href="#"
                                        class="flex flex-col items-center text-gray-800 dark:text-white text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 128 128" width="25" height="25" id="apple">
                                            <path
                                                d="M97.905 67.885c.174 18.8 16.494 25.057 16.674 25.137-.138.44-2.607 8.916-8.597 17.669-5.178 7.568-10.553 15.108-19.018 15.266-8.318.152-10.993-4.934-20.504-4.934-9.508 0-12.479 4.776-20.354 5.086-8.172.31-14.395-8.185-19.616-15.724-10.668-15.424-18.821-43.585-7.874-62.594 5.438-9.44 15.158-15.417 25.707-15.571 8.024-.153 15.598 5.398 20.503 5.398 4.902 0 14.106-6.676 23.782-5.696 4.051.169 15.421 1.636 22.722 12.324-.587.365-13.566 7.921-13.425 23.639m-15.633-46.166c4.338-5.251 7.258-12.563 6.462-19.836-6.254.251-13.816 4.167-18.301 9.416-4.02 4.647-7.54 12.087-6.591 19.216 6.971.54 14.091-3.542 18.43-8.796">
                                            </path>
                                        </svg>
                                        <span>Mac OS</span>
                                    </a>
                                    <a href="#"
                                        class="flex flex-col items-center text-gray-800 dark:text-white text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" id="api" width="25"
                                            height="25" data-name="Layer 1" viewBox="0 0 24 24" width="25" height="25">
                                            <path
                                                d="M13.78,8.2l-1.6,8c-.09,.48-.51,.8-.98,.8-.06,0-.13,0-.2-.02-.54-.11-.89-.63-.78-1.18l1.6-8c.11-.54,.63-.89,1.18-.78,.54,.11,.89,.63,.78,1.18Zm-4.57,1.23c-.39-.39-1.02-.39-1.41,0l-1.21,1.21c-.78,.78-.78,2.04,0,2.81l1.21,1.21c.2,.2,.45,.29,.71,.29s.51-.1,.71-.29c.39-.39,.39-1.02,0-1.41l-1.21-1.19,1.21-1.21c.39-.39,.39-1.02,0-1.41Zm8.21,1.21l-1.21-1.21c-.39-.39-1.02-.39-1.41,0s-.39,1.02,0,1.41l1.21,1.2-1.21,1.21c-.39,.39-.39,1.02,0,1.41,.2,.2,.45,.29,.71,.29s.51-.1,.71-.29l1.21-1.21c.78-.78,.78-2.04,0-2.81Zm4.95,7.4c-.28,.48-.78,.75-1.3,.75-.26,0-.52-.07-.75-.2l-.53-.31c-1.54,1.91-3.76,3.24-6.29,3.62v.61c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-.61c-2.53-.38-4.75-1.71-6.29-3.62l-.53,.31c-.24,.14-.5,.2-.75,.2-.52,0-1.02-.27-1.3-.75-.42-.72-.17-1.63,.54-2.05l.53-.31c-.45-1.14-.7-2.38-.7-3.68s.25-2.54,.7-3.68l-.53-.31c-.72-.42-.96-1.33-.54-2.05,.42-.72,1.33-.96,2.05-.54l.53,.31c1.54-1.91,3.76-3.24,6.29-3.62v-.61c0-.83,.67-1.5,1.5-1.5s1.5,.67,1.5,1.5v.61c2.53,.38,4.75,1.71,6.29,3.62l.53-.31c.72-.42,1.63-.17,2.05,.54,.42,.72,.17,1.63-.54,2.05l-.53,.31c.45,1.14,.7,2.38,.7,3.68s-.25,2.54-.7,3.68l.53,.31c.72,.42,.96,1.33,.54,2.05Zm-3.37-6.04c0-3.86-3.14-7-7-7s-7,3.14-7,7,3.14,7,7,7,7-3.14,7-7Z" />
                                        </svg>

                                        <span>API</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <!-- till  -->

            <section
                class="bg-dot-light bg-dot-dark w-full pb-10 px-4 sm:px-6 lg:px-8 md:pb-20 mx-auto dark:bg-black bg-white dark:bg-dot-white/[0.2] bg-dot-black/[0.2] md:h-auto relative pt-16">
                <div
                    class="main-div absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
                </div>
                <div class="max-w-7xl relative pt-6 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <div class="relative rounded-xl p-5 sm:py-16 bg-muted-100 dark:bg-neutral-950">
                        <div class="absolute inset-0 dark:hidden"><img src="/assets/frontends/home/banner-bg.svg"
                                alt="Banner Background" class="w-full h-full object-cover"></div>
                        <div class="absolute inset-0 hidden dark:block"><img
                                src="/assets/frontends/home/banner-bg-dark.svg" alt="Banner Background"
                                class="w-full h-full object-cover"></div>
                        <div class="mb-5 text-center">
                            <h2 id="heading"
                                class="fade-slide text-3xl md:text-8xl lg:text-6xl font-bold bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">
                                Start Your Crypto Journey Now!
                            </h2>

                            <div id="buttonContainer"
                                class="fade-slide mt-8 flex justify-center items-center space-x-4">
                                <a href="#" id="startLink" class="p-[3px] relative group">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg">
                                    </div>
                                    <div
                                        class="px-8 py-[7px] bg-black rounded-[6px] relative transition duration-200 text-white hover:bg-transparent text-xl">
                                        Get Started
                                    </div>
                                </a>
                            </div>
                        </div>
                        <script>
                            // Helper function to add 'show' class for animations
                            function showElement(element) {
                                element.classList.add('show');
                            }

                            // Wait for the DOM to fully load before triggering animations
                            document.addEventListener('DOMContentLoaded', () => {
                                const heading = document.getElementById('heading');
                                const buttonContainer = document.getElementById('buttonContainer');

                                // Show elements with a delay for animation
                                setTimeout(() => showElement(heading), 500);  // Slight delay for heading
                                setTimeout(() => showElement(buttonContainer), 1000);  // Additional delay for button
                            });

                            // Conditionally set link based on login status
                            const isLoggedIn = false; // Replace this with actual login status check
                            const startLink = document.getElementById('startLink');
                            startLink.href = isLoggedIn ? "/user" : "/login";
                        </script>
                    </div>
                </div>
            </section>
            <section
                class="bg-dot-light bg-dot-dark w-full pb-10 px-4 sm:px-6 lg:px-8 md:pb-20 mx-auto dark:bg-black bg-white dark:bg-dot-white/[0.2] bg-dot-black/[0.2] md:h-auto relative pt-16">
                <div
                    class="main-div absolute pointer-events-none inset-0 flex items-center justify-center dark:bg-black bg-white [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
                </div>
                <div class="max-w-7xl relative pt-6 lg:pt-0 px-4 sm:px-6 lg:px-8 mx-auto">
                    <div class="explore text-muted-900 dark:text-white">
                        <div class="global-width">
                            <div class="explore-title">Trade with Altcryptogems and explore more possibilities</div>
                            <div class="explore-label color-wb8">Stay updated with the latest market trends and news
                                through our app and desktop client</div>
                        </div>
                        <div class="explore-content global-width">
                            <div>
                                <div class="title-box">
                                    <div class="title">Follow Top Traders</div>
                                    <div class="label color-wb8">Futures Copy Trade, a wide range of products and master
                                        traders enables you more profits.</div>
                                </div>
                                <div class="more">
                                    <a href="/register">
                                        Learn More
                                        <i class="iconfont iconjiantou_xiangyou"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="title-box">
                                    <div class="title">Dive deeply into the NFT world</div>
                                    <div class="label color-wb8">Reveal rare mystery box in Altcryptogems NFT, explore IGO and
                                        something more exciting.</div>
                                </div>
                                <div class="more">
                                <a href="/register">
                                        Learn More
                                        <i class="iconfont iconjiantou_xiangyou"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="title-box">
                                    <div class="title">Altcryptogems Earn &amp; Finance</div>
                                    <div class="label color-wb8">HODL cryptocurrencies and play around with financial
                                        products to earn substantial returns. Reach more customers with Altcryptogems Pay
                                        &amp; receipt features.</div>
                                </div>
                                <div class="more">
                                <a href="/register">
                                        Learn More
                                        <i class="iconfont iconjiantou_xiangyou"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll("[role='tab']");

        tabs.forEach((tab) => {
            tab.addEventListener("click", function () {
                // Remove active class from all tabs
                tabs.forEach((t) => t.classList.remove("active"));

                // Add active class to the clicked tab
                tab.classList.add("active");
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all tab buttons and panels
        const tabButtons = document.querySelectorAll('[data-hs-tab]');
        const tabPanels = document.querySelectorAll('[role="tabpanel"]');

        // Add click event listeners to all buttons
        tabButtons.forEach((button) => {
            button.addEventListener('click', () => {
                // Remove active state from all buttons and hide all panels
                tabButtons.forEach((btn) => btn.classList.remove('active'));
                tabPanels.forEach((panel) => {
                    panel.classList.add('hidden');
                    panel.style.opacity = 0;
                });

                // Set the clicked button as active
                button.classList.add('active');

                // Show the related tab panel
                const tabPanelId = button.getAttribute('data-hs-tab');
                const tabPanel = document.querySelector(tabPanelId);
                if (tabPanel) {
                    tabPanel.classList.remove('hidden');
                    tabPanel.style.opacity = 1;
                }
            });
        });
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function redirectToRegister() {
            const username = document.getElementById('registerUsername').value
            window.location.href = `/register?user=${username}`;
        }
    document.addEventListener("DOMContentLoaded", function () {
        function generateSyntheticHistory(price, points = 10, fluctuation = 0.1) {
            const data = [];
            const history = {};


            // Function to calculate history

            // Function to generate fake history data


            for (let i = 0; i < points; i++) {
                // Create a random fluctuation around the price
                const randomFluctuation = price * (Math.random() * fluctuation - fluctuation / 2);
                data.push(price + randomFluctuation);
            }
            return data;
        }


        function calcHistory(symbol, close) {
            if (!history[symbol]) {
                history[symbol] = [];
            }
            if (!history[symbol].length) {
                fakeHistory(symbol, close);
            }
            history[symbol].push(close);
            history[symbol].splice(0, history[symbol].length - 30);

            // Display updated history
            displayHistory(symbol);
        }


        function fakeHistory(symbol, close) {
            const num = close * 0.0002;
            const min = -Math.abs(num);
            const max = Math.abs(num);
            history[symbol] = [];

            for (let i = 0; i < 30; ++i) {
                const rand = Math.random() * (max - min) + min;
                history[symbol].push(close + rand);
            }
        }


        // Function to create SVG path from trend data
        function generateChartPoints(width, height, values) {
            width = parseFloat(width) || 0;
            height = parseFloat(height) || 0;
            values = Array.isArray(values) ? values : [];
            values = values.map((n) => parseFloat(n) || 0);

            let min = values.reduce(
                (min, val) => (val < min ? val : min),
                values[0]
            );
            let max = values.reduce(
                (max, val) => (val > max ? val : max),
                values[0]
            );
            let len = values.length;
            let half = height / 2;
            let range = max > min ? max - min : height;
            let gap = len > 1 ? width / (len - 1) : 1;
            let out = [];

            for (let i = 0; i < len; ++i) {
                let d = values[i];
                let val = 2 * ((d - min) / range - 0.5);
                let x = i * gap;
                let y = -val * half * 0.8 + half;
                out.push({ x, y });
            }
            return out;
        }

        // axios.get('data/markets/markets.json')
        //     .then(response => {
        //         const markets = response.data ? response.data['USDT'] : {};
        //         const tbody = document.getElementById('market-data');
        //         tbody.innerHTML = ''; // Clear loading message
        //         Object.values(markets)
        //             .filter(market => market.active)  // Filter active markets
        //             .slice(0, 10) // Get the first 10 active markets
        //             .forEach(market => {
        //                 console.log(market)
        //                 const row = document.createElement('tr');
        //                 row.classList.add('border-b', 'bg-white', 'dark:border-gray-700', 'dark:bg-gray-800');
        //                 const trendData = generateSyntheticHistory(market.price);
        //                 fakeHistory(market.symbol, market.price)
        //                 const chartPath = generateChartPoints(200, 28, history[market.symbol])

        //                 const chartInfo = {
        //                     chartPoints() {
        //                         return chartPath.map((d) => d.x - 8 + "," + d.y).join(" ");
        //                     },
        //                     cx() {
        //                         return chartPath.length ? chartPath[chartPath.length - 1].x - 3 : 0;
        //                     },
        //                     cy() {
        //                         return chartPath.length ? chartPath[chartPath.length - 1].y : 0;
        //                     }
        //                 };
        //                 row.innerHTML = `
        // <td data-label="Symbol" class="flex items-center px-6 py-4">
        //   <div class="tokenicon-wrap" style="margin-right:10px">
        //     <img src="/assets/images/cryptoCurrency/${market.base.toLowerCase() || '/market/notification'}.png" class="tokenicon-image" alt="Bitcoin" style="width: 24px; height: 24px;" />
        //   </div>
        //   <span class="font-medium">${market.symbol}</span>
        // </td>
        // <td data-label="price">
        //   <span class="text-start text-green-500 ${market.class || ''}"> ${market.quote}</span>
        // </td>
        // <td data-label="change">
        //   <span class="mr-1 text-start text-red-500">${(market.taker * 100).toFixed(2)}%</span>
        // </td>
        // <td data-label="chart">
        //   <div class="well">
        //     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 50" class="w-full h-full text-danger">
        //       <polyline
        //             class="polyline"
        //             fill="none"
        //             stroke="#f0f0f0"
        //             stroke-width="1"
        //             stroke-linecap="round"
        //             points="${chartInfo.chartPoints()}"
        //         />
        //         <circle
        //             class="circle"
        //             cx="${chartInfo.cx()}"
        //             cy="${chartInfo.cy()}"
        //             r="3"
        //             fill="#f0f0f0"
        //             stroke="none"
        //         />
        //     </svg>
        //   </div>
        // </td>
        // <td data-label="volume">
        //   <div class="mr-1 text-start">${market.symbol}</div>
          
        // </td>
        // <td class="px-6 py-3" data-label="Action">
        //   <a href="trade/${market.base}-${market.quote}" class="btn btn-outline-primary">Trade</a>
        // </td>`;
        //                 tbody.appendChild(row);
        //             });

        //     })
        //     .catch(error => {
        //         console.error('Error fetching market data:', error);
        //         document.getElementById('market-data').innerHTML = '<tr><td colspan="6" class="px-6 py-4">Failed to load data.</td></tr>';
        //     });
    });


</script>


@endsection