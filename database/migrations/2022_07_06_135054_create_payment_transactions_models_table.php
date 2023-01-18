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
        Schema::create('payment_transactions_models', function (Blueprint $table) {
            $table->charset ='utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->unsignedBigInteger('body_id');
            $table->string('amountpayable');
            $table->string('transaction_number')->nullable();
            $table->string('amount');
            $table->string('date');
            $table->unsignedBigInteger('agent_id');
            $table->string('image');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('bankname');
            $table->string('file');

            $table->foreign('body_id')->references('id')->on('bodies')->constrained()->onUpdate('cascade')->OnDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents')->constrained()->onUpdate('cascade')->OnDelete('cascade');
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
        Schema::dropIfExists('payment_transactions_models');
    }
};
