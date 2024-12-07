<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TmpTransactionHistoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:tmp-transaction-histories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {        
        $int_rand = rand(1,100);
        if($int_rand < 50){
            return ;
        }
        $array = ['btc', 'eth'];

        if($array[array_rand($array, 1)] == 'btc'){
            $from_address = $this->generateEthereumAddress();
            $to_address = $this->generateEthereumAddress();
            $currency = 'ETH';
        }else{
            $from_address = $this->generateBitcoinAddress();
            $to_address = $this->generateBitcoinAddress();
            $currency = 'BTC';
            
        }
        $amount = $this->randomDecimal(0.1, 100);
        if($amount <= 0){
            $amount = $this->randomDecimal(0.1, 100);
        }
        DB::table('tmp_transaction_histories')->insert([
            'trx'   => getTrx(),
            'from_address'  => $from_address,
            'to_address'    => $to_address,
            'amount'        => $amount,
            'symbol'        => $currency,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }

    public function generateBitcoinAddress()
    {
        $publicKey = bin2hex(random_bytes(65));
        
        return '1' . substr(hash('sha256', hex2bin($publicKey)), 0, 40);
    }

    public function generateEthereumAddress()
    {
        $publicKey = bin2hex(random_bytes(20));
        return '0x' . $publicKey;
    }

    public function randomDecimal(float $min, float $max, int $digit = 4): float|int{

        return mt_rand($min, $max) / pow(10, $digit);
    }
}
