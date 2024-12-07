@extends('layouts.admin')

@section('content')
    <div class="flex flex-col gap-5">
        <div class="shadow overflow-y-scroll border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
            <textarea rows="15" class="form-control" id="copyData" disabled>@foreach($predictionTrades as $predictionTrade){{ $predictionTrade->tradeSymbol->fromsym .'-'.$predictionTrade->tradeSymbol->tosym.  ' | '.  $predictionTrade->interval . '| '. $predictionTrade->trade_amount . ' | '. $predictionTrade->strike .  ' | '.  ucwords(str_replace('_', ' ', $predictionTrade->trade_action)) }}@endforeach</textarea>
        </div>
        <button onclick="copyToClipboard(this)" class="btn btn-info">
            <i class="bi bi-clipboard2-fill"></i> Copy Trades
        </button>
    </div>
@endsection

@section('page-scripts')
    <script>
        const copyToClipboard = (obj) => {
            let value = $('#copyData').val();

            var $temp = $("<input>");

            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();

            $(obj).removeClass('btn-info');
            $(obj).addClass('btn-success');
            $(obj).html(`<i class="bi bi-clipboard2-check-fill"></i> Copied`);

            setTimeout(() => {
                $(obj).addClass('btn-info');
                $(obj).removeClass('btn-success');
                $(obj).html(`<i class="bi bi-clipboard2-fill"></i> Copy Trades`);
            }, 1000);
        }
    </script>
@endsection