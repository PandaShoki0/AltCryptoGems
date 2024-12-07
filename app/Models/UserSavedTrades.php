<?php 

namespace App\Models;


use \Illuminate\Database\Eloquent\Model as Eloquent;


class UserSavedTrades extends Eloquent{

	protected $table = 'user_saved_trades';
	
	protected $fillable = ['user_id', 'trade_action', 'trade_amount', 'trade_interval', 'trade_strike', 'trade_symbols', 'percent_payout', 'is_predicted', 'is_traded'];
	

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}	


	public function getCreatedAtAttribute($date)
	{
		return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->toDayDateTimeString();
	}
	
	public function getUpdatedAtAttribute($date)
	{
		return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->toDayDateTimeString();
		
	}
	
// 	public function getTradeMovementAttribute()
// 	{
// 		return $this->trade_action=='trade_down' ?'<p class="text-danger"><i class="zmdi zmdi-trending-down fa-2x"></i></p>' :'<p class="text-success"><i class="zmdi zmdi-trending-up fa-2x"></i></p>';
// 	}
	
// 	public function getTradeInAttribute()
// 	{
// 		return $this->trade_time;
// 	}
	
// 	public function getAmountAttribute()
// 	{
// 		return $this->trade_amount;
// 	}
	
// 	public function setSymbolAttribute()
// 	{
// 		$this->attributes['symbol'] = $this->asset;
// 	}
	
	
// 	public function getTradeTimeReadableAttribute()
// 	{
		
// 		//return $timing;
// 		switch($this->trade_time)
// 			{
// 				case '60':
// 				$timing = '1 min'; 
// 				break;
// 				case '120':
// 				$timing = '2 min'; 
// 				break;
// 				case '180':
// 				$timing = '3 min'; 
// 				break;
// 				case '300':
// 				$timing = '5 min'; 
// 				break;
// 				case '3600':
// 				$timing = '1 hour'; 
// 				break;
// 				case '7200':
// 				$timing = '2 hours'; 
// 				break;
// 				case '21600':
// 				$timing = '6 hours'; 
// 				break;
// 				case '43200':
// 				$timing = '12 hours';
// 					break;
// 				case '86400':
// 				$timing = '1 day';
// 					break;
// 				case '172800': 
// 				$timing = '2 days';
// 					break;
// 			}
		
// 		return $timing;
// 	}
	
	
	
}

?>