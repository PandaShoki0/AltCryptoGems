<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('trade_predictions')) {
            Schema::create('trade_predictions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->string('trade_action')->comment('buy, sell');
                $table->string('trade_type')->comment('live, demo');
                $table->decimal('trade_amount', 16, 6)->default(0);
                $table->string('take_profit');
                $table->string('stop_loss');
                $table->string('trade_interval')->nullable();
                $table->string('trade_strike')->nullable();
                $table->string('trade_symbols')->nullable();
                $table->string('min_quantity')->default(0);
                $table->integer('win_time')->nullable();
                $table->string('session_id')->nullable();
                $table->tinyInteger('is_used')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_predictions');
    }
};
