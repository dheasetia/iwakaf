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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->restrictOnUpdate();
            $table->foreignId('project_id')->constrained()->restrictOnDelete();
            $table->foreignId('merchant_order_id');
            $table->dateTime('paid_at');
            $table->bigInteger('amount');
            $table->bigInteger('maintenance_fee')->default(0);
            $table->bigInteger('transaction_fee')->default(0);
            $table->string('payment_method');
            $table->string('reference')->nullable();
            $table->string('signature')->nullable();
            $table->string('status_code')->nullable();
            $table->string('user_info')->nullable();
            $table->tinyInteger('is_validated')->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
