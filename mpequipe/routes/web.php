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

Route::view('/espace-membre', 'espace-membre');
Route::view('/espace-admin', 'espace-admin');
