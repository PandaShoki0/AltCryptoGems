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
                {{-- <a href="{{ route('admin.users.correct.deposits', ['id' => $user->id]) }}" class="btn btn-primary btn-sm pull-right">Access and Correct</a> --}}
                <h3 class="tile-title ">{{$page_title}}</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover order-column" id="">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>#TRX</th>
                                <th>Wallet Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $data)
                                <tr>
                                    <td>
                                        {{-- <a href="{{route('user.single', $data->user->id)}}"> --}}
                                            {{$data->user->username}}
                                        {{-- </a> --}}
                                    </td>

                                    <td>{{strtoupper($data->trx)}}</td>
                                    <td>{{$data->gateway->name}}</td>
                                    <td><strong>{{$data->final_amo}} {{$data->method_currency}}</strong></td>
                                    {{-- <td><strong> {{strtoupper($data->currency_code)}} {{$data->currency_amount}} </strong></td>                                     --}}
                                    <td>
                                            @if($data->try == 0 )
                                            <button  class="btn btn-success btn-sm ">
                                                Deposit Open </button>
                                            @else
                                            <button class="btn btn-warning btn-sm ">
                                                Deposit Closed </button>
                                            @endif
                                    </td>
                                    <td>
                                        {{$data->updated_at}}
                                    </td>
                                    <td>
                                        {{-- @if($data->proof <> null)
                                        <a href="" class="btn btn-info btn-circle btn-sm " data-toggle="modal" data-target="#ViewProof{{$data->id}}">
                                            <i class="fa fa-file-o"></i> View Proof </a>
                                        @endif --}}

                                        <a href="#" class="btn btn-success btn-sm" 
                                        data-toggle="modal" data-target="#Modal{{$data->id}}">
                                         <i class="fa fa-check"></i> Approve</a>
                                        <a href="{{route('admin.users.deposit.delete', $data->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>

                                @push('modal')
                                {{-- <div class="modal fade" id="ViewProof{{$data->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">
                                                    <b class="abir_act">Proof of Deposit for {{ $data->gateway->name}} Wallet</b> </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="black">X</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Payment Amount:</strong> {{$data->coin_amount . $data->coin_code}}</p>
                                                <p><strong>Payment Proof Type:</strong> {{$data->proof_type == 'proof_file'? ' Uploaded Proof File' : ' Transaction ID '}}</p>
                                                <p class="text-primary text-bold">
                                                    @if($data->proof_type == 'proof_transaction_id')
                                                        Blockchain ID({{$data->gateway->label}}): {{$data->proof}}                                                     
                                                    @else
                                                        Proof File: <a href="{{asset('assets/images/receipts/' . $data->proof)}}">{{ $data->proof }}</a>
                                                    @endif
                                                </p>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>

                                            </div>
                                    </div>
                                    </div>
                                </div> --}}


                                 <!-- Modal for Edit button -->
                                 <div class="modal fade" id="Modal{{$data->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="POST"
                                              action="{{route('admin.users.deposit.approve',$data->id)}}"
                                              enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{method_field('put')}}
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check-circle-o"></i> Approve <b class="abir_act">{{ strtoupper($data->trx) }}</b> </h4>

                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true"><span class="black">X</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <p><strong>Approve Deposit of :</strong>  {{ $data->final_amo }} {{$data->method_currency}} for  {{$data->user->username}} to {{$data->method_currency}} Wallet</p>
                                                <input type="hidden" name="coin_amount" value="{{$data->final_amo}}">
                                                {{-- <input type="hidden" name="coin_code" value="{{$data->coin_code}}"> --}}
                                                <h6>Are you  want to continue with this request?</h6>
                                                <p>Approving this payment while the payment page is live will notify the user that the payments has been successful and will direct the user to the deposit log page.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
                                                <button type="submit" class="btn  btn-success "> Approve</button>
                                            </div>
                                        </form>

                                    </div>
                                    </div>
                                </div>
                                @endpush
                            @endforeach
                            <tbody>
                        </table>

                        {!! $deposits->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @stack('modal')

@endsection