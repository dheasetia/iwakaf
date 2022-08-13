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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('project_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->string('duitku_reference_number')->nullable();
            $table->dateTime('order_time')->nullable();
            $table->string('email');
            $table->string('number');
            $table->bigInteger('payment_amount');
            $table->bigInteger('maintenance_fee')->default(0);
            $table->bigInteger('payment_fee')->default(0);
            $table->string('behalf')->nullable();
            $table->string('payment_method', 2);
            $table->text('comment')->nullable();
            $table->tinyInteger('is_anonymous')->default(0);
            $table->string('status')->default('pending');

            $table->string('merchant_code')->nullable();
            $table->string('merchant_order_id')->nullable();
            $table->string('product_details')->nullable();
            $table->string('merchant_user_info')->nullable();
            $table->string('customer_va_name')->nullable();
            $table->string('customer_phone_number')->nullable();
            $table->string('return_url')->nullable();
            $table->string('callback_url')->nullable();
            $table->integer('expiry_period')->nullable()->comment('in minutes');
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
        Schema::dropIfExists('orders');
    }
};
