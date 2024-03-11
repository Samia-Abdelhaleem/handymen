<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('system_money_transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('handyman_id');
            $table->foreign('handyman_id')->references('id')->on('handymen');
            $table->enum('gender', ['Client', 'Handyman']);
            $table->unsignedDouble('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_money_transaction');
    }
};
