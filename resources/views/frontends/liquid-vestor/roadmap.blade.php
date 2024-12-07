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
    <!-- sectio content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m uk-margin-medium-bottom">
                        <h2 class="uk-margin-small-bottom">We're constantly updating our <span class="in-highlight">roadmap.</span></h2>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove">Bringing transparency for our users - keep up to date with upcoming products, services, and helpful resources.</p>
                      <p>You can follow our progress here or follow us on Discord . <a href="{{ config('brand.social_links.discord') }}"><i class="fab fa-discord"></i><span class="uk-text-lowercase">@{{ config('brand.site_name') }}</span></a></p>
                    </div>
                </div>
               <img style="display: block; margin-left: auto; margin-right: auto;" src="{{ asset('assets/frontends/liquid') }}/img/Roadmap1.png" alt="img" width="912" height="513"></div>
               <img style="display: block; margin-left: auto; margin-right: auto;" src="{{ asset('assets/frontends/liquid') }}/img/Roadmap2.png" alt="img" width="912" height="513">
                <div class="uk-width-1-1 in-timeline-1">
                    
                    <hr>
                    <div class="uk-grid uk-child-width-1-1 uk-child-width-1-3@m">
                        <div>
                            <div class="in-timeline-branch">
                                <div class="uk-flex">
                                  <div class="in-icon-wrap circle primary-color">
                                    <i class="fas fa-clipboard-check fa-lg"></i>
                                  </div>
                                    <div class="in-timeline-title uk-flex uk-flex-middle">
                                        <h4 class="uk-margin-remove-bottom">Q4 2019</h4>
                                        <span class="uk-label uk-label-success uk-text-small uk-border-pill">completed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-box-shadow-small uk-width-expand">
                                <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                                    <ul class="uk-list in-list-check">
                                        <li>Wireframe</li>
                                        <li>Design</li>
                                        <li>Documentation</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="in-timeline-branch">
                                <div class="uk-flex">
                                  <div class="in-icon-wrap circle primary-color">
                                    <i class="fas fa-cog fa-lg"></i>
                                  </div>
                                    <div class="in-timeline-title uk-flex uk-flex-middle">
                                        <h4 class="uk-margin-remove-bottom">Q2 2024</h4>
                                        <span class="uk-label uk-label-success uk-text-small uk-border-pill">on progress</span>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-box-shadow-small uk-width-expand">
                                <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                                    <ul class="uk-list in-list-check">
                                        <li>Chart with base functional</li>
                                        <li>Launching plans and billings</li>
                                        <li>Improvement of the rest of the functions of the Chart</li>
                                        <li>Availability panel</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="in-timeline-branch">
                                <div class="uk-flex">
                                  <div class="in-icon-wrap circle primary-color">
                                    <i class="fas fa-flask fa-lg"></i>
                                  </div>
                                    <div class="in-timeline-title uk-flex uk-flex-middle">
                                        <h4 class="uk-margin-remove-bottom">Q3 2020</h4>
                                        <span class="uk-label uk-label-success uk-text-small uk-border-pill">Completed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-box-shadow-small uk-width-expand">
                                <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                                    <ul class="uk-list in-list-check">
                                        <li>$231M Funding Round</li>
                                        <li>List View for your tasks</li>
                                        <li>Apps for iOS & Android</li>
                                        <li>New cool skin for Default View</li>
                                        <li>Community formation and the subsequent cyclic completion of the product based on the wishes of customers</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- section content end -->
@endsection