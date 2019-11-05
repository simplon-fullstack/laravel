<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;

// NE PAS OUBLIER DE RAJOUTER CETTE LIGNE 
// POUR POUVOIR UTILISER LA VALIDATION
use Validator;
// NE PAS OUBLIER DE RAJOUTER CETTE LIGNE POUR UTILISATION Auth
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function rechercher (Request $request)
    {
        $tabAssoJson = [];

        // DEBUG
        $tabAssoJson["request"] = $request->all();

        // https://laravel.com/docs/5.7/validation#available-validation-rules
        // https://laravel.com/docs/5.7/validation#a-note-on-optional-fields
        $validator = Validator::make($request->all(), [
            'codePostal'      => 'required|min:5|max:5',
            'dateDebut'       => 'nullable|date_format:Y-m-d',   // OPTIONNEL
            'dateFin'         => 'nullable|date_format:Y-m-d',   // OPTIONNEL
        ]);

        if ($validator->fails()) 
        {
            // ERREUR DANS LES INFOS RECUES
            // https://laravel.com/docs/5.8/validation#quick-displaying-the-validation-errors
            $tabAssoJson["confirmation"] = $validator->errors()->all();
        }
        else
        {
            // ON VA RECHERCHER LA LISTE DES ANNONCES 
            // QUI CORRESPONDENT AUX CRITERES DE RECHERCHE
            // UNE FOIS QU'ON A LES RESULTATS
            // ON VA LES RENVOYER DANS LE TABLEAU ASSOCIATIF
            // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
            // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
            // https://laravel.com/docs/6.x/queries#where-clauses

            // CODE BASIQUE SUR DIFFERENTS SCENARIOS POSSIBLES
            $codePostal = $request->input("codePostal");
            $dateDebut  = $request->input("dateDebut");
            $dateFin    = $request->input("dateFin");

            // ON NE VEUT QUE LES EVENEMENTS FUTURS
            $dateJour  = date("Y-m-d");

            // ON A codePostal MAIS NI dateDebut NI dateFIN
            if (($dateDebut == null) && ($dateFin == null))
            {
                $tabAnnonce = \App\Annonce
                // ON FILTRE SUR user_id POUR OBTENIR 
                // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                ::where([
                    [ "codePostal",     "=", $codePostal],
                    [ "dateEvenement",  ">=", $dateJour],
                ])
                ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                ->get();                 // JE VEUX OBTENIR LES RESULTATS

                $tabAssoJson["annonces"] = $tabAnnonce; 
            }
            // ON A TOUTES LES CRITERES DE RECHERCHE
            if (($dateDebut != null) && ($dateFin != null))
            {
                // https://laravel.com/docs/5.7/queries#where-clauses
                $tabAnnonce = \App\Annonce
                // ON FILTRE SUR user_id POUR OBTENIR 
                // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                ::where([
                    [ "codePostal",     "=", $codePostal],
                    [ "dateEvenement",  ">=", $dateJour],
                    [ "dateEvenement",  ">=", $dateDebut],
                    [ "dateEvenement",  "<=", $dateFin],
                ])
                ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                ->get();                 // JE VEUX OBTENIR LES RESULTATS

                $tabAssoJson["annonces"] = $tabAnnonce; 

            }
            // ON A QUE dateDebut
            if (($dateDebut != null) && ($dateFin == null))
            {
                // https://laravel.com/docs/5.7/queries#where-clauses
                $tabAnnonce = \App\Annonce
                // ON FILTRE SUR user_id POUR OBTENIR 
                // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                ::where([
                    [ "codePostal",     "=", $codePostal],
                    [ "dateEvenement",  ">=", $dateJour],
                    [ "dateEvenement",  ">=", $dateDebut],
                ])
                ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                ->get();                 // JE VEUX OBTENIR LES RESULTATS

                $tabAssoJson["annonces"] = $tabAnnonce; 
            }
            // ON A QUE dateFin
            if (($dateDebut == null) && ($dateFin != null))
            {
                // https://laravel.com/docs/5.7/queries#where-clauses
                $tabAnnonce = \App\Annonce
                // ON FILTRE SUR user_id POUR OBTENIR 
                // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                ::where([
                    [ "codePostal",     "=", $codePostal],
                    [ "dateEvenement",  ">=", $dateJour],
                    [ "dateEvenement",  "<=", $dateFin],
                ])
                ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                ->get();                 // JE VEUX OBTENIR LES RESULTATS

                $tabAssoJson["annonces"] = $tabAnnonce; 

            }
                
        }
        return $tabAssoJson;
        // COOL AVEC LARAVEL 
        // => LARAVEL TRANSFORME LE TABLEAU ASSOCIATIF PHP EN TEXTE JSON
        // (fonction PHP json_encode)
    }

    public function deconnexion ()
    {
        // https://laravel.com/docs/5.8/authentication#included-authenticating
        Auth::logout();
        // https://laravel.com/docs/6.x/redirects
        return redirect('/');
    }

    // CETTE METHODE SERT A PROTEGER L'ACCES A L'ESPACE MEMBRE
    public function afficherEspaceMembre ()
    {
        // ICI ON VA VERIFIER SI LE VISITEUR EST CONNECTE
        // SI IL EST CONNECTE ET QU'IL A LE level >= 10
        // DANS CE CAS IL PEUT ACCEDER A LA PAGE D'ESPACE MEMBRE
        // SINON ON VA LE REDIRIGER VERS LA PAGE DE /login

        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();

        if ($utilisateurConnecte != null 
                && $utilisateurConnecte->level >= 10)
        {
            return view('espace-membre');
        }
        else
        {
            // https://laravel.com/docs/6.x/redirects
            return redirect('/login');
        }
    }

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


    public function supprimer (Request $request)
    {
        // ICI ON DOIT TRAITER LE FORMULAIRE DE CREATE
        // ...
        // ON VA RENVOYER DU FORMAT JSON
        // EN PHP, ON VA UTILISER UN TABLEAU ASSOCIATIF
        $tabAssoJson = [];
        $tabAssoJson["test"] = date("Y-m-d H:i:s");

        // ON DOIT VERIFIER SI L'UTILISATEUR CONNECTE 
        // A LE DROIT DE CREER DES ANNONCES
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();

        if ($utilisateurConnecte != null && $utilisateurConnecte->level >= 10)
        {
            $validator = Validator::make($request->all(), [
                'id'      => 'required|numeric',
            ]);
            if ($validator->fails()) 
            {
                // CAS OU IL Y A DES ERREURS
                $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
                $tabAssoJson["confirmation"] = "IL Y A DES ERREURS";
            }
            else
            {
                // IL FAUT RECUPERER L'ID
                // A PARTIR DE L'ID, JE VAIS RETROUVER L'ANNONCE (READ)
                // IL FAUT VERIFIER SI L'ANNONCE APPARTIENT BIEN AU MEMBRE CONNECTE
                $id = $request->input("id");
                // AVEC LARAVEL, ON A UNE METHODE find QUI PERMET DE CHERCHER AVEC id
                // https://laravel.com/docs/6.x/queries#retrieving-results
                $annonce = Annonce::find($id);
                if ($annonce) 
                {
                    // ON A TROUVE UNE ANNONCE AVEC CET id
                    if ($annonce->user_id == $utilisateurConnecte->id)
                    {
                        // OK L'ANNONCE A ETE CREE PAR LE MEMEBRE CONNECTE
                        // https://laravel.com/docs/6.x/eloquent#deleting-models
                        $annonce->delete();

                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "L'ANNONCE A ETE SUPPRIMEE"; 
                    }
                    else
                    {
                        // KO UN MEMBRE ESSAIE D'EFFACER UNE ANNONCE QUI NE LUI APPARTIENT PAS
                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "CETTE ANNONCE NE VOUS APPARTIENT PAS"; 
                    }

                }

                // ASTUCE: MEME SI id EST MAUVAIS
                // ON VA QUAND MEME RENVOYER LA LISTE

                // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
                // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
                // https://laravel.com/docs/6.x/queries#where-clauses
                $tabAnnonce = \App\Annonce
                        // ON FILTRE SUR user_id POUR OBTENIR 
                        // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                        ::where("user_id", "=", $utilisateurConnecte->id)
                        ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                        ->get();                 // JE VEUX OBTENIR LES RESULTATS
                $tabAssoJson["annonces"] = $tabAnnonce; 
            }
        }

        return $tabAssoJson;
        // NOTE: CE SERA LARAVEL QUI VA TRANSFORMER 
        // LE TABLEAU ASSOCIATIF EN JSON
    }

    // METHODE APPELEE POUR LA MODIFICATION D'UNE ANNONCE 
    public function modifier(Request $request)
    {
        // ICI ON DOIT TRAITER LE FORMULAIRE DE CREATE
        // ...
        // ON VA RENVOYER DU FORMAT JSON
        // EN PHP, ON VA UTILISER UN TABLEAU ASSOCIATIF
        $tabAssoJson = [];
        $tabAssoJson["test"] = date("Y-m-d H:i:s");

        // ON DOIT VERIFIER SI L'UTILISATEUR CONNECTE 
        // A LE DROIT DE CREER DES ANNONCES
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();

        if ($utilisateurConnecte != null && $utilisateurConnecte->level >= 10)
        {
            // IL FAUDRA RAJOUTER UN TEST SUPPLEMENTAIRE SUR LE level
            // level >= 10
            
            // debug
            $tabAssoJson["utilisateurConnecte"] = $utilisateurConnecte;
            
            // SECURITE: ICI ON DOIT VERIFIER QUE LES INFOS SONT CORRECTES
            // ON DOIT RECUPERER LES INFOS ENVOYEES PAR LE NAVIGATEUR        
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL annonces
            // https://laravel.com/docs/5.7/validation#manually-creating-validators
            // https://laravel.com/docs/5.7/validation#available-validation-rules

            $validator = Validator::make($request->all(), [
                'id'        => 'required|numeric|min:1',
                'titre'     => 'required|max:160',
                'contenu'   => 'required',
                'photo'     => 'image',         // OPTIONNEL
                'adresse'   => 'required|max:160',
                'categorie' => 'required|max:160',
                'prix'      => 'required|numeric|min:0|max:2000000',
            ]);

            if ($validator->fails()) 
            {
                // CAS OU IL Y A DES ERREURS
                $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
                $tabAssoJson["confirmation"] = "IL Y A DES ERREURS";
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
                $tabInput = $request->only([
                    "titre", "contenu", "adresse", "categorie", "prix"
                ]);
                // JE DOIS TRAITER L'UPLOAD A PART
                // https://laravel.com/docs/5.8/filesystem#file-uploads
                $photoQuarantaine = $request->file("photo");
                if ($photoQuarantaine) {
                    // SI IL Y A UNE PHOTO (OPTIONNELLE)
                    $photo = $photoQuarantaine->store("public/photos");
                    // JE NE CHANGE LA PHOTO QUE SI ON EN A UPLOADE UNE NOUVELLE
                    $tabInput["photo"] = str_replace("public/", "storage/", $photo);
                }

                // ON A BESOIN DE id POUR SAVOIR QUELLE LIGNE IL FAUT MODIFIER

                // ON VA AJOUTER L'INFO DU user_id
                $tabInput["user_id"] = $utilisateurConnecte->id;

                // IL FAUT VERIFIER SI L'ANNONCE APPARTIENT BIEN AU MEMBRE CONNECTE
                $id = $request->input("id");
                // AVEC LARAVEL, ON A UNE METHODE find QUI PERMET DE CHERCHER AVEC id
                // https://laravel.com/docs/6.x/queries#retrieving-results
                $annonce = Annonce::find($id);
                if ($annonce) 
                {
                    // ON A TROUVE UNE ANNONCE AVEC CET id
                    if ($annonce->user_id == $utilisateurConnecte->id)
                    {
                        // OK L'ANNONCE A ETE CREE PAR LE MEMBRE CONNECTE
                        // https://laravel.com/docs/6.x/eloquent#updates
                        // UN PEU COMME POUR create, 
                        // ON DONNE LES NOUVELLES VALEURS DANS UN TABLEAU ASSOCIATIF
                        $annonce->fill($tabInput);

                        // POUR ENREGISTRER DANS LA TABLE SQL
                        $annonce->save();

                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "L'ANNONCE A ETE MODIFIEE"; 
                    }
                    else
                    {
                        // KO UN MEMBRE ESSAIE D'EFFACER UNE ANNONCE QUI NE LUI APPARTIENT PAS
                        // RENVOYER UNE CONFIRMATION
                        $tabAssoJson["confirmation"] = "CETTE ANNONCE NE VOUS APPARTIENT PAS"; 
                    }
                }
            }

            // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
            // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
            // https://laravel.com/docs/6.x/queries#where-clauses
            $tabAnnonce = \App\Annonce
                    // ON FILTRE SUR user_id POUR OBTENIR 
                    // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                    ::where("user_id", "=", $utilisateurConnecte->id)
                    ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                    ->get();                 // JE VEUX OBTENIR LES RESULTATS
            $tabAssoJson["annonces"] = $tabAnnonce; 
        }
        else
        {
            // ERREUR
            // IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE
            $tabAssoJson["erreur"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE";
            $tabAssoJson["confirmation"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE";
        }



        return $tabAssoJson;
        // NOTE: CE SERA LARAVEL QUI VA TRANSFORMER 
        // LE TABLEAU ASSOCIATIF EN JSON
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

        // ON DOIT VERIFIER SI L'UTILISATEUR CONNECTE 
        // A LE DROIT DE CREER DES ANNONCES
        // https://laravel.com/docs/5.8/authentication#retrieving-the-authenticated-user
        $utilisateurConnecte = Auth::user();

        if ($utilisateurConnecte != null && $utilisateurConnecte->level >= 10)
        {
            // IL FAUDRA RAJOUTER UN TEST SUPPLEMENTAIRE SUR LE level
            // level >= 10
            
            // debug
            $tabAssoJson["utilisateurConnecte"] = $utilisateurConnecte;
            

            // SECURITE: ICI ON DOIT VERIFIER QUE LES INFOS SONT CORRECTES
            // ON DOIT RECUPERER LES INFOS ENVOYEES PAR LE NAVIGATEUR        
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL annonces
            // https://laravel.com/docs/5.7/validation#manually-creating-validators
            // https://laravel.com/docs/5.7/validation#available-validation-rules

            $validator = Validator::make($request->all(), [
                'titre'     => 'required|max:160',
                'contenu'   => 'required',
                'photo'     => 'required|image', // SECURITE: PAS DE FICHIER PHP
                'adresse'   => 'required|max:160',
                'categorie' => 'required|max:160',
                'prix'      => 'required|numeric|min:0|max:2000000',
            ]);

            if ($validator->fails()) 
            {
                // CAS OU IL Y A DES ERREURS
                $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
                $tabAssoJson["confirmation"] = "IL Y A DES ERREURS";
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
                $tabInput = $request->only([
                    "titre", "contenu", "adresse", "categorie", "prix"
                ]);

                
                // JE DOIS TRAITER L'UPLOAD A PART
                // https://laravel.com/docs/5.8/filesystem#file-uploads
                $photo = $request->file("photo")->store("public/photos");
                // LARAVEL VA CREER LE DOSSIER storage/app/public/photos/
                // ET LARAVEL VA CREER UN NOM DE FICHIER ALEATOIRE
                // IL FAUT LANCER LA LIGNE DE COMMANDE
                // php artisan storage:link
                // CETTE COMMANDE VA CREER UN RACCOURCI (lien symbolique)
                // ENTRE storage/app/public/
                // ET public/storage/
                $tabInput["photo"] = str_replace("public/", "storage/", $photo);
                
                
                // ON VA AJOUTER L'INFO DU user_id
                $tabInput["user_id"] = $utilisateurConnecte->id;
                // COMPLETER AVEC dateEvenement
                $tabInput["dateEvenement"] = date("Y-m-d");
                $tabInput["codePostal"] = "13013";

                Annonce::create($tabInput);

                // RENVOYER UNE CONFIRMATION
                $tabAssoJson["confirmation"] = "VOTRE ANNONCE EST PUBLIEE"; 
            }

            // JE VAIS RENVOYER LA LISTE DES ANNONCES DE CET UTILISATEUR
            // IL FAUT FAIRE UNE REQUETE READ AVEC UN FILTRE
            // https://laravel.com/docs/6.x/queries#where-clauses
            $tabAnnonce = \App\Annonce
                    // ON FILTRE SUR user_id POUR OBTENIR 
                    // SEULEMENT LES ANNONCES DE L'UTILSATEUR CONNECTE
                    ::where("user_id", "=", $utilisateurConnecte->id)
                    ->latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                    ->get();                 // JE VEUX OBTENIR LES RESULTATS
            $tabAssoJson["annonces"] = $tabAnnonce; 

        }
        else
        {
            // ERREUR
            // IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE
            $tabAssoJson["erreur"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE";
            $tabAssoJson["confirmation"] = "IL FAUT ETRE CONNECTE POUR PUBLIER UNE ANNONCE";
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
        // ICI ON DEVRAIT TRAITER LE FORMULAIRE DE DELETE
    }
}
