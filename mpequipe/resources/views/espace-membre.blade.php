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
form input, form textarea {
    display:block;
    padding:0.2rem;
    margin:0.25rem;
}
.listeAnnonce {
    display:flex;
    width:100%;
    flex-wrap:wrap;
}
.listeAnnonce article {
    margin:0.25rem;
    padding:0.5rem;
    width:calc(100% /3 - 0.5rem);
    border:1px #aaaaaa solid;
}

.listeAnnonce article img {
    width:100%;
    max-height:200px;
    object-fit:cover;
}
.lightbox {
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.8);
    overflow:auto;
}
.lightbox img {
    max-width:300px;
    max-height:300px;
    object-fit:cover;
}
    </style>
</head>
<body>
    <div id="app">
        <header>
            <h1>ESPACE MEMBRE</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo url('/') ?>">accueil</a></li>
                    <li><a href="<?php echo url('/deconnexion') ?>">deconnexion</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <h3>FORMULAIRE DE CREATION D'UNE ANNONCE</h3>
    <!-- CONVENTION LARAVEL POUR LE CREATE action="annonce/store" -->
    <!-- SI FORM SANS AJAX ALORS NE PAS OUBLIER method="POST" et enctype="multipart/form-data" --> 
    <form @submit.prevent="envoyerFormAjax" method="POST" action="annonce/store" enctype="multipart/form-data">
        <input type="text" name="titre" required placeholder="entrez votre titre">
        <textarea name="contenu" required placeholder="entrez votre contenu"></textarea>
        <input type="file" name="photo" required placeholder="choisissez votre photo">
        <input type="text" name="adresse" required placeholder="entrez votre adresse">
        <input type="text" name="categorie" required placeholder="entrez votre categorie">
        <input type="number" name="prix" required placeholder="entrez votre prix">
        <button type="submit">PUBLIER UNE ANNONCE</button>
        <div class="confirmation">
        @{{ confirmation }}
        </div>
        <!-- RACCOURCI BLADE POUR AJOUTER UN CHAMP HIDDEN -->
        @csrf
    </form>
            </section>
            <section class="lightbox" v-if="annonceUpdate">
                <button @click="annonceUpdate = null">FERMER</button>
                <h3>FORMULAIRE DE MODIFICATION D'UNE ANNONCE</h3>
    <!-- CONVENTION LARAVEL POUR LE CREATE action="annonce/store" -->
    <!-- https://fr.vuejs.org/v2/guide/forms.html -->
    <form @submit.prevent="envoyerFormAjax" method="POST" action="annonce/modifier" enctype="multipart/form-data">
        <input type="text" v-model="annonceUpdate.titre" name="titre" required placeholder="entrez votre titre">
        <textarea name="contenu" v-model="annonceUpdate.contenu" required placeholder="entrez votre contenu"></textarea>
        <input type="file" name="photo" placeholder="choisissez votre photo">
        <img :src="annonceUpdate.photo">
        <input type="text" v-model="annonceUpdate.adresse" name="adresse" required placeholder="entrez votre adresse">
        <input type="text" v-model="annonceUpdate.categorie" name="categorie" required placeholder="entrez votre categorie">
        <input type="number"  v-model="annonceUpdate.prix" name="prix" required placeholder="entrez votre prix">
        <button type="submit">MODIFIER CETTE ANNONCE (id=@{{ annonceUpdate.id }})</button>
        <!-- ON UTILISE id POUR SELECTIONNER LA BONNE LIGNE SQL -->
        <input type="hidden" name="id"  v-model="annonceUpdate.id">
        <div class="confirmation">
        @{{ confirmation }}
        </div>
        <!-- RACCOURCI BLADE POUR AJOUTER UN CHAMP HIDDEN -->
        @csrf
    </form>
            </section>


            <section>
                <h3>LISTE DE MES ANNONCES</h3>
                <div class="listeAnnonce">
                    <article v-for="annonce in annonces">
                        <h4>@{{ annonce.titre }}</h4>
                        <p>@{{ annonce.contenu }}</p>
                        <img :src="annonce.photo">
                        <button @click.prevent="modifierAnnonce(annonce)">modifier</button>
                        <!-- COOL: AVEC VUEJS JE PEUX PASSER annonce COMME SI C'ETAIT UNE VARIABLE JS-->
                        <button @click.prevent="supprimerAnnonce(annonce)">supprimer</button>
                    </article>
                </div>
            </section>
        </main>
        <footer>
        <!-- IL Y A UN CONFLOT ENTRE BLADE ET VUEJS -->
        <!-- IL FAUT AJOUTER @ POUR QUE BLADE NE S'ACTIVE PAS SUR LES DELIMITEURS POUR VUEJS -->
            @{{ message }}
        </footer>
    </div><!-- fin du container #app -->

    <!-- CHARGER LE CODE DE VUEJS -->
    <!-- https://fr.vuejs.org/v2/guide/index.html -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
// ON PEUT ENSUITE COMMENCER A UTILISER VUEJS
var app = new Vue({
  el: '#app',
  // https://fr.vuejs.org/v2/guide/instance.html#Hooks-de-cycle-de-vie-d%E2%80%99une-instance
  mounted: function () {
      // SIMULE UNE FAUSSE SUPPRESSION
      // BRICOLAGE POUR OBTENIR L'AFFICHAGE
      this.supprimerAnnonce({ id: -1});
  },
  methods: {
      modifierAnnonce: function(annonce) {
        // debug
        console.log(annonce);
        // JE MEMORISE L'ANNONCE A MODIFIER DANS UNE VARIABLE VUEJS
        this.annonceUpdate = annonce;
      },
      supprimerAnnonce: function (annonce) {
        // debug
        console.log(annonce);
        // JE PEUX RECUPERER id A SUPPRIMER
        var formData = new FormData();
        // JE SIMULE EN JS LES INFOS DU FORMULAIRE
        formData.append('id', annonce.id);
        // sécurité laravel
        // https://laravel.com/docs/5.8/csrf#csrf-x-csrf-token
        formData.append('_token', '{{ csrf_token() }}');

        fetch('annonce/supprimer', {
            method: 'POST',
            body: formData
        })
        .then(function(reponse) {
              // ON CONVERTIT LE MESSAGE DE REPONSE EN OBJET JSON
              return reponse.json();
          })
        .then(function(reponseObjetJSON) {
            if (reponseObjetJSON.confirmation)
            {
                // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                app.confirmation = reponseObjetJSON.confirmation;
            }
            if (reponseObjetJSON.annonces)
            {
                // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                app.annonces = reponseObjetJSON.annonces;
            }
        });

      },
      envoyerFormAjax: function (event) {
          // debug
          console.log(event.target);
          // JE VEUX RECUPERER LES INFORMATIONS REMPLIES PAR LE MEMBRE
          var formData = new FormData(event.target);
          // JE REPRENDS L'URL DANS LE HTML
          var urlAction = event.target.getAttribute('action');
          // ET ON ENVOIE LES INFOS VERS LA MEME URL
          fetch(urlAction, {
              method: 'POST',
              body: formData
          })
          .then(function(reponse) {
              // ON CONVERTIT LE MESSAGE DE REPONSE EN OBJET JSON
              return reponse.json();
          })
          .then(function(reponseObjetJSON) {
                if (reponseObjetJSON.confirmation)
                {
                    // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                    app.confirmation = reponseObjetJSON.confirmation;
                }
                if (reponseObjetJSON.annonces)
                {
                    // ON VA STOCKER LA CONFORMATION DANS UNE VARIABLE VUEJS
                    app.annonces = reponseObjetJSON.annonces;
                }
          });
      }
  },
  data: {
      // ICI JE RAJOUTE LES VARIABLES GEREES PAR VUEJS
    annonceUpdate: null,  
    annonces: [],
    confirmation: 'ici on verra le message de confirmation',  
    message: 'Hello Vue !'
  }
});
    </script>
</body>
</html>