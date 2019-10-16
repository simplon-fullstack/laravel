<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->bigIncrements('id');
            // LARAVEL VA CREER LA COLONNE id COMME IL FAUT (INDEX=PRIMARY ET AUTO_INCREMENT)
            // => ON N'A PAS A S'EN OCCUPER
            
            // ICI ON VA DEFINIR LES COLONNES DE NOTRE TABLE SQL newsletters
            //      nom         VARCHAR(160)
            //      email       VARCHAR(160)
            $table->string('nom');
            $table->string('email');


            // CETTE LIGNE VA CREER 2 COLONNES
            // created_at       TIMESTAMP
            // updated_at       TIMESTAMP
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
        Schema::dropIfExists('newsletters');
    }
}
