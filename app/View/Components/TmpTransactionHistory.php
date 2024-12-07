<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class TmpTransactionHistory extends Component
{
    public $data = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data['transaction_histories'] = Cache::remember('tmp-histories', 60, function(){
            return DB::table('tmp_transaction_histories')->latest()->take(20)->get();
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tmp-transaction-history', $this->data);
    }
}
