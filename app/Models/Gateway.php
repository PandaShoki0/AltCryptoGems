<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheKeyTrait;

use Illuminate\Support\Facades\Cache;

class Gateway extends Model
{
    use CacheKeyTrait;
    

    public function getCache()
    {
        return Cache::remember($this->cacheKey($this) . ':gateway', now()->addHours(4), function () {
            return self::get();
        });
    }

    public function clearCache()
    {
        Cache::forget($this->cacheKey($this) . ':gateway');
        return self::getCache();
    }
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'code', 'status', 'alias', 'image'
    ];
    protected $casts = ['status' => 'boolean', 'code' => 'string', 'extra' => 'object', 'input_form' => 'object'];

    public function currencies()
    {
        return $this->hasMany(GatewayCurrency::class, 'method_code', 'code');
    }

    public function single_currency()
    {
        return $this->hasOne(GatewayCurrency::class, 'method_code', 'code')->latest();
    }

    public function scopeCrypto()
    {
        return $this->crypto == 1 ? 'crypto' : 'fiat';
    }

    public function scopeAutomatic()
    {
        return $this->where('code', '<', 1000);
    }

    public function scopeManual()
    {
        return $this->where('code', '>=', 1000);
    }

    public function wallets()
	{
		return $this->hasMany('App\Models\UserWallet', 'id', 'gateway_id');
	}

	public function getPriceChargeAttribute()
	{
	    if($this->code == 'BTC')
		$code_name = 'USD';
        else
        $code_name = $this->code;
        
		if (Cache::has('rates-' . $code_name)) {
			//
			$resp = Cache::get('rates-' . $code_name);
			return json_decode( $resp, true);
		}else{
			// Get cURL resource
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, [
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_HTTPHEADER => ['X-CMC_PRO_API_KEY' => '0b742b62-18f3-4f2e-9c90-18e6f0564600'],
				CURLOPT_URL => 'https://pro-api.coinmarketcap.com/v1/tools/price-conversion?CMC_PRO_API_KEY=0b742b62-18f3-4f2e-9c90-18e6f0564600&amount=1&symbol=BTC&convert='. $code_name,
				CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0'
			]);
			// Send the request & save response to $resp
			// https://pro-api.coinmarketcap.com/v1/tools/price-conversion
			$resp = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);
	
			//return json_decode($resp);
			if($resp!=null )
			Cache::put('rates-' . $code_name, $resp, 15);
			return json_decode($resp, true);
		}
	}
}
