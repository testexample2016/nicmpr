<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('reviewer_name');
            $table->string('date_of_review');
            $table->string('designation');
            $table->text('description');
            $table->text('suggestion');
            $table->text('target');
            $table->date('year_month');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
