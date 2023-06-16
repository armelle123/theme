<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('adresse');
            $table->integer('phone');
            $table->integer('is_active');
            $table->integer('idrole');
            $table->string('profile_photo_path')->nullable();
            $table->string('archived');
            $table->string('deleted');
             $table->string('poste');
             $table->integer('deleted_by');
            $table->datetime('deleted_at');
            $table->timestamps();
            // $table->primary('id');
           $table->unsignedBigInteger('departement_id');
           $table->unsignedBigInteger('poste_id');
          $table->foreign('departement_id')->references('departement_id')->on('departements')->onDelete('cascade');

          $table->foreign('poste_id')->references('poste_id')->on('postes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
