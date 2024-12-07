@extends('frontends.liquid-vestor.master')
@section('breadcrumb')
    <!-- breadcrumb content begin -->
    <div class="uk-section uk-padding-remove-vertical in-liquid-breadcrumb">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb">
                        <li><a href="#">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-match uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m in-card-10" data-uk-grid>
                <div class="uk-width-1-1">
                  <h2 class="uk-margin-remove">A <span class="in-highlight">relationship</span> on your terms.</h2>
                    <p class="uk-text-lead uk-text-muted uk-margin-remove">Work with us the way you want.</p>
                    <p>Some believe you must choose between an online broker and a wealth management firm. At {{ siteTitle() }}, you don't need to compromise. Whether you invest on your own, with an advisor, or a little of both — we can support you.</p>
                    <script src="https://www.cryptohopper.com/widgets/js/script"></script><div class="cryptohopper-web-widget" data-id="1" data-table_title="The Collective Portfolio" data-numcoins="50" data-realtime="on"></div>
                    <div class="cryptohopper-web-widget" data-id="6"></div>
                    <img style="display: block; margin-left: auto; margin-right: auto;" src="{{ asset('assets/frontends/liquid') }}/img/111.png" alt="img" width="1700" height="1000">
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-green">
                      <div class="in-icon-wrap circle uk-margin-medium-bottom">
                        <i class="fas fa-seedling fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#investing">Investing<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>A wide selection of investment product to help build diversified portfolio</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-blue">
                      <div class="in-icon-wrap circle uk-margin-medium-bottom">
                        <i class="fas fa-chart-bar fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#">Trading<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>Powerful trading tools, resources, insight and support</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-purple">
                      <div class="in-icon-wrap circle uk-margin-medium-bottom">
                        <i class="fas fa-chart-pie fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#wealth">Wealth management<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>Dedicated financial consultant to help reach your own specific goals</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-navy">
                      <div class="in-icon-wrap circle uk-margin-medium-bottom">
                        <i class="fas fa-chalkboard-teacher fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#invest">Investment advisory<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>A wide selection of investing strategies from seasoned portfolio managers</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-grey">
                      <div class="in-icon-wrap circle uk-margin-medium-bottom">
                        <i class="fas fa-funnel-dollar fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#smart_portfolio">Smart portfolio<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>A revolutionary, fully-automated investmend advisory services</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded uk-light in-card-orange">
                      <div class="in-icon-wrap circle uk-margin-medium-bottom">
                        <i class="fas fa-handshake fa-lg"></i>
                        </div>
                        <h4 class="uk-margin-top">
                            <a href="#mutual">Mutual fund advisor<i class="fas fa-chevron-right uk-float-right"></i></a>
                        </h4>
                        <hr>
                        <p>Specialized guidance from independent local advisor for hight-net-worth investors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-2-3@m">
                    <div class="uk-grid uk-grid-small" data-uk-grid>
                        <div class="uk-width-auto@m">
                          <div class="in-icon-wrap circle large primary-color uk-margin-right">
                            <i class="fas fa-money-bill-wave fa-2x"></i>
                          </div>
                        </div>
                        <div class="uk-width-expand">
                            <h3>Why Invest with {{ siteTitle() }}?</h3>
                            <p>Invest with {{ siteTitle() }} for a seamless and rewarding investment experience. Our platform stands out for several compelling reasons.</p>
                            <div class="uk-grid uk-child-width-1-1 uk-child-width-1-2@m">
                                <div>
                                    <ul class="uk-list in-list-check">
                                        <li>Direct Market Access (DMA)</li>
                                        <li>Leverage up to 1:500</li>
                                        <li>T+0 settlement</li>
                                        <li>Dividends paid in cash</li>
                                    </ul>
                                </div>
                                <div class="in-margin-top-10@s in-margin-bottom-30@s">
                                    <ul class="uk-list in-list-check">
                                        <li>Free from UK Stamp Duty</li>
                                        <li>Short selling available</li>
                                        <li>Commissions from 0.08%</li>
                                        <li>Access to 1500 global shares</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-3@m">
                    <h3>Our Shares offer</h3>
                    <table class="uk-table uk-table-divider uk-table-striped uk-text-small uk-text-center">
                        <thead>
                            <tr>
                                <th class="uk-text-center">Name</th>
                                <th class="uk-text-center">Initial Deposit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BTCUSDT Perpetual contract</td>
                                <td>10%</td>
                            </tr>
                            <tr>
                                <td>ETHUSDT Perpetual contract</td>
                                <td>10%</td>
                            </tr>
                            <tr>
                                <td>SOLUSDT Perpetual contract</td>
                                <td>10%</td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="uk-link-text uk-text-small uk-text-primary" href="/register" aria-label="Create account to see full share.">See Full Shares Table</a>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 in-card-16">
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                        <div class="uk-grid uk-flex-middle" data-uk-grid>
                            <div class="uk-width-1-1 uk-width-expand@m">
                                <h3>Get up to $60,000 + 60 days of commission-free stocks</h3>
                            </div>
                            <div class="uk-width-auto">
                                <a class="uk-button uk-button-primary uk-border-rounded" href="/register">Open an Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
@endsection