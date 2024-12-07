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
        <div class="uk-grid uk-flex uk-flex-center in-blog-1 in-article">
            <div class="uk-width-3-4@m">
                <article class="uk-card uk-card-default uk-border-rounded">
                    <div class="uk-card-body" style="background: black">
                        <div class="uk-flex">
                            
                            <div class="uk-flex uk-flex-middle">
                                <p class="uk-text-small uk-text-muted uk-margin-remove">
                                    Jupitar Finance
                                    <span class="uk-margin-small-left uk-margin-small-right">•</span>
                                </p>
                            </div>
                            <div class="uk-flex uk-flex-middle">
                                <p class="uk-text-small uk-text-muted uk-margin-remove">
                                    {{ $post->posted_at ?? "" }}
                                </p>
                            </div>
                        </div>
                        <h2 class="uk-margin-top uk-margin-medium-bottom" style="color: white">{{ $post->title ?? "" }}</h2>
                        


                        {!! $post->contents ?? "" !!}
                    </div>
                    
                </article>
            </div>
        </div>
    </div>
</div>
<!-- blog content end -->
@endsection