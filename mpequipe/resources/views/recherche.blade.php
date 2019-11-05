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
    <div id="app">

<header>
        <h1>MON SITE MARKETPLACE</h1>
        <nav>
            <ul>
                <li><a href="<?php echo url('/') ?>">accueil</a></li>
                <li><a href="<?php echo url('/annonces') ?>">annonces</a></li>
                <li><a href="<?php echo url('/recherche') ?>">recherche</a></li>
                <li><a href="<?php echo url('/register') ?>">inscription</a></li>
                <li><a href="<?php echo url('/espace-membre') ?>">espace membre</a></li>
                <li><a href="<?php echo url('/galerie') ?>">galerie</a></li>
                <li><a href="<?php echo url('/contact') ?>">contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h3>FORMULAIRE DE RECHERCHE DES ANNONCES</h3>
            <form @submit.prevent="rechercherAjax" action="">
                <input type="text" name="codePostal" required placeholder="entrez un code postal">
                <button type="submit">LANCER LA RECHERCHE</button>
                <!-- PROTECTION DE LARAVEL CONTRE LES ATTAQUES CSRF -->
                <!-- Sécurité: Cross Site Request Forgery -->
                @csrf
            </form>
        </section>
        <section v-if="annonces.length > 0">
            <h3>RESULTATS DE RECHERCHE DES ANNONCES</h3>
            <div class="listeAnnonce">
                <article v-for="annonce in annonces">
                    <img :src="annonce.photo">
                    <h5>@{{ annonce.categorie }} | @{{ annonce.prix }} euros</h5>
                    <h4>@{{ annonce.titre }}</h4>
                    <p>@{{ annonce.contenu }}</p>
                    <h5>@{{ annonce.id }}</h5>
                </article>
            </div>
        </section>

        <section v-if="annonces.length == 0" >
            <h3>LISTE INITIALE DES ANNONCES</h3>
            <div class="listeAnnonce">
<?php
// ON VA AFFICHER DES ANNONCES AVEC PHP
// ON VA FAIRE UN READ SUR LA TABLE SQL annonces
// AVEC Laravel, ON PASSE PAR LA CLASSE Annonce

// trop basique 
// car on obtient la liste pat id croissant
// $tabAnnonce = \App\Annonce::all();
$tabAnnonce = \App\Annonce
                    ::latest("updated_at")   // CONSTRUCTION DE LA REQUETE
                    ->get();                 // JE VEUX OBTENIR LES RESULTATS

// debug
// print_r($tabAnnonce);
foreach($tabAnnonce as $annonce)
{
    // LES COLONNES SONT DES PROPRIETES 
    // DES OBJETS DE LA CLASSE Annonce
    echo
<<<CODEHTML
<article>
    <img src="{$annonce->photo}">
    <h5>{$annonce->categorie} | {$annonce->prix} euros</h5>
    <h4>{$annonce->titre}</h4>
    <p>{$annonce->contenu}</p>
    <h5>{$annonce->id}</h5>
</article>
CODEHTML;
}
?>
            </div>
        </section>
    </main>
    <footer>
        @{{ message }}
        <p>tous droits réservés - &copy;2019</p>
    </footer>
        </div><!-- FIN DU CONTAINER POUR VUEJS -->

    <!-- JE CHARGE LE CODE DE VUEJS -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    // MAINTENANT JE PEUX UTILISER VUEJS
    var app = new Vue({
  el: '#app',
  methods: {
    rechercherAjax: function (event) {
        // debug
        // event.target CONTIENT LA BALISE form
        console.log(event.target);

        // ON VA RECUPERER LES INFOS DU FORMULAIRE
        var formData = new FormData(event.target);
        // ET ENSUITE ON VA LANCER UNE REQUETE AJAX AVEC fetch
        // POUR RECUPERER LA LISTE DES RESULTATS DE RECHERCHE
        // JE DOIS CREER UNE ROUTE AVEC CETTE URL /annonce/rechercher
        // POUR TRAITER LA REQUETE AJAX
        fetch('annonce/rechercher', {
            method: 'POST',
            body: formData  // TRANSMET LES INFOS DU FORMULAIRE DANS LA REQUETE AJAX
        })
        .then(function(response) {
            // CONVERTIT LA REPONSE DU SERVEUR EN OBJET JSON 
            return response.json(); 
        })
        .then(function(objetJSON) {
            // ON PEUT MANIPULER UN OBJET JS
            console.log(objetJSON);
            // AVEC VUEJS JE CENTRALISE LES INFOS DANS DES VARIABLES VUEJS
            if (objetJSON.annonces && app.annonces) {
                // JE GARDE LA LISTE DES RESULTATS DANS UNE VARIABLE VUEJS
                app.annonces = objetJSON.annonces;
            }
        });
    }
  },
  data: {
    annonces: [],       // MA VARIABLE VUEJS QUI GARDE EN MEMOIRE LA LISTE DES ANNONCES
    message: 'Hello Vue !'
  }
})
    </script>

</body>
</html>