<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;

// NE PAS OUBLIER DE RAJOUTER CETTE LIGNE 
// POUR POUVOIR UTILISER LA VALIDATION
use Validator;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // READ LISTE
        // JE VEUX OBTENIR LA LISTE DES ANNONCES
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // LA METHODE QUI DEVRAIT CREER LE FORMULAIRE DE CREATE
        // NOUS N'AVONS PAS UTILISE CE MOYEN...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ICI ON DOIT TRAITER LE FORMULAIRE DE CREATE
        // ...
        // ON VA RENVOYER DU FORMAT JSON
        // EN PHP, ON VA UTILISER UN TABLEAU ASSOCIATIF
        $tabAssoJson = [];
        $tabAssoJson["test"] = date("Y-m-d H:i:s");

        // SECURITE: ICI ON DOIT VERIFIER QUE LES INFOS SONT CORRECTES
        // ON DOIT RECUPERER LES INFOS ENVOYEES PAR LE NAVIGATEUR        
        // ON VA STOCKER LES INFOS DANS LA TABLE SQL annonces
        // https://laravel.com/docs/5.7/validation#manually-creating-validators
        // https://laravel.com/docs/5.7/validation#available-validation-rules

        $validator = Validator::make($request->all(), [
            'titre'     => 'required|max:160',
            'contenu'   => 'required',
            'photo'     => 'required|max:160',
            'adresse'   => 'required|max:160',
            'categorie' => 'required|max:160',
            'prix'      => 'required|numeric|min:0|max:2000000',
        ]);

        if ($validator->fails()) 
        {
            // CAS OU IL Y A DES ERREURS
            $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
        }
        else
        {
            // CAS OU TOUTES LES INFOS SONT CORRECTES
            // ON PEUT LES STOCKER DANS LA TABLE SQL annonces
            // https://laravel.com/docs/5.8/eloquent#mass-assignment
            // ATTENTION: NE PAS OUBLIER LE PARAMETRAGE OBLIGATOIRE AVANT DE FAIRE CE CODE
            // sinon erreur: Add [titre] to fillable property to allow mass assignment on [App\Annonce].
            // IL FAUT AJOUTER DU CODE DANS
            // app/Annonce.php
            Annonce::create($request->only([
                "titre", "contenu", "photo", "adresse", "categorie", "prix"
            ]));
        }




        return $tabAssoJson;
        // NOTE: CE SERA LARAVEL QUI VA TRANSFORMER 
        // LE TABLEAU ASSOCIATIF EN JSON
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        // READ POUR AFFICHER UNE ANNONCE
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        // DEVRAIT AFFICHER LE FORMULAIRE HTML POUR UPDATE
        // ON VA PLUTOT CODER EN HTML DIRECTEMENT
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        // ICI ON VA TRAITER LE FORMULAIRE DE UPDATE
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        // ICI ON DEVRAIT TRAITER LE FORMUALIRE DE DELETE
    }
}
