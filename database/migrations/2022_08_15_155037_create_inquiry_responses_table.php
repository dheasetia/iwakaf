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
        Schema::create('inquiry_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_inquiry_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->string('merchant_code');
            $table->string('reference');
            $table->string('payment_url');
            $table->string('va_number')->nullable();
            $table->bigInteger('amount');
            $table->string('qr_string');
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
        Schema::dropIfExists('inquiry_responses');
    }
};
