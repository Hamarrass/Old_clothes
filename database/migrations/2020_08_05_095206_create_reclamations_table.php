<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->integer('dossier_id')->nullable();
            $table->text('client')->nullable();
            $table->integer('type_reclamation_id')->unsigned();
            $table->foreign('type_reclamation_id')->references('id')->on('type_reclamations');
            $table->text('observation_client')->nullable();
            $table->text('reponse_gestionnaire')->nullable();
            $table->integer('compagnie_id')->nullable();
            $table->integer('status')->default('1');
            $table->integer('used')->default('1');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('seen_by')->nullable();
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
        Schema::dropIfExists('reclamations');
    }
}
