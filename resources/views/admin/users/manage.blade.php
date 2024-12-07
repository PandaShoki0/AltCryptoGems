@extends('layouts.admin')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/vendor_components/flagstrap/dist/css/flags.css')}}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('userassets/css/bootstrap.min.css')}}" rel="stylesheet"> --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome-iconpicker.min.css')}}">
<link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
{{-- <link href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}" rel="stylesheet"> --}}
{{-- <link href="{{asset('assets/admin/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/css/table.css')}}" rel="stylesheet" type="text/css"/> --}}
<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">


@endsection

@php
    $user_default_wallet = \App\Models\Wallet::whereUser_id($user->id)->whereIsDefault(1)->first();
    $user_wallets = \App\Models\Wallet::whereUser_id($user->id)->get();
    


@endphp


@section('content')

    <div class="row">
        <div class="col-md-3">
            @include('admin.users.side-bar')
        </div>


        <div class="col-md-9">
            @php
                $trans = \App\Models\Deposit::whereUser_id($user->id)->count();
                $transAmount = \App\Models\Deposit::whereUser_id($user->id)->sum('amount');

                $deposit = \App\Models\Deposit::whereUser_id($user->id)->whereStatus(1)->count();
                $depositAmount = \App\Models\Deposit::whereUser_id($user->id)->whereStatus(1)->sum('amount');

                // $withDraw = \App\Models\WithdrawLog::whereUser_id($user->id)->count();
                // $withDrawAmount = \App\Models\WithdrawLog::whereUser_id($user->id)->whereStatus(1)->sum('amount');
                
                $profit_loss_user = \App\Models\TradeHistory::whereUserId( $user->id )->whereWalletId( $user_default_wallet->id )->wherePositionStatus('close')->whereTradeType('live')->sum('profit_loss_user');


            @endphp
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <a href="{{route('admin.users.trans',$user->id)}}" class="text-decoration">
                        <div class="widget-small primary coloured-icon"><i class="icon fa fa-th fa-3x"></i>
                            <div class="info">
                                <h6>TRANSACTION</h6>
                                <p><b>History</b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3">
                    <a href="{{route('admin.users.deposit',$user->id)}}" class="text-decoration">
                        <div class="widget-small info coloured-icon"><i class="icon fa fa-download fa-3x"></i>
                            <div class="info">
                                <h6>DEPOSITS</h6>
                                <p><b>{{$user->ccy->symbol}}{{number_format($depositAmount, $user->ccy->decimal_points)}} </b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3">
                    <a href="{{route('admin.users.withdraw',$user->id)}}" class="text-decoration">
                        <div class="widget-small danger coloured-icon"><i class="icon fa fa-upload fa-3x"></i>
                            <div class="info">
                                <h6>Withdrawal</h6>
                                <p><b>History</b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-lg-3">
                    <a href="{{route('admin.users.fix-trade',$user->id)}}" class="text-decoration">
                        <div class="widget-small warning coloured-icon"><i class="icon fa fa-bar-chart fa-3x"></i>
                            <div class="info">
                                <h6>Profit/Loss</h6>
                                <p><b>{{$user->ccy->symbol}}{{number_format($profit_loss_user, $user->ccy->decimal_points)}}</b></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            

            <div class="row">
                <div class="tile col-md-12">
                    <h3 class="tile-title"><i class="fa fa-cogs"></i> Operations</h3>
                    <div class="tile-body">


                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{route('admin.users.balance', $user->id)}}"
                                   class="btn btn-lg btn-block btn-primary"><i class="fa fa-money"></i>
                                    Add/Substract Balance</a><br>
                            </div>

                            <div class="col-md-4">
                                    <a href="{{route('admin.users.demobalance', $user->id)}}"
                                       class="btn btn-lg btn-block btn-warning"> <i
                                                class="fa fa-money"></i> Add/Substract Demo Balance</a>
                                    <br>
                            </div>

                            {{-- <div class="col-md-4">
                                <a href="#"
                                   class="btn btn-lg btn-block btn-info"><i class="fa fa-credit-card"></i> Add Payment Details</a>
                                <br>
                            </div> --}}
                            @if(@$user->demo_trade == 'request')
                            <div class="col-md-4">
                                <a href="#"
                                   class="btn btn-lg btn-block btn-success"><i class="fa fa-trade"></i> Accept Demo Trade</a>
                                <br>
                            </div>

                            <div class="col-md-4">
                                <a href="#"
                                   class="btn btn-lg btn-block btn-danger"><i class="fa fa-trade"></i> Reject Demo Trade</a>
                                <br>
                            </div>
                            @endif
                            
                            

                            {{-- <div class="col-md-4">
                                    <a href="#"
                                       class="btn btn-lg btn-block btn-danger"><i class="fa fa-sign-out"></i> Login
                                        History</a>
                                    <br>
                            </div> --}}


                            {{-- <div class="col-md-4">
                                <a href="#"
                                   class="btn btn-lg btn-block btn-primary"> <i
                                            class="fa fa-envelope"></i> Send Email</a>
                                <br>
                            </div> --}}

                            {{-- <div class="col-md-4">
                                @if(@$user->govt_id == 'not-submitted' || $user->profile == null)
                                 <a href="#"
                                   class="btn btn-lg btn-block btn-warning"> <i class="fa fa-id-card"></i> Verification Not Submitted</a>
                                <br>
                                
                                @else
                                <a href="#"
                                   class="btn btn-lg btn-block btn-info"> <i class="fa fa-id-card"></i> View Verification</a>
                                <br>
                                @endif
                            </div> --}}

                            
                            <div class="col-md-4">
                                <button type="button" class="btn btn-warning btn-lg btn-block"
                                        data-toggle="modal" data-target="#changepass"><i class="fa fa-lock"></i>
                                    Change Password
                                </button>
                            </div>
                            @if($user->userplan)
                            <div class="col-md-4">
                               
                                    <a href="{{route('admin.users.plan', $user->id)}}"
                                            class="btn btn-lg btn-block btn-primary"> <i
                                                     class="fa fa-list"></i> Manage Plans
                                    </a><br />
                            </div>
                            @endif
                            
                            @if(@$user->is_pend)
                            <div class="col-md-4">
                                <a href="{{route('admin.users.unpend',$user->id)}}"
                                   class="btn btn-lg btn-block btn-success"><i class="fa fa-hand-paper"></i> UNPEND</a>
                                <br>
                            </div>
                            @else
                            <div class="col-md-4">
                                <button type="button" class="btn btn-warning btn-lg btn-block"
                                        data-toggle="modal" data-target="#pendmodal"><i class="fa fa-hand-paper"></i> PEND</button>
                                <br>
                            </div>
                            @endif
                            
                            {{-- <div class="col-md-4">
                                <a href="#"
                                   class="btn btn-lg btn-block btn-primary"><i class="fa fa-reset"></i> RESET LIMIT</a>
                                <br>
                            </div> --}}

                            <div class="col-md-4">
                                    <a href="{{route('admin.users.generate.predictions', $user->id)}}"
                                            class="btn btn-lg btn-block btn-outline-success"><i class="fa fa-area-chart"></i> Generate Predictions</a>
                                         <br>
                            </div>
                            
                            <div class="col-md-4">
                                    <a href="{{route('admin.users.manage-license', $user->id)}}"
                                            class="btn btn-lg btn-block btn-info"><i class="fa fa-id-badge"></i> Manage License</a> 
                                            <br>
                            </div>
                            
                            <div class="col-md-4">
                                    <a href="{{route('admin.users.manage-positions', $user->id)}}"
                                            class="btn btn-lg btn-block btn-success"><i class="fa fa-area-chart"></i> Manager Trade</a>
                                         <br>
                            </div>
                            
                            
                            @if(@$user->pend_withdraw)
                            <div class="col-md-4">
                                <a href="{{route('admin.users.activatewithdrawal', $user->id)}}"
                                   class="btn btn-lg btn-block btn-outline-success"><i class="fa fa-hand-paper"></i> Activate Withdrawal</a>
                                <br>
                            </div>
                            @else
                            <div class="col-md-4">
                                <button type="button" class="btn btn-outline-danger btn-lg btn-block"
                                        data-toggle="modal" data-target="#activatemodal"><i class="fa fa-hand-paper"></i> Deactivate  Withdrawal</button>
                                <br>
                            </div>
                            @endif
                            
                            

                        </div>


                    </div>

                </div>

            </div>

{{-- 
            <div class="row">
                <div class="tile col-md-12">
                    <h3 class="tile-title ">
                        <i class="fa fa-user"></i> Update Profile</h3>

                    <div class="tile-body">
                        <form id="form" method="POST" action="#"
                              enctype="multipart/form-data" name="editForm">
                            {{ csrf_field() }}
                            {{method_field('put')}}

                            <div class="row">
                                <div class="form-group col-md-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label> <strong>First Name</strong></label>
                                    <input type="text" name="first_name" class="form-control input-lg"
                                           value="{{@$user->profile->first_name}}">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                
                                <div class="form-group col-md-4 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label> <strong>Last Name</strong></label>
                                    <input type="text" name="last_name" class="form-control input-lg"
                                           value="{{@$user->profile->last_name}}">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                
                                <div class="form-group col-md-4 {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label> <strong>Username</strong></label>
                                    <input type="text" name="username" class="form-control input-lg"
                                           value="{{@$user->username}}">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-4 {{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label> <strong>Gender</strong></label>
                                    <select name="gender" class="form-control select input-lg" id="gender">
                                        <option value="male" {{@$user->profile->gender == 'male' ? 'selected' :''}} >Male</option>
                                        <option value="female" {{@$user->profile->gender == 'female' ? 'selected' :''}}>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label><strong>Phone</strong></label>
                                    <input type="text" name="phone" class="form-control input-lg"
                                           value="{{$user->phone}}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control input-lg"
                                           value="{{$user->email}}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>


                                <div class="form-group col-md-4 {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                    <label><strong>Date of Birth</strong></label>
                                    <input type="date" name="date_of_birth" class="form-control input-lg"
                                           value="{{@$user->profile->date_of_birth}}">
                                    @if ($errors->has('date_of_birth'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                                            </span>
                                    @endif
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-md-4 ">
                                    <label> <strong>City</strong></label>
                                    <input type="text" name="city" class="form-control input-lg"
                                           value="{{@$user->profile->city}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label><strong>State</strong></label>
                                    <input type="text" name="state" class="form-control input-lg"
                                           value="{{@$user->profile->state}}">

                                </div>
                                <div class="form-group col-md-4">
                                    <label><strong>Address</strong></label>
                                    <input type="text" name="address" class="form-control input-lg"
                                           value="{{@$user->profile->address}}">

                                </div>

                                <div class="form-group col-md-4">
                                    <label><strong>Default Currency</strong></label>
                                    <select id="currency" class="form-control" name="currency">
                                        @foreach ($currencies as $item)
                                            <option value="{{ $item->id }}" @if($item->id == @$user->profile->ccy->id) selected @endif>{{ $item->iso_name }}({{ $item->symbol }})</option>
                                        @endforeach
                                    </select>
                                </div>       


                                <div class="form-group col-md-6 ">
                                    <label><strong>Country</strong></label>
                                    <div id="country" style="display:block; width:100%; text-align:left" data-selected-country="{{@$user->profile->country}}" data-input-name="country"></div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><strong>User Status</strong></label>
                                    <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                           data-offstyle="danger" data-width="100%" data-on="Active"
                                           data-off="Deactive" type="checkbox" value="1"
                                           name="status" {{ $user->status == "1" ? 'checked' : '' }}>
                                </div>

                                <div class="form-group col-md-4">
                                    <label><strong>Email Verification</strong></label>
                                    <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                           data-offstyle="danger" data-width="100%" data-on="Yes" data-off="No"
                                           type="checkbox" value="1"
                                           name="email_verify" {{ $user->email_verify == "1" ? 'checked' : '' }}>
                                </div>
                                <div class="form-group col-md-4">
                                     <label><strong>2FA Status</strong></label>
                                    <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                           data-offstyle="danger" data-width="100%" data-on="Active" data-off="Inactive"
                                           type="checkbox" value="1"
                                           name="is_2fa" {{ $user->is_2fa == "1" ? 'checked' : '' }}>
                                </div>
                            </div>
                            <hr/>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

                        </form>
                    </div>
                </div>
            </div> --}}


        </div>
    </div>



    <!-- Modal for Edit button -->
    <div id="activatemodal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><strong>Deactivate Withdrawal for this User</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.users.deactivatewithdrawal', $user->id)}}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
    

                        <div class="form-group{{ $errors->has('pend_message') ? ' has-error' : '' }}">
                            <label for="pend_message" class="control-label"><strong>Enter Message</strong></label>
                            <input id="pend_withdrawal_message" type="text" class="form-control"
                                   placeholder="Pending message"
                                   name="pend_withdrawal_message" required>
                            @if ($errors->has('pend_withdrawal_message'))
                                <span class="help-block">
                            <strong>{{ $errors->first('pend_withdrawal_message') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Deactivate Withdrawal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Modal for Edit button -->
    <div id="pendmodal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><strong>Pend Account</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.users.pend-user', $user->id)}}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
    

                        <div class="form-group{{ $errors->has('pend_message') ? ' has-error' : '' }}">
                            <label for="pend_message" class="control-label"><strong>Enter Message</strong></label>
                            <input id="pend_message" type="text" class="form-control"
                                   placeholder="Pending message"
                                   name="pend_message" required>
                            @if ($errors->has('pend_message'))
                                <span class="help-block">
                            <strong>{{ $errors->first('pend_message') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Pend User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal for Edit button -->
    <div id="changepass" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><strong>Change Password</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{route('admin.users.passchange', $user->id)}}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('put')}}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label"><strong>Password</strong></label>
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="Passowrd"
                                   required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="control-label"><strong>Confirm
                                    Password</strong></label>
                            <input id="password-confirm" type="password" class="form-control"
                                   placeholder="Confirm Passowrd"
                                   name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-scripts')
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/fontawesome-iconpicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('assets/admin/js/pace.min.js')}}"></script>    
<script src="{{asset('assets/vendor_components/flagstrap/dist/js/jquery.flagstrap.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
            $('#country').flagStrap({
                placeholder: {
                    value: "",
                    text: "Country of origin"
                },
                buttonSize: "btn-md",
                buttonType: "btn-dark",
                labelMargin: "15px",
                scrollable: true,
                scrollableHeight: "350px"
            });
    });
</script>
@endsection

