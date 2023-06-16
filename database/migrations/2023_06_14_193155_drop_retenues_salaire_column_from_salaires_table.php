<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRetenuesSalaireColumnFromSalairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salaires', function (Blueprint $table) {
            $table->dropColumn('retenues_salaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salaires', function (Blueprint $table) {
            $table ->float('retenues_salaire');
        });
    }
}
