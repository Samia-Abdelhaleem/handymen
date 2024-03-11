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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('handyman_id');
            $table->foreign('handyman_id')->references('id')->on('handymen');
            $table->integer('handyman_cost');
            $table->integer('tools_cost');
            $table->unsignedDouble('price');
            $table->dateTime('date');
            $table->enum('status', [
                'pending',
                'reviewing',
                'priced',
                'accepted',
                'refused',
                'finished'
            ]);
            $table->text('notes')->nullable();
            $table->enum('rate', [1, 2, 3, 4, 5])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
