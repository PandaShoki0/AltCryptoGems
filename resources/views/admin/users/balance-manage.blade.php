@extends('layouts.admin')

@section('page-style')
<link rel="stylesheet" href="{{asset('userassets/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


<!-- Main CSS-->
{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}"> --}}
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome-iconpicker.min.css')}}">
<link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" type="text/css"/>

{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom.css')}}"> --}}


<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
@endsection

@section('content')
@php
    $user_default_wallet = \App\Models\Wallet::whereUser_id($user->id)->whereIsDefault(1)->first();
    
$user_wallets = \App\Models\Wallet::whereUser_id($user->id)->get();

@endphp
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-cogs"></i> Update Profile
                </h4>
                <div class="tile-body">
                    <form id="form" method="POST" action="{{ $url }}"
                          enctype="multipart/form-data" name="editForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label> <strong>Name</strong></label>
                                <input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-on=" <i class='fa fa-plus'></i> Add Money" data-off="<i class='fa fa-minus'></i> Substruct Money"  data-width="100%" data-height="20" type="checkbox" name="operation">

                            
                                <label><strong>Amount</strong></label>
                                <div class="input-group" style="flex-wrap: inherit">
                                    <input type="text" name="amount"  onKeyUp="readAmount( this )" class="form-control amount input-lg" step="0.01"  style="border-bottom-right-radius: 0px !important; border-top-right-radius: 0px !important;">
                                    <div class="input-group-append"><span class="input-group-text coin_code" style="border-bottom-left-radius: 0px !important; border-top-left-radius: 0px !important; line-height: 2;">{{ $user_default_wallet->symbol }}</span></div>
                                </div>
                                @if ($errors->has('amount'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif

                                <input type="hidden" name="currency_amount" class="currency_amount" value="" />
                                <input type="hidden" name="currency" class="currency" value="{{strtolower($user->ccy->code)}}" />

                                <div class="form-group">
                                    <label><strong>Wallet</strong></label>
                                    <select id="wallet" class="form-control" name="wallet">
                                        @foreach($user_wallets as $wallet)
                                            <option value="{{$wallet->id}}" data-coin="{{$wallet->symbol}}" @if($wallet->is_default == 1) selected @endif>{{ ($account_type=='live' ? $wallet->balance : $wallet->balance_demo).' '.$wallet->symbol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('wallet'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('wallet') }}</strong>
                                    </span>
                                @endif
                            </div>

                       
                            <div class="form-group col-md-6">
                                <label for="my-input"><strong>Amount in Fiat</strong></label>
                                <div class="input-group" style="flex-wrap: inherit">
                                    <input class="form-control currency_fiat" type="text" readonly name="currency_view" placeholder="Amount in Fiat" style="border-bottom-right-radius: 0px !important; border-top-right-radius: 0px !important;">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="my-addon" style="border-bottom-left-radius: 0px !important; border-top-left-radius: 0px !important; line-height: 2;">{{$user->ccy->code}}</span>
                                    </div>
                                </div>
                                
                                <label> <strong>Message</strong></label>
                                <textarea name="message" id="" class="form-control"  rows="5" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

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

    <script type="text/javascript">
    var current_coin = '{{$user_default_wallet->symbol}}';
        $(document).ready(function(){
            current_coin = current_coin == 'USDT' ? 'USD': current_coin
            $('#wallet').on('change', function(){
                $('.coin_code').text( $("#wallet option:selected").data('coin') );
                current_coin = $("#wallet option:selected").data('coin');
                current_coin = current_coin == 'USDT' ? 'USD': current_coin
                result = convertValue(current_coin, '{{strtolower($user->ccy->code)}}', $('.amount').val(), false);
                $('.currency_amount').val(result);
                console.log("currency_amoun", result)
                $('.currency_fiat').val(convertValue(current_coin, '{{strtolower($user->ccy->code)}}', $('.amount').val()));
            });
        });


        function readAmount( obj ){
            // obj.value
            console.log(current_coin);
            console.log(obj.value);
            result = convertValue(current_coin, '{{strtolower($user->ccy->code)}}', obj.value, false);
            $('.currency_amount').val(result);
            $('.currency_fiat').val(convertValue(current_coin, '{{strtolower($user->ccy->code)}}', $('.amount').val()));
        }

    </script>
@endsection