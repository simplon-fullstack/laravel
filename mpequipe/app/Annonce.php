<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    // PROPRIETES D'OBJET
    protected $fillable = [
        "titre", "contenu", "photo", "adresse", "categorie", "prix"
    ];

}
