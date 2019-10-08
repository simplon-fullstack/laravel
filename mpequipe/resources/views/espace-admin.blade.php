<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- TOUTE MA PAGE SERA GEREE AVEC VUEJS -->
    <div id="app">
        <header>
            <h1>ESPACE ADMIN</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo url('/') ?>">accueil</a></li>
                </ul>
            </nav>
        </header>
        <main>
<?php
// DANS LARAVEL, BLADE EST AUSSI UN MOTEUR DE TEMPLATE COTE SERVEUR
// ET BLADE UTILISE LES {{ }}
// POUR PRESERVER LES {{ }} POUR VUEJS
// => ON VA EN FAIT UTILISER @{{ }}
// => BLADE VA ENLEVER @
// => ET GARDER LES {{ }} POUR VUEJS
$coucou = "le texte à la place de coucou";
?> 
<h3>EN PHP: <?php echo $coucou ?></h3>   
<h3>AVEC BLADE/LARAVEL: {{ $coucou }}</h3>
<h3>AVEC VUEJS: @{{ coucou }}</h3>

        </main>  

    </div>

    <!-- on charge le code de vuejs -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- et ensuite je peux ajouter mon code js -->
    <script>
// ON GARDE LE CODE DANS LE HTML
// ET ENSUITE ON LE DEPLACERA DANS UN FICHIER A PART
var app = new Vue({
  el: '#app',       // vuejs va gérer toute la balise div#app
  data: {
    // ici on va rajouter nos variables gérées par vuejs
    coucou: 'le texte donné avec VueJS',  
    message: 'Hello Vue!'
  }
})

    </script>
</body>
</html>