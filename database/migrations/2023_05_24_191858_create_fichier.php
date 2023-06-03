<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::create('fichiers', function (Blueprint $table) {

        $table->bigIncrements('fichier_id');
        $table->string('titre_fichier');
        $table->string('nature_fichier');
        $table->string('chemin_fichier');
        $table->timestamps();

        // $table->primary('fichier_id');
        $table->unsignedBigInteger('user_id');
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
    Schema::dropIfExists('fichiers');
}
}

