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
            <div class="uk-width-1-1 in-content-10">
                <div class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-background-bottom-left uk-background-contain" style="background-image: url(img/blockit/in-content-10-image.png);">                    
                    <div class="uk-grid uk-flex uk-flex-center">
                        <div class="uk-width-3-5@m uk-text-center">                            
                            <h2 class="uk-margin-small-top">Hi, we’re here to help.</h2>
                            <form class="uk-search uk-search-default uk-width-1-1 uk-margin-bottom">
                                <span data-uk-search-icon></span>
                                <input class="uk-search-input uk-border-pill" type="search" placeholder="Search for articles...">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="uk-grid-divider uk-child-width-1-3@m uk-child-width-1-2@s uk-margin-medium-top" data-uk-grid>
                    <div>
                        <h4 class="uk-heading-bullet"><a class="uk-link-text uk-text-decoration-none" href="#">How-tos & Tutorials</a></h4>
                        <div class="uk-grid uk-grid-small" data-uk-grid>                        
                            <div class="uk-width-expand@m">
                                <p>Comprehensive information How-Tos & Tutorials for Trading Success.</p>
                            </div>
                            <div class="uk-width-auto@m">
                              <div class="in-icon-wrap small transparent uk-margin-left">
                                <i class="fas fa-question fa-3x"></i>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-visible@m">
                        <h4 class="uk-heading-bullet"><a class="uk-link-text uk-text-decoration-none" href="#">Security and Privacy</a></h4>
                        <div class="uk-grid uk-grid-small" data-uk-grid>                        
                            <div class="uk-width-expand@m">
                                <p>Ensuring Security and Privacy in Every Transaction.</p>
                            </div>
                            <div class="uk-width-auto@m">
                              <div class="in-icon-wrap small transparent uk-margin-left">
                                <i class="fas fa-unlock-alt fa-3x"></i>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="uk-heading-bullet"><a class="uk-link-text uk-text-decoration-none" href="#">Open a Support ticket</a></h4>
                        <div class="uk-grid uk-grid-small" data-uk-grid>                        
                            <div class="uk-width-expand@m">
                                <p>Open a Support Ticket</p>
                            </div>
                            <div class="uk-width-auto@m">
                              <div class="in-icon-wrap small transparent uk-margin-left">
                                <i class="fas fa-life-ring fa-3x"></i>
                              </div>
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
<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-3-5@m">
                <div class="uk-grid-small uk-grid-match uk-child-width-1-2@s uk-child-width-1-1@m in-content-11" data-uk-grid>
                    <div>
                        <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                  <div class="in-icon-wrap circle in-margin-remove-left@s uk-margin-left">
                                    <i class="fas fa-book fa-lg"></i>
                                  </div>
                                </div>
                                <div class="uk-width-expand@m in-margin-top-10@s">
                                    <h4 class="uk-margin-small-bottom">Getting started with our product</h4>
                                    <img class="uk-border-pill uk-background-muted uk-float-left uk-margin-remove-adjacent uk-margin-small-right" src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-7.png" width="40" height="40" alt="author-image">
                                    <p class="uk-text-small uk-margin-remove-bottom">5 articles in this collection</p>
                                    <p class="uk-text-small uk-margin-remove-top">Written by Scott Baker</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                 <div class="in-icon-wrap circle in-margin-remove-left@s uk-margin-left">
                                    <i class="fas fa-pen-nib fa-lg"></i>
                                  </div>
                                </div>
                                <div class="uk-width-expand@m in-margin-top-10@s">
                                    <h4 class="uk-margin-small-bottom">Contracts and E-Signatures</h4>
                                    <img class="uk-border-pill uk-background-muted uk-float-left uk-margin-remove-adjacent uk-margin-small-right" src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-8.png" width="40" height="40" alt="author-image">
                                    <p class="uk-text-small uk-margin-remove-bottom">2 articles in this collection</p>
                                    <p class="uk-text-small uk-margin-remove-top">Written by Timothy Watkins</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                <div class="in-icon-wrap circle in-margin-remove-left@s uk-margin-left">
                                    <i class="fas fa-file-invoice fa-lg"></i>
                                  </div>
                                </div>
                                <div class="uk-width-expand@m in-margin-top-10@s">
                                    <h4 class="uk-margin-small-bottom">Invoicing and Getting paid</h4>
                                    <img class="uk-border-pill uk-background-muted uk-float-left uk-margin-remove-adjacent uk-margin-small-right" src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-6.png" width="40" height="40" alt="author-image">
                                    <p class="uk-text-small uk-margin-remove-bottom">3 articles in this collection</p>
                                    <p class="uk-text-small uk-margin-remove-top">Written by Peter Jacobs</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                  <div class="in-icon-wrap circle in-margin-remove-left@s uk-margin-left">
                                    <i class="fas fa-users fa-lg"></i>
                                  </div>
                                </div>
                                <div class="uk-width-expand@m in-margin-top-10@s">
                                    <h4 class="uk-margin-small-bottom">Project sources and Tracking</h4>
                                    <img class="uk-border-pill uk-background-muted uk-float-left uk-margin-remove-adjacent uk-margin-small-right" src="{{ asset('assets/frontends/liquid') }}/img/blockit/in-team-3.png" width="40" height="40" alt="author-image">
                                    <p class="uk-text-small uk-margin-remove-bottom">8 articles in this collection</p>
                                    <p class="uk-text-small uk-margin-remove-top">Written by Evelyn Mason</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section content end -->
@endsection