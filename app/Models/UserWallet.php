<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class UserWallet extends Eloquent{

	protected $table = 'user_wallets';
	
	protected $fillable = ['user_id', 'gateway_id', 'balance', 'balance_demo', 'is_default', 'wallet_acc'];
	
	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function gateway()
    {
        return $this->belongsTo('App\Models\Gateway', 'gateway_id');
    }

	public function getCreatedAtAttribute($date)
	{
		return $date;
		// return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->toDayDateTimeString();
	}
	
	public function getUpdatedAtAttribute($date)
	{
		return $date;

		// return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->toDayDateTimeString();
		
	}

	
}

?>