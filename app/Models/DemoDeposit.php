<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoDeposit extends Model
{
    protected $table = 'demo_deposits';
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
 
    public function wallet()
    {
        return $this->belongsTo('App\UserWallet', 'wallet_id');
    }

}
