@extends('frontends.liquid-vestor.master')
@section('breadcrumb')
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
            <div class="uk-grid">
                <div class="uk-width-1-1 uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m uk-text-center">
                        <h2 class="uk-margin-small-bottom">Putting our clients first <span class="in-highlight">all around the world.</span></h2>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove">Over the years, we’ve been empowering clients by helping them take control of their financial lives.</p>
                    </div>
                </div>
                <div class="uk-grid uk-grid-large uk-child-width-1-3@m uk-margin-medium-top" data-uk-grid>
                    <div class="uk-flex uk-flex-left">
                        <div class="uk-margin-right">
                        <div class="in-icon-wrap circle primary-color">
                          <i class="fas fa-leaf fa-lg"></i>
                        </div>
                        </div>
                        <div>
                            <h3>Philosophy</h3>
                            <p class="uk-margin-remove-bottom">Guided by Principles: Our Philosophy Towards Trading and Investment Excellence.</p>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-left">
                        <div class="uk-margin-right">
                        <div class="in-icon-wrap circle primary-color">
                            <i class="fas fa-hourglass-end fa-lg"></i>
                        </div>
                        </div>
                        <div>
                            <h3>History</h3>
                            <p class="uk-margin-remove-bottom">Charting Our Journey: Tracing the Evolution and Milestones of Our History.</p>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-left">
                        <div class="uk-margin-right">
                        <div class="in-icon-wrap circle primary-color">
                            <i class="fas fa-flag fa-lg"></i>
                        </div>
                        </div>
                        <div>
                            <h3>Culture</h3>
                            <p class="uk-margin-remove-bottom">Thriving Together: Nurturing a Culture of Innovation,Collaboration, and Growth.</p>
                        </div>
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
                <div class="uk-width-1-1">
                    <div class="uk-card uk-card-default uk-border-rounded uk-background-center uk-background-contain uk-background-image@m" style="background-image: url(img/blockit/in-team-background-1.png);" data-uk-parallax="bgy: -100">
                      <div class="uk-card-body">
                            <div class="uk-grid uk-flex uk-flex-center">
                                <div class="uk-width-3-4@m uk-text-center">
                                    <h2>Trust the Professionals</h2>
                                    <p>We are a group of passionate, independent thinkers who never stop exploring new ways to improve trading for the self-directed investor.</p>
                                </div>
                            </div>
                            <div class="uk-grid uk-child-width-1-2@m uk-margin-medium-top" data-uk-grid="">
                                <div class="uk-flex uk-flex-left uk-first-column">
                                    <div class="uk-margin-right">
                                        <img class="uk-align-center " src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-1.png" alt="image-team" width="300">
                                    </div>
                                    <div>
                                        <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">Director</p>
                                        <h4 class="uk-margin-small-top">CHORLTON-VOONG, Fiona</h4>
                                        <p>Leading with Vision: CHORLTON-VOONG's Role as Chief Executive Officer in Driving Innovation and Success.</p>
                                        <div>
                                            <a class="uk-link-muted" href="https://find-and-update.company-information.service.gov.uk/officers/b-wqSDmk23UZ5Qmz5nYCzVPHF_s/appointments"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-flex uk-flex-left">
                                    <div class="uk-margin-right">
                                        <img class="uk-align-center " src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-2.png" alt="image-team" width="300">
                                    </div>
                                    <div>
                                        <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">Director</p>
                                        <h4 class="uk-margin-small-top">LEGG, Benjamin George</h4>
                                        <p>Crafting Connections: LEGG's Expertise as a Marketing Specialist in Driving Brand Visibility and Engagement.</p>
                                        <div>
                                            <a class="uk-link-muted" href="https://find-and-update.company-information.service.gov.uk/officers/ZdhhXT52rQDDMMu5ggQzQbkM7ps/appointments"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-flex uk-flex-left uk-grid-margin uk-first-column">
                                    <div class="uk-margin-right">
                                        <img class="uk-align-center " src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-3.png" alt="image-team" width="300">
                                    </div>
                                    <div>
                                        <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">Marketing Specialist</p>
                                        <h4 class="uk-margin-small-top">Evelyn Mason</h4>
                                        <p>Crafting Connections: Evelyn Mason's Expertise as a Marketing Specialist in Driving Brand Visibility and Engagement.</p>
                                        <div>
                                            <a class="uk-link-muted" href="https://find-and-update.company-information.service.gov.uk/company/12699120/officers"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-flex uk-flex-left uk-grid-margin">
                                    <div class="uk-margin-right">
                                        <img class="uk-align-center " src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-4.png" alt="image-team" width="300">
                                    </div>
                                    <div>
                                        <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">Director</p>
                                        <h4 class="uk-margin-small-top">INIESTA CASANOVA, Jesus</h4>
                                        <p>Empwering People: INIESTA's Role in Human Resources and Cultivating a Supportive Work Environment.</p>
                                        <div>
                                            <a class="uk-link-muted" href="https://find-and-update.company-information.service.gov.uk/officers/MsO8V2l9liB7MUqeMAxyGz2HsXA/appointments"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><img style="display: block; margin-left: auto; margin-right: auto;" src="{{ asset('assets/frontends/liquid') }}/img/about1.webp" alt="img" width="1010" height="550">
                                        <div class="negative-margin-section wf-section">
                                            
                                            <img style="display: block; margin-left: auto; margin-right: auto;" src="{{ asset('assets/frontends/liquid') }}/img/about2.webp" alt="img" width="3000" height="1000">
                                        <div class="negative-margin-section wf-section">
                                            
                                            <img style="display: block; margin-left: auto; margin-right: auto;" src="{{ asset('assets/frontends/liquid') }}/img/about3.webp" alt="img" width="3000" height="1000">
                                        <div class="negative-margin-section wf-section">
                                            
                                            <img style="display: block; margin-left: auto; margin-right: auto;" src="{{ asset('assets/frontends/liquid') }}/img/about5.webp" alt="img" width="3000" height="1000">
                                        <div class="negative-margin-section wf-section">
<h3 style="text-align: center;"></h3>
</blockquote>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-3-4@m">
                    <div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
                        <div class="uk-width-1-2@m">
                            <strong class="uk-text-muted in-offset-bottom-10">Number speaks!</strong>
                            <h1 class="uk-margin-medium-bottom">We are always ready<br>for a <span class="in-highlight">challenge.</span></h1>
                            <a href="/register" class="uk-button uk-button-primary uk-border-rounded" aria-label="Get started">Get Started<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                        </div>
                        <div class="uk-width-1-2@m">
                            <div class="uk-margin-large" data-uk-grid>
                                <div class="uk-width-1-3@m">
                                    <h1 class="uk-text-primary uk-text-right@m">
                                        <span class="count" data-counter-end="213">0</span>
                                    </h1>
                                    <hr class="uk-divider-small uk-text-right@m">
                                </div>
                                <div class="uk-width-expand@m">
                                    <h3>Trading instruments</h3>
                                    <p>Unlocking Opportunities: Exploring 213 Trading Instruments for Diverse Investment Strategies.</p>
                                </div>
                            </div>
                            <div class="uk-margin-large" data-uk-grid>
                                <div class="uk-width-1-3@m">
                                    <h1 class="uk-text-primary uk-text-right@m">
                                        <span class="count" data-counter-end="39">0</span>
                                    </h1>
                                    <hr class="uk-divider-small uk-text-right@m">
                                </div>
                                <div class="uk-width-expand@m">
                                    <h3>Countries covered</h3>
                                    <p>Global Reach, Local Expertise: Trading Across 39 Countries for Comprehensive Market Coverage.</p>
                                </div>
                                 </div>
                            <div class="uk-margin-large" data-uk-grid>
                                <div class="uk-width-1-3@m">
                                    <h1 class="uk-text-primary uk-text-right@m">
                                        <span class="count" data-counter-end="5287272">0</span></p>
                                    </h1>
                                    <hr class="uk-divider-small uk-text-right@m">
                                </div>
                                <p>
                                    <p>
                                <div class="uk-width-expand@m">
                                    <h3>Connected Wallets</h3>
                                    <p>More than 5M+ Connected Wallets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
@endsection