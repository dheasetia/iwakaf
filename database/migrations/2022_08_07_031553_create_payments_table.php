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
            $table->foreignId('order_id')->constrained()->restrictOnDelete();
            $table->dateTime('paid_at');
            $table->bigInteger('amount');
            $table->bigInteger('maintenance_fee')->default(0);
            $table->bigInteger('transaction_fee')->default(0);
            $table->bigInteger('total_amount');
            $table->enum('payment_method', ['va', 'bank_transfer', 'digital_money']);
            $table->string('from_bank_name')->nullable();
            $table->string('from_name')->nullable();
            $table->string('invoice_url')->nullable();
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
