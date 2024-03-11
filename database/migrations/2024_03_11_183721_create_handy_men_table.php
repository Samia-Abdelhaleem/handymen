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
        Schema::create('handymen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('age');
            $table->text('bio');
            $table->string('phone', 100)->unique();
            $table->string('photo', 100)->nullable();
            $table->boolean('online')->default(false);
            $table->boolean('ban')->default(false);
            $table->boolean('approved')->default(false);
            $table->integer('reviewing_cost');
            $table->string('city', 100);
            $table->unsignedDouble('wallet');
            $table->enum('rate', [1, 2, 3, 4, 5])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handymen');
    }
};
