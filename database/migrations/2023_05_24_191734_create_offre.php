<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {

            $table->bigIncrements('offre_id');
            $table->string('nom_offre');
            $table->text('type_offre');
            $table->text('description_offre');
            $table->integer('statut_offre');
            $table->date('date_debut_offre');
            $table->date('date_fin_offre');
            $table->timestamps();

            // $table->primary('offre_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('departement_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('departement_id')->references('departement_id')->on('departements')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offre');
    }
}
