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
        <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-1-2@m uk-text-center">
                <h2 class="uk-margin-small-bottom">Do not hesitate to <span class="in-highlight">reach out.</span></h2>
                <p class="uk-text-lead uk-text-muted uk-margin-remove">Just fill in the contact form here and we’ll be sure to reply as fast as possible</p>
            </div>
            <div class="uk-width-1-1@m uk-margin-large-top">
                <div class="uk-grid uk-grid-large uk-child-width-1-2@m" data-uk-grid>
                    <div>
                        <form id="contact-forms" action="{{ route('contact') }}" method="POST" class="uk-form uk-grid-small" data-uk-grid>
                            @csrf
                            <div class="uk-width-1-1">
                                <input class="uk-input uk-border-rounded" id="name" name="name" type="text" placeholder="Full name">
                            </div>
                            <div class="uk-width-1-1">
                                <input class="uk-input uk-border-rounded" id="email" name="email" type="email" placeholder="Email address">
                            </div>
                            <div class="uk-width-1-1">
                                <input class="uk-input uk-border-rounded" id="subject" name="subject" type="text" placeholder="Subject">
                            </div>
                            <div class="uk-width-1-1">
                                <textarea class="uk-textarea uk-border-rounded" id="message" name="message" rows="6" placeholder="Message"></textarea>
                            </div>
                            <div class="uk-width-1-1">
                                <button class="uk-width-1-1 uk-button uk-button-primary uk-border-rounded" id="sendemails" type="submit" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <h3 class="uk-margin-remove-bottom">Business submissions</h3>
                        <p class="uk-margin-small-top">For business plan submissions. Please submit using this</p>
                        <div class="uk-flex uk-flex-middle uk-margin">
                            <div class="in-icon-wrap circle small primary-color uk-margin-small-right">
                                <i class="fas fa-envelope fa-sm"></i>
                            </div>
                            <div>
                                <p class="uk-margin-remove">support@solidbulltrades.com</p>
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