<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');

            // https://laravel.com/docs/6.x/migrations#creating-columns            // JE RAJOUTE MES COLONNES
            // email    VARCHAR(191)
            // nom      VARCHAR(191)
            // message  TEXT
            $table->string("email");
            $table->string("nom");
            $table->text("message");

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
        Schema::dropIfExists('contacts');
    }
}
