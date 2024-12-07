


<div class="table-responsive">
    @if($errors->all() != null)
        @foreach ($errors->all() as $error)
            <div class="text-danger">{{ $error }}</div>
        @endforeach
    @endif
    <table class="table table-sm p-2">
        
        <thead>
            <tr>
                <th scope="col" class="text-center">Positon ID</th>
                <th scope="col" class="text-center">Action</th>
                <th scope="col" class="text-center">Assets</th>
                <th scope="col" class="text-center">Status</th>                
                <th scope="col" class="text-center">Opening Value</th>
                <th scope="col" class="text-center">Quantity</th>
                <th scope="col" class="text-center">Amount Used</th>
                <th scope="col" class="text-center">Profit/Loss</th>      
                <th scope="col" class="text-center">Prediction</th>                
                <th scope="col" class="text-center">Expire Date/Time</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tradeHistoryList">
            @foreach ($history as $item)
            <tr>
                <td class="text-center">{{strtoupper($item->trade_id)}}</td>
                
                <td class="text-center">{{ucwords($item->trade_action)}}</td>
                
                <td class="text-center">{{$item->sym[0]->fromsym}}-{{$item->sym[0]->tosym}}</td>
                
                <td class="text-center">{!! ($item->position_status == "open") ? '<span class="badge badge-success">'.$item->position_status.'</span>' : '<span class="badge badge-danger">'.$item->position_status.'</span>'; !!}</td>
                
                <td class="text-center value_{{$item->id}}">{{$mycurrency->symbol.number_format($item->amount_value_user_currency, $mycurrency->decimal_digits)}}</td>
                
                <td class="text-center">{{ $item->quantity }}</td>
                
                <td class="text-center">{{$mycurrency->symbol.number_format($item->amount_margin_user_currency, $mycurrency->decimal_digits)}}</td>
                
                <td class="text-center">{{ ($item->profit_loss_user == null) ? number_format(($item->profit_loss ?? 0), 2) . ' ' .  strtoupper($item->user_currency) : number_format($item->profit_loss_user, 2) . ' ' .  strtoupper($item->user_currency) }}</td>
                
                <td class="text-center">{{ $item->to_verdict == "to_win" ? "WIN":"LOSS" }}</td>
                
                <td class="text-center">{{  date('m/d/Y h:ia', strtotime($item->stop_time ?? $item->end_time)) }}</td>
                       
                <td>
                    <!---->
                    <button class="btn btn-outline-danger btn-sm close_trade" onclick="closeTradePosition( {{json_encode($item)}}, '{{$item->sym[0]->fromsym}}-{{$item->sym[0]->tosym}}' )"  type="button" data-toggle="modal" data-target="#closePosition"><i class="fas fa-times"></i></button>
                    
                    <button class="btn btn-danger btn-sm" onclick="deletePosition( {{json_encode($item)}} )" type="button" data-toggle="modal" data-target="#deletePosition"><i class="fas fa-trash"></i></button>                    
                </td>
            </tr>
            @endforeach  
            
            @if(count($history) == 0)
            <tr>
                <td colspan="10">
                    <div class="text-center text-bold">  No Positions Yet! </div>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>    


<div id="deletePosition" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
            <div class="alert alert-warning">
                <h4> Delete Position <span class="position_id"></span>?</h4>
                <p>
                    This will delete the position and revert all transactions related to the position.<br/>
                    <i> This action cannot be undone </i>
                </p>
            </div>
      </div>
      
      <div class="modal-footer">
            <form method="post" action="{{ route('admin.users.trade.delete.trade-position', $user->id) }}">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="id" class="history_id" />
                  <button class="btn btn-warning btn-sm" type="submit">Continue</button>
            </form>
            
            <button id="close" class="btn btn-sm btn-inverse" data-dismiss="modal" aria-label="Close">Close</button>
            
      </div>
    </div>
  </div>
</div>

<div id="closePosition" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
            <div class="alert alert-info">
                <h4> Close Position <span class="position_id"></span>?</h4>
                <p>
                    <strong>
                        This action will close this trade at <span class="profit_loss_close"></span><br/>
                    </strong>
                    <i> This action cannot be undone </i>
                </p>
            </div>
      </div>
      
      <div class="modal-footer">
            <form method="post" action="{{ route('admin.users.trade.position.close', $user->id) }}">
                  @csrf
                  @method('put')
                  <input type="hidden" name="history_id" class="history_id_close" />
                  <input type="hidden" name="profit_loss" class="profit_loss_val" />
                  <input type="hidden" name="rates" class="rates_alt" />                    
                  <button class="btn btn-info btn-sm" type="submit">Continue</button>
            </form>
            
            <button id="close" class="btn btn-sm btn-inverse" data-dismiss="modal" aria-label="Close">Cancel</button>
            
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    var rateCheckVal;
    

    $(document).ready(() => {
        var rates = {!! json_encode($rates) !!};
        $('.rates_alt').val(JSON.stringify(rates))
        initiateRateCheck();
    });
    
    
    function deletePosition( item ){
        console.log( item );
        $('.history_id').val(item.id);
        $('.position_id').text(item.trade_id);
    }
    
    
    function enableButton() {
    
        if(rates == undefined)
        return;
        
        
          
          var inputs = document.getElementsByClassName('close_trade');
            for(var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = false;
            }
  

        stopCheckRate();
    }
    
    
    function initiateRateCheck(){
        rateCheckVal = setTimeout(enableButton, 1000);
    }
    
    function stopCheckRate(){
        clearTimeout(rateCheckVal);
    }


    
    function closeTradePosition( item, product_id ){
        console.log(rates);
        $.post('{{route("admin.users.trade.confirm.trade.position.close", $user->id)}}', { history_id: item.id, rates:rates,  _token: "{{ csrf_token() }}" },  ( data ) => {
            console.log( data );
            
            $('.position_id').text(item.trade_id);
            $('.profit_loss_val').val(item.profit_loss);            
            var profit_loss_final = (item.profit_loss_user == null) ? Number(item.profit_loss).toFixed(2) + ' '+ (item.user_currency.toUpperCase()) : Number(item.profit_loss_user).toFixed(2) + ' '+ (item.user_currency.toUpperCase());
            $('.profit_loss_close').text(profit_loss_final);  
            $('.history_id_close').val(item.id);
            
        });
    }
</script>