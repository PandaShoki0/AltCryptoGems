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
<!-- blog content begin -->
<div class="uk-section uk-margin-small-top">
    <div class="uk-container">
        <div class="uk-grid" data-uk-grid>
            <div class="uk-width-2-3@m">
                <div class="in-blog-1" data-uk-grid>
                    @if (!empty(posts()))
                        @foreach (posts() as $item)
                        @php $item = json_decode($item->data, true); @endphp
                        <div class="in-stretch">
                            <article class="uk-card uk-card-default uk-border-rounded">
                                <div class="uk-card-media-top">
                                    <img src="{{ $item['imageurl'] }}" alt="{{ $item['title'] }}">
                                </div>
                                <div class="uk-card-body">
                                    <h3>
                                        <a href="{{ $item['url'] }}" class="link-primary text-decoration-none">{{ $item['title'] }}</a>
                                    </h3>
                                    <p>{!! $item['body'] !!}</p>
                                    <div class="uk-flex">
                                    
                                        
                                        <div class="uk-flex uk-flex-middle">
                                            <p class="uk-text-small uk-text-muted uk-margin-remove">
                                                {{ date("Y-m-d H:i:s", $item['published_on']) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-footer uk-clearfix">
                                    <div class="uk-float-left">
                                        <span class="uk-label uk-label-success uk-text-small uk-border-pill">{{ $item['categories'] }}</span>
                                    </div>
                                    <div class="uk-float-right">
                                        <a href="{{ $item['url'] }}" class="uk-button uk-button-text uk-text-primary">Read more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    @endif
                </div>
                <!-- pagination begin -->
                <ul class="uk-pagination uk-flex-center uk-margin-medium-top"></ul>
                <!-- pagination end -->
            </div>
            <div class="uk-width-expand@m">
                <!-- widget search begin -->
                <aside class="uk-margin-medium-bottom">
                    <form name="blog-search" class="uk-search uk-search-default uk-width-1-1">
                        <a href="" class="uk-search-icon-flip" data-uk-search-icon></a>
                        <input class="uk-input uk-border-rounded" type="search" placeholder="Search here...">
                    </form>
                </aside>
                <!-- widget search end -->
                <!-- widget categories begin -->
                <aside class="uk-margin-medium-bottom">
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">        
                        <h5 class="uk-heading-bullet uk-text-uppercase uk-margin-remove-bottom">Categories</h5>
                        <ul class="uk-list widget-categories"></ul>
                    </div>
                </aside>
                <!-- widget categories end -->
                <!-- widget lates begin -->
                <aside class="uk-margin-medium-bottom">
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                        <h5 class="uk-heading-bullet uk-text-uppercase uk-margin-remove-bottom">Latest News</h5>
                        <ul class="uk-list uk-list-divider uk-list-large widget-latest"></ul>        
                    </div>
                </aside>
                <!-- widget lates end -->
                <!-- widget tags begin -->
                <aside class="uk-margin-medium-bottom">
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                        <h5 class="uk-heading-bullet uk-text-uppercase uk-margin-remove-bottom">Tags</h5>
                        <div class="uk-margin-top widget-tag"></div>
                    </div>
                </aside>
                <!-- widget tags end -->
            </div>
        </div>
    </div>
</div>
<!-- blog content end -->
@endsection