<?php

use App\Models\CryptoNews;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('process:crypto-news', function(){
    $posts = posts(true);
    if (!empty($posts)) {
        foreach ($posts as $key => $post) {
            CryptoNews::updateOrCreate([
                'remote_id' => $post['id'],
                'guid' => $post['guid'],
            ],[
                'data' => json_encode($post)
            ]);
        }
    }
});

//Add cronjob command in here

Artisan::command('process:cron', function(){
    app()->call('App\Http\Controllers\CronController@trade_results');
});

Artisan::command('process:cron-practice', function(){
    app()->call('App\Http\Controllers\CronController@practice_results');
});

Artisan::command('process:cron-schedule', function(){
    app()->call('App\Http\Controllers\CronController@schedule_orders');
});

Artisan::command('process:cron-investment-check', function(){
    app()->call('App\Http\Controllers\InvestmentController@cron');
});

Artisan::command('process:cron-bot-result', function(){
    app()->call('App\Http\Controllers\Extensions\Bot\BotController@botResult');
});

Artisan::command('process:cron-bot-missed', function(){
    app()->call('App\Http\Controllers\Extensions\Bot\BotController@botMissed');
});

Artisan::command('process:cron-mlm-ranks', function(){
    app()->call('App\Http\Controllers\Extensions\MLM\MLMController@mlm_ranks');
});

Artisan::command('process:cron-mlm-daily', function(){
    app()->call('App\Http\Controllers\Extensions\MLM\MLMController@mlm_daily');
});

Artisan::command('process:cron-forex-missed', function(){
    app()->call('App\Http\Controllers\Extensions\Forex\ForexController@ForexMissed');
});

Artisan::command('process:cron-forex-result', function(){
    app()->call('App\Http\Controllers\Extensions\Forex\ForexController@ForexResult');
});

Artisan::command('process:cron-mlm-membership', function(){
    app()->call('App\Http\Controllers\Extensions\MLM\MLMController@mlm_membership');
});

Artisan::command('process:cron-provider-marketsToTable', function(){
    app()->call('App\Http\Controllers\CronController@markets_to_table');
});

Artisan::command('process:cron-provider-currencies', function(){
    app()->call('App\Http\Controllers\CronController@currencies');
});

Artisan::command('process:cron-provider-currenciesToTable', function(){
    app()->call('App\Http\Controllers\CronController@currencies_to_table');
});

Artisan::command('process:cron-provider-pairsToTable', function(){
    app()->call('App\Http\Controllers\CronController@pairs_to_table');
});

Artisan::command('process:cron-provider-fetch-order', function(){
    app()->call('App\Http\Controllers\CronController@fetch_order');
});

Artisan::command('process:cron-staking-profit', function(){
    app()->call('App\Http\Controllers\Extensions\Staking\StakingController@staking_profit');
});

Artisan::command('process:cron-utxo-verify-transactions', function(){
    app()->call('App\Http\Controllers\Extensions\Eco\WithdrawController@verifyTransfers');
});

Artisan::command('process:cron-mailwiz-send', function(){
    app()->call('App\Http\Controllers\Admin\Extensions\MailWiz\CampaignController@cron');
});

Artisan::command('process:cron-provider-futuresToTable', function(){
    app()->call('App\Http\Controllers\Extensions\Futures\FuturesController@cron');
});