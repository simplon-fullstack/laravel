<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

// NE PAS OUBLIER DE RAJOUTER CETTE LIGNE 
// POUR POUVOIR UTILISER LA VALIDATION
use Validator;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // READ LISTE
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CREATE
        // JE DOIS FAIRE LE TRAITEMENT DU FORMULAIRE
        // ET RENVOYER DU JSON

        // EN PHP, SI JE PASSE PAR UN TABLEAU ASSOCIATIF
        // JE PEUX TRANSFORMER LE TABLEAU ASSOCIATIF EN JSON
        $tabAssoJson = [];

        // JE REMPLIS LE TABLEAU ASSOCIATIF 
        // AVEC LES INFOS A RENVOYER AU NAVIGATEUR
        $tabAssoJson["infoNavigateur"] = date("Y-m-d H:i:s");


        // SI JE VEUX TRAITER LE FORMULAIRE
        // ON VEUT VERIFIER SI L'EMAIL A LA FORME D'UN EMAIL
        // ET ON VEUT QUE L'EMAIL SOIT UNIQUE
        // https://laravel.com/docs/5.7/validation#manually-creating-validators
        // https://laravel.com/docs/5.7/validation#available-validation-rules
        // LES CLES SONT LES ATTRIBUTS name DANS LE HTML
        // <input name="email">
        // <input name="nom">
        // => ICI ON FAIT LES CONTROLES DE SECURITE
        // => CONTROLLER DANS MVC
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters|max:160',
            'nom'   => 'required|max:160',
        ]);

        if ($validator->fails()) 
        {
            // IL Y A DES ERREURS
            $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
        }
        else
        {
            // C'EST OK
            // JE DOIS RECUPERER LES INFOS ENVOYEES PAR LE NAVIGATEUR
            // nom
            // email
            $nom = $request->input("nom");
            $email = $request->input("email");

            
            $tabAssoColonneValeur = [
                "nom"   => $nom,
                "email" => $email,
            ];

            // DEBUG
            $tabAssoJson["debugForm"] = $tabAssoColonneValeur;

            // JE VEUX INSERER UNE LIGNE DANS LA TABLE SQL newsletters
            // IL FAUT AVOIR AJOUTE UNE PROPRIETE
            // DANS LA CLASSE Newsletter.php
            // LA METHODE create VIENT DE LA CLASSE PARENTE Model
            Newsletter::create($tabAssoColonneValeur);
        }


        // ON PEUT RENVOYER LE TABLEAU ASSOCIATIF
        // ET LARAVEL VA LE TRANSFORMER EN JSON => COOL
        return $tabAssoJson;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        // READ D'UNE LIGNE
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        // UPDATE
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        // DELETE
    }
}
