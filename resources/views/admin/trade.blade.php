@extends('layouts.admin')



@section('css')

    <style type="text/css">

        .hovershow {

            opacity: 0.4;

        }



        .hovershow:hover {

            opacity: 1;

        }



        .btn:not(.btn-social):not(.btn-social-icon):hover {

            border-color: transparent !important;

            background-color: transparent;

        }

        .dark .card-header {
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        } 

    </style>

@endsection

@section('page-style')
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('userassets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('userassets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link rel="stylesheet" href="{{ asset('css/cryptofont.css?v=878052') }}" />
    <link href="{{ asset('userassets/css/app.min.css?v=695605') }}" id="app-style" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @isset($pairs)
    @foreach ($pairs as $pair)

        <div class="change_price-{{ $pair->fromsym . '-' . $pair->tosym }} d-none"> 0.00</div>

        <div class="price-{{ $pair->fromsym . '-' . $pair->tosym }} d-none">0.00</div>

        <div class="spread-{{ $pair->fromsym . '-' . $pair->tosym }} d-none">0</div>

        <div class="high_24h-{{ $pair->fromsym . '-' . $pair->tosym }} d-none">0</div>

        <div class="low_24h-{{ $pair->fromsym . '-' . $pair->tosym }} d-none">0</div>

        <div class="sell_price-{{ $pair->fromsym . '-' . $pair->tosym }} d-none"></div>

        <div class="buy_price-{{ $pair->fromsym . '-' . $pair->tosym }} d-none"></div>

        <div class="volume-{{ $pair->fromsym . '-' . $pair->tosym }} d-none"></div>

        <div class="spread-{{ $pair->fromsym . '-' . $pair->tosym }} d-none"></div>

        <div class="asset-info-{{ $pair->fromsym . '-' . $pair->tosym }} d-none" data-asset="{{ json_encode($pair) }}">

        </div>

    @endforeach
    @endisset


    <div class="row mt-0">
        <!-- Trading Pair & Trading Assets -->
        <div id="tradingpairdiv" class="col-12 col-sm-12 col-lg-4 col-md-4 col-xl-4 p-0 px-2 mt-0">

            <div class="card" style="height:90vh; overflow-y:hidden;">

                <div class="card-header align-items-center d-flex" style="border-bottom:none;">

                    <h4 class="card-title mb-4 flex-grow-1">Trading Pairs</h4>

                    <div class="flex-shrink-0">

                        <div class="form-group mb-4">

                            <div class="input-group input-sm">

                                <input class="form-control" type="text" name="search_asset" style="width:1% !important; border-radius: 3px !important;"

                                    onkeyup="searchAssets(this.value)" placeholder="Search Asset..."

                                    aria-label="Search Asset..." aria-describedby="search-asset">

                                <span class="input-group-text" id="search-asset"><i class="fa fa-search"></i></span>

                            </div>

                        </div>

                        <!-- end nav tabs -->

                    </div>

                </div><!-- end card header -->

                <div class="card-body px-0">

                    <div class="tab-content">

                        <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">

                            <div class="table-responsive px-3" data-simplebar style="max-height: 110vh;">

                                <table class="table align-middle table-nowrap table-borderless">

                                    <thead  style="position: sticky; top: 0;">

                                        <tr>

                                            <th colspan="2">

                                                <div>

                                                    <h5 class="font-size-14 mb-1">Trading Assets</h5>

                                                </div>

                                            </th>

                                            <th class="text-center text-end">

                                                <div class="text-end">

                                                    <h5 class="font-size-14 mb-1">Price</h5>

                                                </div>

                                            </th>

                                            <th class="text-center text-end">

                                                <div class="text-end">

                                                    <h5 class="font-size-14 mb-1">Volume(24h)</h5>

                                                </div>

                                            </th>

                                        </tr>

                                    </thead>

                                    <tbody id="load_assets"></tbody>

                                </table>

                            </div>

                        </div>

                    </div>





                    <div class="loading_assets card-img-overlay text-center d-flex flex-column justify-content-center "

                        style="background-color:rgba(0, 0, 0, 0.85);">

                        <i class="fa fa-spinner fa-spin fa-5x zoom text-primary"></i>

                    </div>



                    <div class="d-none failed_loading_assets card-img-overlay text-center d-flex flex-column justify-content-center"

                        style="background-color:rgba(0, 0, 0, 0.85);">

                        <div class="alert alert-danger">

                            <h4 class="text-danger">Error Loading Assets</h4>

                            There was a server error that is preventing the trading components load completing.<br />

                            <button class="btn btn-warning btn-sm" onclick="showOptions()">Retry</button>

                        </div>



                    </div>



                </div>

            </div>

            

        </div>
        <!-- end -->
        {{-- <button class="btn btn-outline-primary openPositions" type="button">Open Positions <span class="badge badge-transparent">{{$positions_count}}</span></button> --}}

        <div class="col-md-8 row">
            <!-- Chart Div -->
            <div id="chartdiv" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0 px-2 mt-0">



                <div class="row calculation-widget">

                    <div class="col-auto div-width">

                        <strong class="text-6 selected_instrument">--:--</strong>

                        <h5 class="text-4 mt-0 mb-2 selected_change"></h5>

                    </div>

                    <div class="col-auto div-width">

                        <strong class="text-6 selected_price">0.00</strong>

                        <h5 class="text-4 mt-0 mb-2">Price</h5>

                    </div>

                    <div class="col-auto div-width">

                        <strong class="text-6 selected_high">0.00</strong>

                        <h5 class="text-4 mt-0 mb-2">High(24h)</h5>

                    </div>

                    <div class="col-auto div-width">

                        <strong class="text-6 selected_low">0.00</strong>

                        <h5 class="text-4 mt-0 mb-2">Low(24h)</h5>

                    </div>

                    <div class="col-auto div-width">

                        <strong class="text-6 selected_volume">0.00</strong>

                        <h5 class="text-4 mt-0 mb-2">Volume(24h)</h5>

                    </div>



                    <div id="tradebtns" class="col trade-div-width text-end">

                        <div class="btn-group btn-group-example mb-3" role="group">

                            <button type="button" onclick="openBuy()" class="btn btn-success w-xs"><i

                                    class="bx bx-trending-up"></i> BUY</button>

                            <button type="button" onclick="openSell()" class="btn btn-danger w-xs"><i

                                    class="bx bx-trending-down"></i> SELL</button>

                        </div>

                    </div>

                </div>

                <div class="tradingview-widget-container">

                    <div id="tradingview_6f76f"></div>

                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>

                </div>



            </div>
            <!-- end -->

            <!-- Buy Sell Form -->
            <div id="tradebox" class="col px-2 d-none">

                <div class="card p-0">

                    <div class="text-end mb-1 px-2">

                        <i class="fa fa-times text-danger" onclick="closeTradeBox()"></i>

                    </div>

                    <div class="card-body">

                        <form id="tradelive" autocomplete="off" method="POST" action=""

                            enctype="application/x-www-form-urlencoded">

                            @csrf

                            <div class="row">

                                <div class="col-6">

                                    <div class="d-flex align-items-start ">

                                        <div class="flex-shrink-0 me-3 align-self-center">

                                            <i class="cc trade-icon fa-3x"></i>

                                        </div>

                                        <div class="flex-grow-1">

                                            <h5 class="font-size-18 mb-1 selected_instrument"></h5>

                                            <h6 class="font-size-14 mt-0 mb-2 selected_change"></h6>

                                            {{-- <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Shawn <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>

                                                        <p class="text-muted mb-0">Available</p> --}}

                                        </div>

                                    </div>

                                </div>

                                <div class="col-6 text-end">



                                    <h5 class="font-size-18 mb-1 selected_price">0.00</h5>

                                    <h6 class="font-size-14 mt-0 mb-2">Price</h6>

                                </div>

                            </div>



                            <div class="form-group mt-2 pt-1">

                                <label class="form-label" for="quantity">Amount <strong>Contracts:</strong> <span

                                        class="text-danger">*</span></label>

                                <div class="input-group input-group-lg">

                                    <span class="btn btn-primary text-inverse text-4" onClick="updateQuan('down');">-</span>

                                    <input id="quantity" class="form-control form-control-lg" required type="text" style="width: 1% !important; border-radius: 0 !important"

                                        name="quantity" />

                                    <span class="btn btn-primary text-inverse text-4" onClick="updateQuan('up');">+</span>

                                </div>

                            </div>





                            <div class="row mt-3">

                                <div class="col-6">

                                    <strong class="text-4 trade-item-value">0.00</strong>

                                    <h5 class="text-3 trade-item-value-user-currency">0.00</h5>

                                    <h5 class="text-2 mt-0 mb-2" title="Value">Value</h5>

                                </div>

                                <div class="col-6 text-end">

                                    <strong class="text-4 trade-item-margin">0.00</strong>

                                    <h5 class="text-3 h5 trade-item-margin-user-currency">0.00</h5>

                                    <h6 class="text-2 mt-0 mb-2" title="Required Margin">R. Margin</h6>

                                </div>

                            </div>

                            <hr />

                            <div class="form-group mt-3">

                                <div class="checkbox-custom checkbox-default">

                                    <input type="checkbox" id="stopLoss">

                                    <label for="stopLoss" class="form-label">Stop Loss at</label>

                                </div>



                                <input id="stopLossField" class="form-control d-none mt-2" type="text" name="stop_loss">

                            </div>



                            <div class="form-group mt-3">

                                <div class="checkbox-custom checkbox-default">

                                    <input type="checkbox" id="takeProfit">

                                    <label for="takeProfit" class="form-label">Take Profit at</label>

                                </div>



                                <input id="takeProfitField" class="form-control d-none mt-2" type="text"

                                    name="take_profit">

                            </div>



                            <hr />

                            <div class="row">

                                <div class="col-6">

                                    <h5 class="text-5 unit-amount">0.00</h5>

                                    <h5 class="text-4 mt-0 mb-2">Unit Amount</h5>

                                </div>

                                <div class="col-6 text-end">

                                    <h5 class="text-5 h5 leverage-ratio">0.00</h5>

                                    <h5 class="text-4 mt-0 mb-2">Leverage</h5>

                                </div>

                            </div>



                            <input type="hidden" name="price" class="current_price">

                            <input type="hidden" name="trade_type" class="trade-type" />

                            <input type="hidden" name="trade_amount_value" class="amount-value">

                            <input type="hidden" name="amount_value_user_currency" class="amount-value-user">

                            <input type="hidden" name="trade_amount_margin" class="amount-margin">

                            <input type="hidden" name="amount_margin_user_currency" class="amount-margin-user">

                            <input type="hidden" name="leverage_input" class="leverage_input" />

                            <input type="hidden" name="rates" id="rates" />

                            <input type="hidden" name="trade_currency" class="trade-currency" />

                            <input type="hidden" name="product_id" class="curr_product_id" />



                            <div class="row justify-content-center">



                                <div class="placebuytrade col-12 text-center d-none">

                                    <button class="btn btn-success btn-block w-xl trade_btn btn-lg m-1" disabled

                                        data-action="buy" id="buyBtn" type="submit"><i class='bx bx-trending-up'></i> BUY

                                    </button>

                                    <div class="h6 ask_price text-success my-3"></div>

                                </div>

                                <div class="placeselltrade col-12 text-center d-none">

                                    <button class="btn btn-danger btn-block w-xl btn-lg trade_btn m-1" disabled

                                        data-action="sell" id="sellBtn" type="submit"><i class='bx bx-trending-down'></i>

                                        SELL </button>

                                    <div class="h6 bid_price text-danger my-3"></div>

                                </div>

                            </div>



                            <h5 class="text-bold text-center">This position will be closed automatically in 7 days</h5>

                        </form>

                    </div>

                </div>



            </div>
            <!-- end -->


            <div class="clearfix">&nbsp;</div>
            <!-- Open closed position -->
            <div class="col-lg-12 p-0">

                <div class="card">

                    <div class="card-header align-items-center d-flex">

                        <h4 class="card-title mb-0 flex-grow-1 tab-current-title">Open Positions</h4>

                        <div class="flex-shrink-0">

                            <ul class="nav justify-content-end nav-pills card-header-pills" role="tablist">

                                <li class="nav-item">

                                    <a class="nav-link active" data-bs-toggle="tab" href="#openpositions" role="tab">

                                        <span class="d-block d-sm-none"></span>

                                        <span class="d-none d-sm-block">Open Positions</span>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" data-bs-toggle="tab" href="#closepositions" role="tab">

                                        <span class="d-block d-sm-none"></span>

                                        <span class="d-none d-sm-block">Close Positions</span>

                                    </a>

                                </li>

                                @isset($earnings)

                                    <li class="nav-item">

                                        <a class="nav-link" data-bs-toggle="tab" href="#earnings" role="tab">

                                            <span class="d-block d-sm-none"></span>

                                            <span class="d-none d-sm-block">Earnings</span>

                                        </a>

                                    </li>

                                @endisset

                            </ul>

                        </div>

                    </div><!-- end card header -->



                    <div class="card-body">



                        <!-- Tab panes -->

                        <div class="tab-content text-muted">

                            <div class="tab-pane active" id="openpositions" role="tabpanel">

                                <div id="tradehistory" class="p-0"></div>

                            </div>

                            <div class="tab-pane" id="closepositions" role="tabpanel">

                                <div id="closedhistory" class="col-md-12 col-12 table-responsive p-0">

                                    <table class="table table-sm p-2">

                                        <thead>

                                            <tr>

                                                <th scope="col" class="text-center">Positon ID</th>

                                                <th scope="col" class="text-center">Action</th>

                                                <th scope="col" class="text-center">Assets</th>

                                                <th scope="col" class="text-center">Opening Value</th>

                                                <th scope="col" class="text-center">Closing Value</th>

                                                <th scope="col" class="text-center">Quantity</th>

                                                <th scope="col" class="text-center">Margin Used</th>

                                                <th scope="col" class="text-center">Profit/Loss</th>

                                                <th scope="col" class="text-center">Date/Time</th>

                                                <th scope="col"></th>

                                            </tr>

                                        </thead>

                                        <tbody id="closePositionReload">


                                            @isset($closed_positions)
                                            @foreach ($closed_positions as $item)

                                                <tr>

                                                    <td class="text-center">{{ strtoupper($item->trade_id) }}</td>

                                                    <td class="text-center">{{ ucwords($item->trade_action) }}</td>

                                                    <td class="text-center">

                                                        {{ $item->sym->fromsym }}-{{ $item->sym->tosym }}</td>

                                                    <td class="text-center value_{{ $item->id }}">

                                                        {{ $mycurrency->symbol . number_format(floatval($item->amount_value_user_currency), $mycurrency->decimal_digits) }}

                                                    </td>

                                                    <td class="text-center">

                                                        {{ $mycurrency->symbol . number_format(floatval($item->amount_value_user_currency) + $item->profit_loss, $mycurrency->decimal_digits) }}

                                                    </td>

                                                    <td class="text-center">{{ $item->quantity }}</td>

                                                    <td class="text-center">

                                                        {{ $mycurrency->symbol . number_format(floatval($item->amount_margin_user_currency), $mycurrency->decimal_digits) }}

                                                    </td>

                                                    <td

                                                        class="text-center @if ($item->profit_loss > 0) text-success @else text-danger @endif

                                                            profit_loss_live-{{ $item->id }}">

                                                        {{ $mycurrency->symbol . number_format(floatval($item->profit_loss_user), $mycurrency->decimal_digits, 2) }}

                                                    </td>



                                                    <td class="text-center">

                                                        {{ date('m/d/Y h:ia', strtotime($item->created_at . '+01:00')) }}

                                                    </td>

                                                    <td>

                                                        <button class="btn btn-primary btn-sm"

                                                            onclick="openPositionInfo( {{ json_encode($item) }}, '{{ $item->sym->fromsym }}-{{ $item->sym->tosym }}' )"

                                                            type="button" data-bs-toggle="modal" data-bs-target="#positionInfo"><i

                                                                class="fas fa-info-circle"></i> Info</button>

                                                        <div class="d-none current_rate_text-{{ $item->id }}">

                                                            {{ $item->price + $item->profit_loss }}</div>

                                                    </td>



                                                    <!--var initialRate = $('.current_rate_text-'+item.id).text();-->

                                                    <!--var initialValue = $('.current_value_text-'+item.id).text();-->

                                                    <!--var initialProfitLoss = $('.profit_loss_live-'+item.id).html();-->

                                                    <!--var initialProfitLossText = $('.profit_loss_live-'+item.id).text();  -->

                                                </tr>

                                            @endforeach



                                            @if (count($closed_positions) == 0)

                                                <tr>

                                                    <td colspan="10">

                                                        <div

                                                            class="alert alert-outline-danger text-center text-bold text-light">

                                                            <div class="alert alert-info alert-outline border-0 fade show px-4 mb-0 text-center" role="alert">

                                                                <i class="mdi mdi-alert-circle-outline d-block display-4 mt-2 mb-3 text-info"></i>

                                                                <h5 class="text-info">No closed Positions</h5>

                                                                <p>Closed positions on your account will be displayed here.</p> 

                                                            </div>                                                           

                                                        </div>

                                                    </td>

                                                </tr>

                                            @endif
                                                @endisset
                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            @isset($earnings)

                                <div class="tab-pane" id="earnings" role="tabpanel">

                                    <div id="transactionHistory" class="px-2">

                                        <table class="table no-margin table-hover">

                                            <thead>

                                                <tr>

                                                    <th scope="col">Transaction ID</th>

                                                    <th scope="col">Transaction Type</th>

                                                    <th scope="col">Amount</th>

                                                    <th scope="col">Date</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @if (count($earnings) > 0)

                                                    @foreach ($earnings as $k => $data)

                                                        <tr @if ($data->type == '+')

                                                            class="text-success"

                                                        @elseif($data->type == '-') class="text-danger"

                                                    @endif>

                                                    <td data-label="#TRX">{{ strtoupper($data->trx) }}</td>

                                                    <td data-label="Transaction Type">{!! ucwords($data->trans_type) !!}</td>

                                                    <td data-label="Amount">{!! $data->type !!}{!! $data->coin_amount or 'N/A' !!}

                                                        {{ $data->wallet->gateway->code }}</td>

                                                    <td data-label="Time">

                                                        {!! date(' d M, Y h:s A', strtotime($data->created_at)) !!} </td>

                                                    </tr>

                                                @endforeach

                                            @else

                                                <tr class="text-center">

                                                    <td colspan="4">

                                                        <div

                                                        class="alert alert-outline-danger text-center text-bold text-light">

                                                        <div class="alert alert-info alert-outline border-0 fade show px-4 mb-0 text-center" role="alert">

                                                            <i class="mdi mdi-alert-circle-outline d-block display-4 mt-2 mb-3 text-info"></i>

                                                            <h5 class="text-info">No recent earnings</h5>

                                                            <p>no recent earnings from closed positions yet.</p> 

                                                        </div>                                                           

                                                    </div>

                                                    </td>

                                                </tr>

                                                @endif

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            @endisset

                        </div>

                    </div><!-- end card-body -->

                </div><!-- end card -->







            </div>
            <!-- end -->
        </div>

        <div id="tradehistory-hidden" class="d-none"></div>

            <div id="positionInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="positionInfo-title"
                aria-hidden="true">
                <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <div class="media">
                                <div class="media-body">
                                    <h5 class="modal-title mb-0" id="positionInfo-title"></h5>
                                    <span class="positionInfo-head-content h6"></span>
                                    <span class="positionInfo-profit_loss"></span>
                                </div>
                            </div>

                            <button class="btn-close" id="close_modal_position" data-bs-dismiss="modal" aria-label="Close"> 
                            </button>
                             
                             
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><strong>Profit/Loss</strong></td>
                                            <td class="positionInfo-profit_loss_text text-right"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Required Margin</strong></td>
                                            <td class="text-right position-required_margin"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Quantity</strong></td>
                                            <td class="text-right position-quantity"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Take Profit</strong></td>
                                            <td class="text-right position-take_profit"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Stop Loss</strong></td>
                                            <td class="text-right position-stop_loss"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Opening Value</strong></td>
                                            <td class="text-right position-opening_value"></td>
                                        </tr>
                                        <!--<tr>-->
                                        <!--  <td class="text-left"><strong>Current Value</strong></td>-->
                                        <!--  <td class="text-right position-current_value"></td>-->
                                        <!--</tr>-->
                                        <tr>
                                            <td class="text-left"><strong>Opening Rate</strong></td>
                                            <td class="text-right position-opening_rate"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Percentage Change</strong></td>
                                            <td class="text-right position-percentage_change"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Position ID</strong></td>
                                            <td class="text-right position-trade_id"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Expiry Date</strong></td>
                                            <td class="text-right position-expiry_date"></td>
                                        </tr>
                                        <input type="hidden" class="selected-position" />
                                        <input type="hidden" name="rates" class="rates_alt" />
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <label for="close_modal_position" class="btn btn-light" type="button">Exit</label>
                            <label class="btn btn-outline-danger close_position close_position_btn" data-bs-dismiss="modal" type="button"><span
                                    class="fa fa-times"></span> Close Position</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    
        
        </div>

    </section>

@endsection



@section('page-scripts')
<script type="text/javascript">
    var isRunning = false;

    var timezoneString = Intl.DateTimeFormat().resolvedOptions().timeZone;

    var open_positions = [];
    var default_currency = "{{ strtolower($mycurrency->code) }}";
    var saving = false;
    var savingStopLoss = false;
    var savingTakeProfit = false;

    function fmtVal(amount, currency){
        _base_currency = rates[currency];
        return  _base_currency.unit+numberWithCommas(amount);
    }

    function numberWithCommas(x) {
        return x.toFixed(2).toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
    
    function setThemeOptionOnPage() {
        const currentTheme = localStorage.getItem("theme");
        // setCookie('version', status);
            if (currentTheme != null) {
                document.body.setAttribute("data-layout-mode", currentTheme);
                document.body.setAttribute("data-topbar", currentTheme);
                document.body.setAttribute("data-sidebar", currentTheme);
            } else {
                const darkThemeMq = window.matchMedia("(prefers-color-scheme: dark)");
                if (darkThemeMq.matches) {
                    document.body.setAttribute("data-layout-mode", 'dark');
                    document.body.setAttribute("data-topbar", 'dark');
                    document.body.setAttribute("data-sidebar", 'dark');
                    // Theme set to dark.
                } else {
                    document.body.setAttribute("data-layout-mode", 'light');
                    document.body.setAttribute("data-topbar", 'light');
                    document.body.setAttribute("data-sidebar", 'light');
                    // Theme set to light.
                }
            }
    }

    // $(document).ready(function() {
        
    //     $.ajaxSetup({ cache: true });
    //     setThemeOptionOnPage();
    //     const tutor = localStorage.getItem('tutor');
    //     if(tutor == null){

    //         $('#joyRideTipContent').joyride({postStepCallback : function (index, tip) {
    //             if (index == 2) {
    //                 $(this).joyride('set_li', false, 1);
    //             }
    //         }});
    //         localStorage.setItem('tutor', true);
    //     }
    // });

    function tradehistory() {
        if (isRunning)
            return;

        isRunning = true;
        if ($('#tradehistoryfull').length > 0) {
            $('#tradehistoryfull').load('{{ route('user.trade.tradehistoryfull') }}');
        } else if ($('#tradehistory').length > 0) {
            $('#tradehistory').load('{{ route('user.trade.tradehistory') }}');
        } else {
            $('#tradehistory-hidden').load('{{ route('user.trade.tradehistory') }}').hide();
        }
    }

    function notrades() {
        if ($('#tradehistoryfull').length > 0) {
            $('#tradehistoryfull').load('{{ route('user.trade.tradehistoryfull') }}');
        } else if ($('#tradehistory').length > 0) {
            $('#tradehistory').load('{{ route('user.trade.tradehistory') }}');
        } else {
            $('#tradehistory-hidden').load('{{ route('user.trade.tradehistory') }}').hide();
        }
    }
</script>
<script type="text/javascript">
    var timeFn;

    function checkforRates() {

        if (rates == undefined) {
            timeFn = setTimeout("checkforRates()", 1000);
            return;
        }

        $('#rates').val(JSON.stringify(rates));
        $('.rates_alt').val(JSON.stringify(rates));
        stopCheckRate(); 
    }

    function stopCheckRate() {
        clearTimeout(timeFn);
    }

    function convertToUserCurrency(usd_value, currency_iso_name, currency_from, format = false, currency_from_rate =
        null) {
        if (rates == undefined) {
            checkforRates();
            return;
        }
        btc_amount = (currency_from_rate != null) ? parseFloat(Number(usd_value) / currency_from_rate) : parseFloat(
            Number(usd_value) / rates[currency_from].value);

        user_currency_value = rates[currency_iso_name].value * btc_amount;

        return (format) ? rates[currency_iso_name].unit + numberWithCommas(user_currency_value) : user_currency_value;
    }

    $(document).ready(function() {

        if ("{{ $trade_session }}" == "live" && parseInt("{{ $positions_count }}") > 0) {
            tradehistory();
        }

        if ("{{ $trade_session }}" == "live" && parseInt("{{ $positions_count }}") == 0) {
            notrades();
        }

        if ("{{ $trade_session }}" == "demo" && parseInt("{{ $positions_count_demo }}") > 0) {
            tradehistory();
        }


        if ("{{ $trade_session }}" == "demo" && parseInt("{{ $positions_count_demo }}") == 0) {
            notrades();
        }


        $('.close_position').click(function(evt) {
            evt.preventDefault();
            var item = JSON.parse($('.selected-position').val());
                swal({
                    title: 'Close position for ' + item.sym.pair_name + '?',
                    text: 'Are you sure you want to close the ' + item.sym.pair_name + ' ' + item
                        .trade_action + ' position for Trade ID:' + item.trade_id + '?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((closePosition) => {
                    if (closePosition) {
                        dataPost = {
                            _payload: item,
                            rates: rates,
                            _token: "{{ csrf_token() }}"
                        };
                        $.ajax({
                            url: "{{ route('user.trade.close_trade') }}",
                            data: dataPost,
                            method: "POST",
                            dataType: "json",
                            success: function(data) {
                                //send close action to server and act base on feedback!
                                swal(data.message, {
                                    icon: 'info',
                                });

                                if (data.status == true) {
                                    old_position = $('.current_open_positions').val();

                                    $('.available_balance').text(data.balance_fmt);
                                    $('.margin_used').text(data.margin_used);
                                    $('.balance_in_currency').val(data.balance);

                                    if (parseInt(old_position) != data.positions) {
                                        $('.openPositions span').text(data.positions);
                                        $('.current_open_positions').val(data
                                            .positions);
                                        //restructure the entire trade history and recall connect() with the new loaded position
                                        if ($('#tradehistoryfull').length > 0) {
                                            $("#tradeHistoryList").load(
                                                "{{ route('user.trade.history-reload', 'full') }}"
                                            );
                                        } else {
                                            $("#tradeHistoryList").load(
                                                "{{ route('user.trade.history-reload', 'short') }}"
                                            );
                                        }

                                        if ($('#closePositionReload').length > 0) {
                                            $('#closePositionReload').load(
                                                "{{ route('user.trade.close-position-reload') }}"
                                            );
                                        }

                                        if ($('#earnings').length > 0) {
                                            $('#earnings').load(
                                                "{{ route('user.trade.trade-earnings-reload') }}"
                                            );
                                        }


                                        connect(data.position_assets);
                                    }
                                }

                                $('#positionInfo').modal('hide');

                            },
                            error: function(data) {
                                console.log(data);
                            },
                        });

                    }
                });
        });
    });

    function toTitleCase(str) {
        return str.replace(
            /\w\S*/g,
            function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            }
        );
    }


    function formatDate(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return date.getMonth() + 1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
    }


    function openPositionInfo(item, product_id) {

        var start_time = new Date(Date.parse(item.start_time + '+01:00'));
        var end_time = new Date(Date.parse(item.end_time + '+01:00'));


        if (timezoneString != undefined) {
            start_time = convertTZ(start_time, timezoneString);
            end_time = convertTZ(end_time, timezoneString);
        }


        var initialRate = $('.current_rate_text-' + item.id).text();
        var initialValue = $('.current_value_text-' + item.id).text();

        var initialProfitLoss = $('.profit_loss_live-' + item.id).html();
        var initialProfitLossText = $('.profit_loss_live-' + item.id).text();

        var initialChange = (item.trade_action == "buy") ? (initialRate - item.price) / item.price : (item.price -
            initialRate) / item.price;

        if (Number(initialProfitLoss) > 0) {
            initialChange = (initialChange > 0) ? initialChange : (0 - initialChange);
        }

        var initialChangePercent = parseFloat(initialChange * 100).toFixed(2);

        $('.selected-position').val(JSON.stringify(item));


        action = item.trade_action;
        $('#positionInfo-title').text(toTitleCase(action) + ' ' + product_id);
        $('.positionInfo-head-content').html(formatDate(start_time));
        $('.positionInfo-profit_loss').html("<div class='d-block profit_loss_time" + item.id + " font-22 text-bold'>" +
            initialProfitLoss + "</div>");
        $('.positionInfo-profit_loss_text').html("<div class='d-block profit_loss_time_text" + item.id + "'>" +
            initialProfitLossText + "</div>");
        $('.position-stop_loss').text(fmtVal(parseFloat(item.stop_loss), default_currency));
        $('.position-take_profit').text(fmtVal(parseFloat(item.take_profit), default_currency));

        $('.position-current_rate').html("<div class='d-block pos_current_rate_text-" + item.id + "'>" + initialRate +
            "</div>");
        $('.position-current_value').html("<div class='d-block pos_current_value_text-" + item.id + "'>" +
            initialValue + "</div>");

        $('.position-percentage_change').html("<div class='d-block pos_current_change_text-" + item.id + "'>" +
            initialChangePercent + "%</div>");

        $('.position-trade_id').text(item.trade_id);
        $('.position-expiry_date').text(formatDate(end_time));

        $('.position-quantity').text(item.quantity);
        $('.position-opening_rate').text(item.price);

        $('.position-opening_value').html(fmtVal(parseFloat(item.amount_value_user_currency), default_currency));
        $('.position-required_margin').html(fmtVal(parseFloat(item.amount_margin_user_currency), default_currency));

        if (item.position_status == "close") {
            $('.close_position_btn').addClass('d-none');
        }

    }

    function convertTZ(date, tzString) {
        return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {
            timeZone: tzString
        }));
    }
    </script>
    <script src="{{ asset('assets/vendor_components/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}">

    </script>



<script type="text/javascript">

    var xx = window.matchMedia("(max-width: 1920px)");

    var xxl = window.matchMedia("(max-width: 3440px)");

    var $chart_height = (xxl.matches) ? 600 : 300;

    $chart_height = (xx.matches) ? 410 : $chart_height;

    var categories = {!! $pairs !!};
    
    var rates = {!! json_encode($rates) !!};


    var coin_icon_colors = {!! json_encode($bg_colors) !!};



    var t;



    var ont = false;



    var currentIcon;



    var currentIcon_2;





    var qty = 0;



    var selected_id;



    var $currentPair;





    var gcd = function(a, b) {

        if (b < 0.0000001) return a; // Since there is a limited precision we need to limit the value.



        return gcd(b, Math.floor(a % b)); // Discard any fractions due to limitations in precision.

    };



    $(document).ready(function () {

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(event) {

            $('h4.tab-current-title').text(event.target.text.trim());

        });

    });



    showOptions();



    checkforRates();



    loadAssetCategories(categories);



    // updateMarginValue("{{ $pairs->first()->fromsym . '-' . $pairs->first()->tosym }}", 0);



    $('#quantity').on('change, keyup', function() {



        qty = $(this).val();

        selected_id = $(".curr_product_id").val();



        current_price = $('.current_price').val();

        updateMarginValue(selected_id, qty, current_price);

    });



    function updateQuan(action) {



        var step = $('#quantity').data('step');

        var result = 0;

        var qty = Number($('#quantity').val());

        var selected_id = $(".curr_product_id").val();



        if (action == 'up') {

            result += (qty + parseFloat(step))

        }



        if (action == 'down') {


            result += (qty - parseFloat(step));

        }



        var total = result < 0 ? 0 : result;

        var current_price = $('.current_price').val();



        $('#quantity').val(total);



        updateMarginValue(selected_id, total, current_price);



    }





    function showOptions() {



        var optparam = JSON.parse(window.localStorage.getItem('allpairs'));



        const products = [];

        var change = [];

        var spread = [];

        var timing = [];

        var initPrices = [];

        var currentPrices = [];

        var stat = [];



        $('.loading_assets').removeClass('d-none');

        $('.failed_loading_assets').addClass('d-none');



        $.getJSON("{{ route('user.trade.getassets') }}", function(d) {



            for (i = 0; i < d.length; i++) {



                window.localStorage.removeItem('allpairs');



                window.localStorage.setItem('allpairs', JSON.stringify(d));



                products.push({

                    id: '' + d[i].fromsym + '-' + d[i].tosym,

                    label: '' + d[i].name,

                });

            }



            const subscribe = {

                type: 'subscribe',

                channels: [{

                    name: 'ticker',

                    product_ids: products.map(product => product.id),

                }]

            };



            const ws = new WebSocket('wss://ws-feed.exchange.coinbase.com');

            ws.onopen = () => {

                ws.send(JSON.stringify(subscribe));

            };



            ws.onmessage = (e) => {

                const value = JSON.parse(e.data);
                if (value.type == 'subscriptions') return;



                change[value.product_id] = (value.price - value.open_24h) / value.price;



                if (!initPrices[value.product_id]) {

                    initPrices[value.product_id] = value.open_24h;

                }



                currentPrices[value.product_id] = value.price;



                stat[value.product_id] = currentPrices[value.product_id] ? ((currentPrices[value

                        .product_id] - initPrices[value.product_id]) / initPrices[value.product_id]) * 100 :

                    ((currentPrices[value.product_id] - Number(value.low_24h)) / Number(value.low_24h));


                $('.price-' + value.product_id).each(function(index, element) {

                    if (value.price > 0.09) {
                        $(element).text(formatMoney(value.price));

                    } else {

                        $(element).text(formatMoney(value.price, 4));

                    }

                });



                $('.change_price-' + value.product_id).each(function(index, element) {

                    if (stat[value.product_id] >= 0) {

                        $(element).html('<div class="text-success">' + stat[value.product_id]

                            .toFixed(2) + '% <i class="fa fa-caret-up"></i></div>');

                    } else {

                        $(element).html('<div class="text-danger">' + stat[value.product_id]

                            .toFixed(2) + '% <i class="fa fa-caret-down"></i></div>');

                    }

                });



                $('.sell_price-' + value.product_id).each(function(index, element) {

                    $(element).text(Number(value.best_ask));

                });



                $('.buy_price-' + value.product_id).each(function(index, element) {

                    $(element).text(Number(value.best_bid));

                });



                $('.high_24h-' + value.product_id).each(function(index, element) {

                    $(element).text(Number(value.high_24h));

                });



                $('.low_24h-' + value.product_id).each(function(index, element) {

                    $(element).text(Number(value.low_24h));

                });



                $('.volume-' + value.product_id).each(function(index, element) {

                    $(element).text(Number(value.volume_24h));

                });



                var _current = $(".curr_product_id").val();



                var qty = Number($('#quantity').val());



                if (_current == value.product_id) {



                    spread[value.product_id] = Number(value.best_ask) - Number(value.best_bid)



                    $('.selected_price').each(function(index, element) {

                        if (value.price > 0.09) {

                            $(element).text(formatMoney(value.price));

                        } else {

                            $(element).text(formatMoney(value.price, 5));

                        }

                    });

                    $('.current_price').val(Number(value.price));



                    $('.ask_price').text(Number(value.best_ask));



                    $('.bid_price').text(Number(value.best_bid));



                    $('.spread_input').val(Number(value.high_24h) - Number(value.low_24h));



                    $('.spread_text').text((spread[value.product_id]).toFixed(2));



                    $('.selected_volume').text(Number(value.volume_24h));



                    $('.selected_high').text(Number(value.high_24h));



                    $('.selected_low').text(Number(value.low_24h));





                    if (stat[value.product_id] >= 0) {

                        $('.selected_change').html('<div class="text-success">' + stat[value.product_id]

                            .toFixed(2) + '% <i class="fa fa-caret-up"></i></div>');

                    } else {

                        $('.selected_change').html('<div class="text-danger">' + stat[value.product_id]

                            .toFixed(2) + '% <i class="fa fa-caret-down"></i></div>');

                    }
                    updateMarginValue(value.product_id, qty, value.price);

                }

            }



        }).done(function() {

            $('.loading_assets').addClass('d-none');

            $('.trade_btn').attr('disabled', false);

            notrades();

        }).fail(function() {
            $('.loading_assets').addClass('d-none');

            $('.failed_loading_assets').removeClass('d-none');

        });

    }



    function updateMarginValue(select, quantity, price) {
        if (price == 0) {

            price = Number($('.price-' + select).text());

        }



        var res_curr = select.split('-');



        current_unit = res_curr[1].toLowerCase();



        var total_leverage;

        var total_qty_price;

        var total_value;

        var margin;

        var total_margin;



        @if (Auth::user()->plan == 1)

            var max = 70;

        @elseif(Auth::user()->plan == 2)

            var max = 35;

        @elseif(Auth::user()->plan == 3)

            var max = 10;

        @elseif(Auth::user()->plan == 4)

            var max = 3;

        @endif





        total_leverage = max;



        total_leverage = (total_leverage > 99) ? max : ((total_leverage < 3) ? max : total_leverage);



        total_qty_price = (price * quantity);



        total_margin = total_qty_price * (total_leverage / 100);


        total_value = (total_margin * (100 / total_leverage));



        if (rates !== undefined) {

            currency_s = rates[current_unit];

            if (currency_s == undefined) {

                $('.trade-item-margin').text('$' + formatMoney(Number(total_margin)));

                $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                    '{{ strtolower($mycurrency->code) }}', 'usd'));

                $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                    '{{ strtolower($mycurrency->code) }}', 'usd', false));

                /////

                $('.trade-item-value').text('$' + formatMoney(Number(total_value)));

                $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                    '{{ strtolower($mycurrency->code) }}', 'usd'));

                $('.amount-value-user').val(convertToUserCurrency(total_value,

                    '{{ strtolower($mycurrency->code) }}', 'usd', false));

                $('.trade-currency').val('usd');



            } else {



                if (currency_s.type == 'crypto') {

                    $('.trade-item-margin').text(formatMoney(Number(total_margin), 4) + currency_s.unit);

                    $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                        '{{ strtolower($mycurrency->code) }}', current_unit));

                    $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                        '{{ strtolower($mycurrency->code) }}', current_unit, false));



                    $('.trade-item-value').text(formatMoney(Number(total_value), 4) + currency_s.unit);

                    $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                        '{{ strtolower($mycurrency->code) }}', current_unit));

                    $('.amount-value-user').val(convertToUserCurrency(total_value,

                        '{{ strtolower($mycurrency->code) }}', current_unit, false));

                    $('.trade-currency').val(current_unit);

                } else {

                    $('.trade-item-margin').text(currency_s.unit + formatMoney(Number(total_margin)));

                    $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                        '{{ strtolower($mycurrency->code) }}', current_unit));

                    $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                        '{{ strtolower($mycurrency->code) }}', current_unit, false));



                    $('.trade-item-value').text(currency_s.unit + formatMoney(Number(total_value)));

                    $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                        '{{ strtolower($mycurrency->code) }}', current_unit));

                    $('.amount-value-user').val(convertToUserCurrency(total_value,

                        '{{ strtolower($mycurrency->code) }}', current_unit, false));

                    $('.trade-currency').val(current_unit);

                }

            }

        } else {

            $('.trade-item-margin').text('$' + formatMoney(Number(total_margin)));

            $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                '{{ strtolower($mycurrency->code) }}', 'usd'));

            $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                '{{ strtolower($mycurrency->code) }}',

                'usd', false));



            $('.trade-item-value').text('$' + formatMoney(Number(total_value)));

            $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                '{{ strtolower($mycurrency->code) }}', 'usd'));

            $('.amount-value-user').val(convertToUserCurrency(total_value, '{{ strtolower($mycurrency->code) }}',

                'usd', false));



            $('.trade-currency').val('usd');



        }





        $('.amount-margin').val(Number(total_margin));

        $('.amount-value').val(Number(total_value));



        $('.leverage_input').val(Number(total_leverage));











        var fraction = (total_leverage / 100);

        var len = fraction.toString().length - 2;



        var denominator = Math.pow(10, len);

        var numerator = fraction * denominator;

        var timeOut;



        var divisor = gcd(numerator, denominator); // Should be 5



        numerator /= divisor; // Should be 687

        denominator /= divisor; // Should be 200



        var finalratio = getRatio(numerator, denominator, 10);



        $('.leverage-ratio').text(finalratio);



        if (price == 0) {

            timeOut = setTimeout("updateMarginValue", 600, [select, quantity, price]);

        } else {

            clearTimeout(timeOut);

        }



    }



    function loadAsset(instrument) {

        setMainInstrument(instrument, 0, 0, 0, 0, 0);

    }



    function setMainInstrument(instrument, price, buy_price, sell_price, high_low_price, spread) {



        var spread = (spread == 0) ? Number($('.spread-' + instrument).text()) : spread;

        var price = (price == 0) ? $('.price-' + instrument).text() : price;

        var buy_price = $('.buy_price-' + instrument).text();

        var sell_price = $('.sell_price-' + instrument).text();



        var high_low_price = (high_low_price == 0) ? Number($('.high_low_price-' + instrument).text()) : high_low_price;



        $('.curr_product_id').val(instrument);



        $('.selected_instrument').text(instrument);



        $('.selected_price').text(price);



        $('.selected_sell').html(sell_price);



        $('.selected_buy').html(buy_price);



        $('.selected_high_low').text(high_low_price);



        $('.selected_change').html($('.change_price-' + instrument).html());



        window.localStorage.setItem('currentparam', instrument);



        var newInstrument = instrument.replace(/-/g, "");



        loadChart(newInstrument);





        var assets = $('.asset-info-' + instrument).data('asset');




        var icon = assets.tosym.toLowerCase();

        var icon_2 = assets.fromsym.toLowerCase();

        var pair_name = assets.name;



        executeTrade(assets, icon, icon_2, pair_name);

    }



    function getRatio(a, b, tolerance) {

        /*where a is the first number, b is the second number,  and tolerance is a percentage 

        of allowable error expressed as a decimal. 753,4466,.08 = 1:6, 753,4466,.05 = 14:83,*/



        if (a > b) {

            var bg = a;

            var sm = b;

        } else {

            var bg = b;

            var sm = a;

        }

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





    function searchAssets(search_term) {

        loadAssetCategories(categories, search_term);

    }



    function loadAssetCategories(c_data, search_term = "") {

        var ready_html = "";

        var color = "";

        if (search_term == '')

            $('.filter_cancel').addClass('d-none');



        c_data.forEach((element, i) => {

            color = coin_icon_colors[i];



            pair_array = JSON.stringify(element);



            if (color == undefined) {

                color = coin_icon_colors[Math.floor(Math.random() * coin_icon_colors.length)]

            }



            if (search_term == "") {

                ready_html += buildFromElement(element, color);

            } else if (element.fromsym.search(search_term.toUpperCase()) > -1) {

                ready_html += buildFromElement(element, color);

            }

        });



        $('#load_assets').html(ready_html);



        if (search_term == '') {

            var currentparam = window.localStorage.getItem('currentparam');

            if (currentparam == null) {
                setMainInstrument(c_data[0].fromsym + `-` + c_data[0].tosym, 0, 0, 0, 0, 0);

            } else {

                setMainInstrument(currentparam, 0, 0, 0, 0, 0);

            }

        }



    }



    function buildFromElement(element, color) {

        var _price = $('.price-' + element.fromsym + `-` + element.tosym).first().text();

        var _change_price = $('.change_price-' + element.fromsym + `-` + element.tosym).first().html();

        var _volume = Number($('.volume-' + element.fromsym + `-` + element.tosym).first().text());





        // return `<tr style="cursor: pointer" onclick=loadAsset('` + element.fromsym + `-` + element.tosym + `')>

    //     <td>

    //         <div class="media">

    //             <div class="align-self-start cc cf-888 cf-` + element.fromsym.toLowerCase() + ` fa-3x text-` +

        //     color + `"></div>

    //             <div class="media-body  m-2 ">

    //                 <h6 class="mb-0 font-13 pair_name-` + element.fromsym + `-` + element.tosym + `">` +

        //     element.pair_name + `</h6>

    //                 <span class="font-weight-bold change_price-` + element.fromsym + `-` + element.tosym +

        //     `">` + _change_price + `</span>

    //             </div>

    //         </div>

    //     </td>

    //     <td class="text-center">

    //         <div class="col-white mt-2 price-` + element.fromsym + `-` + element.tosym + `">` + _price + `</div>

    //     </td>

    //     <td class="text-center">

    //         <div class="volume-` + element.fromsym + `-` + element.tosym + ` mt-2">` + _volume + `</div>

    //     </td>

    // </tr>`;



        return `<tr style="cursor: pointer" onclick=loadAsset('` + element.fromsym + `-` + element.tosym + `')>

                    <td style="width: 50px;">

                        <div class="font-size-22 text-success">

                            <i class="cc cf-888 cf-` + element.fromsym.toLowerCase() + ` fa-2x text-` + color + ` d-block"></i>

                        </div>

                    </td>

                    <td>

                        <div>

                            <h5 class="font-size-14 mb-1 pair_name-` + element.fromsym + `-` + element.tosym +

            `">` + element.name + `</h5> 

                            <p class="text-muted mb-0 font-size-12 change_price-` + element.fromsym + `-` + element

            .tosym + `">` + _change_price + `</p>

                        </div>

                    </td>

                    <td>

                        <div class="text-end">

                            <h5 class="font-size-14 mb-0 price-` + element.fromsym + `-` + element.tosym + `">` +

            _price + `</h5> 

                        </div>

                    </td>

                    <td>

                        <div class="text-end">

                            <h5 class="font-size-14 text-muted mb-0 volume-` + element.fromsym + `-` + element

            .tosym + ` mt-2">` + _volume + `</h5> 

                        </div>

                    </td>

                </tr>`;

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



    function randombetween(min, max) {



        return Math.floor(Math.random() * (max - min + 1) + min);

    }



    function check(obj) {



        setOption($('#showsymbols option:eq(' + obj + ')').val());

    }



    function toTitleCase(slug) {

        var words = slug.split('_');



        for (var i = 0; i < words.length; i++) {

            var word = words[i];

            words[i] = word.charAt(0).toUpperCase() + word.slice(1);

        }



        return words.join(' ');

    }





    // openBuy chartdiv -- col8 to col5 tradingpairdiv col-4 to col-3



    function openBuy() {

        $("#chartdiv").removeClass('col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12').addClass(

            'col-7 col-md-7 col-lg-7 col-xl-7');

        $('#tradebox').removeClass('d-none');

        $('.placeselltrade').addClass('d-none');

        $('.placebuytrade').removeClass('d-none');

    }





    function openSell() {

        $("#chartdiv").removeClass('col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12').addClass(

            'col-7 col-md-7 col-lg-7 col-xl-7');

        $('#tradebox').removeClass('d-none');

        $('.placebuytrade').addClass('d-none');

        $('.placeselltrade').removeClass('d-none');

    }





    function closeTradeBox() {

        $("#chartdiv").removeClass('col-7 col-md-7 col-lg-7 col-xl-7').addClass(

            'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12');

        $('#tradebox').addClass('d-none');

    }





    $(document).ready(function() {



        $('#stopLoss').change(function() {

            if (this.checked == true) {

                $('#stopLossField').removeClass('d-none');

            } else {

                $('#stopLossField').addClass('d-none');

            }

        })



        $('#takeProfit').change(function() {

            if (this.checked == true) {

                $('#takeProfitField').removeClass('d-none');

            } else {

                $('#takeProfitField').addClass('d-none');

            }

        })







        $('#buyBtn, #sellBtn').on('click', function(e) {



            e.preventDefault();



            var btn_default = $(this).html();



            var btn_action = $(this);



            var action = btn_action.data('action');



            $(".time-executed").val(new Date().toUTCString());



            $(".trade-type").val('{{ $trade_session }}');



            var dataPost = $('#tradelive').serialize() + '&trade_action=' + action;

            $(this).attr('disabled', 'disabled');

            $(this).html('<i class="fa fa-spin fa-spinner"></i> Opening Position &hellip;');



            var token = $("input[name='_token']").val();





            $('#quantity').val('');

            $('#stopLoss').val('');

            $('#stopLossField').val('');

            $('#takeProfit').val('');

            $('#takeProfitField').val('');



            $.ajax({

                url: '{{ route('user.trade.trade-position') }}',

                data: dataPost,

                method: "POST",

                dataType: "json",

                success: function(data) {

                    action_text = action.toUpperCase();

                    $("#placeTrade").modal("hide");

                    swal(data.status == 'success' ? action_text + " Position Opened" :

                        "Error Opening " + action + " position", data.message, data

                        .status);

                    $('.available_balance').text(data.balance_fmt);

                    $('.margin_used').text(data.margin_used);

                    $('.balance_in_currency').val(data.balance);



                    if (isRunning) {

                        if ($('#tradehistoryfull').length > 0) {

                            $("#tradeHistoryList").load(

                                "{{ route('user.trade.history-reload', 'full') }}");

                        } else {

                            $("#tradeHistoryList").load(

                                "{{ route('user.trade.history-reload', 'short') }}");

                        }



                    } else {

                        tradehistory();

                    }





                    btn_action.removeAttr('disabled');

                    btn_action.html(btn_default);

                },

                error: function(data) {

                    if (data.status === 422) {

                        var errors = $.parseJSON(data.responseText);

                        btn_action.removeAttr('disabled');

                        btn_action.html(btn_default);

                        $.each(errors, function(key, value) {

                            //console.log(key+ " " +value);

                            var error_message = '';

                            if ($.isPlainObject(value)) {

                                $.each(value, function(key, value) {

                                    error_message = value;

                                });

                            } else {

                                error_message = value;

                            }

                            if (key == 'Limit') {



                                swal({

                                        title: "UPGRADE REQUIRED",

                                        text: error_message,

                                        icon: "warning",

                                        button: "UPGRADE NOW"

                                    })

                                    .then((upgrade) => {

                                        window.location.href =

                                            "{{ url('user/plan') }}";

                                    });

                                return;

                            } else if (key == 'Pend') {



                                swal({

                                        title: "UPGRADE REQUIRED",

                                        text: error_message,

                                        icon: "warning",

                                        button: "UPGRADE NOW"

                                    })

                                    .then((upgrade) => {

                                        window.location.href =

                                            "{{ url('user/plan') }}";

                                    });

                                return;

                            } else if (key == 'errors') {



                                swal(key.toUpperCase(), error_message[0], "error");

                                return;

                            } else

                                swal(key + " Invalid!", error_message, "error");





                        });

                    }

                },





            });

        });



    });





    function executeBuy(title, assets, icon, icon_2, pair_name) {





        if (currentIcon != null) {

            $('.trade-icon').removeClass('cf-' + currentIcon);

        }

        if (currentIcon_2 != null) {

            $('.trade-icon').removeClass('cf-' + currentIcon_2);

        }



        currentIcon = icon;

        currentIcon_2 = icon_2;

        $('.trade-icon').addClass('cf-' + icon);

        $('.trade-icon').addClass('cf-' + icon_2);

        $('.pair_name').html(pair_name);



        // $('.current_rate').html('<span class="price-'+assets.fromsym+'-'+assets.tosym+'">--:--</span>');

        $('.current_rate').html($(".price-" + assets.fromsym + '-' + assets.tosym).html());

        $('.percent_change').html($('.change_price-' + assets.fromsym + '-' + assets.tosym).html());

        // $('.percent_change').html('<span class="font-weight-bold change_price-'+assets.fromsym+'-'+assets.tosym+'">--:--</span>');



        $('.trade-action').val('buy');

        // $('.spread_input').val(assets.spread);

        $('.unit-amount').text(assets.step);



        $('.curr_product_id').val(assets.fromsym + '-' + assets.tosym);



        // console.log(assets);



        $('#quantity').data('step', assets.step);



        $('.current_price').val(Number($('.buy_price-' + assets.fromsym + '-' + assets.tosym).text()));





        updateMarginValue(assets.fromsym + '-' + assets.tosym, assets.step, Number($('.buy_price-' + assets.fromsym +

            '-' + assets.tosym).text()));



    }





    function executeSell(title, assets, icon, icon_2, pair_name) {



        if (currentIcon != null) {

            $('.trade-icon').removeClass('cf-' + currentIcon);

        }

        if (currentIcon_2 != null) {

            $('.trade-icon').removeClass('cf-' + currentIcon_2);

        }



        currentIcon = icon;

        currentIcon_2 = icon_2;

        $('.trade-icon').addClass('cf-' + icon);

        $('.trade-icon').addClass('cf-' + icon_2);

        $('#placeTrade-title').html(title);

        $('.pair_name').html(pair_name);



        $('.current_rate').html($(".price-" + assets.fromsym + '-' + assets.tosym).html());

        $('.percent_change').html($('.change_price-' + assets.fromsym + '-' + assets.tosym).html());





        $('.trade-action').val('sell');

        $('.leverage_input').val(assets.leverage);

        $('.unit-amount').text(assets.step);



        $('.curr_product_id').val(assets.fromsym + '-' + assets.tosym);



        $('#quantity').data('step', assets.step);



        $('.current_price').val(Number($('.sell_price-' + assets.fromsym + '-' + assets.tosym).text()));



        //set margin

        updateMarginValue(assets.fromsym + '-' + assets.tosym, assets.step, Number($('.sell_price-' + assets.fromsym +

            '-' + assets.tosym).text()));



    }





    function executeTrade(assets, icon, icon_2, pair_name) {



        if (currentIcon != null) {

            $('.trade-icon').removeClass('cf-' + currentIcon);

        }

        if (currentIcon_2 != null) {

            $('.trade-icon').removeClass('cf-' + currentIcon_2);

        }





        currentIcon = icon;

        currentIcon_2 = icon_2;

        $('.trade-icon').addClass('cf-' + icon_2);

        // $('.trade-icon').addClass('cf-'+icon);

        $('.pair_name').html(pair_name);



        $('.current_rate').html($(".price-" + assets.fromsym + '-' + assets.tosym).html());

        $('.percent_change').html($('.change_price-' + assets.fromsym + '-' + assets.tosym).html());

        $('.leverage_input').val(assets.leverage);

        $('.unit-amount').text(assets.step);



        $('.curr_product_id').val(assets.fromsym + '-' + assets.tosym);



        $('#quantity').data('step', assets.step);



        $('.current_price').val(Number($('.sell_price-' + assets.fromsym + '-' + assets.tosym).text()));

        //set margin
        updateMarginValue(assets.fromsym + '-' + assets.tosym, assets.step, Number($('.sell_price-' + assets.fromsym +

            '-' + assets.tosym).text()));



    }





    function processPayout(buy, sell, rate) {



        if (buy == undefined)

            return;



        if (sell == undefined)

            return;



        amount = $('#amount_trade').val();



        $('#buypercent').text(buy + '%');

        $('#sellpercent').text(sell + '%');



        var buyamount = ((buy / 100) * amount).toFixed(2);

        var sellamount = ((sell / 100) * amount).toFixed(2);



        $('#buyamount').text('$' + buyamount);

        $('#sellamount').text('$' + sellamount);



        $('#buypercentinput').val(buyamount);

        $('#sellpercentinput').val(sellamount);

        $('#rate').val(rate);



        $('#strikerate').removeAttr('id').attr('id', 'strikerateused');



    }



    function loadChart($pair) {

        const darkThemeCf = window.matchMedia("(prefers-color-scheme: dark)");



        var theme_chart = localStorage.getItem("theme", "dark");

        if(theme_chart == null){

            var theme_chart = (darkThemeCf.matches) ? 'dark':'light';

        }



        if ($pair == $currentPair)

            return;



        var tradingGraph = new TradingView.widget({

            "width": '100%',

            "height": $chart_height,

            "symbol": "COINBASE:" + $pair,

            "interval": "30",

            "timezone": "Etc/UTC",

            "theme": theme_chart,

            "style": "1",

            "locale": "en",

            "toolbar_bg": "rgba(0, 0, 0, 0)",

            "enable_publishing": false,

            "hide_legend": true,

            "allow_symbol_change": false,

            "container_id": "tradingview_6f76f"

        });



        $currentPair = $pair;



    }

    </script>



    @if (Auth::user()->is_pend && Auth::user()->pend_message)

        <script type="text/javascript">

            $(document).ready(function() {

                swal("Pending Alert", "{{ Auth::user()->pend_message }}", "info");

            });

        </script>

    @endif

<script src="{{ asset('userassets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script> -->

@endsection