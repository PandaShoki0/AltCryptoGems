<script type="text/javascript">
    var open_positions = [];
    var default_currency = "{{strtolower($mycurrency->code)}}";
    var saving = false;
    var savingStopLoss = false;
    var savingTakeProfit = false;
    var trade_booster = "{{ $myuser->trade_booster }}";
</script>

<div class="table-responsive">
    <table class="table table-sm p-2">
        <thead>
            <tr>
                <th scope="col" class="text-center">Positon ID</th>
                <th scope="col" class="text-center">Action</th>
                <th scope="col" class="text-center">Assets</th>
                <th scope="col" class="text-center">Opening Value</th>
                @if($isFull)
                    <th scope="col" class="text-center">Current Value</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Required Margin</th>
                @endif
                <th scope="col" class="text-center">Profit/Loss</th>
                @if($isFull)
                    <th scope="col" class="text-center">Expire Date/Time</th>
                @endif
                <th></th>
            </tr>
        </thead>
        <tbody id="tradeHistoryList">
            @foreach ($history as $item)
            <tr>
                <td class="text-center">{{strtoupper($item->trade_id)}}</td>
                <td class="text-center">{{ucwords($item->trade_action)}}</td>
                <td class="text-center">{{$item->sym->fromsym}}-{{$item->sym->tosym}}</td>
                    <td class="text-center value_{{$item->id}}">{{$mycurrency->symbol . number_format($item->amount_value_user_currency, 2), $mycurrency->decimal_digits)}}</td>
                    @if($isFull)
                        <td class="text-center current_value_text-{{$item->id}}"></td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-center">{{$mycurrency->symbol . number_format($item->amount_margin_user_currency, 2), $mycurrency->decimal_digits)}}</td>
                    @else
                        <td class="d-none current_value_text-{{$item->id}}"></td>
                    @endif  
                    <td class="text-center profit_loss_history profit_loss_live-{{ $item->id }}" data-item-id="{{ $item->id }}" data-product-id="{{$item->sym->fromsym}}-{{$item->sym->tosym}}" data-item="{{ ($item) }}">{{ number_format(($item->profit_loss ?? 0), 2) }}</td>
                    @if($isFull)
                        <td class="text-center expire_time-{{$item->id}}"></td>
                    @endif    
                    <td> <button class="btn btn-primary btn-sm" onclick="openPositionInfo( {{json_encode($item)}}, '{{$item->sym->fromsym}}-{{$item->sym->tosym}}' )" type="button" data-bs-toggle="modal" data-bs-target="#positionInfo"><i class="mdi mdi-information"></i></button></td>
                    <td class="current_rate_text-{{$item->id}} d-none"></td>
            </tr>
            @endforeach  
            
            @if(count($history) == 0)
            <tr>
                <td colspan="9">
                    <div class="alert alert-info alert-outline border-0 fade show px-4 mb-0 text-center" role="alert">
                        <i class="mdi mdi-alert-circle-outline d-block display-4 mt-2 mb-3 text-info"></i>
                        <h5 class="text-info">No Opened Positions</h5>
                        <p>Your opened positions on your account will be listed here.</p> 
                    </div>
                </td>
                
            </tr>
            @endif
        </tbody>
    </table>

    @if($isFull)
        {{ $history->links('partials.pagination') }}
    @endif
</div>		
  


@stack('fast')
<script type="text/javascript">      
     @foreach ($history as $item)
        var found = open_positions.some(function(value) {
            return value.id === "{{$item->sym->fromsym}}-{{$item->sym->tosym}}";
        });
        if(!found){
            open_positions.push({
                id: "{{$item->sym->fromsym}}-{{$item->sym->tosym}}",
                label: "{{$item->sym->pair_name}}",
            });
        } 
    @endforeach
</script>

<script type="text/javascript">

$(document).ready(function(){
   // your on click function here
    $('#tradehistory a.page-link').click(function(e){
        e.preventDefault();
        $('#tradehistory').load($(this).attr('href'));
        return false;

    });
    
    $('#tradehistoryfull a.page-link').click(function(e){
        e.preventDefault();
        $('#tradehistoryfull').load($(this).attr('href'));
        return false;
    });
        
    
    
    connect( open_positions );
});


    function connect( open_position_products ){

        var position_subscribe = {
            type: 'subscribe',
                channels: [
                {
                    name: 'ticker',
                    product_ids: open_position_products.map(_product => _product.id),
                }
        ]};

        var ws_pos = new WebSocket('wss://ws-feed.exchange.coinbase.com');

        ws_pos.onopen = () => {
            ws_pos.send(JSON.stringify(position_subscribe));
        };

        var total_profit_loss = [];
        var to_server = [];

        ws_pos.onmessage = (ev) => {
            var pos_result = JSON.parse(ev.data);

            if(pos_result.type !== 'ticker')
            return;

            $('.profit_loss_history').each(function(index, element){
                var ele = $(element);                    
                var item = ele.data('item');
                var product_id = ele.data('product-id');
                if(product_id == pos_result.product_id)
                {
                    switch(item.trade_action){
                        case 'sell':
                            his_result = Number(item.price) - Number(pos_result.price); 
                        break;
                        case 'buy':
                            his_result = Number(pos_result.price) - Number(item.price); 
                        break;
                    }
                    
                    percentage_margin = (item.price / item.trade_value);
                    
                    profit_loss = (his_result/percentage_margin);
                    
                    start_time = new Date(Date.parse(item.start_time+'+01:00'));
                    close_time = new Date(Date.parse(item.end_time+'+01:00'));
                    current_time = new Date();
                
                    
                    if(timezoneString!=undefined){
                        start_time = convertTZ(start_time, timezoneString);
                        close_time = convertTZ(close_time, timezoneString); 
                    }

                    
                    var tz = new Date({{ time() }}).toTimeString().match(/\((.+)\)/)[1];
                    
                    var tzc = new Date(item.start_time).toTimeString().match(/\((.+)\)/)[1];

                    $difference = ( close_time - current_time );
                    
                    $difference_start = (current_time - start_time );
                    
                    // console.log('Why is this'+current_time+'('+tz+')::: '+start_time+'::: '+ tzc);
                    
                    $diff_start_in_secs = $difference_start / (1000);
                    
                    $diff_in_secs = $difference / (1000);
                    $diff_in_days = $difference / (1000 * 60 * 60* 24);                    

                    $estimate_time_of_action = Math.round(7/2);
                    $estimate_time_of_action_2 = Math.round(7/3);

                    $time_considered = getRandomInteger($estimate_time_of_action, $estimate_time_of_action_2);
                    // console.log("WIN TIME IS "+ item.win_time + " and DIFFERENCE IS "+Math.round($diff_start_in_secs)+" and VERDICT IS "+item.to_verdict);
                    if( item.win_time > 0){
                    
                    // Math.round($diff_start_in_secs) >= item.win_time && 
                        if(item.to_verdict == "to_win"){
                            // console.log('POSITION ID: '+item.trade_id);
                                profit_loss = Number(profit_loss) > 0 ? Number(profit_loss) : (0 - Number(profit_loss));
                        }
                    }else if($time_considered >= Math.round($diff_in_days)){
                        if(item.to_verdict == "to_loss"){
                            profit_loss = Number(profit_loss) > 0 ? (0 - Number(profit_loss)) : profit_loss;
                        }

                        if(item.to_verdict == "to_win"){
                            profit_loss = Number(profit_loss) > 0 ? Number(profit_loss) : (0 - Number(profit_loss));
                            
                            // profit_loss = profit_loss + 418;
                        }
                    }
                // profit_loss = Number(profit_loss) > 0 ? Number(profit_loss) : (0 - Number(profit_loss));
                    
                    if(trade_booster == "super")
                        profit_loss = isFinite(profit_loss) ? (profit_loss + getRandomInteger(profit_loss*2040, profit_loss*4420)) : 0.0;
                    else if(trade_booster == "high")
                        profit_loss = isFinite(profit_loss) ? (profit_loss + getRandomInteger(profit_loss*20, profit_loss*25)) : 0.0;
                    else
                        profit_loss = isFinite(profit_loss) ? profit_loss : 0.0;

                    converted_profit_loss = convertToUserCurrency(profit_loss, item.user_currency, item.trade_currency);
                    converted_profit_loss_num = convertToUserCurrency(profit_loss, item.user_currency, item.trade_currency, false);
                                    
                    $profit_loss_html = Number(profit_loss) > 0 ? "<span class='text-success text-bold'>"+converted_profit_loss+"</span>" : "<span class='text-danger text-bold'>"+converted_profit_loss+"</span>";

                    $(this).html($profit_loss_html);

                    current_value = (Number(pos_result.price)/Number(percentage_margin));
                    current_value_currency = convertToUserCurrency(current_value, item.user_currency, item.trade_currency);
                    
                    current_change = (item.trade_action == "buy") ? (pos_result.price - item.price)/item.price: (item.price - pos_result.price)/item.price;
        
                    if(Number(profit_loss) > 0){
                        current_change = (current_change > 0) ? current_change : (0 - current_change);
                    }
                    
                    current_change_percent  =  parseFloat(current_change * 100).toFixed(2);
        

                    // if($('.profit_loss_time'+item.id).length > 0 ){

                        $('.profit_loss_time'+item.id).html($profit_loss_html);
                        $('.profit_loss_time_text'+item.id).text(converted_profit_loss);
                        $('.current_rate_text-'+item.id).text(pos_result.price);
                        $('.pos_current_rate_text-'+item.id).text(pos_result.price);                    
                        $('.current_value_text-'+ item.id).text(current_value_currency);
                        $('.pos_current_value_text-'+item.id).text(current_value_currency);
                        $('.pos_current_change_text-'+item.id).text(current_change_percent+'%');                    
                    
                    // }
                
                    @if($isFull)
                        var expire_time = new Date(Date.parse(item.end_time+'+01:00'));
                        
                        if(timezoneString!=undefined){
                            expire_time = convertTZ(expire_time, timezoneString);  
                        }
        
                        $('.expire_time-'+item.id).text( formatDate(expire_time) );
                    @endif


                    converted_profit_loss_unfmt = convertToUserCurrency(profit_loss, item.user_currency, item.trade_currency, false);
                    // saveProfit(item.id, converted_profit_loss_unfmt, profit_loss);

                    init_id = findWithAttr(to_server, 'id', item.id);
                    if(init_id == -1){
                        to_server.push({
                            id: item.id,
                            converted_pl: converted_profit_loss_unfmt,
                            pl: profit_loss,
                        });
                    }else{
                        to_server[init_id] = {
                            id: item.id,
                            converted_pl: converted_profit_loss_unfmt,
                            pl: profit_loss
                        };
                    }

                    total_profit_loss[item.id] = converted_profit_loss_unfmt;
                }
            });

            saveProfit(to_server);

            var converted_total_profit_loss = total_profit_loss.reduce(function(a, b){
                    return numOr0(a) + numOr0(b);
                }, 0);

            var balance = $('.balance_in_currency').val();

            if(total_profit_loss !== undefined){
                final_profit_loss = (converted_total_profit_loss > 0)? '<span class="text-success text-bold">'+fmtVal( converted_total_profit_loss, default_currency ) + "</span>" : '<span class="text-danger text-bold">'+fmtVal( converted_total_profit_loss, default_currency )+'</span>';
                $('.total_profit_loss').html( final_profit_loss );
                $('.equity_balance').html(fmtVal( (parseFloat(balance) + parseFloat(converted_total_profit_loss)), default_currency ))
            }
        }

    }
    
    function openPositionInfo( item, product_id ){
        
        var start_time = new Date(Date.parse(item.start_time+'+01:00'));
        var end_time = new Date(Date.parse(item.end_time+'+01:00'));
    
        
        if(timezoneString!=undefined){
            start_time = convertTZ(start_time, timezoneString);
            end_time = convertTZ(end_time, timezoneString);  
        }
        var initialRate = $('.current_rate_text-'+item.id).text();
        var initialValue = $('.current_value_text-'+item.id).text();
        
        var initialProfitLoss = $('.profit_loss_live-'+item.id).html();
        var initialProfitLossText = $('.profit_loss_live-'+item.id).text();        
        
        var initialChange = (item.trade_action == "buy") ? (initialRate - item.price)/item.price: (item.price - initialRate)/item.price;
        
        if(Number(initialProfitLoss) > 0){
            initialChange = (initialChange > 0) ? initialChange : (0 - initialChange);
        }
    
        var initialChangePercent  =  parseFloat(initialChange * 100).toFixed(2);
        
        $('.selected-position').val(JSON.stringify(item));
    
    
        action = item.trade_action;
        $('#positionInfo-title').text(toTitleCase(action)+' '+product_id);
        $('.positionInfo-head-content').html(formatDate(start_time));
        $('.positionInfo-profit_loss').html("<div class='d-block profit_loss_time"+item.id+" font-22 text-bold'>"+initialProfitLoss+"</div>");
        $('.positionInfo-profit_loss_text').html("<div class='d-block profit_loss_time_text"+item.id+"'>"+initialProfitLossText+"</div>");
        $('.position-stop_loss').text(fmtVal(parseFloat(item.stop_loss), default_currency));
        $('.position-take_profit').text(fmtVal(parseFloat(item.take_profit), default_currency));
    
        $('.position-current_rate').html("<div class='d-block pos_current_rate_text-"+item.id+"'>"+initialRate+"</div>");
        $('.position-current_value').html("<div class='d-block pos_current_value_text-"+item.id+"'>"+initialValue+"</div>");
        
        $('.position-percentage_change').html("<div class='d-block pos_current_change_text-"+item.id+"'>"+initialChangePercent+"%</div>");
    
        $('.position-trade_id').text(item.trade_id);
        $('.position-expiry_date').text(formatDate(end_time));
        
        $('.position-quantity').text(item.quantity);
        $('.position-opening_rate').text(item.price);
        
        $('.position-opening_value').html(fmtVal(parseFloat(item.amount_value_user_currency), default_currency));
        $('.position-required_margin').html(fmtVal(parseFloat(item.amount_margin_user_currency), default_currency));
        
        if(item.position_status == "close"){
            $('.close_position_btn').addClass('d-none');
        }
        
    }

    numOr0 = n => isNaN(n) ? 0 : n
    
    function getRandomInteger(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    
    if(typeof toTitleCase !== 'function'){
        function toTitleCase(str) {
            return str.replace(
                /\w\S*/g,
                function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                }
            );
        }

    }

    if(typeof formatDate !== 'function'){
        function formatDate(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + " " + strTime;
        }
    }

    function saveProfit(to_server){
        if(saving)
        return;

        saving = true;

        dataPost = {payload: to_server, _token: "{{ csrf_token() }}", rates: rates};
        $.ajax({                
            url: "{{route('user.trade.save_profit_loss')}}",
            data: dataPost,
            method: "POST",
            dataType: "json",
            success: function( data ){
                saving = false;
                if(data.status == true){
                    old_position = $('.current_open_positions').val();
                
                    if(parseInt(old_position) != data.positions){
                        
                        $('.openPositions span').text( data.positions );
                        $('.current_open_positions').val( data.positions );
                        $('.available_balance').text(data.balance_fmt);
                        $('.margin_used').text(data.margin_used);
                        $('.balance_in_currency').val(data.balance);
                        // restart the connection to the WS server
                        connect( data.position_assets );
                            //restructure the entire trade history and recall connect() with the new loaded position
                            if($('#tradehistoryfull').length > 0){
                                $("#tradeHistoryList").load("{{route('user.trade.history-reload', 'full')}}");
                            }else{
                                $("#tradeHistoryList").load("{{route('user.trade.history-reload', 'short')}}");
                            }
                         
                    }
                }
            },
            error: function (data) {
                saving = false;

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
                    });
                }
            },

        });
    }

    function findWithAttr(array, attr, value) {
        for(var i = 0; i < array.length; i += 1) {
            if(array[i][attr] === value) {
                return i;
            }
        }
        return -1;
    }

</script>

