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
        Schema::create('favorite_handymen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('handyman_id');
            $table->foreign('handyman_id')->references('id')->on('handymen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_handymen');
    }
};
