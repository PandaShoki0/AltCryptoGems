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
        Schema::create('coin_pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trade_category_id')->constrained();
            $table->string('name');
            $table->string('fromsym');
            $table->string('tosym');
            $table->string('step');
            $table->string('minimum');
            $table->string('label')->nullable();
            $table->string('levarage')->nullable();
            $table->integer('spread')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_pairs');
    }
};
