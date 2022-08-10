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
            $table->string('title');
            $table->string('location');
            $table->decimal('target_amount');
            $table->integer('days_target');
            $table->date('date_start');
            $table->date('date_end');
            $table->tinyInteger('is_shown')->default(0);
            $table->string('facebook_link')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('featured_picture_url')->nullable();
            $table->text('caption')->nullable();
            $table->decimal('first_choice_amount')->default(0);
            $table->decimal('second_choice_amount')->default(0);
            $table->decimal('third_choice_amount')->default(0);
            $table->decimal('fourth_choice_amount')->default(0);
            $table->decimal('maintenance_fee')->default(0);
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
