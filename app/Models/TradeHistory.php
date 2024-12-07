<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TradeHistory extends Model
{
    protected $appends = ['sym'];
    protected function getSymAttribute()
    {
        return $this->belongsTo('App\Models\CoinPair', 'symbols')->get();;
    }

    public function getDirectionAttribute()
    {
        return $this->trade_action == 'buy' ? '<i class="fa fa-arrow-up text-success"></i>' :'<i class="fa fa-arrow-down text-danger"></i>';
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function wallet()
    {
        return $this->belongsTo('App\Models\UserWallet', 'wallet_id');
    }

}
