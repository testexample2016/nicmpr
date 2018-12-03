<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCumulativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cumulatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parameter_id')->unsigned();
            $table->text('cumulative')->nullable();
            $table->timestamps();

            $table->foreign('parameter_id')->references('id')->on('parameters')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cumulatives');
    }
}
