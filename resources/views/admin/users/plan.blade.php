@extends('layouts.admin')

@section('page-style')
<link rel="stylesheet" href="{{asset('userassets/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


<!-- Main CSS-->
{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}"> --}}
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome-iconpicker.min.css')}}">
<link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}" rel="stylesheet">
{{-- <link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" type="text/css"/> --}}

{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom.css')}}"> --}}


<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
@endsection

@section('content')
@php
    $user_default_wallet = \App\Models\Wallet::whereUser_id($user->id)->whereIsDefault(1)->first();
    $user_wallets = \App\Models\Wallet::whereUser_id($user->id)->get();
@endphp
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-list"></i> Manage Plan for {{ $user->name }}
                </h4>
                <div class="tile-body">
                    <form id="form" method="POST" action="{{ route('admin.users.approveplan', $user->id) }}"
                        enctype="multipart/form-data" name="editForm">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label><strong>Current Plan</strong></label>
                                <div class="input-group ">
                                    <input id="currentplan" class="form-control" value="{{ $plan->pricingPlan->title }}"
                                        type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>Plan Status</strong></label>
                                <div class="input-group">
                                    <button class="{{ $plan->is_paid == true ? 'btn btn-success' : 'btn btn-danger' }}">
                                        {{ $plan->is_paid == true ? 'ACTIVATED' : 'NOT ACTIVE' }}
                                    </button>
                                </div>

                            </div>

                        </div>
                        @if (!$plan->is_paid)
                            <button type="submit" class="btn btn-lg btn-primary btn-block" style="margin-top: 10px;">Approve</button>
                        @endif
                    </form>
                </div>
                <br />
            </div>

            <div class="tile">
                <h4 class="tile-title">
                    <i class="fa fa-list"></i> Update Plan for {{ $user->name }}
                </h4>
                <div class="tile-body">
                    <form id="form" method="POST" action="{{ route('admin.users.updateplan', $user->id) }}"
                        enctype="multipart/form-data" name="editForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label><strong>Choose Plan </strong></label>
                                <div class="input-group">
                                    <select id="plans" name="plan" class="form-control">
                                        @foreach ($plans as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $plan->pricing_plan_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('plan'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('plan') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block" style="margin-top: 10px;">Save</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-4">
          
            @include('admin.users.side-bar')

        </div>


    </div>


@endsection


