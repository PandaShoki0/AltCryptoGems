<style>
    .tmp-table td {
        padding: 15px 5px;
    }
</style>
<div class="uk-grid uk-flex uk-flex-center">
    <div class="uk-width-5-6@m uk-inline">
        <h3 class="uk-flex-center mb-2 mt-2" style="text-align: center;padding-top:10px">Real-time BTC/ETH Deposits</h3>
        <table class="uk-table table-striped">
            <thead>
                <tr>
                    <th scope="col">Trx Hash</th>
                    <th scope="col">Created At</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction_histories as $item)
                    <tr class="tmp-table">
                        <td>{{ $item->trx }}</td>
                        <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans(now()) }}</td>
                        <td>{{ Str::mask($item->from_address, '*', -20, 20) }}</td>
                        <td>{{ Str::mask($item->to_address, '*', -20, 20) }}</td>
                        <td>{{ $item->amount }} {{ $item->symbol }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
