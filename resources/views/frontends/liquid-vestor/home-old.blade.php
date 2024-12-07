@extends('frontends.liquid-vestor.master')
@section('content')
    <!-- slideshow content begin -->
    <div class="uk-section uk-padding-remove-vertical">
        <div class="uk-light in-slideshow uk-background-cover uk-background-top-center"
            style="background-image: url({{ asset('assets/frontends/liquid') }}/img/in-liquid-slide-bg.png);"
            data-uk-slideshow>
            <ul class="uk-slideshow-items">
                <li>
                    <div class="uk-container">
                        <div class="uk-grid-medium uk-grid" data-uk-grid="">
                            <div class="uk-width-1-2@s uk-first-column">
                                <div class="uk-overlay">
                                    <h1>Simple Invest.<br>100% AlphaPoint Security</h1>
                                    {{-- <p> --}}
                                    <p class="uk-text-lead uk-visible@m">Start building wealth with cryptocurrency, zero
                                        trading skills</p>
                                    <a href="/register" aria-label="Start building wealth with cryptocurrency" target="_blank"
                                        class="uk-button uk-button-default uk-border-rounded uk-visible@s">Try The Demo</a>
                                </div>
                            </div>
                            {{-- script --}}
                            <div class="uk-width-1-2@s">
                                <img class="in-slide-img lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                    data-src="{{ asset('assets/frontends/liquid') }}/img/slider-2.webp" alt="image-slide"
                                    width="500" height="400" loading="lazy" data-uk-img="">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-container">
                        <div class="uk-grid-medium uk-grid" data-uk-grid="">
                            <div class="uk-width-1-2@s uk-first-column">
                                <div class="uk-overlay">
                                    <h1>The Future of Decentralized Multichain Wallet</h1>
                                    <p>
                                    <p class="uk-text-lead uk-visible@m">A trusted destination for traders worldwide,
                                        Authorised by FCA, ASIC &amp; FSCA</p>
                                    <a href="/register" aria-label="A trusted destination for traders worldwide. register now"
                                        class="uk-button uk-button-default uk-border-rounded uk-visible@s">Explore
                                        Portfolio</a>
                                </div>
                            </div>
                            <div class="uk-width-1-2@s">
                                <img class="in-slide-img lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                    data-src="{{ asset('assets/frontends/liquid') }}/img/slider.webp" alt="image-slide"
                                    width="500" height="400" loading="lazy" data-uk-img="">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-container">
                        <div class="uk-grid-medium uk-grid" data-uk-grid="">
                            <div class="uk-width-1-2@s uk-first-column">
                                <div class="uk-overlay">
                                    <h1>Automate Your Trading - Enrich Your porfolio</h1>
                                    <p>
                                    <p class="uk-text-lead uk-visible@m">Our next-gen bot will save you time, reduce your
                                        risk, and create passive income continuously</p>
                                    <a href="/register" aria-label="create passive income continuously"
                                        class="uk-button uk-button-default uk-border-rounded uk-visible@s">Connect Bot</a>
                                </div>
                            </div>
                            <div class="uk-width-1-2@s">
                                <img class="in-slide-img lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                    data-src="{{ asset('assets/frontends/liquid') }}/img/slider-2.webp" alt="image-slide"
                                    width="2000" height="1000" loading="lazy" data-uk-img="">
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        {{-- <p> --}}
            <div class="max-w-5xl mx-auto px-4 py-16">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold">Bitnificent helps traders win regardless of market conditions</h1>
                    <p class="mt-4 text-lg text-gray-600">For every market condition, there’s a trading strategy that can take advantage of it. Bitnificent trade bots happen to be really good at reducing average acquisition costs, directly increasing your positive margins from each trade.</p>
                </div>
        
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Bear Markets -->
                    <div class="text-left">
                        <h2 class="text-xl font-semibold">— Bear markets</h2>
                        <p class="mt-2 text-gray-600">Use DCA Short bots to borrow and sell tokens at the current price and buy them back at a lower price.</p>
                    </div>
        
                    <!-- Bull Markets -->
                    <div class="text-left">
                        <h2 class="text-xl font-semibold">— Bull markets</h2>
                        <p class="mt-2 text-gray-600">Use DCA Long bots to buy the natural dips and sell the spikes as the price rises over time, achieving a better average entry price for your positions.</p>
                    </div>
        
                    <!-- Sideways Markets -->
                    <div class="text-left">
                        <h2 class="text-xl font-semibold">— Sideways markets</h2>
                        <p class="mt-2 text-gray-600">Use Grid bots to pick up cheaper tokens when they hit support levels and sell them when they’re close to resistance levels.</p>
                    </div>
                </div>
        
                <div class="text-center mt-16">
                    <p class="text-lg text-gray-600">This is just a small sample of the many paths you can explore by leveraging the power of the Bitnificent trading software.</p>
                </div>
            </div>

        <p>
            {{-- <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;"
            data-src="{{ asset('assets/frontends/liquid') }}/img/{{ env('BRAND_CODE') == 'BT' ? 'bt' : '' }}/connect11.webp" alt="connect img" width="3400" height="1000"> --}}
            @if (env('BRAND_CODE') == 'BT')
            <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;"
            data-src="{{ asset('assets/frontends/liquid') }}/img/{{ env('BRAND_CODE') == 'BT' ? 'bt' : '' }}/manage1.webp" alt="connect img" width="3400" height="1000">
            @endif
            <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;"
            src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
            data-src="{{ asset('assets/frontends/liquid') }}/img/connectportfolio2.webp" alt="connect wallet img" width="1200"
                height="1000">


                <div class="max-w-5xl mx-auto px-4 py-16">
                    <!-- Title and Paragraph Section -->
                    <div>
                        <h1 class="text-4xl font-bold mb-4">Trade automation opens up new ways to seize opportunities</h1>
                        <p class="text-sm text-gray-600">
                            Unlike traditional stock markets, cryptocurrency markets operate 24 hours per day, 7 days per week. This is a point of fear for manual traders, but not for The Collective Portfolio users. Your AI crypto trading bots aren't limited to Mon-Fri normal business hours to open deals. You can set up bots to operate under almost any contingency, whether it's a flash crash or the market shooting to the moon. Sleep easy at night and let bots do the work. Winning trades is the goal, and The Collective Portfolio is your all-in-one tool to achieve it. Integrating with most any exchange, TCP provides you the functions you wish you had and doesn't make you move your assets.
                        </p>
                    </div>
                </div>
            {{-- <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;"
            src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
            data-src="{{ asset('assets/frontends/liquid') }}/img/connect12.webp" alt="wallet img" width="2000" height="700"> --}}
        </p>
        <p style="text-align: center; margin-bottom:1em">
            <a class="uk-button uk-button-primary uk-border-rounded"
                href="/app/dashboard" aria-label="Connect Your Exchange">Connect Your Exchange
            </a>
        </p>
        @if (env('BRAND_CODE') == 'TC')
            <p>
                <iframe id="theSecondFrame"
                    src="https://widget.coinlib.io/widget?type=horizontal_v2&amp;theme=dark&amp;pref_coin_id=1505&amp;invert_hover=no"
                    width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0"
                    border="0" style="border:0;margin:0;padding:0;" title="Coin market Widget" loading="lazy">
                </iframe> 
                    <a aria-label="widget link"
                    class="uk-position-center-left uk-position-small uk-hidden-hover" href="#previous" data-uk-slidenav-previous
                    data-uk-slideshow-item="previous">
                </a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" aria-label="Next" href="#next" data-uk-slidenav-next
                    data-uk-slideshow-item="next">
                </a>
            </p>
            <div class="uk-section uk-padding-remove-vertical in-slideshow-features uk-visible@m">
                <div class="uk-container">
                    <ul class="uk-grid uk-child-width-1-5@m uk-text-center" data-uk-grid>
                        <li>
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-ticker-1.svg" alt="ticker-image"
                                width="85" height="22" loading="lazy" data-uk-img>
                            <span class="uk-label uk-label-success uk-margin-left"><i
                                    class="fas fa-caret-up"></i>1,740.05</span>
                        </li>
                        <li>
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-ticker-2.svg" alt="ticker-image"
                                width="85" height="22" loading="lazy" data-uk-img>
                            <span class="uk-label uk-label-success uk-margin-left"><i
                                    class="fas fa-caret-up"></i>217.90</span>
                        </li>
                        <li>
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-ticker-3.svg"
                                alt="ticker-image" width="85" height="22" loading="lazy" data-uk-img>
                            <span class="uk-label uk-label-danger uk-margin-left"><i
                                    class="fas fa-caret-down"></i>270.97</span>
                        </li>
                        <li>
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-ticker-4.svg"
                                alt="ticker-image" width="71" height="21" loading="lazy" data-uk-img>
                            <span class="uk-label uk-label-success uk-margin-left"><i
                                    class="fas fa-caret-up"></i>3,218.51</span>
                        </li>
                        <li>
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-ticker-5.svg"
                                alt="ticker-image" width="94" height="12" loading="lazy" data-uk-img>
                            <span class="uk-label uk-label-danger uk-margin-left"><i
                                    class="fas fa-caret-down"></i>735.11</span>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

    </div>
    {{-- </div> --}}
    <!-- slideshow content end -->
    <!-- section content begin -->
    <div class="uk-section uk-section-secondary in-liquid-1">
        <div class="uk-container uk-light">
            <div class="uk-grid uk-flex uk-flex-middle">
                <div class="uk-width-1-2@m">
                    <h2>Our simplified approach<span class="in-highlight"> empowers all levels </span>of Traders.</h2>
                </div>
                <div class="uk-width-1-2@m">
                    <a class="uk-button uk-button-default uk-border-rounded uk-align-right@m" href="/register"
                        target="_blank" aria-label="please register for getting start">Get Started<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                </div>
            </div>
            <div class="section-padding-30 wf-section">
                <div class="custom-container">
                    <div class="crypto-explanation">
                        <div class="crypto-explanation-texts">
                            <div class="crypto-explanation-description">
                                <div class="crypto-explanation-details">
                                    <p>&nbsp;</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-child-width-1-3@m" data-uk-grid>
                <div>
                    <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                        <div class="uk-card-media-top">
                            <img class="lazy"src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-object-1.svg"
                                alt="sample-image" width="350" height="296" loading="lazy" data-uk-img>
                        </div>
                        <div class="uk-card-body">
                            <h3>Mitigating risks</h3>
                            <p>We build a custom portfolio based on your preferred risk profile. As prices move, our engine
                                adjusts your portfolio to ensure it remains balanced and in line with your risk profile.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                        <div class="uk-card-media-top">
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-object-2.svg"
                                alt="sample-image" width="350" height="296" loading="lazy" data-uk-img>
                        </div>
                        <div class="uk-card-body">
                            <h3>Minimizing your fees</h3>
                            <p>We are in this together and hence will only charge you when your investment grows. No hidden
                                fees, no recurring costs.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                        <div class="uk-card-media-top">
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-object-3.svg"
                                alt="sample-image" width="350" height="296" loading="lazy" data-uk-img>
                        </div>
                        <div class="uk-card-body">
                            <h3>Enhanced tools</h3>
                            <p>Empowering Efficiency: Unlocking the Potential of Enhanced Tools for Streamlined Workflows.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>
        <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;"
        src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
        data-src="{{ asset('assets/frontends/liquid') }}/img/bot4.webp" alt="img" width="1700" height="1000" loading="lazy">
    <p>
        @if (env('BRAND_CODE') == 'BT')
        <script src="https://www.cryptohopper.com/widgets/js/script"></script>
        <div class="cryptohopper-web-widget" data-id="3" data-coins="bitcoin,ethereum,tether,solana,usd-coin"
            data-realtime="on"></div>
        @endif
        <img  class="lazy"style="display: block; margin-left: auto; margin-right: auto;"
        src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
        data-src="{{ asset('assets/frontends/liquid') }}/img/bot2.webp" alt="img" width="3840" height="2160" loading="lazy">
    </p>
    
    <p style="text-align: center;"><a class="uk-button uk-button-primary uk-border-rounded"
            href="/app/bot" aria-label="connect bot">
            Connect BO0T
    </a>
    </p>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section in-liquid-2">
        <h1 style="text-align: center;">The Collective Portfolio features</h1>
        <p>
        </p>
        <div class="uk-container">
            <div class="uk-grid-large uk-child-width-1-2@m" data-uk-grid>
                <div class="uk-flex uk-flex-left">
                    <div class="uk-margin-right">
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-icon-1.svg" alt="sample-icon"
                            width="128" height="128" loading="lazy" data-uk-img>
                    </div>
                    <div>
                        <h3>Rebalancer</h3>
                        <p>Create portfolios with any coin alocation and rebalance your account with a click.</p>
                        <a class="uk-button uk-button-text" href="/register" aria-label="Create portfolios with any coin alocation">Learn more<i
                                class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div class="uk-flex uk-flex-left">
                    <div class="uk-margin-right">
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-icon-2.svg" alt="sample-icon"
                            width="128" height="128" loading="lazy" data-uk-img>
                    </div>
                    <div>
                        <h3>Dashboard</h3>
                        <p>Add multiple accounts to track your portfolio and check your daily PnL.</p>
                        <a class="uk-button uk-button-text" href="/register" aria-label="Add multiple accounts to track your portfolio">Learn more<i
                                class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div class="uk-flex uk-flex-left">
                    <div class="uk-margin-right">
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-icon-3.svg" alt="sample-icon"
                            width="128" height="128" loading="lazy" data-uk-img>
                    </div>
                    <div>
                        <h3>Demo account</h3>
                        <p>Trade without money. Test strategies safely and without any risk.</p>
                        <a class="uk-button uk-button-text" href="/register" aria-label="Test strategies safely and without any risk">Learn more<i
                                class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div class="uk-flex uk-flex-left">
                    <div class="uk-margin-right">
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-icon-4.svg" alt="sample-icon"
                            width="128" height="128" loading="lazy" data-uk-img>
                    </div>
                    <div>
                        <h3>Smart Cover</h3>
                        <p>Accrue additional assets with unexpected market moves. Sell and buy back coins.</p>
                        <a class="uk-button uk-button-text" href="/register" aria-label="Accrue additional assets with unexpected market moves">Learn more<i
                                class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                    </div>
                    <p>
                </div>
            </div>
            <p>
            <p>
            </p>
            </p>
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-6@m uk-margin-medium-top">
                    <div class="uk-card uk-card-default uk-card-body uk-background-contain uk-background-top-left"
                        style="background-image: url({{ asset('assets/frontends/liquid') }}/img/in-liquid-card-bg.png);"
                        data-uk-img>
                        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center" data-uk-grid>
                            <div class="uk-width-1-1">
                                <h4><span>Simple steps to start trade.</span></h4>
                            </div>
                            <div>
                                <span class="in-icon-wrap circle uk-margin-auto">1</span>
                                <p>Register account</p>
                            </div>
                            <div>
                                <span class="in-icon-wrap circle uk-margin-auto">2</span>
                                <p>Fund your account</p>
                            </div>
                            <div>
                                <span class="in-icon-wrap circle uk-margin-auto">3</span>
                                <p>Automate your trade</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-section-muted uk-padding-large@m in-liquid-3 uk-background-contain uk-background-center-center"
        style="background-image: url({{ asset('assets/frontends/liquid') }}/img/in-liquid-3-bg.png);" data-uk-img>
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-6@m uk-inline">
                    <div class="uk-grid-large uk-flex uk-flex-middle uk-flex-right" data-uk-grid>
                        <div class="uk-position-top-left">
                            <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                                data-src="{{ asset('assets/frontends/liquid') }}/img/mockup.webp" alt="sample-images"
                                width="650" height="469" loading="lazy" data-uk-img>
                        </div>
                        <div class="uk-width-1-2@m">
                            <span class="uk-label in-liquid-label uk-margin-bottom">Available on multiple platform</span>
                            <h2 class="uk-margin-remove">World class platform<br>invest without a doubt.</h2>
                            <p>Portfolio Management Automation of the future.</p>
                            <div class="uk-grid-small uk-child-width-1-3 uk-child-width-1-4@m uk-margin-medium-top uk-text-center"
                                data-uk-grid>
                                <div>
                                    <div class="in-icon-wrap uk-margin-auto">
                                        <i class="fab fa-apple"></i>
                                    </div>
                                    <p class="uk-text-small">MacOS</p>
                                </div>
                                <div>
                                    <div class="in-icon-wrap uk-margin-auto">
                                        <i class="fab fa-windows"></i>
                                    </div>
                                    <p class="uk-text-small">Windows</p>
                                </div>
                                <div>
                                    <div class="in-icon-wrap uk-margin-auto">
                                        <i class="fab fa-google-play"></i>
                                    </div>
                                    <p class="uk-text-small">Android</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section in-liquid-4">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-middle">
                <div class="uk-width-1-2@m">
                    <h4></h4>
                </div>
                <div></div>
            </div>
            <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m in-blog-4" data-uk-grid>
                @foreach (collect(posts())->take(3) as $item)
                @php $item = json_decode($item->data, true); @endphp
                    <div class="uk-flex uk-flex-left">
                        <div class="in-liquid-category">
                            <p class="uk-text-small uk-text-uppercase">
                                <span>{{ !is_array($item['categories']) ? Str::limit($item['categories'], 18, '...') : '' }}</span>
                            </p>
                        </div>

                        <div>
                            <article class="uk-article">
                                <h5 class="uk-margin-remove-bottom">
                                    <a class="uk-link-reset"
                                        href="/blog" aria-label="{{ Str::limit($item['title'] ?? '', 40, '...') }}">{{ Str::limit($item['title'] ?? '', 40, '...') }}</a>
                                </h5>
                                <p class="uk-text-small uk-text-muted uk-margin-top">
                                    Posted At
                                    {{ date('Y-m-d H:i:s', $item['published_on']) }}
                                </p>
                                <p>{!! Str::limit($item['body'] ?? '', 100, '...') !!}</p>
                                <a class="uk-button uk-button-text uk-margin-top" href="/blog" aria-label="{{ Str::limit($item['title'] ?? '', 40, '...') }}">Read more<i
                                        class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
            <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;"
            src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
            data-src="{{ asset('assets/frontends/liquid') }}/img/markets13.webp" alt="img" width="3840"
                height="2160" loading="lazy">
        </div>
        <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;"
        src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
        data-src="{{ asset('assets/frontends/liquid') }}/img/howtoinvest.webp" alt="img" width="3840"
            height="2160" loading="lazy">
        <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-5-6@m uk-inline">
                <div class="uk-grid-medium uk-child-width-1-3@s uk-child-width-1-4@m uk-text-center uk-margin-medium-top"
                    data-uk-grid>
                    <div>
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-award.svg" loading="lazy" alt="award"
                            width="71" height="58" data-uk-img>
                        <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best CFD Broker</h6>
                        <p class="uk-text-small uk-margin-remove-top">TradeON Summit 2020</p>
                    </div>
                    <div>
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-award.svg" alt="award"
                            width="71" height="58" loading="lazy" data-uk-img>
                        <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Execution Broker</h6>
                        <p class="uk-text-small uk-margin-remove-top">Forex EXPO Dubai 2020</p>
                    </div>
                    <div>
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-award.svg" alt="award"
                            width="71" height="58" loading="lazy" data-uk-img>
                        <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Trading Platform</h6>
                        <p class="uk-text-small uk-margin-remove-top">London Summit 2020</p>
                    </div>
                    <div class="uk-visible@m">
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/in-liquid-award.svg" alt="award"
                            width="71" height="58" loading="lazy" data-uk-img>
                        <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Broker Asia</h6>
                        <p class="uk-text-small uk-margin-remove-top">iFX EXPO 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <p>
    <p>
    </p>
    </p>
    @if (env('BRAND_CODE') == 'TC')
    <p style="text-align: center;">
        <a class="uk-button uk-button-default uk-border-rounded uk-visible@s"
            href="https://www.trustpilot.com/review/portfolio-collective.com" target="_blank" rel="noopener">
            OUR REVIEWS
        </a>
    </p>
    @endif
    <img class="lazy" style="display: block; margin-left: auto; margin-right: auto;" 
    src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif"
    data-src="{{ asset('assets/frontends/liquid') }}/img/rev1.webp" alt="img" width="3000" height="1000" loading="lazy">
    <!-- section content end -->
    <x-tmp-transaction-history />
    <!-- section content begin -->
    <div class="uk-section uk-section-muted in-liquid-5 uk-background-contain uk-background-top-center in-offset-bottom-40"
        style="background-image: url({{ asset('assets/frontends/liquid') }}/img/in-liquid-5-bg.png);">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-6@m">
                    <div class="uk-text-center">
                    </div>
                </div>
                <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif" data-src="{{ asset('assets/frontends/liquid/img/payment-methods.webp') }}" alt="Payment method" height="100%" width="100%" loading="lazy"/>
                <div class="uk-text-center uk-text-small in-border-text">
                    <p><span>Don't see a payment methods that works for you?<br class="uk-hidden@m"> We have other
                            options.<br class="uk-hidden@m"> 
                            <a
                                class="uk-button uk-button-small uk-button-primary uk-border-rounded uk-margin-left"
                                href="/register" rel="nofollow">More options<i
                                    class="fas fa-angle-right uk-margin-small-left"></i>
                                </a>
                            </span>
                    <p>
                        <img class="lazy" src="{{ asset('assets/frontends/liquid') }}/img/in-lazy.gif" style="display: block; margin-left: auto; margin-right: auto;"
                            data-src="{{ asset('assets/frontends/liquid') }}/img/{{ env('BRAND_CODE') == 'BT' ? 'bt' : ''}}/collective2.webp" alt="img"
                            width="3000" height="1000" loading="lazy">
                            @if (env('BRAND_CODE')=='BT')
                            <p style="text-align: center;"><a class="uk-button uk-button-default uk-border-rounded uk-visible@s" href="/register" aria-label="Register now"
                                target="_blank" rel="noopener">START YOUR 30-DAYS TRIAL</a></p>
                            @endif
                    <div class="negative-margin-section wf-section">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
@endsection

@section('script')
    <script>
        function loadFrame()  
        {
            var url="https://widget.coinlib.io/widget?type=horizontal_v2&amp;theme=dark&amp;pref_coin_id=1505&amp;invert_hover=no";
            if (document.getElementById("theFrame").src != url)
            {
                document.getElementById("theFrame").src = url;  
            }
        }
    </script>
@endsection