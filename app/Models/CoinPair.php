<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinPair extends Model
{
    use HasFactory;

    protected $guarded = [];





    public function tradeCategory()
    {
        return $this->belongsTo(TradeCategory::class, 'trade_category_id', 'id');
    }
}
