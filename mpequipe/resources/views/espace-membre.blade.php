<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
form input, form textarea {
    display:block;
    padding:0.2rem;
    margin:0.25rem;
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
    <form method="POST" action="annonce/store">
        <input type="text" name="titre" required placeholder="entrez votre titre">
        <textarea name="contenu" required placeholder="entrez votre contenu"></textarea>
        <input type="text" name="photo" required placeholder="entrez votre URL DE photo">
        <input type="text" name="adresse" required placeholder="entrez votre adresse">
        <input type="text" name="categorie" required placeholder="entrez votre categorie">
        <input type="number" name="prix" required placeholder="entrez votre prix">
        <button type="submit">PUBLIER UNE ANNONCE</button>
        <!-- RACCOURCI BLADE POUR AJOUTER UN CHAMP HIDDEN -->
        @csrf
    </form>
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
  data: {
    message: 'Hello Vue !'
  }
});
    </script>
</body>
</html>