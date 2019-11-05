<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
html, body {
    width:100%;
    height:100%;
    font-size:16px;
    margin:0;
    padding:0;
}    

* {
    /* https://developer.mozilla.org/fr/docs/Web/CSS/box-sizing */
    box-sizing:border-box;
}    

section {
    padding:0.5rem;
}
form {
    padding:0.2rem;
}
form input, form textarea, form button {
    display:block;
    padding:0.2rem;
    margin:0.25rem;
    min-width:280px;
    width:100%;
    max-width:640px;
    font-family:monospace;
}
@media screen and (min-width: 425px) {
    .listeAnnonce {
        display:flex;
        width:100%;
        flex-wrap:wrap;
    }
    .listeAnnonce article {
        margin:0.25rem;
        padding:0.5rem;
        width:calc(100% /2 - 0.5rem);
        border:1px #aaaaaa solid;
    }
}

@media screen and (min-width: 768px) {
    .listeAnnonce article {
        width:calc(100% /3 - 0.5rem);
    }
}

.listeAnnonce article img {
    width:100%;
    height:200px;
    object-fit:cover;
}
.lightbox {
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(100,100,100,0.8);
    overflow:auto;
}
.lightbox img {
    width:150px;
    height:150px;
    object-fit:cover;
}
    </style>
</head>
<body>
<header>
        <h1>MON SITE MARKETPLACE</h1>
        <nav>
            <ul>
                <li><a href="<?php echo url('/') ?>">accueil</a></li>
                <li><a href="<?php echo url('/annonces') ?>">annonces</a></li>
                <li><a href="<?php echo url('/register') ?>">inscription</a></li>
                <li><a href="<?php echo url('/espace-membre') ?>">espace membre</a></li>
                <li><a href="<?php echo url('/galerie') ?>">galerie</a></li>
                <li><a href="<?php echo url('/contact') ?>">contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h3>LISTE DES ANNONCES</h3>
            <div class="listeAnnonce">
<?php
// ON VA AFFICHER DES ANNONCES AVEC PHP
// ON VA FAIRE UN READ SUR LA TABLE SQL annonces
// AVEC Laravel, ON PASSE PAR LA CLASSE Annonce

// trop basique 
// car on obtient la liste pat id croissant
// $tabAnnonce = \App\Annonce::all();
/*
// https://laravel.com/docs/4.2/queries#joins
// ON PEUT FAIRE UNE JOINTURE AVEC users
// ON FAIT UNE SEULE REQUETE 
// ET DANS LES RESULTATS LES COLONNES DE users 
// SONT COMME DES COLONNES DE annonces
// (NOTE: ON FAIT UN INNER JOIN CE QUI ENLEVE LES ANNONCES SANS USER)
$tabAnnonce = \App\Annonce
                    ::join('users', 'users.id', '=', 'annonces.user_id')
                    ->latest("annonces.updated_at")   // CONSTRUCTION DE LA REQUETE
                    ->get();                 // JE VEUX OBTENIR LES RESULTATS
*/

// METHODE LARAVEL : EAGER LOADING
// https://laravel.com/docs/4.2/eloquent#eager-loading
// LARAVEL FAIT 2 REQUETES (SANS JOINTURE)
// REQUETE1: LARAVEL RECUPERE LES ANNONCES ET LARAVEL MEMORISE LA LISTE DES user_id
// REQUETE2: LARAVEL RECUPERE LES USERS AVEC LA LISTE DES user_id
// IL FAUT AJOUTER LA RELATION ONE-TO-MANY DANS LA CLASSE Annonce
// CHOIX PAS OPTIMAL MAIS TRES EFFICACE (BON CONPROMIS)
// ORM => ON VA NAVIGUER ENTRE OBJETS
// DEPSUI $annonce
// ON PEUT PASSER SUR UN OBJET user QUI CONTIENT LES INFOS DE L'AUTEUR DE L'ANNONCE
// $annonce->user  
use App\User;

$tabAnnonce = \App\Annonce
                    ::with('user')
                    ->latest("annonces.updated_at")   // CONSTRUCTION DE LA REQUETE
                    ->get();                 // JE VEUX OBTENIR LES RESULTATS

// debug
// print_r($tabAnnonce);
foreach($tabAnnonce as $annonce)
{
    // CHOIX PAS EFFICACE DU TOUT (CAR DANS UNE BOUCLE)
    // POUR CHAQUE ANNONCE, JE FAIS UNE REQUETE SUPPLEMENTAIRE 
    // POUR RECUPERER LES INFOS SUR User
    $auteur = App\User::find($annonce->user_id);

    // LES COLONNES SONT DES PROPRIETES 
    // DES OBJETS DE LA CLASSE Annonce

    // sécurité dans le cas où il n'y a pas de user
    $name = $auteur->name ?? "";
    $nameJointure = $annonce->name ?? "";
    $nameEager = $annonce->user ? $annonce->user->name : "";

    echo
<<<CODEHTML
<article>
    <img src="{$annonce->photo}">
    <h5>{$annonce->categorie} | {$annonce->prix} euros</h5>
    <h4>{$annonce->titre}</h4>
    <p>{$annonce->contenu}</p>
    <h5>{$annonce->id}</h5>
    <h5>user_id: {$annonce->user_id}</h5>
    <h5>name: {$name}</h5>
    <h5>name par jointure: {$nameJointure}</h5>
    <h5>name par eager: {$nameEager}</h5>

</article>
CODEHTML;
}
?>
            </div>
        </section>
    </main>
    <footer>
        <p>tous droits réservés - &copy;2019</p>
    </footer>
</body>
</html>