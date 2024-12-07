@extends('layouts.admin')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/vendor_components/flagstrap/dist/css/flags.css')}}" rel="stylesheet">

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
@endsection

@php
    $user_default_wallet = \App\Models\Wallet::whereUser_id($user->id)->whereIsDefault(1)->first();
    $user_wallets = \App\Models\Wallet::whereUser_id($user->id)->get();
@endphp


@section('content')

    <div class="row">
        <div class="col-md-2">
           
            @include('admin.users.side-bar')
            
            <div class="card">
                <div class="card-body">
                <form action="{{ route('admin.users.profit-range', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Profit Range</label>
                    <select name="trade_booster" class="form-control">
                        <option value="normal" {{$user->trade_booster == 'normal' ? 'selected': ''}}>Normal</option>
                        <option value="high" {{ $user->trade_booster == 'high' ? 'selected': '' }}>High</option>
                        <option value="super" {{ $user->trade_booster == 'super' ? 'selected': '' }}>Turbo</option>
                    </select>
                </div>
                
                <button class="btn btn-primary">
                    Save
                </button>
            </form>
                     </div>       
            </div>


        </div>


        <div class="col-md-10">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 py-2">
                            <div class="card">
                                <div class="card-body">
                                    Required Margin: {{ $margin_used }} 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                             <div class="card">
                                <div class="card-body">
                                    Profit Loss: {{ $profit_loss_user }}
                                </div>
                            </div>
                        </div>                        
                    </div>

                     <div class="card">
                       <div class="card-body" style="padding:5px;">
                            <div id="tradehistoryadmin"></div>
                        </div>
                        
                    </div>    
                </div>
                <div class="col-md-4">
                    <div class="card">
                        
                       <div class="card-body" style="padding:5px;">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    @foreach($tradeCategory as $k => $category)
                                        <a class="nav-item nav-link @if($k == 0 ) active @endif" id="nav-{{strtolower($category->name)}}-tab" data-toggle="tab" href="#nav-{{strtolower($category->name)}}" role="tab" aria-controls="nav-{{strtolower($category->name)}}" aria-selected="true">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                @foreach($tradeCategory as $k => $category)
                                <div class="tab-pane fade @if($k==0)show active @endif" id="nav-{{strtolower($category->name)}}" role="tabpanel" aria-labelledby="nav-{{strtolower($category->name)}}-tab">
                                    <div class="table-responsive" id="asset-scroll-{{strtolower($category->name)}}">
                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <th>Instruments</th>
                                              <th>Price</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          @foreach($pairs as $pair)
                                              @if($pair->trade_category_id==$category->id)
                                              <tr class="active">
                                                <td style="cursor: pointer">
                                                  <h6 class="mb-0 font-13 pair_name-{{ $pair->fromsym . '-' . $pair->tosym }}">{{ $pair->name }}</h6>
                                                  <p class="m-0 font-12">
                                                    <span class="font-weight-bold change_price-{{ $pair->fromsym . '-' . $pair->tosym }}"> 0.00</span>
                                                  </p>
                                                </td>
                                                <td style="cursor: pointer">
                                                  <div class="col-white price-{{ $pair->fromsym . '-' . $pair->tosym }}">0.00</div>
                                                  <div class="spread-{{ $pair->fromsym . '-' . $pair->tosym }} d-none">0</div>
                                                  <div class="high_low_price-{{ $pair->fromsym . '-' . $pair->tosym }} d-none">0</div>
                                                  <div class="sell_price-{{ $pair->fromsym . '-' . $pair->tosym }} d-none"></div>
                                                  <div class="buy_price-{{ $pair->fromsym . '-' . $pair->tosym }} d-none"></div>
                                                  <div class="asset-info-{{ $pair->fromsym . '-' . $pair->tosym }} d-none" data-asset="{{ json_encode($pair) }}"></div>
                                                </td>
                                                <td>
                                                    <div class="btn btn-group">
                                                        <a id="buy_trade{{ $pair->fromsym . '-' . $pair->tosym }}" data-title="Place Buy Order for {{ $pair->fromsym . '-' . $pair->tosym }}" data-asset="{{ json_encode($pair) }}" class="btn btn-sm text-white btn-success buy_trade" data-target="#placeTrade" data-toggle="modal">BUY</a>
                                                        <a id="sell_trade{{ $pair->fromsym . '-' . $pair->tosym }}" data-title="Place Sell Order for {{ $pair->fromsym . '-' . $pair->tosym }}" data-asset="{{ json_encode($pair) }}" class="btn btn-sm text-white btn-danger sell_trade" data-target="#placeTrade" data-toggle="modal">SELL</a>
                                                    </div>
                                                </td>
                                              </tr>
                                              @endif
                                          @endforeach
                                        </table>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div> 
                
            </div>
            
        </div>
    </div>        
    
    
    
    <div id="placeTrade" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="placeTrade-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-inverse">
                <div class="modal-header">
                    <h5 class="modal-title" id="placeTrade-title"></h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tradelive" autocomplete="off" method="POST" action="" enctype="application/x-www-form-urlencoded">
                    @csrf
                    <div class="modal-body">
                        <div class="media">
                            <div class="media-body">
                            <div class="media-title h3 pair_name"></div>
                            <div class="media-sub-title percent_change"></div>
                            </div>
                            <div class="media-items">
                            
                            <div class="media-item">
                                <div class="media-label">Current Rate</div>
                                <div class="media-value current_rate"></div>
                                <div class="media-value ask_rate"></div>
                                <div class="media-value bid_rate"></div>
                            </div>
                            </div>
                        </div>

                            <div class="form-group mt-2 pt-1">
                                <label for="quantity">Amount <strong>Contracts:</strong> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input id="quantity" class="form-control" type="text" name="quantity" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 profile-widget mt-1 mb-0">
                    
                                    <div class="profile-widget-header mb-0">
                                        <div class="profile-widget-items row">
                                            <div class="col-md-6 text-center profile-widget-item">
                                                <div class="profile-widget-item-label h5 text-bold">Value</div>
                                                <div class="profile-widget-item-value trade-item-value h3">--:--</div>
                                                <div class="profile-widget-item-value trade-item-value-user-currency h5">--:--</div>
                                            </div>
                                            
                                            <div class="col-md-6 text-center profile-widget-item">
                                                <div class="profile-widget-item-label h5 text-bold">Required Margin</div>
                                                <div class="profile-widget-item-value trade-item-margin h3">--:--</div>
                                                <div class="profile-widget-item-value trade-item-margin-user-currency h5">--:--</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <h5>Advance</h5>
                            <hr />

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="stopLoss">
                                    <label class="custom-control-label" for="stopLoss">Stop Loss at</label>
                                </div>

                                <input id="stopLossField" class="form-control d-none" type="text" name="stop_loss">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="takeProfit">
                                    <label class="custom-control-label" for="takeProfit">Take Profit at</label>
                                </div>

                                <input id="takeProfitField" class="form-control d-none" type="text" name="take_profit">
                            </div>

                            <hr />
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12 profile-widget mt-1 mb-0">
                    
                                    <div class="profile-widget-header mb-0">
                                        <div class="profile-widget-items row justify-content-center text-center">
                                        
                                            <div class="profile-widget-item col-md-6">
                                                <div class="profile-widget-item-label">Unit Amount</div>
                                                <div class="profile-widget-item-value unit-amount h5">--:--</div>
                                            </div>
    
                                            <div class="profile-widget-item col-md-6">
                                                <div class="profile-widget-item-label">Leverage</div>
                                                <div class="profile-widget-item-value leverage-ratio h5">--:--</div>
                                            </div>

                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            
                            <hr />
                            <div class="form-group">
                                 <label><strong>Predict Trade to</strong></label>
                                <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                       data-offstyle="danger" data-width="100%" data-on="Win" data-off="Loss"
                                       type="checkbox" value="1"
                                       name="prediction" checked>
                            </div>
                            
                            
                            <div class="form-group">
                                    <label><strong>Start Permanently Winning after</strong></label>
                                    <div class="input-group">
                                        <select id="winning-time" class="form-control" name="winning_time">
                                            <option value="60">1 min</option>
                                            <option value="180">3 min</option>
                                            <option value="300">5 min</option>
                                            <option value="900">15 mins</option>
                                            <option value="1800">30 mins</option>
                                            <option value="3600">1 hrs</option>
                                            <option value="7200">2 hrs</option>
                                            <option value="86400">1 day</option>
                                            <option value="172800">2 day</option>
                                            <option value="259200">3 day</option>
                                            <option value="345600">4 day</option>                                            
                                        </select>
                                    </div>
                            </div>
                            
                            
                            
                            <p class="text-bold large text-center h5">This position will be closed automatically in 7 days</p>
                            <input type="hidden" name="price" class="current_price">
                            <input type="hidden" name="trade_action" class="trade-action" />
                            <input type="hidden" name="trade_type" class="trade-type" />
                            <input type="hidden" name="trade_amount_value" class="amount-value">
                            <input type="hidden" name="amount_value_user_currency" class="amount-value-user">
                            <input type="hidden" name="trade_amount_margin" class="amount-margin">
                            <input type="hidden" name="amount_margin_user_currency" class="amount-margin-user">
                            <input type="hidden" name="leverage_input" class="leverage_input"  />
                            <input type="hidden" name="rates" id="rates"  />
                            <input type="hidden" name="trade_currency" class="trade-currency"  />
                            <input type="hidden" name="product_id" class="curr_product_id"  />
                            
                    </div>
                    <div class="modal-footer text-center">
                        <button class="btn btn-lg btn-block trade_btn" name="submit" type="submit"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('page-scripts')
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

    var timeFn;

    $(document).ready(function(){
        showOptions();
        checkforRates();
        tradehistory();
        
        $('#quantity').on('change, keyup', function(){
            
            qty = $(this).val();
            selected_id = $(".curr_product_id").val();
    
            current_price = $('.current_price').val();
            updateMarginValue( selected_id, qty, current_price );
        });
        
         $('#stopLoss').change(function(){
            if(this.checked == true){
                $('#stopLossField').removeClass('d-none');
            }else{
                $('#stopLossField').addClass('d-none');
            }
        })

        $('#takeProfit').change(function(){
            if(this.checked == true){
                $('#takeProfitField').removeClass('d-none');
            }else{
                $('#takeProfitField').addClass('d-none');
            }
        })
        //Sell Buttons in the Asset List
        $('.sell_trade').on('click', function(e) {
            var title = $(this).data('title');
            var assets = $(this).data('asset');
            var pair_name = assets.name;
            executeSell(title, assets, pair_name);
        });

        //Buy Buttons in the Asset List
        $('.buy_trade').on('click', function(e) {
            var title = $(this).data('title');
            var assets = $(this).data('asset');
            var pair_name = assets.name;
            executeBuy(title, assets, pair_name);
        });


        $('#tradelive').on('submit', function(e){
            
            e.preventDefault();
            
            var btn_default = $('.trade_btn').html();
            
            var btn_action = $('.trade_btn');
            
            $(".time-executed").val(new Date().toUTCString());

            $(".trade-type").val('live');

            var dataPost = $(this).serialize();
            $('.trade_btn').attr('disabled', 'disabled');
            $('.trade_btn').html('<i class="fa fa-spin fa-spinner"></i> Opening Position &hellip;');


            var token = $("input[name='_token']").val();

            var action = $('.trade-action').val();
                       
            $('#quantity').val('');
            $('#stopLoss').val('');
            $('#stopLossField').val('');
            $('#takeProfit').val('');
            $('#takeProfitField').val('');

            $.ajax({                
                url: '{{route("admin.users.trade-new-position", $user->id)}}',
                data: dataPost,
                method: "POST",
                dataType: "json",
                success: function( data ){
                    
                    action_text = action.toUpperCase();
                    $("#placeTrade").modal("hide");
                    swal(data.status == 'success' ? action_text+" Position Opened" : "Error Opening "+action+" position", data.message, data.status);
                
                    location.reload();
                 
                },
                error: function (data) {
                    if( data.status === 422 ) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            //console.log(key+ " " +value);
                            var error_message = '';
                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) { 
                                    error_message = value;
                                });
                            }else{
                                error_message = value;
                            }
                            console.log(error_message);
                            if(key == 'Limit'){
                                
                                swal({
                                  title: "UPGRADE REQUIRED",
                                  text: error_message,
                                  icon: "warning",
                                  button: "UPGRADE NOW"
                                });

                                 return;
                            }
                            else
                            swal(key + " Invalid!", error_message, "error");
                            btn_action.removeAttr('disabled');
                            btn_action.html(btn_default);
                        });
                    }
                },

                
            });
        });


    });
  
    var isRunning =  false;
  
    var gcd = function(a, b) {
        if (b < 0.0000001) return a; // Since there is a limited precision we need to limit the value.

        return gcd(b, Math.floor(a % b)); // Discard any fractions due to limitations in precision.
    };

    function showOptions(){

        const products = [];
        var change = [];
        var spread = [];
        var timing = [];
        var initPrices = [];
        var currentPrices = [];
        var stat = [];

        $.getJSON("{{route('admin.users.get.assets')}}", function(d){

            console.log( d );

            for(i=0; i < d.length; i++) {

                products.push({
                    id: ''+d[i].fromsym+'-'+d[i].tosym,
                    label: ''+d[i].name,
                });
            }

            const subscribe = {
                type: 'subscribe',
                    channels: [
                    {
                        name: 'ticker',
                        product_ids: products.map(product => product.id),
                    }
            ]};

            const ws = new WebSocket('wss://ws-feed.exchange.coinbase.com');
            ws.onopen = () => {
                ws.send(JSON.stringify(subscribe));
            };

            ws.onmessage = (e) => {
                const value = JSON.parse(e.data);
                if(value.type !== 'ticker')
                return;

                change[value.product_id] = (value.price - value.open_24h)/value.price;

                if (!initPrices[value.product_id]) {
                    initPrices[value.product_id] = value.open_24h;
                }

                currentPrices[value.product_id] = value.price;

                stat[value.product_id] = currentPrices[value.product_id] ? ((currentPrices[value.product_id] - initPrices[value.product_id]) / initPrices[value.product_id]) * 100: ((currentPrices[value.product_id] - Number(value.low_24h)) / Number(value.low_24h));

                $('.price-'+value.product_id).each(function(index, element) {
                    if(value.price > 0.09){
                        $(element).text(formatMoney(value.price));
                    }else{
                        $(element).text(formatMoney(value.price, 4));
                    }
                });

                $('.change_price-'+value.product_id).each(function(index, element) {
                    if(stat[value.product_id] >= 0){
                        $(element).html('<div class="text-success"><i class="fa fa-arrow-up"></i>'+stat[value.product_id].toFixed(2) + '%</div>');                  
                    }else{
                        $(element).html('<div class="text-danger"><i class="fa fa-arrow-down"></i>'+stat[value.product_id].toFixed(2) + '%</div>');                  
                    }
                });

                $('.sell_price-'+value.product_id).each(function(index, element) {
                    $(element).text(Number(value.best_ask));                  
                });

                $('.buy_price-'+value.product_id).each(function(index, element) {
                    $(element).text(Number(value.best_bid));                  
                });

                var _current = $(".curr_product_id").val();

                var qty = Number($('#quantity').val());
                
                if(_current == value.product_id){

                    spread[value.product_id] =  Number(value.best_ask) - Number(value.best_bid)

                    $('.current_price').val(Number(value.price));

                    $('.ask_price').text(Number(value.best_ask));

                    $('.bid_price').text(Number(value.best_bid));

                    $('.spread_input').val(Number(value.high_24h) - Number(value.low_24h));

                    $('.spread_text').text( (spread[value.product_id]).toFixed(2));

                    $('.selected_sell').html('<div>'+ Number(value.best_bid) + ' &nbsp;<label class="btn btn-sm btn-danger" onClick="sellPress(\''+value.product_id+'\')">sell</label></div>' );
                    
                    $('.selected_buy').html('<div>'+ Number(value.best_ask) + ' &nbsp;<label class="btn btn-sm btn-success" onClick="buyPress(\''+value.product_id+'\')">buy</label></div>');

                    $('.selected_high_low').html('<div>'+ Number(value.high_24h) + '/'+Number(value.low_24h)+'</div>');

                    if(stat[value.product_id] >= 0){
                        $('.selected_change').html('<div class="text-success"><i class="fa fa-arrow-up"></i>'+stat[value.product_id].toFixed(2) + '%</div>');                  
                    }else{
                        $('.selected_change').html('<div class="text-danger"><i class="fa fa-arrow-down"></i>'+stat[value.product_id].toFixed(2) + '%</div>');                  
                    }
                    updateMarginValue( value.product_id, qty, value.price );
                }
            }
        });
    }

    function updateMarginValue( select, quantity, price ){

        if(price == 0){
            price = Number($('.price-'+select).text());
        }

        var res_curr = select.split('-');

        current_unit = res_curr[1].toLowerCase();

        var total_leverage;
        var total_qty_price;
        var total_value;
        var margin;
        var total_margin;

        @if($user->userplan != null)
            @if($user->plan == 1)
                var max = 85;            
            @elseif($user->plan == 2)
                var max = 35;
            @elseif($user->plan == 3)
                var max = 15;
            @elseif($user->plan == 4)
            var max = 5;
            @endif        
        @elseif($user->userplan == null)
            var max = 85;
        @endif    
        
        total_leverage = max;

        total_leverage = (total_leverage > 99) ? max : ((total_leverage < 3) ? max : total_leverage); 

        total_qty_price = (price * quantity);
        
        total_margin = total_qty_price * (total_leverage/100);

        total_value = (total_margin * (100/total_leverage));

        if(rates !== undefined){
            currency_s = rates[current_unit];
            if(currency_s == undefined){
                $('.trade-item-margin').text( '$'+formatMoney(Number(total_margin)) );
                $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', 'usd'));
                $('.amount-margin-user').val(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', 'usd', false));
                /////
                $('.trade-item-value').text( '$'+formatMoney(Number(total_value)) );
                $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', 'usd'));
                $('.amount-value-user').val(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', 'usd', false));
                $('.trade-currency').val( 'usd' );

            }else{

                if(currency_s.type == 'crypto'){
                    $('.trade-item-margin').text( formatMoney(Number(total_margin), 4) + currency_s.unit );
                    $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', current_unit));
                    $('.amount-margin-user').val(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', current_unit, false));


                    $('.trade-item-value').text( formatMoney(Number(total_value), 4) + currency_s.unit );
                    $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', current_unit));
                    $('.amount-value-user').val(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', current_unit, false));
                    $('.trade-currency').val( current_unit );

                }else{
                    $('.trade-item-margin').text( currency_s.unit+formatMoney(Number(total_margin)) );
                    $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', current_unit));
                    $('.amount-margin-user').val(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', current_unit, false));

                    $('.trade-item-value').text( currency_s.unit+formatMoney(Number(total_value)) );
                    $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', current_unit));
                    $('.amount-value-user').val(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', current_unit, false));
                    $('.trade-currency').val( current_unit );

                }
            }
        }else{
            $('.trade-item-margin').text( '$'+formatMoney(Number(total_margin)) );
            $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', 'usd'));
            $('.amount-margin-user').val(convertToUserCurrency(total_margin, '{{strtolower($mycurrency->code)}}', 'usd', false));

            $('.trade-item-value').text( '$'+formatMoney(Number(total_value)) );
            $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', 'usd'));
            $('.amount-value-user').val(convertToUserCurrency(total_value, '{{strtolower($mycurrency->code)}}', 'usd', false));

            $('.trade-currency').val( 'usd' );

        }


        $('.amount-margin').val( Number(total_margin) );
        $('.amount-value').val( Number(total_value) );

        $('.leverage_input').val( Number(total_leverage) );


        var fraction = (total_leverage/100);
        var len = fraction.toString().length - 2;

        var denominator = Math.pow(10, len);
        var numerator = fraction * denominator;
        var timeOut;

        var divisor = gcd(numerator, denominator);    // Should be 5

        numerator /= divisor;                         // Should be 687
        denominator /= divisor;                       // Should be 200

        var finalratio = getRatio(numerator, denominator, 10);

        $('.leverage-ratio').text( finalratio );

        if(price == 0){
            timeOut = setTimeout("updateMarginValue", 600, [select, quantity, price]);
        }
        else{
            clearTimeout(timeOut);
        }

    }
    
    function getRatio(a,b,tolerance) { 
    /*where a is the first number, b is the second number,  and tolerance is a percentage 
    of allowable error expressed as a decimal. 753,4466,.08 = 1:6, 753,4466,.05 = 14:83,*/
    
        if (a > b) { var bg = a; var sm = b; } else { var bg = b; var sm = a; }
        for (var i = 1; i < 1000000; i++) {
            var d = sm / i;
            var res = bg / d;
            var howClose = Math.abs(res - res.toFixed(0));
            if (howClose < tolerance) {
                if (a > b) { 
                    return res.toFixed(0) + ':' + i; 
                } else { 
                    return i + ':' + res.toFixed(0); 
                }
            }
        }
    }
    
    function formatMoney(number, decPlaces, decSep, thouSep) {
        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
        decSep = typeof decSep === "undefined" ? "." : decSep;
        thouSep = typeof thouSep === "undefined" ? "," : thouSep;
        var sign = number < 0 ? "-" : "";
        var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
        var j = (j = i.length) > 3 ? j % 3 : 0;
    
        return sign +
            (j ? i.substr(0, j) + thouSep : "") +
            i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
            (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
    }

    function executeBuy(title, assets, pair_name){
       
        $('.trade_btn').removeClass('btn-outline-danger sell').addClass('btn-outline-success buy font-20').html('Place Buy');
        
        
        $('#placeTrade-title').html( title );
        $('.pair_name').html( pair_name );

        // $('.current_rate').html('<span class="price-'+assets.fromsym+'-'+assets.tosym+'">--:--</span>');
        $('.current_rate').html($(".price-"+assets.fromsym+'-'+assets.tosym).html());
        $('.percent_change').html($('.change_price-'+assets.fromsym+'-'+assets.tosym).html());
        // $('.percent_change').html('<span class="font-weight-bold change_price-'+assets.fromsym+'-'+assets.tosym+'">--:--</span>');

        $('.trade-action').val('buy');
        // $('.spread_input').val(assets.spread);
        $('.unit-amount').text(assets.step);

        $('.curr_product_id').val(assets.fromsym+'-'+assets.tosym);

        // console.log(assets);

        $('#quantity').data('step', assets.step);

        $('.current_price').val(Number($('.buy_price-'+assets.fromsym+'-'+assets.tosym).text()));


        updateMarginValue( assets.fromsym+'-'+assets.tosym, assets.step, Number($('.buy_price-'+assets.fromsym+'-'+assets.tosym).text()) );

    }

    
    function executeSell(title, assets, pair_name){

        $('.trade_btn').removeClass('btn-outline-success buy').addClass('btn-outline-danger sell font-20').html('Place Sell');

    
        $('#placeTrade-title').html( title );
        $('.pair_name').html( pair_name );

        // $('.current_rate').html('<span class="price-'+assets.fromsym+'-'+assets.tosym+'">--:--</span>');
        // $('.percent_change').html('<span class="font-weight-bold change_price-'+assets.fromsym+'-'+assets.tosym+'">--:--</span>');

        $('.current_rate').html($(".price-"+assets.fromsym+'-'+assets.tosym).html());
        $('.percent_change').html($('.change_price-'+assets.fromsym+'-'+assets.tosym).html());


        $('.trade-action').val('sell');
        $('.leverage_input').val(assets.leverage);
        // $('.spread_input').val(assets.spread);
        $('.unit-amount').text(assets.step);

        $('.curr_product_id').val(assets.fromsym+'-'+assets.tosym);

        // console.log(assets);

        $('#quantity').data('step', assets.step);


        $('.current_price').val(Number($('.sell_price-'+assets.fromsym+'-'+assets.tosym).text()));

        //set margin

        updateMarginValue( assets.fromsym+'-'+assets.tosym, assets.step, Number($('.sell_price-'+assets.fromsym+'-'+assets.tosym).text()) );

    }  
    
    
     function checkforRates(){
        var rates = {!! json_encode($rates) !!};

        if(rates == undefined){
            timeFn = setTimeout("checkforRates()", 1000);
            return;
        }
        console.log(rates);
        $('#rates').val(JSON.stringify(rates));
        $('.rates_alt').val(JSON.stringify(rates));
        stopCheckRate();
     }
    
    
      function stopCheckRate(){
          clearTimeout(timeFn);
      }
    
      function convertToUserCurrency(usd_value, currency_iso_name, currency_from, format = true){
          if(rates == undefined){
              checkforRates();
              return;
          }
    console.log("currency_from", currency_iso_name)
          coin_amount = parseFloat(Number(usd_value)/rates[currency_from].value);
    
          user_currency_value = rates[currency_iso_name].value * coin_amount;
    
          return (format) ? rates[currency_iso_name].unit+numberWithCommas(user_currency_value) : user_currency_value;
      }
      
    function tradehistory(){
          if(isRunning)
          return;
          isRunning = true;
          $('#tradehistoryadmin').load('{{route("admin.users.trade.history", $user->id)}}');        
      }

    
      $(document).ready(function () {

          $('.close_position').click(function(evt){
              evt.preventDefault();
              var item = JSON.parse($('.selected-position').val());
                
              swal({
                title: 'Close position for '+item.sym.name+'?',
                text: 'Are you sure you want to close the '+item.sym.name+' '+item.trade_action+' position for Trade ID:'+item.trade_id+'?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
              })
              .then((closePosition) => {
                if (closePosition) {
                  dataPost = {_payload: item, rates: rates, _token: "{{ csrf_token() }}"};
                  $.ajax({                
                      url: "{{route('admin.users.trade.close_trade')}}",
                      data: dataPost,
                      method: "POST",
                      dataType: "json",
                      success: function( data ){
                        //send close action to server and act base on feedback!
                        swal(data.message, {
                          icon: 'info',
                        });
                        
                         if(data.status == true){
                             old_position = $('.current_open_positions').val();
                    
                            console.log(parseInt(old_position)+" "+data.positions);
                            if(parseInt(old_position) != data.positions){
                                $('.openPositions span').text( data.positions );
                                $('.current_open_positions').val( data.positions );
                                //restructure the entire trade history and recall connect() with the new loaded position
                                if($('#tradehistoryfull').length > 0){
                                    $("#tradeHistoryList").load("{{route('admin.users.trade.history-reload', 'full')}}");
                                }else{
                                    $("#tradeHistoryList").load("{{route('admin.users.trade.history-reload', 'short')}}");
                                }
                                connect( data.position_assets );
                            }
                        }
                        
                        $('#positionInfo').modal('hide');
                        
                      },
                      error: function (data) {
                        console.log(data);
                      },
                  });
    
                } 
              });
          });
      });
</script>
@endsection
