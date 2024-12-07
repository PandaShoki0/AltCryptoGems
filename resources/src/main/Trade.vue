<template>
    <div>
        <div v-for="pair in data.pairs">
            <div :class="['change_price-' + pair.fromsym + '-' + pair.tosym, 'd-none']"> 0.00</div>
            <div :class="['price-' + pair.fromsym + '-' + pair.tosym, 'd-none']"> 0</div>
            <div :class="['spread-' + pair.fromsym + '-' + pair.tosym, 'd-none']"> 0</div>
            <div :class="['high_24h-' + pair.fromsym + '-' + pair.tosym, 'd-none']"> 0</div>
            <div :class="['low_24h-' + pair.fromsym + '-' + pair.tosym, 'd-none']"></div>
            <div :class="['sell_price-' + pair.fromsym + '-' + pair.tosym, 'd-none']"></div>
            <div :class="['buy_price-' + pair.fromsym + '-' + pair.tosym, 'd-none']"></div>
            <div :class="['volume-' + pair.fromsym + '-' + pair.tosym, 'd-none']"></div>
            <div :class="['spread-' + pair.fromsym + '-' + pair.tosym, 'd-none']"></div>
            <div :class="['asset-info-' + pair.fromsym + '-' + pair.tosym, 'd-none']" :data-asset="pair"></div>
        </div>

        <div class="row mt-0">
            <!-- Trading Pair & Trading Assets -->
            <div id="tradingpairdiv"
                :class="['col-12 col-sm-12 p-0 px-2 mt-0', collapsed ? 'col-md-1' : 'col-lg-4 col-md-4 col-xl-4']">

                <div class="card" style="height:90vh; overflow-y:hidden;">

                    <div class="card-header align-items-center d-flex"
                        :style="{ paddingLeft: collapsed ? '5px' : '15px' }" style="border-bottom:none;">
                        <div class="row align-items-center">
                            <!-- Toggle Button and Title for all screen sizes -->
                            <div class="col-12 col-md-auto d-flex align-items-center mb-2 mb-md-0"
                                style="margin-bottom: 10px;">
                                <button @click="toggleCollapse" class="btn btn-light me-2 toggle-button">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <h4 class="card-title mb-0 flex-grow-1">Trading Pairs</h4>
                            </div>

                            <!-- Search bar, on a separate row for smaller screens -->
                            <div class="col-12 col-md-auto">
                                <div class="form-group mb-4 mb-md-0">
                                    <div class="input-group input-sm">
                                        <input class="form-control" type="text" name="search_asset"
                                            style="width:1% !important; border-radius: 3px !important;"
                                            placeholder="Search Asset..." aria-label="Search Asset..."
                                            aria-describedby="search-asset">
                                        <span class="input-group-text" id="search-asset"><i
                                                class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- end card header -->

                    <div class="card-body px-0">

                        <div class="tab-content">

                            <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">

                                <div :class="['table-responsive', { 'pl-0': collapsed, 'px-3': !collapsed }]"
                                    data-simplebar style="max-height: 110vh;">

                                    <table class="table align-middle table-nowrap table-borderless">

                                        <thead style="position: sticky; top: 0;">

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

                                        <tbody id="load_assets" v-html="ready_html" @click="handleAsset"></tbody>

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

                                There was a server error that is preventing the trading components load
                                completing.<br />

                                <button class="btn btn-warning btn-sm" @click="showOptions()">Retry</button>

                            </div>



                        </div>



                    </div>

                </div>



            </div>
            <!-- end -->
            <div :class="['col-md-8 row', collapsed ? 'col-md-11 row' : '']">
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

                                <button type="button" @click="openBuy()" class="btn btn-success w-xs"><i
                                        class="bx bx-trending-up"></i> BUY</button>

                                <button type="button" @click="openSell()" class="btn btn-danger w-xs"><i
                                        class="bx bx-trending-down"></i> SELL</button>

                            </div>

                        </div>

                    </div>

                    <div class="tradingview-widget-container">

                        <div id="tradingview_6f76f"></div>

                        <!-- <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script> -->

                    </div>



                </div>
                <!-- end -->

                <!-- Buy Sell Form -->
                <div id="tradebox" class="col px-2 d-none">

                    <div class="card p-0">

                        <div class="text-end mb-1 px-2">

                            <i class="fa fa-times text-danger" @click="closeTradeBox()"></i>

                        </div>

                        <div class="card-body">

                            <form id="tradelive" autocomplete="off" method="POST" action=""
                                enctype="application/x-www-form-urlencoded">
                                <div class="row">

                                    <div class="col-6">

                                        <div class="d-flex align-items-start ">

                                            <div class="flex-shrink-0 me-3 align-self-center">

                                                <i class="cc trade-icon fa-3x"></i>

                                            </div>

                                            <div class="flex-grow-1">

                                                <h5 class="font-size-18 mb-1 selected_instrument"></h5>

                                                <h6 class="font-size-14 mt-0 mb-2 selected_change"></h6>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-6 text-end">



                                        <h5 class="font-size-18 mb-1 selected_price">0.00</h5>

                                        <h6 class="font-size-14 mt-0 mb-2">Price</h6>

                                    </div>

                                </div>



                                <div class="form-group mt-2 pt-1">

                                    <label class="form-label" for="quantity">Amount <strong>Contracts:</strong>
                                        <span class="text-danger">*</span></label>

                                    <div class="input-group input-group-lg">

                                        <span class="btn btn-primary text-inverse text-4"
                                            @click="updateQuan('down');">-</span>

                                        <input id="quantity" class="form-control form-control-lg" required type="text"
                                            style="width: 1% !important; border-radius: 0 !important" name="quantity" />

                                        <span class="btn btn-primary text-inverse text-4"
                                            @click="updateQuan('up');">+</span>

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



                                    <input id="stopLossField" class="form-control d-none mt-2" type="text"
                                        name="stop_loss">

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
                                            data-action="buy" id="buyBtn" type="submit"><i
                                                class='bx bx-trending-up'></i>
                                            BUY

                                        </button>

                                        <div class="h6 ask_price text-success my-3"></div>

                                    </div>

                                    <div class="placeselltrade col-12 text-center d-none">

                                        <button class="btn btn-danger btn-block w-xl btn-lg trade_btn m-1" disabled
                                            data-action="sell" id="sellBtn" type="submit"><i
                                                class='bx bx-trending-down'></i>

                                            SELL </button>

                                        <div class="h6 bid_price text-danger my-3"></div>

                                    </div>

                                </div>



                                <h5 class="text-bold text-center">This position will be closed automatically in 7
                                    days</h5>

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

                                        <a class="nav-link active" data-bs-toggle="tab" href="#openpositions"
                                            role="tab">

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


                                    <li class="nav-item" v-if="data.earnings">

                                        <a class="nav-link" data-bs-toggle="tab" href="#earnings" role="tab">

                                            <span class="d-block d-sm-none"></span>

                                            <span class="d-none d-sm-block">Earnings</span>

                                        </a>

                                    </li>


                                </ul>

                            </div>

                        </div><!-- end card header -->



                        <div class="card-body">



                            <!-- Tab panes -->

                            <div class="tab-content text-muted">

                                <div class="tab-pane active" id="openpositions" role="tabpanel">

                                    <div id="tradehistory" class="p-0">
                                        <div class="table-responsive">
                                            <table class="table table-sm p-2">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">Positon ID</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                        <th scope="col" class="text-center">Assets</th>
                                                        <th scope="col" class="text-center">Opening Value</th>
                                                        <th v-if="data.isFull" scope="col" class="text-center">Current
                                                            Value
                                                        </th>
                                                        <th v-if="data.isFull" scope="col" class="text-center">Quantity
                                                        </th>
                                                        <th v-if="data.isFull" scope="col" class="text-center">Required
                                                            Margin</th>
                                                        <th scope="col" class="text-center">Profit/Loss</th>
                                                        <th v-if="data.isFull" scope="col" class="text-center">Expire
                                                            Date/Time</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tradeHistoryList">
                                                    <tr v-if="data.history" v-for="item in data.history.data">
                                                        <td class="text-center">{{ item.trade_id.toUpperCase() }}</td>
                                                        <td class="text-center">{{ ucwords(item.trade_action) }}</td>
                                                        <td class="text-center">{{ item.sym[0].fromsym }}-{{
                                                            item.sym[0].tosym }}
                                                        </td>
                                                        <td class="text-center value_{{item.id}}">
                                                            {{ data.mycurrency.symbol +
                                                                Number(item.amount_value_user_currency).toFixed(data.mycurrency.decimal_digits)
                                                            }}
                                                        </td>
                                                        <td v-if="data.isFull"
                                                            class="text-center current_value_text-{{item.id}}"></td>
                                                        <td v-if="data.isFull" class="text-center">{{ item.quantity }}
                                                        </td>
                                                        <td v-if="data.isFull" class="text-center">
                                                            {{ data.mycurrency.symbol +
                                                                Number(item.amount_margin_user_currency ??
                                                                    0).toFixed(data.mycurrency.decimal_digits)
                                                            }}</td>
                                                        <td v-else class="d-none current_value_text-{{item.id}}"></td>
                                                        <td :class="['text-center', 'profit_loss_history', `profit_loss_live-${item.id}`, item.profit_loss_class]"
                                                            :data-item-id="item.id"
                                                            :data-product-id="item.sym[0].fromsym + '-' + item.sym[0].tosym"
                                                            :data-item="item">{{ Number(item.profit_loss_user ??
                                                                0).toFixed(2) }}</td>
                                                        <td v-if="data.isFull"
                                                            class="text-center expire_time-{{item.id}}">
                                                        </td>
                                                        <td> <button class="btn btn-primary btn-sm"
                                                                @click="openPositionInfo(item, `${item.sym[0].fromsym}-${item.sym[0].tosym}`)"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#positionInfo"><i
                                                                    class="mdi mdi-information"></i></button></td>
                                                        <td class="current_rate_text-{{item.id}} d-none"></td>
                                                    </tr>

                                                    <tr v-if="data.history && data.history.data.length == 0">
                                                        <td colspan="9">
                                                            <div class="alert alert-info alert-outline border-0 fade show px-4 mb-0 text-center"
                                                                role="alert">
                                                                <i
                                                                    class="mdi mdi-alert-circle-outline d-block display-4 mt-2 mb-3 text-info"></i>
                                                                <h5 class="text-info">No Opened Positions</h5>
                                                                <p>Your opened positions on your account will be listed
                                                                    here.</p>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!-- @if($isFull) 
        {{ $history->links('partials.pagination') }}
    @endif -->
                                            <div class="flex justify-end">
                                                <VTPagination v-if="totalPagesOpen"
                                                    v-model:currentPage="currentPageOpen"
                                                    class="flex items-center justify-between pt-4"
                                                    aria-label="Table navigation" :total-pages="totalPagesOpen"
                                                    :max-page-links="3" :boundary-links="true">
                                                    <template #firstPage> {{ $t("First") }} </template>

                                                    <template #lastPage> {{ $t("Last") }} </template>

                                                    <template #next>
                                                        <span class="sr-only">{{ $t("Next") }}</span>
                                                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </template>

                                                    <template #previous>
                                                        <span class="sr-only">{{ $t("Previous") }}</span>
                                                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </template>
                                                </VTPagination>
                                            </div>
                                        </div>
                                    </div>

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



                                                <tr v-if="data.closed_positions"
                                                    v-for="item in data.closed_positions.slice(currentPageClose == 1 ? 0 : currentPageClose * 10 - 10, currentPageClose * 10)">

                                                    <td class="text-center">{{ item.trade_id.toUpperCase() }}</td>

                                                    <td class="text-center">{{ ucwords(item.trade_action) }}
                                                    </td>

                                                    <td class="text-center">

                                                        {{ item.sym[0].fromsym }}-{{ item.sym[0].tosym }}
                                                    </td>

                                                    <td class="text-center value_{{ item.id }}">

                                                        {{ data.mycurrency.symbol +
                                                            parseFloat(item.amount_value_user_currency).toFixed(data.mycurrency.decimal_digits)
                                                        }}



                                                    </td>

                                                    <td class="text-center">


                                                        {{ data.mycurrency.symbol +
                                                            (parseFloat(item.amount_value_user_currency) +
                                                                parseFloat(item.profit_loss_user)).toFixed(data.mycurrency.decimal_digits)
                                                        }}

                                                    </td>

                                                    <td class="text-center">{{ item.quantity }}</td>

                                                    <td class="text-center">

                                                        {{ data.mycurrency.symbol +
                                                            parseFloat(item.amount_margin_user_currency).toFixed(data.mycurrency.decimal_digits)
                                                        }}

                                                    </td>

                                                    <td
                                                        :class="['text-center', 'profit_loss_live-' + item.id, item.profit_loss_user > 0 ? 'text-success' : 'text-danger']">

                                                        {{
                                                            data.mycurrency.symbol +
                                                            parseFloat(item.profit_loss_user).toFixed(data.mycurrency.decimal_digits)
                                                        }}

                                                    </td>



                                                    <td class="text-center">
                                                        <!-- {{ item.created_at+'+01:00' }} -->

                                                        <!-- {{ new Date('m/d/Y h:ia', new
                                                            Date(item.created_at + '+01:00').getTime()) }} -->
                                                        {{ new Date(item.created_at).toLocaleString() }}

                                                    </td>

                                                    <td>

                                                        <button class="btn btn-primary btn-sm"
                                                            :id="'open_postion' + item.id"
                                                            @click="openPositionInfo(item, `${item.sym[0].fromsym}-${item.sym[0].tosym}`)"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#positionInfo"><i
                                                                class="fas fa-info-circle"></i>
                                                            Info</button>

                                                        <div :class="['d-none', 'current_rate_text-' + item.id]">

                                                            {{ Number(item.price) + Number(item.profit_loss_user) }}
                                                        </div>

                                                    </td>



                                                    <!--var initialRate = $('.current_rate_text-'+item.id).text();-->

                                                    <!--var initialValue = $('.current_value_text-'+item.id).text();-->

                                                    <!--var initialProfitLoss = $('.profit_loss_live-'+item.id).html();-->

                                                    <!--var initialProfitLossText = $('.profit_loss_live-'+item.id).text();  -->

                                                </tr>




                                                <tr v-if="data.closed_positions && data.closed_positions.length == 0">

                                                    <td colspan="10">

                                                        <div
                                                            class="alert alert-outline-danger text-center text-bold text-light">

                                                            <div class="alert alert-info alert-outline border-0 fade show px-4 mb-0 text-center"
                                                                role="alert">

                                                                <i
                                                                    class="mdi mdi-alert-circle-outline d-block display-4 mt-2 mb-3 text-info"></i>

                                                                <h5 class="text-info">No closed Positions</h5>

                                                                <p>Closed positions on your account will be
                                                                    displayed here.
                                                                </p>

                                                            </div>

                                                        </div>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>
                                        <div class="flex justify-end">
                                            <VTPagination v-if="totalPagesClose" v-model:currentPage="currentPageClose"
                                                class="flex items-center justify-between pt-4"
                                                aria-label="Table navigation" :total-pages="totalPagesClose"
                                                :max-page-links="3" :boundary-links="true">
                                                <template #firstPage> {{ $t("First") }} </template>

                                                <template #lastPage> {{ $t("Last") }} </template>

                                                <template #next>
                                                    <span class="sr-only">{{ $t("Next") }}</span>
                                                    <svg class="h-5 w-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </template>

                                                <template #previous>
                                                    <span class="sr-only">{{ $t("Previous") }}</span>
                                                    <svg class="h-5 w-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </template>
                                            </VTPagination>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane" id="earnings" role="tabpanel" v-if="data.earnings">

                                    <div id="transactionHistory" class="px-2">

                                        <table class="table no-margin table-hover" style="--bs-table-hover-bg: none;">

                                            <thead>

                                                <tr>

                                                    <th scope="col">Transaction ID</th>

                                                    <th scope="col">Transaction Type</th>

                                                    <th scope="col">Amount</th>

                                                    <th scope="col">Date</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr v-if="data.earnings.length > 0"
                                                    v-for="earning in data.earnings.slice(currentPageEarning == 1 ? 0 : currentPageEarning * 10 - 10, currentPageEarning * 10)"
                                                    :class="[earning.trx_type == '+' ? 'text-success' : earning.trx_type == '-' ? 'text-danger' : '']">

                                                    <td data-label="#TRX">{{ earning.trx.toUpperCase() }}</td>

                                                    <td data-label="Transaction Type">{{ earning.trx_type == '+' ?
                                                        "Credit"
                                                        :
                                                        "Withdraw"
                                                        }}
                                                    </td>

                                                    <td data-label="Amount"
                                                        v-html="earning.trx_type + (earning.amount ? earning.amount : 'N/A') + earning.currency">
                                                    </td>

                                                    <td data-label="Time">

                                                        {{ new Date(earning.created_at).toLocaleString() }}

                                                        <!-- {!! date(' d M, Y h:s A', strtotime($data->created_at)) !!} -->
                                                    </td>

                                                </tr>

                                                <tr class="text-center" v-if="data.earnings.length == 0">

                                                    <td colspan="4">

                                                        <div
                                                            class="alert alert-outline-danger text-center text-bold text-light">

                                                            <div class="alert alert-info alert-outline border-0 fade show px-4 mb-0 text-center"
                                                                role="alert">

                                                                <i
                                                                    class="mdi mdi-alert-circle-outline d-block display-4 mt-2 mb-3 text-info"></i>

                                                                <h5 class="text-info">No recent earnings</h5>

                                                                <p>no recent earnings from closed positions yet.</p>

                                                            </div>

                                                        </div>

                                                    </td>

                                                </tr>


                                            </tbody>

                                        </table>
                                        <div class="flex justify-end">
                                            <VTPagination v-if="totalPagesEarning"
                                                v-model:currentPage="currentPageEarning"
                                                class="flex items-center justify-between pt-4"
                                                aria-label="Table navigation" :total-pages="totalPagesEarning"
                                                :max-page-links="3" :boundary-links="true">
                                                <template #firstPage> {{ $t("First") }} </template>

                                                <template #lastPage> {{ $t("Last") }} </template>

                                                <template #next>
                                                    <span class="sr-only">{{ $t("Next") }}</span>
                                                    <svg class="h-5 w-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </template>

                                                <template #previous>
                                                    <span class="sr-only">{{ $t("Previous") }}</span>
                                                    <svg class="h-5 w-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </template>
                                            </VTPagination>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>







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

                            <button class="btn-close" id="close_modal_position" data-bs-dismiss="modal"
                                aria-label="Close">
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
                            <label class="btn btn-outline-danger close_position close_position_btn"
                                data-bs-dismiss="modal" type="button"><span class="fa fa-times"></span> Close
                                Position</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { isProxy, toRaw } from "vue";
import swal from 'sweetalert2';
window.Swal = swal;
$('#bootstrap-style')[0].href = '/userassets/css/bootstrap.min.css'

import { useAlerts } from "@/composables/useAlerts";

export default {

    setup() {
        const { showAllAlertsSequentially, hasLicensePrompt, hasLimitExceeded, hasPend } = useAlerts();

        return {
            showAllAlertsSequentially,
            hasLicensePrompt,
            hasLimitExceeded,
            hasPend
        }
    },

    data() {
        return {
            name: "Trade",
            data: {},
            categories: [],
            ready_html: '',
            $currentPair: '',
            $chart_height: '',
            currentIcon: null,
            currentIcon_2: null,
            selectedItem: {},
            currentPageClose: 1,
            totalPagesClose: 10,
            currentPageOpen: 1,
            totalPagesOpen: 10,
            currentPageEarning: 1,
            totalPagesEarning: 10,
            collapsed: false,

        }
    },
    methods: {
        ucwords(str) {
            const arr = str.split(" ");
            for (var i = 0; i < arr.length; i++) {
                arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
            }
            return arr.join(" ")
        },
        toggleCollapse() {
            this.collapsed = !this.collapsed;
        },
        fetchTradeData() {
            axios.get("/user/trade/fetch-trade").then(response => {
                if (response.type == "success") {
                    this.data = response.data;
                    // console.log("ffff", this.data)
                    this.totalPagesClose = Math.ceil(this.data.closed_positions.length / 10)
                    this.totalPagesOpen = this.data.history.last_page;
                    // this.totalPagesOpen = Math.ceil(this.data.history.length / 10)


                    if (this.data.earnings) {
                        this.totalPagesEarning = Math.ceil(this.data.earnings.length / 10)
                    }

                    // if (!this.data.userplan && this.data.trade_session === 'live') {
                    //     this.$router.push({ path: "/plan" });
                    //     return;
                    // }

                    // if (this.data.myuser.is_pend) {
                    //     this.showPendAlert()
                    // }

                    // if (this.data.myuser.is_license_prompt) {
                    //     this.showLicenseAlert()
                    // }

                    // if (this.data.userplan && this.data.userplan?.currentplan?.trade_limit != 0 && this.data.recordLimits?.trades > this.data.userPlan?.currentplan?.trade_limit) {
                    //     this.showLimitAlert()
                    // }

                    this.addBalancePanelToTopNavbar()
                    this.categories = this.data.pairs;
                    this.handleAbc()
                }
            }).catch(error => {
                console.log("error", error)
            })
        },
        handleAbc() {
            var isRunning = false;

            var timezoneString = Intl.DateTimeFormat().resolvedOptions().timeZone;

            var open_positions = [];
            var default_currency = this.data.mycurrency.code.toLowerCase();
            var saving = false;
            var savingStopLoss = false;
            var savingTakeProfit = false;
            const vm = this;

            function fmtVal(amount, currency) {
                let _base_currency = vm.data.rates[currency];
                return _base_currency.unit + numberWithCommas(amount);
            }

            function numberWithCommas(x) {
                return x?.toFixed(2)?.toString()?.replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
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


            function tradehistory() {
                if (isRunning)
                    return;

                isRunning = true;
                if ($('#tradehistoryfull').length > 0) {
                    axios.get(`user/trade/gethistory-full`).then(response => {
                        $('#tradehistoryfull').load(response)
                    })
                    // $('#tradehistoryfull').load('{{ route('user.trade.tradehistoryfull') }}');
                } else if ($('#tradehistory').length > 0) {
                    axios.get(`user/trade/gethistory`).then(response => {
                        $('#tradehistory').load(response)
                    })
                    // $('#tradehistory').load('{{ route('user.trade.tradehistory') }}');
                } else {
                    axios.get(`user/trade/gethistory`).then(response => {
                        $('#tradehistory-hidden').load(response).hide()
                    })
                    // $('#tradehistory-hidden').load('{{ route('user.trade.tradehistory') }}').hide();
                }
            }

            function notrades() {
                if ($('#tradehistoryfull').length > 0) {
                    axios.get(`${process.env.APP_URL}/user/trade/gethistory-full`).then(response => {
                        $('#tradehistoryfull').load(response)
                    })

                } else if ($('#tradehistory').length > 0) {
                    axios.get(`/user/trade/gethistory`).then(response => {
                        // tradeHistory = response
                        $('#tradehistory').load(response)
                    })
                    // $('#tradehistory').load('{{ route('user.trade.tradehistory') }}');
                } else {
                    axios.get(`/user/trade/gethistory`).then(response => {

                        $('#tradehistory-hidden').load(response).hide()
                    })
                    // $('#tradehistory-hidden').load('{{ route('user.trade.tradehistory') }}').hide();
                }

            }

            var timeFn;

            function checkforRates() {
                let timeFn;
                if (vm.data.rates == undefined) {
                    timeFn = setTimeout("checkforRates()", 1000);
                    return;
                }

                $('#rates').val(JSON.stringify(vm.data.rates));
                $('.rates_alt').val(JSON.stringify(vm.data.rates));
                stopCheckRate(timeFn);
            }

            function stopCheckRate(timeFn) {
                clearTimeout(timeFn);
            }

            function convertToUserCurrency(usd_value, currency_iso_name, currency_from, format = false, currency_from_rate =
                null) {
                if (vm.data.rates == undefined) {
                    checkforRates();
                    return;
                }
                let btc_amount = (currency_from_rate != null) ? parseFloat(Number(usd_value) / currency_from_rate) : parseFloat(
                    Number(usd_value) / vm.data.rates[currency_from].value);

                let user_currency_value = vm.data.rates[currency_iso_name].value * btc_amount;

                return (format) ? vm.data.rates[currency_iso_name].unit + numberWithCommas(user_currency_value) : user_currency_value;
            }

            $('.close_position').click(function (evt) {
                evt.preventDefault();
                // console.log("this.selectedItem", vm.selectedItem)
                let item = vm.selectedItem;
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                Swal.fire({
                    title: 'Close position for ' + item.sym[0].name + '?',
                    text: 'Are you sure you want to close the ' + item.sym[0].name + ' ' + item
                        .trade_action + ' position for Trade ID:' + item.trade_id + '?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                })
                    .then((closePosition) => {
                        if (closePosition.isConfirmed) {
                            let dataPost = {
                                _payload: item,
                                rates: vm.data.rates,
                                _token: token
                            };
                            $.ajax({
                                url: "/user/trade/send-close-trade" + (vm.currentPageOpen ? '?page=' + vm.currentPageOpen : ''),
                                data: dataPost,
                                method: "POST",
                                dataType: "json",
                                success: function (closeTradeResult) {
                                    //send close action to server and act base on feedback!


                                    if (closeTradeResult.status == true) {
                                        Swal.fire(closeTradeResult.message, {
                                            icon: 'info',
                                        });
                                        // let old_position = $('.current_open_positions').val();
                                        let old_position = vm.data.positions_count;

                                        $('.available_balance').text(closeTradeResult.balance_fmt);
                                        $('.margin_used').text(closeTradeResult.margin_used);
                                        $('.balance_in_currency').val(closeTradeResult.balance);
                                        var final_profit_loss = (closeTradeResult.profit_loss_user > 0) ? '<span class="text-success text-bold">' + fmtVal(closeTradeResult.profit_loss_user, default_currency) + "</span>" : '<span class="text-danger text-bold">' + fmtVal(closeTradeResult.profit_loss_user, default_currency) + '</span>';
                                        $('.total_profit_loss').html(final_profit_loss);
                                        $('.equity_balance').html(vm.data.mycurrency.symbol + closeTradeResult.equity)
                                        if (parseInt(old_position) != closeTradeResult.positions) {
                                            closeTradeResult.history.forEach((item, index) => {
                                                item.profit_loss_user = parseFloat(item.profit_loss_user).toFixed(2)
                                                item.profit_loss_class = (item.profit_loss_user > 0) ? "text-success text-bold" : "text-danger text-bold";
                                            })
                                            vm.data.history.data = closeTradeResult.history;
                                            vm.ws_pos.onmessage = (ev) => { }
                                            vm.ws_pos.close()
                                            vm.connect(closeTradeResult.position_assets)
                                        }
                                    }

                                    $('#positionInfo').modal('hide');

                                },
                                error: function (fail) {
                                    console.log(fail);
                                },
                            });

                        }
                    });
            });

            function toTitleCase(str) {
                return str?.replace(
                    /\w\S*/g,
                    function (txt) {
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




            function convertTZ(date, tzString) {
                return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {
                    timeZone: tzString
                }));
            }



            var xx = window.matchMedia("(max-width: 1920px)");

            var xxl = window.matchMedia("(max-width: 3440px)");

            var $chart_height = (xxl.matches) ? 600 : 300;

            $chart_height = (xx.matches) ? 410 : $chart_height;
            this.$chart_height = $chart_height

            var categories = this.data.pairs;

            var rates = this.data.rates;
            var mycurrency = this.data.mycurrency;

            var coin_icon_colors = this.data.bg_colors;



            var t;



            var ont = false;



            var currentIcon;



            var currentIcon_2;





            var qty = 0;



            var selected_id;



            var $currentPair;





            var gcd = function (a, b) {

                if (b < 0.0000001) return a; // Since there is a limited precision we need to limit the value.



                return gcd(b, Math.floor(a % b)); // Discard any fractions due to limitations in precision.

            };



            // $(document).ready(function () {

            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {

                $('h4.tab-current-title').text(event.target.text.trim());

            });

            // });



            showOptions();
            checkforRates();
            $('#quantity').on('change, keyup', function () {
                qty = $(this).val();
                selected_id = $(".curr_product_id").val();
                let current_price = $('.current_price').val();
                updateMarginValue(selected_id, qty, current_price);
            });

            function showOptions() {
                const products = [];

                var change = {};

                var spread = {};

                var timing = {};

                var initPrices = {};

                var currentPrices = {};

                var stat = {};
                $('.loading_assets').removeClass('d-none');
                $('.failed_loading_assets').addClass('d-none');
                axios.get('/user/trade/get-all-assets').then(d => {
                    for (let i = 0; i < d.length; i++) {
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
                    // const ws = new WebSocket('wss://ws-feed.pro.coinbase.com');
                    const ws = new WebSocket('wss://ws-feed.exchange.coinbase.com');
                    ws.onopen = () => {
                        ws.send(JSON.stringify(subscribe));
                        loadAssetCategories(categories);
                    };

                    ws.onmessage = function (e) {
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


                        $('.price-' + value.product_id).each(function (index, element) {
                            if (value.price > 0.09) {
                                $(element).text(formatMoney(value.price));

                            } else {

                                $(element).text(formatMoney(value.price, 4));

                            }

                        });



                        $('.change_price-' + value.product_id).each(function (index, element) {

                            if (stat[value.product_id] >= 0) {

                                $(element).html('<div class="text-success">' + stat[value.product_id]

                                    .toFixed(2) + '% <i class="fa fa-caret-up"></i></div>');

                            } else {

                                $(element).html('<div class="text-danger">' + stat[value.product_id]

                                    .toFixed(2) + '% <i class="fa fa-caret-down"></i></div>');

                            }

                        });



                        $('.sell_price-' + value.product_id).each(function (index, element) {

                            $(element).text(Number(value.best_ask));

                        });



                        $('.buy_price-' + value.product_id).each(function (index, element) {

                            $(element).text(Number(value.best_bid));

                        });



                        $('.high_24h-' + value.product_id).each(function (index, element) {

                            $(element).text(Number(value.high_24h));

                        });



                        $('.low_24h-' + value.product_id).each(function (index, element) {

                            $(element).text(Number(value.low_24h));

                        });



                        $('.volume-' + value.product_id).each(function (index, element) {

                            $(element).text(Number(value.volume_24h));

                        });



                        var _current = $(".curr_product_id").val();



                        var qty = Number($('#quantity').val());



                        if (_current == value.product_id) {



                            spread[value.product_id] = Number(value.best_ask) - Number(value.best_bid)



                            $('.selected_price').each(function (index, element) {

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



                    $('.loading_assets').addClass('d-none');

                    $('.trade_btn').attr('disabled', false);

                    // notrades();
                }).catch(error => {
                    $('.loading_assets').addClass('d-none');

                    $('.failed_loading_assets').removeClass('d-none');
                })

            }



            function updateMarginValue(select, quantity, price) {

                if (price == 0) {

                    price = Number($('.price-' + select).text());

                }



                var res_curr = select.split('-');



                let current_unit = res_curr[1].toLowerCase();


                var total_leverage;

                var total_qty_price;

                var total_value;

                var margin;

                var total_margin;


                if (vm.data.trade_session === 'live') {
                    if (vm.data.userplan.pricing_plan_id == 1) var max = 70;

                    else if (vm.data.userplan.pricing_plan_id == 2) var max = 35;

                    else if (vm.data.userplan.pricing_plan_id == 3) var max = 10;

                    else if (vm.data.userplan.pricing_plan_id == 4) var max = 3;
                } else if (vm.data.trade_session === 'demo') {
                    var max = 70;
                }





                total_leverage = max;



                total_leverage = (total_leverage > 99) ? max : ((total_leverage < 3) ? max : total_leverage);


                total_qty_price = (price * quantity);



                total_margin = total_qty_price * (total_leverage / 100);


                total_value = (total_margin * (100 / total_leverage));


                if (rates !== undefined) {

                    let currency_s = rates[current_unit];

                    if (currency_s == undefined) {

                        $('.trade-item-margin').text('$' + formatMoney(Number(total_margin)));

                        $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                            mycurrency.code.toLowerCase(), 'usd'));

                        $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                            mycurrency.code.toLowerCase(), 'usd', false));

                        /////

                        $('.trade-item-value').text('$' + formatMoney(Number(total_value)));

                        $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                            mycurrency.code.toLowerCase(), 'usd'));

                        $('.amount-value-user').val(convertToUserCurrency(total_value,

                            mycurrency.code.toLowerCase(), 'usd', false));

                        $('.trade-currency').val('usd');



                    } else {



                        if (currency_s.type == 'crypto') {

                            $('.trade-item-margin').text(formatMoney(Number(total_margin), 4) + currency_s.unit);

                            $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                                mycurrency.code.toLowerCase(), current_unit));

                            $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                                mycurrency.code.toLowerCase(), current_unit, false));



                            $('.trade-item-value').text(formatMoney(Number(total_value), 4) + currency_s.unit);

                            $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                                mycurrency.code.toLowerCase(), current_unit));

                            $('.amount-value-user').val(convertToUserCurrency(total_value,

                                mycurrency.code.toLowerCase(), current_unit, false));

                            $('.trade-currency').val(current_unit);

                        } else {

                            $('.trade-item-margin').text(currency_s.unit + formatMoney(Number(total_margin)));

                            $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                                mycurrency.code.toLowerCase(), current_unit));

                            $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                                mycurrency.code.toLowerCase(), current_unit, false));



                            $('.trade-item-value').text(currency_s.unit + formatMoney(Number(total_value)));

                            $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                                mycurrency.code.toLowerCase(), current_unit));

                            $('.amount-value-user').val(convertToUserCurrency(total_value,

                                mycurrency.code.toLowerCase(), current_unit, false));

                            $('.trade-currency').val(current_unit);

                        }

                    }

                } else {

                    $('.trade-item-margin').text('$' + formatMoney(Number(total_margin)));

                    $('.trade-item-margin-user-currency').text(convertToUserCurrency(total_margin,

                        mycurrency.code.toLowerCase(), 'usd'));

                    $('.amount-margin-user').val(convertToUserCurrency(total_margin,

                        mycurrency.code.toLowerCase(),

                        'usd', false));



                    $('.trade-item-value').text('$' + formatMoney(Number(total_value)));

                    $('.trade-item-value-user-currency').text(convertToUserCurrency(total_value,

                        mycurrency.code.toLowerCase(), 'usd'));

                    $('.amount-value-user').val(convertToUserCurrency(total_value, mycurrency.code.toLowerCase(),

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


                var finalratio = getRatio(numerator, denominator, 10);



                $('.leverage-ratio').text(finalratio);



                if (price == 0) {

                    timeOut = setTimeout(updateMarginValue(select, quantity, price), 5000);

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



                var newInstrument = instrument?.replace(/-/g, "");



                loadChart(newInstrument);



                let pairsArray = instrument.split('-')


                // var assets = $('.asset-info-' + instrument).data('asset');
                var assets = categories.find(cat => cat.fromsym == pairsArray[0] && cat.tosym == pairsArray[1]);



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


            $("input[name='search_asset']").on('keyup', function ($event) {
                searchAssets($event.target.value)
            });



            function loadAssetCategories(c_data, search_term = "") {

                var ready_html = "";

                var color = "";

                if (search_term == '')

                    $('.filter_cancel').addClass('d-none');



                c_data.forEach((element, i) => {

                    color = coin_icon_colors[i];



                    // pair_array = JSON.stringify(element);



                    if (color == undefined) {

                        color = coin_icon_colors[Math.floor(Math.random() * coin_icon_colors.length)]

                    }



                    if (search_term == "") {

                        ready_html += buildFromElement(element, color);

                    } else if (element.fromsym.search(search_term.toUpperCase()) > -1) {

                        ready_html += buildFromElement(element, color);

                    }

                });



                // $('#load_assets').html(ready_html);
                vm.ready_html = ready_html
                // c_data.forEach(element => {
                //     $(`#asset-panel-${element.fromsym}-${element.tosym}`).on('click', loadAsset(`${element.fromsym}-${element.tosym}`))
                // })


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



                return `<tr style="cursor: pointer" id="asset-panel-${element.fromsym}-${element.tosym}" class="asset-panel">

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

                let sign = number < 0 ? "-" : "";

                let i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));

                // let j = (j = i.length) > 3 ? j % 3 : 0;

                let j = i.length
                j = j > 3 ? j % 3 : 0;


                // console.log("i j", i, j)

                return sign +

                    (j ? i.substr(0, j) + thouSep : "") +
                    i.substr(j)?.replace(new RegExp("(" + decSep + "{3})(?=" + decSep + ")", "g"), "$1" + thouSep)
                    // i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep)
                    +
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







            // $(document).ready(function () {



            $('#stopLoss').change(function () {

                if (this.checked == true) {

                    $('#stopLossField').removeClass('d-none');

                } else {

                    $('#stopLossField').addClass('d-none');

                }

            })



            $('#takeProfit').change(function () {

                if (this.checked == true) {

                    $('#takeProfitField').removeClass('d-none');

                } else {

                    $('#takeProfitField').addClass('d-none');

                }

            })







            $('#buyBtn, #sellBtn').on('click', function (e) {



                e.preventDefault();



                var btn_default = $(this).html();



                var btn_action = $(this);



                var action = btn_action.data('action');



                $(".time-executed").val(new Date().toUTCString());



                $(".trade-type").val(vm.data.trade_session);



                var dataPost = $('#tradelive').serialize() + '&trade_action=' + action;

                $(this).attr('disabled', 'disabled');

                $(this).html('<i class="fa fa-spin fa-spinner"></i> Opening Position &hellip;');



                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                dataPost = dataPost + '&_token=' + token;




                $('#quantity').val('');

                $('#stopLoss').val('');

                $('#stopLossField').val('');

                $('#takeProfit').val('');

                $('#takeProfitField').val('');


                $.ajax({

                    url: '/user/trade/trade-new-position',

                    data: dataPost,

                    method: "POST",

                    dataType: "json",

                    success: function (tradeData) {


                        let action_text = action.toUpperCase();
                        // console.log("tradeData",tradeData)
                        $("#placeTrade").modal("hide");

                        Swal.fire(tradeData.status == 'success' ? action_text + " Position Opened" :

                            "Error Opening " + action + " position", tradeData.message, tradeData

                            .status);

                        $('.available_balance').text(tradeData.balance_fmt);

                        $('.margin_used').text(tradeData.margin_used);

                        $('.balance_in_currency').val(tradeData.balance);
                        $('.equity_balance').html(vm.data.mycurrency.symbol + tradeData.equity)
                        if (vm.currentPageOpen === 1) {
                            tradeData.history.forEach((item, index) => {
                                item.profit_loss_user = parseFloat(item.profit_loss_user).toFixed(2)
                                item.profit_loss_class = (item.profit_loss_user > 0) ? "text-success text-bold" : "text-danger text-bold";
                            })
                            vm.data.history.data = tradeData.history;
                            var final_profit_loss = (tradeData.profit_loss_user > 0) ? '<span class="text-success text-bold">' + vm.fmtVal(tradeData.profit_loss_user, vm.data.mycurrency.code.toLowerCase()) + "</span>" : '<span class="text-danger text-bold">' + vm.fmtVal(tradeData.profit_loss_user, vm.data.mycurrency.code.toLowerCase()) + '</span>';
                            $('.total_profit_loss').html(final_profit_loss);
                            vm.ws_pos.onmessage = (ev) => { }
                            vm.ws_pos.close()
                            vm.connect(tradeData.final_assets);
                        } else {
                            vm.currentPageOpen = 1
                        }



                        // if (isRunning) {

                        //         if ($('#tradehistoryfull').length > 0) {
                        //             axios.get("http://thecollectiveportfolio.com/user/trade/reload-trade-history/max").then(response => {
                        //                 if (response.type == "success") {
                        //                     vm.data.history = response.data.history;
                        //                     vm.data.isFull = response.data.isFull;
                        //                     vm.connect(response.data.final_assets)

                        //                 }
                        //             }).catch(error => {
                        //                 console.log("error", error)
                        //             })

                        //             // $("#tradeHistoryList").load(

                        //             //     "{{ route('user.trade.history-reload', 'full') }}");

                        //         } else {
                        //             // this.fetchHistoryPage(vm.currentPageOpen ? vm.currentPageOpen : '')
                        //             axios.get("http://thecollectiveportfolio.com/user/trade/reload-trade-history/short?page=1").then(response => {
                        //                 if (response.type == "success") {
                        //                     // console.log("this.data", vm.data)
                        //                     response.data.history.forEach((item, index)=>{
                        //             item.profit_loss_user = parseFloat(item.profit_loss_user).toFixed(2)
                        //             item.profit_loss_class = (item.profit_loss_user > 0) ? "text-success text-bold" : "text-danger text-bold";
                        // })
                        //                     vm.data.history.data = response.data.history;
                        //                     vm.data.isFull = response.data.isFull;
                        //                     // var final_profit_loss = (response.data.profit_loss_user > 0) ? '<span class="text-success text-bold">' + this.fmtVal(response.data.profit_loss_user, this.data.mycurrency.code.toLowerCase()) + "</span>" : '<span class="text-danger text-bold">' + this.fmtVal(response.data.profit_loss_user, this.data.mycurrency.code.toLowerCase()) + '</span>';
                        //                     // $('.total_profit_loss').html(final_profit_loss);
                        //                     // $('.equity_balance').html(this.data.mycurrency.symbol + response.data.equity)
                        //                     // connect(response.data.final_assets);
                        //                     this.ws_pos.close()
                        //                     this.handleAbc()
                        //                     // connect(response.data.final_assets)

                        //                 }
                        //             }).catch(error => {
                        //                 console.log("error", error)
                        //             })

                        //             // $("#tradeHistoryList").load(

                        //             //     "{{ route('user.trade.history-reload', 'short') }}");

                        //         }



                        // } 
                        // else {

                        //     tradehistory();

                        // }





                        btn_action.removeAttr('disabled');

                        btn_action.html(btn_default);

                    },

                    error: function (tradeFailResult) {
                        // console.log("tradeFailResult",tradeFailResult)

                        btn_action.removeAttr('disabled');

                        btn_action.html(btn_default);
                        if (tradeFailResult.status === 422) {

                            var errors = $.parseJSON(tradeFailResult.responseText);

                            btn_action.removeAttr('disabled');

                            btn_action.html(btn_default);

                            $.each(errors, function (key, value) {

                                //console.log(key+ " " +value);

                                var error_message = '';

                                if ($.isPlainObject(value)) {

                                    $.each(value, function (key, value) {

                                        error_message = value;

                                    });

                                } else {

                                    error_message = value;

                                }

                                if (key == 'Limit') {
                                    vm.showLimitAlert();
                                    return;

                                } else if (key == 'Pend') {
                                    vm.showPendAlert();
                                    return;

                                } else if (key == 'errors') {



                                    Swal.fire(key.toUpperCase(), error_message[0], "error");

                                    return;

                                } else {
                                    Swal.fire(key + " Invalid!", error_message, "error");
                                }






                            });

                        }

                    },





                });

            });



            // });





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

                if (theme_chart == null) {

                    var theme_chart = (darkThemeCf.matches) ? 'dark' : 'light';

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

            var open_positions = [];
            var default_currency = this.data.mycurrency.code.toLowerCase();
            var saving = false;
            var savingStopLoss = false;
            var savingTakeProfit = false;
            var trade_booster = this.data.myuser.trade_booster;

            for (const item of this.data.history.data) {
                var found = open_positions.some(function (value) {
                    return value.id === `${item.sym.fromsym}-${item.sym.tosym}`;
                });
                if (!found) {
                    open_positions.push({
                        id: `${item.sym[0].fromsym}-${item.sym[0].tosym}`,
                        label: item.sym[0].name,
                    });
                }
            }

            $('#tradehistory a.page-link').click(function (e) {
                e.preventDefault();
                $('#tradehistory').load($(this).attr('href'));
                return false;

            });

            $('#tradehistoryfull a.page-link').click(function (e) {
                e.preventDefault();
                $('#tradehistoryfull').load($(this).attr('href'));
                return false;
            });




            vm.connect = function (open_position_products) {
                console.log("open_position_products", open_position_products)
                // if(open_position_products.length)
                var position_subscribe = {
                    type: 'subscribe',
                    channels: [
                        {
                            name: 'ticker',
                            product_ids: open_position_products.map(_product => _product.id),
                        }
                    ]
                };

                // vm.ws_pos = new WebSocket('wss://ws-feed.pro.coinbase.com');
                vm.ws_pos = new WebSocket('wss://ws-feed.exchange.coinbase.com');
                vm.ws_pos.onopen = () => {
                    vm.ws_pos.send(JSON.stringify(position_subscribe));
                };

                var total_profit_loss = [];
                console.log("set to server")

                let to_server = [];

                vm.ws_pos.onmessage = (ev) => {
                    var pos_result = JSON.parse(ev.data);
                    console.log("on message to_server", to_server)

                    if (pos_result.type !== 'ticker')
                        return;

                    // $('.profit_loss_history').each(function (index, element) {
                    // console.log("historyyyyy",vm.data.history)
                    // to_server = []
                    // total_profit_loss = []
                    vm.data.history.data.forEach(function (element, index) {
                        // console.log("item", element, index)

                        var ele = $(element);
                        let item = element
                        let product_id = element.sym[0].fromsym + '-' + element.sym[0].tosym;
                        let his_result;
                        if (product_id == pos_result.product_id) {
                            switch (item.trade_action) {
                                case 'sell':
                                    his_result = Number(item.price) - Number(pos_result.price);
                                    break;
                                case 'buy':
                                    his_result = Number(pos_result.price) - Number(item.price);
                                    break;
                            }
                            // console.log("his_result", his_result, item.price, item.trade_value)

                            let percentage_margin = (item.price / item.trade_value);
                            // console.log("percentage_margin", percentage_margin)

                            let profit_loss = (his_result / percentage_margin);
                            // console.log("profit_loss", profit_loss)

                            let start_time = new Date(Date.parse(item.start_time + '+01:00'));
                            let close_time = new Date(Date.parse(item.end_time + '+01:00'));
                            let current_time = new Date();


                            if (timezoneString != undefined) {
                                start_time = convertTZ(start_time, timezoneString);
                                close_time = convertTZ(close_time, timezoneString);
                            }


                            var tz = new Date(new Date().getTime()).toTimeString().match(/\((.+)\)/)[1];
                            var tzc = new Date(item.start_time).toTimeString().match(/\((.+)\)/)[1];

                            let $difference = (close_time - current_time);

                            let $difference_start = (current_time - start_time);

                            // console.log('Why is this'+current_time+'('+tz+')::: '+start_time+'::: '+ tzc);

                            let $diff_start_in_secs = $difference_start / (1000);

                            let $diff_in_secs = $difference / (1000);
                            let $diff_in_days = $difference / (1000 * 60 * 60 * 24);

                            let $estimate_time_of_action = Math.round(7 / 2);
                            let $estimate_time_of_action_2 = Math.round(7 / 3);

                            let $time_considered = getRandomInteger($estimate_time_of_action, $estimate_time_of_action_2);
                            // console.log("WIN TIME IS "+ item.win_time + " and DIFFERENCE IS "+Math.round($diff_start_in_secs)+" and VERDICT IS "+item.to_verdict);
                            if (item.win_time > 0) {

                                // Math.round($diff_start_in_secs) >= item.win_time && 
                                if (item.to_verdict == "to_win") {
                                    // console.log('POSITION ID: '+item.trade_id);
                                    profit_loss = Number(profit_loss) > 0 ? Number(profit_loss) : (0 - Number(profit_loss));
                                }
                            } else if ($time_considered >= Math.round($diff_in_days)) {
                                if (item.to_verdict == "to_loss") {
                                    profit_loss = Number(profit_loss) > 0 ? (0 - Number(profit_loss)) : profit_loss;
                                }

                                if (item.to_verdict == "to_win") {
                                    profit_loss = Number(profit_loss) > 0 ? Number(profit_loss) : (0 - Number(profit_loss));

                                    // profit_loss = profit_loss + 418;
                                }
                            }
                            // profit_loss = Number(profit_loss) > 0 ? Number(profit_loss) : (0 - Number(profit_loss));

                            if (trade_booster == "super")
                                profit_loss = isFinite(profit_loss) ? (profit_loss + getRandomInteger(profit_loss * 2040, profit_loss * 4420)) : 0.0;
                            else if (trade_booster == "high")
                                profit_loss = isFinite(profit_loss) ? (profit_loss + getRandomInteger(profit_loss * 20, profit_loss * 25)) : 0.0;
                            else
                                profit_loss = isFinite(profit_loss) ? profit_loss : 0.0;

                            let converted_profit_loss = convertToUserCurrency(profit_loss, item.user_currency, item.trade_currency);
                            let converted_profit_loss_num = convertToUserCurrency(profit_loss, item.user_currency, item.trade_currency, false);

                            let $profit_loss_html = Number(converted_profit_loss) > 0 ? "<span class='text-success text-bold'>" + converted_profit_loss + "</span>" : "<span class='text-danger text-bold'>" + converted_profit_loss + "</span>";

                            $(this).html($profit_loss_html);
                            vm.data.history.data[index].profit_loss = parseFloat(converted_profit_loss).toFixed(2)
                            vm.data.history.data[index].profit_loss_user = parseFloat(converted_profit_loss).toFixed(2)
                            vm.data.history.data[index].profit_loss_class = Number(vm.data.history.data[index].profit_loss_user) > 0 ? 'text-success text-bold' : 'text-danger text-bold'
                            // console.log("Hakkk", item, vm.data.history.data[index].profit_loss_user)
                            let current_value = (Number(pos_result.price) / Number(percentage_margin));
                            let current_value_currency = convertToUserCurrency(current_value, item.user_currency, item.trade_currency);

                            let current_change = (item.trade_action == "buy") ? (pos_result.price - item.price) / item.price : (item.price - pos_result.price) / item.price;

                            if (Number(converted_profit_loss) > 0) {
                                current_change = (current_change > 0) ? current_change : (0 - current_change);
                            }

                            let current_change_percent = parseFloat(current_change * 100).toFixed(2);


                            // if($('.profit_loss_time'+item.id).length > 0 ){
                            // console.log("pos_result.price", pos_result.price)
                            $('.profit_loss_time' + item.id).html($profit_loss_html);
                            $('.profit_loss_time_text' + item.id).text(converted_profit_loss);
                            $('.current_rate_text-' + item.id).text(pos_result.price);
                            $('.pos_current_rate_text-' + item.id).text(pos_result.price);
                            $('.current_value_text-' + item.id).text(current_value_currency);
                            $('.pos_current_value_text-' + item.id).text(current_value_currency);
                            $('.pos_current_change_text-' + item.id).text(current_change_percent + '%');

                            // }

                            if (vm.data.isFull) {
                                var expire_time = new Date(Date.parse(item.end_time + '+01:00'));

                                if (timezoneString != undefined) {
                                    expire_time = convertTZ(expire_time, timezoneString);
                                }

                                $('.expire_time-' + item.id).text(formatDate(expire_time));
                            }


                            // let converted_profit_loss_unfmt = convertToUserCurrency(profit_loss, item.user_currency, item.trade_currency, false);
                            // saveProfit(item.id, converted_profit_loss_unfmt, profit_loss);

                            let init_id = findWithAttr(to_server, 'id', item.id);
                            if (init_id == -1) {
                                to_server.push({
                                    id: item.id,
                                    converted_pl: converted_profit_loss,
                                    pl: profit_loss,
                                });
                            } else {
                                to_server[init_id] = {
                                    id: item.id,
                                    converted_pl: converted_profit_loss,
                                    pl: profit_loss
                                };
                            }

                            // total_profit_loss.push(converted_profit_loss);
                        }

                    });
                    console.log("check to server")

                    if (to_server.length) {
                        console.log("to_server", to_server)
                        saveProfit(to_server);
                        let converted_total_profit_loss = to_server.reduce(function (a, b) {
                            return numOr0(a) + numOr0(b.converted_pl);
                        }, 0);
                        // console.log("converted_total_profit_loss", converted_total_profit_loss)

                        var balance = $('.balance_in_currency').val();

                        // if (total_profit_loss !== undefined) {
                        var final_profit_loss = (converted_total_profit_loss > 0) ? '<span class="text-success text-bold">' + fmtVal(converted_total_profit_loss, default_currency) + "</span>" : '<span class="text-danger text-bold">' + fmtVal(converted_total_profit_loss, default_currency) + '</span>';
                        $('.total_profit_loss').html(final_profit_loss);
                        $('.equity_balance').html(fmtVal((parseFloat(balance) + parseFloat(converted_total_profit_loss)), default_currency))
                        // }
                    }





                }

            }
            vm.connect(open_positions);
            function openPositionInfo(item, product_id) {
                this.selectedItem = item;
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

                var initialChange = (item.trade_action == "buy") ? (initialRate - item.price) / item.price : (item.price - initialRate) / item.price;
                // console.log("initialChange", initialChange)
                if (Number(initialProfitLoss) > 0) {
                    initialChange = (initialChange > 0) ? initialChange : (0 - initialChange);
                }

                var initialChangePercent = parseFloat(initialChange * 100).toFixed(2);

                $('.selected-position').val(JSON.stringify(item));


                action = item.trade_action;
                $('#positionInfo-title').text(toTitleCase(action) + ' ' + product_id);
                $('.positionInfo-head-content').html(formatDate(start_time));
                $('.positionInfo-profit_loss').html("<div class='d-block profit_loss_time" + item.id + " font-22 text-bold'>" + initialProfitLoss + "</div>");
                $('.positionInfo-profit_loss_text').html("<div class='d-block profit_loss_time_text" + item.id + "'>" + initialProfitLossText + "</div>");
                $('.position-stop_loss').text(fmtVal(parseFloat(item.stop_loss), default_currency));
                $('.position-take_profit').text(fmtVal(parseFloat(item.take_profit), default_currency));

                $('.position-current_rate').html("<div class='d-block pos_current_rate_text-" + item.id + "'>" + initialRate + "</div>");
                $('.position-current_value').html("<div class='d-block pos_current_value_text-" + item.id + "'>" + initialValue + "</div>");

                $('.position-percentage_change').html("<div class='d-block pos_current_change_text-" + item.id + "'>" + initialChangePercent + "%</div>");

                $('.position-trade_id').text(item.trade_id);
                $('.position-expiry_date').text(formatDate(end_time));

                $('.position-quantity').text(item.quantity);
                $('.position-opening_rate').text(item.price);

                $('.position-opening_value').html(fmtVal(parseFloat(item.amount_value_user_currency), default_currency));
                $('.position-required_margin').html(fmtVal(parseFloat(item.amount_margin_user_currency), default_currency));

                if (item.position_status == "close") {
                    $('.close_position_btn').addClass('d-none');
                } else {
                    $('.close_position_btn').removeClass('d-none');

                    $('.close_position_btn').addClass('d-block');

                }

            }

            let numOr0 = n => isNaN(n) ? 0 : n

            function getRandomInteger(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            if (typeof toTitleCase !== 'function') {
                function toTitleCase(str) {
                    return str?.replace(
                        /\w\S*/g,
                        function (txt) {
                            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                        }
                    );
                }

            }

            if (typeof formatDate !== 'function') {
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
            }

            function saveProfit(to_server) {
                // console.log("to server", to_server)
                if (saving)
                    return;

                saving = true;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                let dataPost = { payload: to_server, _token: token, rates: rates };
                console.log("vm.currentPageOpen", vm.currentPageOpen)
                $.ajax({
                    url: "/user/trade/save-profit-loss" + (vm.currentPageOpen ? '?page=' + vm.currentPageOpen : ''),
                    data: dataPost,
                    method: "POST",
                    dataType: "json",
                    success: function (data) {
                        saving = false;
                        if (data.status == true) {
                            // this.fetchHistoryPage(currentPageOpen);
                            // data.history.forEach((item, index)=>{
                            //     item.profit_loss_user = parseFloat(item.profit_loss_user).toFixed(2)
                            //     item.profit_loss_class = (item.profit_loss_user > 0) ? "text-success text-bold" : "text-danger text-bold";
                            // })
                            // vm.data.history.data = data.history;
                            // connect(data.position_assets);
                            let old_position = vm.data.positions_count;
                            // let old_position = $('.current_open_positions').val();

                            if (parseInt(old_position) != data.positions) {
                                // console.log("Status", old_position)
                                var final_profit_loss = (data.profit_loss_user > 0) ? '<span class="text-success text-bold">' + fmtVal(data.profit_loss_user, default_currency) + "</span>" : '<span class="text-danger text-bold">' + fmtVal(data.profit_loss_user, default_currency) + '</span>';
                                $('.total_profit_loss').html(final_profit_loss);
                                $('.equity_balance').html(vm.data.mycurrency.symbol + data.equity)
                                $('.openPositions span').text(data.positions);
                                // $('.current_open_positions').val(data.positions);
                                vm.data.positions_count = old_position
                                $('.available_balance').text(data.balance_fmt);
                                $('.margin_used').text(data.margin_used);
                                $('.balance_in_currency').val(data.balance);
                                vm.connect(data.position_assets);

                                // restart the connection to the WS server

                                //restructure the entire trade history and recall connect() with the new loaded position
                                // if ($('#tradehistoryfull').length > 0) {
                                //     $("#tradeHistoryList").load("{{route('user.trade.history-reload', 'full')}}");
                                // } else {
                                //     $("#tradeHistoryList").load("{{route('user.trade.history-reload', 'short')}}");
                                // }

                            }
                        }
                    },
                    error: function (data) {
                        saving = false;

                        if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value) {
                                //console.log(key+ " " +value);
                                var error_message = '';
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        error_message = value;
                                    });
                                } else {
                                    error_message = value;
                                }
                                // console.log(error_message);
                            });
                        }
                    },

                });
            }

            function findWithAttr(array, attr, value) {
                for (var i = 0; i < array.length; i += 1) {
                    if (array[i][attr] === value) {
                        return i;
                    }
                }
                return -1;
            }
        },
        openBuy() {

            if (this.hasPend() || this.hasLicensePrompt() || this.hasLimitExceeded()) {
                this.showAllAlertsSequentially();
                return;
            }


            $("#chartdiv").removeClass('col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12').addClass(

                'col-7 col-md-7 col-lg-7 col-xl-7');

            $('#tradebox').removeClass('d-none');

            $('.placeselltrade').addClass('d-none');

            $('.placebuytrade').removeClass('d-none');

        },
        openSell() {

            if (this.hasPend() || this.hasLicensePrompt() || this.hasLimitExceeded()) {
                this.showAllAlertsSequentially();
                return;
            }

            $("#chartdiv").removeClass('col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12').addClass(

                'col-7 col-md-7 col-lg-7 col-xl-7');

            $('#tradebox').removeClass('d-none');

            $('.placebuytrade').addClass('d-none');

            $('.placeselltrade').removeClass('d-none');

        },
        closeTradeBox() {

            $("#chartdiv").removeClass('col-7 col-md-7 col-lg-7 col-xl-7').addClass(

                'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12');

            $('#tradebox').addClass('d-none');

        },
        openPositionInfo(item, product_id) {
            this.selectedItem = item;
            var start_time = new Date(Date.parse(item.start_time + '+01:00'));
            var end_time = new Date(Date.parse(item.end_time + '+01:00'));
            var timezoneString = Intl.DateTimeFormat().resolvedOptions().timeZone;
            var default_currency = this.data.mycurrency.code.toLowerCase();


            if (timezoneString != undefined) {
                start_time = this.convertTZ(start_time, timezoneString);
                end_time = this.convertTZ(end_time, timezoneString);
            }


            var initialRate = $('.current_rate_text-' + item.id).text();
            var initialValue = $('.current_value_text-' + item.id).text();

            var initialProfitLoss = $('.profit_loss_live-' + item.id).html();
            var initialProfitLossText = $('.profit_loss_live-' + item.id).text();
            // console.log("initialRate", initialRate, item.price)

            var initialChange = (item.trade_action == "buy") ? (initialRate - item.price) / item.price : (item.price -
                initialRate) / item.price;
            // console.log("initialChange", initialChange)

            if (Number(initialProfitLoss) > 0) {
                initialChange = (initialChange > 0) ? initialChange : (0 - initialChange);
            }

            var initialChangePercent = parseFloat(initialChange * 100).toFixed(2);

            $('.selected-position').val(JSON.stringify(item));


            let action = item.trade_action;
            $('#positionInfo-title').text(this.toTitleCase(action) + ' ' + product_id);
            $('.positionInfo-head-content').html(this.formatDate(start_time));
            $('.positionInfo-profit_loss').html("<div class='d-block profit_loss_time" + item.id + " font-22 text-bold'>" +
                initialProfitLoss + "</div>");
            $('.positionInfo-profit_loss_text').html("<div class='d-block profit_loss_time_text" + item.id + "'>" +
                initialProfitLossText + "</div>");
            $('.position-stop_loss').text(this.fmtVal(parseFloat(item.stop_loss), default_currency));
            $('.position-take_profit').text(this.fmtVal(parseFloat(item.take_profit), default_currency));

            $('.position-current_rate').html("<div class='d-block pos_current_rate_text-" + item.id + "'>" + initialRate +
                "</div>");
            $('.position-current_value').html("<div class='d-block pos_current_value_text-" + item.id + "'>" +
                initialValue + "</div>");

            $('.position-percentage_change').html("<div class='d-block pos_current_change_text-" + item.id + "'>" +
                initialChangePercent + "%</div>");

            $('.position-trade_id').text(item.trade_id);
            $('.position-expiry_date').text(this.formatDate(end_time));

            $('.position-quantity').text(item.quantity);
            $('.position-opening_rate').text(item.price);

            $('.position-opening_value').html(this.fmtVal(parseFloat(item.amount_value_user_currency), default_currency));
            $('.position-required_margin').html(this.fmtVal(parseFloat(item.amount_margin_user_currency), default_currency));

            // if (item.position_status == "close") {
            //     $('.close_position_btn').addClass('d-none');
            // }

            if (item.position_status == "close") {
                $('.close_position_btn').addClass('d-none');
            } else {
                $('.close_position_btn').removeClass('d-none');

                $('.close_position_btn').addClass('d-block');

            }

        },

        convertTZ(date, tzString) {
            return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {
                timeZone: tzString
            }));
        },

        toTitleCase(str) {
            return str?.replace(
                /\w\S*/g,
                function (txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                }
            );
        },
        formatDate(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return date.getMonth() + 1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
        },
        fmtVal(amount, currency) {
            let _base_currency = this.data.rates[currency];
            return _base_currency.unit + this.numberWithCommas(amount);
        },

        numberWithCommas(x) {
            return x?.toFixed(2)?.toString()?.replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        },
        loadAsset(instrument) {
            // console.log("instrument", instrument)
            this.setMainInstrument(instrument, 0, 0, 0, 0, 0);

        },

        setMainInstrument(instrument, price, buy_price, sell_price, high_low_price, spread) {



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



            var newInstrument = instrument?.replace(/-/g, "");



            this.loadChart(newInstrument);



            let pairsArray = instrument.split('-')


            // var assets = $('.asset-info-' + instrument).data('asset');
            var assets = this.categories.find(cat => cat.fromsym == pairsArray[0] && cat.tosym == pairsArray[1]);



            var icon = assets.tosym.toLowerCase();

            var icon_2 = assets.fromsym.toLowerCase();

            var pair_name = assets.name;



            this.executeTrade(assets, icon, icon_2, pair_name);

        },
        executeTrade(assets, icon, icon_2, pair_name) {



            if (this.currentIcon != null) {

                $('.trade-icon').removeClass('cf-' + this.currentIcon);

            }

            if (this.currentIcon_2 != null) {

                $('.trade-icon').removeClass('cf-' + this.currentIcon_2);

            }





            this.currentIcon = icon;

            this.currentIcon_2 = icon_2;

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

            this.updateMarginValue(assets.fromsym + '-' + assets.tosym, assets.step, Number($('.sell_price-' + assets.fromsym +

                '-' + assets.tosym).text()));



        },
        loadChart($pair) {

            const darkThemeCf = window.matchMedia("(prefers-color-scheme: dark)");



            var theme_chart = localStorage.getItem("theme", "dark");

            if (theme_chart == null) {

                var theme_chart = (darkThemeCf.matches) ? 'dark' : 'light';

            }



            if ($pair == this.$currentPair)

                return;



            var tradingGraph = new TradingView.widget({

                "width": '100%',

                "height": this.$chart_height,

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



            this.$currentPair = $pair;



        },

        updateMarginValue(select, quantity, price) {

            if (price == 0) {

                price = Number($('.price-' + select).text());

            }



            var res_curr = select.split('-');



            let current_unit = res_curr[1].toLowerCase();


            var total_leverage;

            var total_qty_price;

            var total_value;

            var margin;

            var total_margin;


            if (this.data.trade_session === 'live') {
                if (this.data.userplan.pricing_plan_id == 1) var max = 70;

                else if (this.data.userplan.pricing_plan_id == 2) var max = 35;

                else if (this.data.userplan.pricing_plan_id == 3) var max = 10;

                else if (this.data.userplan.pricing_plan_id == 4) var max = 3;
            } else if (this.data.trade_session === 'demo') {
                var max = 70;
            }




            total_leverage = max;



            total_leverage = (total_leverage > 99) ? max : ((total_leverage < 3) ? max : total_leverage);


            total_qty_price = (price * quantity);



            total_margin = total_qty_price * (total_leverage / 100);


            total_value = (total_margin * (100 / total_leverage));


            if (rates !== undefined) {

                let currency_s = rates[current_unit];

                if (currency_s == undefined) {

                    $('.trade-item-margin').text('$' + this.formatMoney(Number(total_margin)));

                    $('.trade-item-margin-user-currency').text(this.convertToUserCurrency(total_margin,

                        this.data.mycurrency.code.toLowerCase(), 'usd'));

                    $('.amount-margin-user').val(this.convertToUserCurrency(total_margin,

                        this.data.mycurrency.code.toLowerCase(), 'usd', false));

                    /////

                    $('.trade-item-value').text('$' + this.formatMoney(Number(total_value)));

                    $('.trade-item-value-user-currency').text(this.convertToUserCurrency(total_value,

                        this.data.mycurrency.code.toLowerCase(), 'usd'));

                    $('.amount-value-user').val(this.convertToUserCurrency(total_value,

                        this.data.mycurrency.code.toLowerCase(), 'usd', false));

                    $('.trade-currency').val('usd');



                } else {



                    if (currency_s.type == 'crypto') {

                        $('.trade-item-margin').text(this.formatMoney(Number(total_margin), 4) + currency_s.unit);

                        $('.trade-item-margin-user-currency').text(this.convertToUserCurrency(total_margin,

                            this.data.mycurrency.code.toLowerCase(), current_unit));

                        $('.amount-margin-user').val(this.convertToUserCurrency(total_margin,

                            this.data.mycurrency.code.toLowerCase(), current_unit, false));



                        $('.trade-item-value').text(this.formatMoney(Number(total_value), 4) + currency_s.unit);

                        $('.trade-item-value-user-currency').text(this.convertToUserCurrency(total_value,

                            this.data.mycurrency.code.toLowerCase(), current_unit));

                        $('.amount-value-user').val(this.convertToUserCurrency(total_value,

                            this.data.mycurrency.code.toLowerCase(), current_unit, false));

                        $('.trade-currency').val(current_unit);

                    } else {

                        $('.trade-item-margin').text(currency_s.unit + this.formatMoney(Number(total_margin)));

                        $('.trade-item-margin-user-currency').text(this.convertToUserCurrency(total_margin,

                            this.data.mycurrency.code.toLowerCase(), current_unit));

                        $('.amount-margin-user').val(this.convertToUserCurrency(total_margin,

                            this.data.mycurrency.code.toLowerCase(), current_unit, false));



                        $('.trade-item-value').text(currency_s.unit + this.formatMoney(Number(total_value)));

                        $('.trade-item-value-user-currency').text(this.convertToUserCurrency(total_value,

                            this.data.mycurrency.code.toLowerCase(), current_unit));

                        $('.amount-value-user').val(this.convertToUserCurrency(total_value,

                            this.data.mycurrency.code.toLowerCase(), current_unit, false));

                        $('.trade-currency').val(current_unit);

                    }

                }

            } else {

                $('.trade-item-margin').text('$' + this.formatMoney(Number(total_margin)));

                $('.trade-item-margin-user-currency').text(this.convertToUserCurrency(total_margin,

                    this.data.mycurrency.code.toLowerCase(), 'usd'));

                $('.amount-margin-user').val(this.convertToUserCurrency(total_margin,

                    this.data.mycurrency.code.toLowerCase(),

                    'usd', false));



                $('.trade-item-value').text('$' + this.formatMoney(Number(total_value)));

                $('.trade-item-value-user-currency').text(this.convertToUserCurrency(total_value,

                    this.data.mycurrency.code.toLowerCase(), 'usd'));

                $('.amount-value-user').val(this.convertToUserCurrency(total_value, this.data.mycurrency.code.toLowerCase(),

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
            var gcd = function (a, b) {

                if (b < 0.0000001) return a; // Since there is a limited precision we need to limit the value.



                return gcd(b, Math.floor(a % b)); // Discard any fractions due to limitations in precision.

            };

            var divisor = gcd(numerator, denominator); // Should be 5



            numerator /= divisor; // Should be 687

            denominator /= divisor; // Should be 200
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



            var finalratio = getRatio(numerator, denominator, 10);



            $('.leverage-ratio').text(finalratio);



            if (price == 0) {

                timeOut = setTimeout(this.updateMarginValue(select, quantity, price), 5000);

            } else {

                clearTimeout(timeOut);

            }



        },

        formatMoney(number, decPlaces, decSep, thouSep) {

            decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,

                decSep = typeof decSep === "undefined" ? "." : decSep;

            thouSep = typeof thouSep === "undefined" ? "," : thouSep;

            let sign = number < 0 ? "-" : "";

            let i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
            let j = i.length
            j = j > 3 ? j % 3 : 0;

            console.log("i j", i, j)

            return sign +

                (j ? i.substr(0, j) + thouSep : "") +
                i.substr(j)?.replace(new RegExp("(" + decSep + "{3})(?=" + decSep + ")", "g"), "$1" + thouSep)

                // i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep)
                +

                (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");

        },
        convertToUserCurrency(usd_value, currency_iso_name, currency_from, format = false, currency_from_rate =
            null) {
            if (this.data.rates == undefined) {
                checkforRates();
                return;
            }
            let btc_amount = (currency_from_rate != null) ? parseFloat(Number(usd_value) / currency_from_rate) : parseFloat(
                Number(usd_value) / this.data.rates[currency_from].value);

            let user_currency_value = this.data.rates[currency_iso_name].value * btc_amount;

            return (format) ? this.data.rates[currency_iso_name].unit + this.numberWithCommas(user_currency_value) : user_currency_value;
        },
        updateQuan(action) {
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



            this.updateMarginValue(selected_id, total, current_price);



        },
        handleAsset(e) {
            const elt = e.target.closest(".asset-panel");
            if (elt) {
                this.loadAsset(elt.id.split('asset-panel-')[1])
            }
        },
        addBalancePanelToTopNavbar() {
            document.getElementById("nav-parent").classList.add('trade-only')
            let topNavbarTradeBalance = `<form class="d-lg-block px-3">
                        <div class="position-relative" id="balance-form">

                            <div class="row">
                                <div id="balance-area" class="col pt-3 mb-2 border-end text-center">
                                    <i
                                        class="align-self-center cc cf-${this.data.wallet.symbol.toLowerCase()} fa-2x"></i>
                                    <div class="text-left">
                                        <h5 class="mb-0">${this.data.wallet.symbol}</h5>
                                    </div>
                                </div>
                                ${this.data.trade_session === 'demo' ? `<div class="col pt-3 mb-2 border-end">
                                        <p class="mb-1" title="Current Balance in ${this.data.wallet.symbol}">
                                            Balance</p>
                                        <span
                                            class="available_balance">${this.data.mycurrency.symbol + Number(this.data.current_balance_raw_demo).toFixed(2)}</span>
    
                                        <input type="hidden" name="balance_in_currency"
                                            value="${this.data.current_balance_raw_demo}" class="balance_in_currency">
                                    </div>
    
    
                                    <div class="col pt-3 mb-2 border-end">
                                        <p class="mb-1" title="Total Equity">T.Equity</p>
                                        <span
                                            class="equity_balance">${this.data.mycurrency.symbol + this.data.equity_demo}</span>
                                    </div>
    
    
                                    <div class="col pt-3 mb-2 border-end">
                                        <p class="mb-1" title="Profit/Loss">P/L</p>
                                        <span
                                            class="total_profit_loss">${this.data.mycurrency.symbol + this.data.profit_loss_user_demo}</span>
                                    </div>
    
                                    <div class="col pt-3 mb-2">
                                        <p class="mb-1" title="Total Margin">T.Margin</p>
                                        <span
                                            class="margin_used">${this.data.mycurrency.symbol + this.data.margin_used_demo}</span>
                                    </div>`

                    :

                    `<div class="col pt-3 mb-2 border-end">
                                        <p class="mb-1" title="Current Balance in ${this.data.wallet.symbol}">
                                            Balance</p>
                                        <span
                                            class="available_balance">${this.data.mycurrency.symbol + Number(this.data.current_balance_raw).toFixed(2)}</span>
    
                                        <input type="hidden" name="balance_in_currency"
                                            value="${this.data.current_balance_raw}" class="balance_in_currency">
                                    </div>
    
    
                                    <div class="col pt-3 mb-2 border-end">
                                        <p class="mb-1" title="Total Equity">T.Equity</p>
                                        <span
                                            class="equity_balance">${this.data.mycurrency.symbol + this.data.equity}</span>
                                    </div>
    
    
                                    <div class="col pt-3 mb-2 border-end">
                                        <p class="mb-1" title="Profit/Loss">P/L</p>
                                        <span
                                            class="total_profit_loss">${this.data.mycurrency.symbol + this.data.profit_loss_user}</span>
                                    </div>
    
                                    <div class="col pt-3 mb-2">
                                        <p class="mb-1" title="Total Margin">T.Margin</p>
                                        <span
                                            class="margin_used">${this.data.mycurrency.symbol + this.data.margin_used}</span>
                                    </div>`}
                                    
                               
                            </div>

                        </div>
                    </form>`
            $('#top-navbar-left').append(topNavbarTradeBalance)
        },
        fetchHistoryPage(page) {
            // console.log("page", page)
            axios.get("/user/trade/reload-trade-history-page?page=" + page).then(response => {
                if (response.type == "success") {
                    response.data.history.forEach((item, index) => {
                        item.profit_loss_user = parseFloat(item.profit_loss_user).toFixed(2)
                        item.profit_loss_class = (item.profit_loss_user > 0) ? "text-success text-bold" : "text-danger text-bold";
                    })
                    this.data.history.data = response.data.history;
                    var final_profit_loss = (response.data.profit_loss_user > 0) ? '<span class="text-success text-bold">' + this.fmtVal(response.data.profit_loss_user, this.data.mycurrency.code.toLowerCase()) + "</span>" : '<span class="text-danger text-bold">' + this.fmtVal(response.data.profit_loss_user, this.data.mycurrency.code.toLowerCase()) + '</span>';
                    $('.total_profit_loss').html(final_profit_loss);
                    $('.equity_balance').html(this.data.mycurrency.symbol + response.data.equity)
                    this.ws_pos.onmessage = (ev) => { }
                    this.ws_pos.close()
                    // this.handleAbc()
                    this.connect(response.data.final_assets);
                }
            })

        }





    },
    watch: {
        // whenever question changes, this function will run
        currentPageOpen(newValue, oldValue) {
            this.fetchHistoryPage(newValue)
        }
    },
    created() {
        $('#bootstrap-style')[0].href = '/userassets/css/bootstrap.min.css';
        this.fetchTradeData();
    },
    mounted() {

    },
    beforeUnmount() {
        $('#bootstrap-style')[0].href = '#'
        document.getElementById("balance-form").remove();
        document.getElementById("nav-parent").classList.remove('trade-only')
    }
};
</script>

<style>
#tradingpairdiv,
#chartdiv {
    transition: width 0.3s ease;
}

ul {
    padding-left: 0 !important;
}

.trade-only {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
}

.table-striped>tbody>tr:nth-of-type(odd) {
    --bs-table-accent-bg: unset;
}

h6 {
    color: unset;
}

.page-link {
    background-color: unset;
}

.page-item.disabled .page-link {
    background-color: unset;
}

.page-link {
    border: unset;
    color: unset;
}

.page-link:hover {
    z-index: unset;
    background-color: unset;
    color: unset;
    border-color: unset;
    text-decoration: unset;
}

.page-item.active .page-link {
    z-index: unset;
    color: unset;
    background-color: unset;
    border-color: unset;
}

.page-item,
.page-item.active {
    padding: unset;
}

.vt-pagination>ul>li:first-child {
    padding: unset;
}

.vt-pagination>ul>li:last-child {
    padding: unset;
}

@media (min-width: 768px) {
    .toggle-button {
        display: block !important;
    }
}

.toggle-button {
    display: none;
}
</style>