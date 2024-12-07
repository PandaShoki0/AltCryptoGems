<?php

namespace App\Utility;

use Carbon\Carbon;

class ManipulateDate{

//Carbon::setWeekStartsAt(Carbon::MONDAY);
//Carbon::setWeekEndsAt(Carbon::SUNDAY);
    public static function startOfWeek($day = 1)
    {
        return Carbon::now()->startOfWeek($day);
    }

    public static function endOfWeek($day = 0)
    {
        return Carbon::now()->startOfWeek($day);
    }
}
