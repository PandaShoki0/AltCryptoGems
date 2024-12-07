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
    /* :is(.dark th, td) {
        color: rgb(107 114 128 / var(--tw-text-opacity));
    } */
</style>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">{{$page_title}}</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover order-column" id="">
                            <thead>
                            <tr>
                                <th>#TRX</th>
                                <th>Details</th>
                                <th>Amount</th>
                                <th>Remaining Balance</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $data)
                                <tr>
                                    <td>{{$data->trx}}</td>
                                    <td>{{$data->details ?? ''}}</td>
                                    <td><strong>{!! $data->amount ?? 'N/A' !!} @if($data->mining_id == null)  {!! $basic->currency !!} @else  {!! $data->mining->coin_code !!} @endif</strong></td>
                                    <td>{!! $data->main_amo  ?? 'N/A' !!} @if($data->mining_id == null)  {!! $basic->currency !!} @else  {!! $data->mining->coin_code !!} @endif</td>

                                    <td>
                                        {!! $data->created_at !!}
                                    </td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>

                        {!! $deposits->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection