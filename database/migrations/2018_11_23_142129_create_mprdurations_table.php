<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMprdurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mprdurations', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('year_month',191)->unique();
            $table->date('year_month',191)->unique();
            $table->boolean('closed')->default(0);
            $table->boolean('mprgenerated')->default(0);
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
        Schema::dropIfExists('mprdurations');
    }
}
