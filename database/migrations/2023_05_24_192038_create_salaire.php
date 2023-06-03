<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaires', function (Blueprint $table) {

            $table->bigIncrements('salaire_id');
            $table->string('nature_salaire');
            $table->integer('montant_salaire');
            $table->date('date_salaire');
            $table->date('periode_salaire');
            $table->integer('bonus_salaire');
            $table->integer('avance_salaire');
            $table->timestamps();

            // $table->primary('salaire_id');


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
        Schema::dropIfExists('salaires');
    }
}
