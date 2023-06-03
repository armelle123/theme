<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->bigIncrements('candidat_id');
            $table->string('nom_cand');
            $table->string('prenom_cand');
            $table->string('email_cand');
            $table->integer('tel_cand');
            $table->string('cv_cand');
            $table->string('lettremotiv_cand');
            $table->string('id_candidat');
            $table->string('diplome_bts_cand');
            $table->string('diplome_licence_cand');
            $table->string('diplome_masteur_cand');
            $table->integer('statuts_cand');
            $table->string('email_confirmer_cand');
            $table->timestamps();

            // $table->primary('candidat_id');
            $table->unsignedBigInteger('offre_id');
            $table->foreign('offre_id')->references('offre_id')->on('offres')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidats');
    }
}
