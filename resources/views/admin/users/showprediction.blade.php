@extends('layouts.admin')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('userassets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
        integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/fontawesome-iconpicker.min.css') }}">
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/table.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/custom.css') }}">


    <script src="{{ asset('assets/admin/js/sweetalert.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sweetalert.css') }}">
    <style>
        /* :is(.dark th, td) {
            color: rgb(107 114 128 / var(--tw-text-opacity));
        } */
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <form action="{{ route('admin.users.prediction.delete') }}" method="post">

                    @csrf

                    <input type="hidden" name="rates" id="rates" />

                    <div class="col-md-7 pull-right">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                            data-target="#modal-large">
                            <i class="fa fa-eye" alt="Show Trading Text"></i> Show Trade Texts
                        </button>
                        <a href="{{ route('admin.users.generate.predictions', $user_id) }}"
                            class="btn btn-sm btn-success"><i class="fa fa-area-chart"></i> Predictions</a>

                        <button class="btn btn-info" type="submit" name="trade" id="tradeact" value="1"
                            disabled="true"><i class="fa fa-chart-bar"></i> Trade Signals</button>

                        <button class="btn btn-danger" type="submit" name="delete" value="1"><i
                                class="fa fa-trash"></i> Delete Trades</button>
                    </div>

                    <h3 class="tile-title ">{{ $page_title }}</h3>

                    <div class="tile-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover order-column" id="">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkall" /></th>
                                        <th>Action</th>
                                        <th>Amount</th>
                                        <th>Min. Quantity</th>
                                        <th>T. Profit/ S. Loss</th>
                                        <th>Symbol</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($predictions as $prediction)
                                        <tr>
                                            <td><input type="checkbox" name="prediction[]" value="{{ $prediction->id }}" />
                                            </td>
                                            <td>{{ ucwords($prediction->trade_action) }}</td>
                                            <td>{{ $prediction->user->ccy->symbol }}{{ $prediction->trade_amount }}</td>
                                            <td><strong>{!! $prediction->min_quantity !!}</strong></td>
                                            <td>{!! $prediction->take_profit !!} / {!! $prediction->stop_loss !!}</td>
                                            <td>{!! $prediction->tradeSymbol->fromsym . '-' . $prediction->tradeSymbol->tosym !!}</td>
                                            <td>{!! $prediction->is_used == 0
                                                ? '<span class="btn btn-danger btn-sm">not used</span>'
                                                : '<span class="btn btn-success btn-sm">used</span>' !!}</td>
                                            <td>
                                                {!! $prediction->created_at !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                <tbody>
                            </table>
                            
                            {!! $predictions->links() !!}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modal-large" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pull-left">Copy the Text Format for your Client</h5>
                </div>
                <div class="modal-body">
                    <textarea rows="5" class="form-control" id="copyclip" name="predicted_trade">{!! $predicted_all !!}</textarea>
                </div>
                <div class="modal-footer">
                    <button id="copy2" onclick="copyToClipboard()" class="btn btn-sm btn-info">
                        <i class="fa fa-copy" alt="Copy to clipboard"></i> Copy Trades
                    </button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/fontawesome-iconpicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assets/admin/js/pace.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/home.js') }}"></script>
    <script type="text/javascript">
        var timeFn;
        checkforRates();

        $(document).ready(function() {
            $("#checkall").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });

        function copyToClipboard() {
            var $temp = $("#copyclip");
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }



        function checkforRates() {

            if (rates == undefined) {
                timeFn = setTimeout("checkforRates()", 1000);
                return;
            }
            $('#rates').val(JSON.stringify(rates));
            $('.rates_alt').val(JSON.stringify(rates));
            $('#tradeact').attr('disabled', false);
            stopCheckRate();
        }

        function stopCheckRate() {
            clearTimeout(timeFn);
        }
    </script>
@endsection
