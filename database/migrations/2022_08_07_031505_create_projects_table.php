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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('title');
            $table->string('location');
            $table->bigInteger('target_amount');
            $table->integer('days_target');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('facebook_link')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('featured_picture_url')->nullable();
            $table->text('caption')->nullable();
            $table->bigInteger('first_choice_amount')->default(0);
            $table->bigInteger('second_choice_amount')->default(0);
            $table->bigInteger('third_choice_amount')->default(0);
            $table->bigInteger('fourth_choice_amount')->default(0);
            $table->bigInteger('maintenance_fee')->default(0);
            $table->tinyInteger('is_shown')->default(0);
            $table->tinyInteger('is_favourite');
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
        Schema::dropIfExists('projects');
    }
};
