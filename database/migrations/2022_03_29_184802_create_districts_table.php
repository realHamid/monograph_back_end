<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('province_id');
            $table->string('name');
            $table->date('date')->nullable();
            $table->text('note')->nullable();
            $table->string('img',350)->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('province_id')->references('id')->on('provinces');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
