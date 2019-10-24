<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
// CODE DE BASE CREE PAR LARAVEL
Route::get('/', function () {
    return view('welcome');
});
*/

// JE VAIS AJOUTER LES PAGES DE MON SITE
// https://laravel.com/docs/6.x/routing#view-routes
// LE PREMIER PARAMETRE DONNE L'URL QUI SERA UTILISEE PAR LE NAVIGATEUR
// LE 2E PARAMETRE DONNE LE TEMPLATE QUI SERA UTILISE PAR PHP POUR AFFICHER LA PAGE
Route::view('/contact', 'contact');

// POUR VOIR LA PAGE JE DOIS ALLER DANS LA NAVIGATEUR A CETTE URL
// http://localhost:81/simplon/mpequipe/public/contact
// ET LE CODE HTML EST DANS LE FICHIER
//      resources/views/contact.blade.php
Route::view('/galerie', 'galerie');

// SI JE VEUX CHANGER LA PAGE D'ACCUEIL
Route::view('/', 'accueil');

// JE VAIS RAJOUTER LES PAGES espace-membre ET espace-admin
// SI DANS LE NAVIGATEUR, LE VISITEUR VA SUR L'URL 
// .../public/espace-membre
// LAVAREL VA AFFICHER LE CODE DE 
// resources/views/espace-membre.blade.php

Route::view('/espace-admin', 'espace-admin');

// AVANT ON VAAIT UN ACCES DIRECT
// Route::view('/espace-membre', 'espace-membre');
// MAINTENANT ON VA PROTEGER L'ACCES
Route::any('/espace-membre', 'AnnonceController@afficherEspaceMembre');
// JE VAIS ME CREER MON LOGOUT
Route::any('/deconnexion', 'AnnonceController@deconnexion');

// https://laravel.com/docs/6.x/controllers#single-action-controllers
// any => GET ou POST
// ON ASSOCIE L'URL /newsletters/store
// A LA CLASSE NewsletterController 
// ET AVEC LA METHODE store 
Route::any('/newsletters/store', 'NewsletterController@store');

// POUR CREER LA ROUTE QUI VA GERER LE CRUS SUR LES ANNONCES
// CREATE
// any => ON PEUT UTILISER GET OU POST
// /annonce/store  => URL QUE LE NAVIGATEUR VA UTILISER
// AnnonceController => classe qui contient les codes PHP POUR LE CRUD SUR LA TABLE SQL annonces
// store        => LA METHODE DANS LA CLASSE AnnonceController QUE LARAVEL VA ACTIVER
Route::any('/annonce/store', 'AnnonceController@store');
// DELETE
Route::any('/annonce/supprimer', 'AnnonceController@supprimer');

Auth::routes();
// CETTE LIGNE DE CODE CREE PLUSIEURS URLS DE ROUTE
// /register                => INSCRIPTION D'UN NOUVEL UTILISATEUR
// /login                   => UN VISITEUR PEUT S'IDENTIFIER
// /logout                  => UN MEMBRE PEUT SE DECONNECTER
// /password/reset          => UN MEMBRE PEUT DEMANDER A RETROUVER SON MOT DE PASSE

Route::get('/home', 'HomeController@index')->name('home');


// ON VA AJOUTER LA PAGE /annonces 
// QUI VA AFFICHER LA LISTE DES ANNONCES
// ON VA UTILISER LE TEMPLATE 
// /resources/views/annonces.blade.php
Route::view('/annonces', 'annonces');
