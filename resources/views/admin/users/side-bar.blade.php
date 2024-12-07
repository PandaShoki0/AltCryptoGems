@php
    $user_default_wallet = \App\Models\Wallet::whereUser_id($user->id)->whereIsDefault(1)->first();
    $user_wallets = \App\Models\Wallet::whereUser_id($user->id)->get();
    $last_login = \App\Models\UserLogin::whereUser_id($user->id)->orderBy('id', 'desc')->first();
    $basic = \App\Models\GeneralSetting::first();

@endphp

<div class="tile">
    <h4 class="tile-title">
    <i class="fa fa-user"></i> Profile </h4>
    <div class="tile-body">
        @if( file_exists($user->image) )
            <img src=" {{url('assets/user/images/'.$user->image)}} " class="img-responsive propic" alt="Profile Pic">
        @else
            <img src=" {{url('assets/user/images/user-default.png')}} " class="img-responsive propic" alt="Profile Pic">
        @endif

        <hr>
        <h5 class="bold">Username : <a href="#">{{ $user->username }}</a></h5>
        <h5 class="bold">Name : {{ @$user->name }}</h5>
        <hr />
        <a href="#" class="btn btn-primary btn-sm float-right" data-target="#changeCurrency" data-toggle="modal">Change</a>
        <h5 class="bold">Default Wallet: {{ $user_default_wallet->symbol }}</h5>
        <h5 class="bold">Balance
        : {{number_format(floatval($user_default_wallet->balance), $basic->decimal, '.', '')}} {{$user_default_wallet->symbol}} </h5>
        <h5 class="bold">Demo Balance
                : {{number_format(floatval($user_default_wallet->balance_demo), $basic->decimal, '.', '')}} {{$user_default_wallet->symbol}}</h5> 
        <hr />
        <p>
            <strong>Last Login : {{ Carbon\Carbon::parse($user->login_time)->diffForHumans() }}</strong>
            <br />
        </p>
        <hr>
        @if($last_login != null)
            <strong>Last Login From</strong> <br /> {{ $last_login->user_ip }} -  {{ $last_login->location }}
            <br /> Using {{ $last_login->details }} <br />
        @endif
    </div>
</div>




<div id="changeCurrency" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><strong>Change Default Wallet</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{route('admin.users.update-default-wallet', $user->id)}}"
                    enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{method_field('put')}}

                  <div class="form-group{{ $errors->has('wallet') ? ' has-error' : '' }}">
                      <label for="wallet" class="control-label"><strong>Choose Default Wallet</strong></label>
                     <div class="form-group">
                         <select id="wallet" class="form-control" name="wallet" style="height: unset !important">
                             @foreach ($user_wallets as $item)
                                <option value="{{ $item->id }}" @if($item->is_default) selected @endif>{{ $item->balance . $item->symbol }}</option>
                             @endforeach
                         </select>
                     </div>
                      @if ($errors->has('wallet'))
                          <span class="help-block">
                            <strong>{{ $errors->first('wallet') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>