<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable 
    extends Migration           // ON HERITE DE LA CLASSE Migration
                                // FOURNIE PAR LARAVEL
                                // GRACE A L'HERITAGE
                                // ON PEUT AJOUTER NOTRE CODE 
                                // ET UTILISER LE CODE DE LARAVEL
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');    // LAVAREL VA GERER LA COLONNE id

            // AJOUTER LE CODE POUR CREER NOS COLONNES
            // https://laravel.com/docs/6.x/migrations#creating-columns
            /*
            DEFINIR LA TABLE SQL annonces
            id          BIGINT          INDEX=PRIMARY   A_I (LARAVEL LE FAIT POUR NOUS)
            titre       VARCHAR(191)
            contenu     TEXT
            photo       VARCHAR(191)
            adresse     VARCHAR(191)
            categorie   VARCHAR(191)
            prix        DECIMAL(10,2)
            */
            $table->string('titre');	
            $table->text('contenu');	
            $table->string('photo');	
            $table->string('adresse');	
            $table->string('categorie');	
            $table->decimal('prix', 10, 2);

            // https://laravel.com/docs/5.0/schema#foreign-keys
            // ON AJOUTE UNE COLONNE DE CLE ETRANGERE 
            // POUR LA RELATION ONE TO MANY	
            // AVEC LA TABLE SQL users
            $table->bigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();       // LARAVEL VA AJOUTER 2 COLONNE created_at ET updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
