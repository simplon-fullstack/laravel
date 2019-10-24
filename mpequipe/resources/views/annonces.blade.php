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
}    

* {
    /* https://developer.mozilla.org/fr/docs/Web/CSS/box-sizing */
    box-sizing:border-box;
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
    width:calc(100% /3);
    padding:0.5rem;
    border:1px #aaaaaa solid;
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
    background-color:rgba(0,0,0,0.8);
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
        <p>tous droits réservés - &copy;2019</p>
    </footer>
</body>
</html>