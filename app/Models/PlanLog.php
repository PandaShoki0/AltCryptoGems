<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanLog extends Model
{
    protected $table = "plan_logs";

    protected $guarded = [];
    
        protected $appends = ['plan_name'];

    public function pricingPlan()
    {
        return $this->belongsTo('App\Models\PricingPlan','pricing_plan_id');
    }


    public function currentplan()
    {
        if($this->is_paid)
        return $this->belongsTo('App\Models\PricingPlan','pricing_plan_id');
        else 
         return $this->belongsTo('App\Models\PricingPlan','previous_pricing_plan');
    }
    
    public function getPlanNameAttribute()
    {
        return $this->pricingPlan()->first();
    }

}
