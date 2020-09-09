<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationVendeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_vendeurs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('info_position_vendeur_id')->unsigned()->nullable();
            $table->foreign('info_position_vendeur_id')->references('id')->on('info_position_vendeurs');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('information_vendeurs');
    }
}
