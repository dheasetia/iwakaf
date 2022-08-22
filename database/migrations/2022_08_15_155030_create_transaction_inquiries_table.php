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
        Schema::create('transaction_inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreignId('user_id');
            $table->string('merchant_code');
            $table->bigInteger('payment_amount');
            $table->string('merchant_order_id')->unique();
            $table->string('product_details')->comment('Produk/jasa yang diperjualbelikan');
            $table->string('email');
            $table->string('additional_param')->nullable();
            $table->string('payment_method', 2);
            $table->string('merchant_user_info')->comment('Username atau email pelanggan');
            $table->string('customer_va_name')->comment('Nama yang muncul pada halaman konfirmasi pembayaran bank');
            $table->string('phone_number')->nullable();
            $table->foreignId('item_id')->constrained()->restrictOnDelete();
            $table->foreignId('customer_detail_id')->constrained();
            $table->string('return_url');
            $table->string('callback_url');
            $table->string('signature');
            $table->integer('expiry_period')->comment('Masa berlaku dalam menit');
            $table->string('account_link')->nullable();
            $table->string('on_behalf')->nullable();
            $table->text('comment')->nullable();
            $table->integer('transaction_fee');
            $table->integer('maintenance_fee');
            $table->tinyInteger('is_anonymous')->default(0);

            $table->string('response_merchant_code')->nullable();
            $table->string('response_reference')->nullable();
            $table->string('response_payment_url')->nullable();
            $table->string('response_va_number')->nullable();
            $table->bigInteger('response_amount')->nullable();
            $table->string('response_status_code')->nullable();
            $table->string('response_status_message')->nullable();
            $table->string('payment_status', 2)->nullable();
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
        Schema::dropIfExists('transaction_inquiries');
    }
};
