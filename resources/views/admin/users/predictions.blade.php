@extends('layouts.admin')

@section('page-style')
<link rel="stylesheet" href="{{asset('userassets/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome-iconpicker.min.css')}}">
<link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom.css')}}">


<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
<style>
    .selection{
        width: 100%;
        height: 42px;
    }
    :is(.dark .input-group > span ){
        background-color: unset;
    }
    .input-group > span{
        border-width: 0px;
        background-color: unset;
        padding-left: 0px;
        padding-right: 0px;
        
    }
    /* .select2-container--default .select2-selection--multiple .select2-selection__choice{
        margin-top: 0;
        padding: 0;
    } */
</style>
@endsection

@section('content')
@php
    $user_default_wallet = \App\Models\Wallet::whereUser_id($user->id)->whereIsDefault(1)->first();
    $user_wallets = \App\Models\Wallet::whereUser_id($user->id)->get();
@endphp

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <div class="col-md-6 text-right float-right">
                        <a href="{{route('admin.users.showprediction', ['live', $user->id])}}" class="btn btn-sm btn-success">Live Predictions</a>
                        <a href="{{route('admin.users.showprediction', ['demo', $user->id])}}" class="btn btn-sm btn-warning">Demo Predictions</a>        
                </div>
                <h4 class="tile-title">
                    <i class="fa fa-cogs"></i> Generate Predictions
                </h4>
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Important Notice about generating predictions</h4>
                    Predictions generated with amount range will be bring results in <strong>Quantities</strong> for each signal. The amount is constantly in "{{$user->ccy->code}}" at the point of signal generation but can be traded in any currency by the account manager or client.<br />
                    This way, the system determines the minimum quantity required for an asset to be traded at a particular margin(your price).<br />
                </div>
                <div class="tile-body">
                    <form id="form" method="POST" action="{{ route('admin.users.savepredictions') }}"
                          enctype="multipart/form-data" name="editForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label> <strong>Trade Type</strong></label>
                                <input data-toggle="toggle" checked data-onstyle="success" data-offstyle="info" data-on=" <i class='fa fa-area-chart'></i> LIVE TRADE" data-off="<i class='fa fa-area-chart'></i> DEMO TRADE"  data-width="100%" data-height="20" type="checkbox" name="trade_type">
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Amount Range From</strong></label>
                                <div class="input-group" style="flex-wrap: inherit">
                                    <input type="text" name="amount_from" class="form-control input-lg" step="0.01" style="border-bottom-right-radius: 0px !important; border-top-right-radius: 0px !important;">
                                    <div class="input-group-append"><span class="input-group-text" style="border-bottom-left-radius: 0px !important; border-top-left-radius: 0px !important; line-height: 2;">{{$user->ccy->code}}</span></div>
                                </div>
                                @if ($errors->has('amount'))
                                    <span class="help-block" style="color: red">
                                                <strong>{{ $errors->first('amount_from') }}</strong>
                                            </span>
                                @endif
                            </div>
                            <input type="hidden" name="curreny_user" value="{{strtolower($user->ccy->code)}}" />
                            <div class="form-group col-md-4">
                                    <label><strong>Amount Range To</strong></label>
                                    <div class="input-group" style="flex-wrap: inherit">
                                        <input type="text" name="amount_to" class="form-control input-lg" step="0.01" style="border-bottom-right-radius: 0px !important; border-top-right-radius: 0px !important;">
                                        <div class="input-group-append"><span class="input-group-text" style="border-bottom-left-radius: 0px !important; border-top-left-radius: 0px !important; line-height: 2;">{{$user->ccy->code}}</span></div>
                                    </div>
                                    @if ($errors->has('amount'))
                                        <span class="help-block" style="color: red">
                                                    <strong>{{ $errors->first('amount_to') }}</strong>
                                                </span>
                                    @endif
                            </div>

                            <div class="form-group col-md-4">
                                    <label><strong>Number of Signals to Generate</strong></label>
                                    <div class="input-group">
                                        <input type="text" name="number_trades" class="form-control input-lg" />
                                    </div>
                                    @if ($errors->has('number_trades'))
                                        <span class="help-block" style="color: red">
                                            <strong>{{ $errors->first('number_trades') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            
                            <div class="form-group col-md-4">
                                    <label><strong>Assets</strong></label>
                                    <div class="input-group">
                                        <select id="symbols" name="symbols[]" class="form-control" multiple="">
                                                @foreach ($symbols as $symbol)
                                                    <option value="{{$symbol->id}}">{{$symbol->fromsym}}-{{$symbol->tosym}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('symbols'))
                                        <span class="help-block" style="color: red">
                                            <strong>{{ $errors->first('symbols') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                            <div class="form-group col-md-4">
                                    <label><strong>Start Permanently Winning after</strong></label>
                                    <div class="input-group">
                                        <select id="winning-time" class="form-control" name="winning_time[]"  multiple="">
                                            <option value="60">1 min</option>
                                            <option value="180">3 min</option>
                                            <option value="300">5 min</option>
                                            <option value="900">15 mins</option>
                                            <option value="1800">30 mins</option>
                                            <option value="3600">1 hr</option>
                                            <option value="7200">2 hr</option>
                                            <option value="86400">1 day</option>
                                            <option value="172800">2 day</option>
                                            <option value="259200">3 day</option>
                                            <option value="345600">4 day</option>                                            
                                        </select>
                                    </div>
                                    @if ($errors->has('winning_time'))
                                        <span class="help-block" style="color: red">
                                            <strong>{{ $errors->first('winning_time') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group col-md-12">
                                <input id="rates" class="d-none" type="hidden" name="rates" />
                                @if ($errors->has('rates'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('rates') }}</strong>
                                    </span>
                                @endif
                            </div>
                            


                            <div class="form-group col-md-6">
                                    <label for="generate_stop_loss" class="form-check-label"><strong>Generate with Stop Loss</strong></label>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="min_stop_loss">Min. Stop Loss</label>
                                        <input id="min_stop_loss" class="form-control" type="text" value="0" name="min_stop_loss">
                                    </div>
                                    @if ($errors->has('min_stop_loss'))
                                        <span class="help-block" style="color: red">
                                            <strong>{{ $errors->first('min_stop_loss') }}</strong>
                                        </span>
                                    @endif

                                    <div class="form-group col-md-6">
                                        <label for="max_stop_loss">Max. Stop Loss</label>
                                        <input id="max_stop_loss" class="form-control" type="text" value="0" name="max_stop_loss">
                                    </div>
                                    @if ($errors->has('max_stop_loss'))
                                        <span class="help-block" style="color: red">
                                            <strong>{{ $errors->first('max_stop_loss') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                           
                            <div class="form-group col-md-6">

                                <label for="generate_stop_loss" class="form-check-label"><strong>Generate with Take Profit</strong></label>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="min_take_profit">Min. Take Profit</label>
                                    <input id="min_take_profit" class="form-control" type="text" value="0" name="min_take_profit">
                                </div>
                                @if ($errors->has('min_take_profit'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('min_take_profit') }}</strong>
                                    </span>
                                @endif

                                <div class="form-group col-md-6">
                                    <label for="max_take_profit">Max. Take Profit</label>
                                    <input id="max_take_profit" class="form-control" type="text" value="0" name="max_take_profit">
                                </div>
                                @if ($errors->has('max_take_profit'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('max_take_profit') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                         

                        </div>
                      
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Generate</button>

                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            @include('admin.users.side-bar')

        </div>


    </div>


@endsection

@section('page-scripts')
    
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/fontawesome-iconpicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('assets/admin/js/pace.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/home.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendor_components/select2/dist/js/select2.min.js')}}"></script>

<script type="text/javascript">

    var timeFn;

    $(document).ready(function(){
        $('#symbols').select2();
        $('#winning-time').select2();

        checkforRates();
    });
    

    function checkforRates(){

        if(rates == undefined){
            timeFn = setTimeout("checkforRates()", 1000);
            return;
        }
        console.log(rates);
        $('#rates').val(JSON.stringify(rates));
        stopCheckRate();
    }


    function stopCheckRate(){
        clearTimeout(timeFn);
    }

</script>
@endsection