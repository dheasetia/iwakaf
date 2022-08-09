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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('project_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->dateTime('date_billed');
            $table->string('number');
            $table->decimal('amount');
            $table->decimal('maintenance_fee')->default(0);
            $table->decimal('transaction_fee')->default(0);
            $table->string('behalf')->nullable();
            $table->enum('payment_method', ['va', 'bank_transfer', 'digital_money']);
            $table->foreignId('bank_id')->nullable()->constrained()->restrictOnDelete();
            $table->foreignId('va_id')->nullable()->constrained()->restrictOnDelete();
            $table->unsignedBigInteger('digital_money_id')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('is_anonymous')->default(0);
            $table->string('status')->default('pending');
            $table->string('va_number')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->timestamps();

            $table->foreign('digital_money_id')->references('id')->on('digital_money');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
