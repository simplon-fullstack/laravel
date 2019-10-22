# laravel

    Projet laravel

    * site officiel
    https://laravel.com/

    FRAMEWORK BACK
    FRAMEWORK PHP+MYSQL

    LIBRAIRIE ET ORGANISATION DU CODE
    * DOSSIERS ET FICHIERS AVEC DES NOMS PARTICULIERS
    * => CONVENTIONS DE NOMMAGE A RESPECTER

    PREMIERE VERSION EN 2011
    ET EN SEPTEMBRE 2019: LARAVEL 6 EST DISPONIBLE

    https://laravel-news.com/laravel-6

    Laravel 6.0 Is the New LTS

    Long Term Support
    => LES VERSIONS MINEURES ONT UNE DUREE DE VIE LIMITEE
    => (LE TEMPS DU SUPPORT DE LA COMMUNAUTE...)
    => ENVIRON 6 MOIS

    ALORS QUE LES VERSIONS LTS SERONT SUIVIES 2 ANS


    SemVer Semantic Versionning
    6.0.1
    6 => VERSION MAJEURE
    0 => VERSION MINEURE
    1 => VERSION DEBUG

    ATTENTION: SI ON CHANGE DE VERSION MAJEURE, IL SE PEUT QUE LE CODE CASSE... IL FAUT BIEN REGARDER CE QUI A CHANGE

    DEPRECATED => DEPRECIE => OBSOLETE


    FRAMEWORK POUR TRAVAIL EN EQUIPE
    MAIS AUSSI UTILISABLE TOUT SEUL

## DOCUMENTATION ET INSTALLATION

    https://laravel.com/docs/6.x

    POUR INSTALLER LARAVEL ON A BESOIN DE COMPOSER

    OUVRIR UN TERMINAL DANS VISUAL STUDIO CODE
    ET ENTRER LA LIGNE

    composer -v

    SI ON A MESSAGE D'ERREUR C'EST QUE IL FAUT INSTALLER COMPOSER

    POUR INSTALLER COMPOSER

    https://getcomposer.org/

    https://getcomposer.org/download/

    * SUR WINDOWS:
    https://getcomposer.org/Composer-Setup.exe


    DURANT L'INSTALLATION, 
    VOUS DEVEZ CHOISIR UNE VERSION DE PHP 7.3
    ALORS, AVEC XAMPP, CHERCHER LE FICHIER

        C:\xampp\php\php.exe

    (ENSUITE PAS DE PROXY A CHOISIR)

    UNE FOIS QUE L'INSTALLATION EST TERMINEE
    RETESTER LA LIGNE DE COMMANDE

    composer -v


    * SUR MAC, IL FAUT OUVRIR UNE APPLICATION terminal
    * OU DANS VISUAL STUDIO CODE, OUVRIR UN TERMINAL

    * ET ENSUITE LANCER CHAQUE LIGNE DE COMMANDE UNE PAR UNE

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

    php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"


    SUR MAC, IL SE PEUT QUE LES LIGNES DE COMMANDES PRODUISENT SEULEMENT UN FICHIER
    composer.phar

    ET IL FAUT LE DEPLACER DANS VOTRE DOSSIER laravel
    ENSUITE POUR UTILISER composer
    IL FAUDRA UTILISER php composer.phar AU LIEU DE composer


    * SUR WINDOWS 
    * DANS VISUAL STUDIO CODE OUVRIR UN TERMINAL
    * ET LANCER LA LIGNE DE COMMANDE SUIVANTE

        composer global require laravel/installer

    * SUR MAC
    * DANS VISUAL STUDIO CODE OUVRIR UN TERMINAL
    * ET LANCER LA LIGNE DE COMMANDE SUIVANTE

        php composer.phar global require laravel/installer

    * POUR INSTALLER UN NOUVEAU PROJET LARAVEL AVEC composer
    * ON PEUT LANCER LA LIGNE DE COMMANDE SUIVANTE
    * ATTENTION AU DOSSIER ACTUEL AVANT DE LANCER LA LIGNE DE COMMANDE

    * SUR WINDOWS

        composer create-project --prefer-dist laravel/laravel mpequipe

    * SUR MAC

        php composer.phar create-project --prefer-dist laravel/laravel mpequipe

    * UNE FOIS QUE L'INSTALLATION EST FINIE
    * ON DOIT AVOIR UN DOSSIER mpequipe
    * SI VOTRE CODE EST DANS simplon/mpequipe
    * ALORS DEMARRER LE SERVEUR WEB
    * ET DANS LE NAVIGATEUR VERIFIER QUE L'URL SUIVANTE AFFICHE UNE PAGE LARAVEL

    http://localhost/simplon/mpequipe/public/


## STRUCTURES DES DOSSIERS ET FICHIERS DU FRAME WORK

    * IL Y A PLEIN DE CODE
    * NE PAS TOUCHER SI VOUS NE SAVEZ PAS CE QUE VOUS FAITES

    https://laravel.com/docs/6.x/structure


## ROUTES DANS LARAVEL

    * POUR CREER DES PAGES AVEC LARAVEL, ON CREE DES ROUTES ET ON ASSOCIE CHAQUE ROUTE A UN TEMPLATE

    * POUR CREER DES PAGES, ON AJOUTE DES ROUTES DANS LE FICHIER

        routes/web.php

    * ON VA AJOUTER DU CODE PHP


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

## POUR LES MENUS ON A BESOIN DES URLS DES ROUTES

    https://laravel.com/docs/6.x/urls#generating-basic-urls

    <?php echo url("/") ?>

    <?php echo url("/galerie") ?>

    <?php echo url("/contact") ?>

## INSTALLER GIT EN LIGNE DE COMMANDE

    * ALLER SUR LE SITE git-scm.com

        https://git-scm.com/

    * ET TELECHARGER LE PROGRAMME POUR WINDOWS

        https://git-scm.com/download/win


    * PEUT-ETRE FERMER ET RELANCER VISUAL STUDIO CODE 

    * POUR UTILISER git EN LIGNE DE COMMANDE

## MARDI 08: LARAVEL

    * JE DEPLACE LE DOSSIER mpequipe DANS LE DOSSIER laravel
    * DANS LE NAVIGATEUR MON SITE SERA ACCESSIBLE AVEC CETTE URL

        http://localhost:81/simplon/laravel/mpequipe/public/

    * RESUME DES ETAPES POUR TRAVAILLER EN EQUIPE AVEC GIT ET LARAVEL

    * UN LEAD DEV QUI CREE LE REPOSITORY GITHUB
    * ENSUITE LE LEAD DEV CLONE LE REPOSITORY SUR SON ORIDNATEUR
    * ENSUITE LE LEAD DEV INSTALLE LARAVEL DANS LE DOSSIER CLONE
    * ET ENFIN LE LEAD DEV PUSH SUR LE REPOSITORY SON CODE
    * WARNING: 
    *       LARAVEL A DES FICHIERS .gitignore 
            QUI ENLEVE CERTAINS DOSSIERS ET FICHIERS DU REPOSITORY 
    * => LE REPOSITORY GITHUB A UN CODE INCOMPLET !!!
    * LES AUTRES DEV DE L'EQUIPE VONT FAIRE UN PULL POUR RECUPERER LE CODE DU REPOSITORY
    * => MAIS ILS N'AURONT PAS TOUT LE CODE
    *   (A CAUSE DU .gitignore...)
    * POUR COMPLETER CHAQUE INSTALLATION, CHAQUE DEV DOIT LANCER UNE COMMANDE DANS LE DOSSIER DE LARAVEL

    * SUR WINDOWS

        composer install

    * SUR MAC

        php composer.par install

    * NORMALEMENT, UNE FOIS LA COMMANDE TERMINEE
    * ON DOIT RETROUVER LES DOSSIERS ET FICHIERS MANQUANTS

        vendor/
        etc...

    EXPLICATION: LE DOSSIER vendor/ CONTIENT LE CODE POUR LES LIBRAIRIES PHP
    => VOUS N'AVEZ PAS A LES MODIFIER
    => IL N'Y A PAS BESOIN DE POLLUER LE REPOSITORY github AVEC CES CODES


    * ...ET IL MANQUE ENCORE LE FICHIER .env
    * COPIER LE FICHIER .env.example EN .env
    * ET QUAND ON ESSAIE D'AFFICHER LE SITE DANS LE NAVIGATEUR
    * UN MESSAGE D'ERREUR S'AFFICHE A PROPOS D'UNE API KEY MANQUANTE
    * => ET IL Y A UN BOUTON POUR LE CREER
    * APPUYER SUR LE BOUTON
    * => CELA DOIT MODIFIER LE FICHIER .env 
    *       ET AJOUTER LE CODE MANQUANT 


## STRATEGIES DE TRAVAIL EN EQUIPE

    POUR LES DEBUTANTS, IL EST CONSEILLE DE TRAVAILLER D'ABORD DANS SON COIN POUR NE PAS PROPAGER LES BUGS A TOUT LE MONDE

    => POUR LES MAQUETTES, IL EST PREFERABLE DE GARDER TOUT LE CODE HTML, CSS ET JS POUR CHAQUE DEV
    => ET SEULEMENT QUAND LE CODE EST STABLE (CA MARCHE BIEN...)
    => ALORS ON VA MERGER LES CODES DANS DES FICHIERS COMMUNS

    => PEUT-ETRE QU'IL FAUT CREER DES FICHIERS POUR CHAQUE DEV


    POUR GIT, LE PLUS SIMPLE EST DE TRAVAILLER SANS BRANCHE DIRECTEMENT SUR LE MASTER

    * BONS COTES: ON FAIT JUSTE DES PULL ET DES PUSH
    * MAUVAIS COTES: LES ERREURS SE PROPAGENT TRES VITE A TOUT LE MONDE

    * IL FAUT DE LA RIGUEUR POUR CHAQUE DEV POUR VERIFIER QUE CA MARCHE AVANT DE PUSHER

    SI VOUS N'ARRIVEZ PAS A TRAVAILLER EN EQUIPE
    * => IL FAUT FAIRE DES BRANCHES
    * BONS COTES: CHACUN TRAVAILLE INDEPENDAMMENT 
    * MAUVAIS COTES: CHACUN ACCUMULE DU CODE
    * => BIG BANG TESTING
    * => ON MERGE PLEIN DE CODES EN MEME TEMPS
    * => SOUVENT CA SE PASSE MAL...
    * => DE LONGUES NUITS BLANCHES A PREVOIR AVEC BEAUCOUP DE CAFE


## SQL: JOINTURES ET RELATIONS ENTRE TABLES

    * READ
    * SELECT...

    EN SQL QUAND ON LANCE UNE REQUETE SELECT
    => LE RESULTAT EST UNE TABLE AVEC DES LIGNES ET DES COLONNES
    => CETTE TABLE DE RESULTATS EST FABRIQUEE PAR SQL A PARTIR DES TABLES DE NOTRE BDD

    IL Y A DES SCENARIOS OU SUR UNE PAGE WEB, ON A BESOIN D'AFFICHER DES INFORMATIONS STOCKEES DANS DIFFERENTES TABLES SQL

    EXEMPLE:
    LA PAGE D'UNE ANNONCE AFFICHE LES INFOS DE L'ANNONCE
        => TABLE SQL annonce
    MAIS AUSSI LES INFOS SUR L'AUTEUR DE L'ANNONCE
        => TABLE SQL membre

    * OPTION1: 
    * JE FAIS 2 REQUETES SEPAREES 
    * POUR RECUPERER D'ABORD LES INFOS DE L'ANNONCE
    * ET ENSUITE DANS UNE 2E REQUETE, JE RECUPERE LES INFOS DU MEMBRE


    * OPTION2:
    * JE FAIS UNE SEULE REQUETE SQL
    * QUI RECUPERE LES INFOS DES 2 TABLES SQL
    * => JOINTURES

    * UNE JOINTURE PERMET DE COMBINER LES INFOS DE PLUSIEURS TABLES SQL

    https://sql.sh/cours/jointures


    * INNER JOIN

    SELECT *
    FROM A
    INNER JOIN B ON A.key = B.key

    SELECT *
    FROM annonce
    INNER JOIN membre 
    ON annonce.auteur = membre.username

    * LEFT JOIN

    SELECT *
    FROM A
    LEFT JOIN B ON A.key = B.key

    SELECT *
    FROM annonce
    LEFT JOIN membre 
    ON annonce.auteur = membre.username

    * LEFT JOIN SANS INTERSECTION

    SELECT *
    FROM A
    LEFT JOIN B ON A.key = B.key
    WHERE B.key IS NULL


    SELECT *
    FROM annonce
    LEFT JOIN membre
    ON annonce.auteur = membre.username
    WHERE membre.username IS NULL


    * RIGHT JOIN

    SELECT *
    FROM A
    RIGHT JOIN B ON A.key = B.key

    SELECT *
    FROM annonce
    RIGHT JOIN membre
    ON annonce.auteur = membre.username

    * RIGHT JOIN SANS INTERSECTION

    * SELECTIONNER LES 
    SELECT *
    FROM A
    RIGHT JOIN B ON A.key = B.key
    WHERE B.key IS NULL


    * ATTENTION AU SENS DE LA REQUETE
    * => SI JE VEUX LES MEMBRES QUI N'ONT PAS D'ANNONCE

    SELECT *
    FROM annonce
    RIGHT JOIN membre 
    ON annonce.auteur = membre.username
    WHERE annonce.auteur IS NULL

    * FULL JOIN

    SELECT *
    FROM A
    FULL JOIN B ON A.key = B.key

    SELECT *
    FROM annonce
    FULL JOIN membre
    ON annonce.auteur = membre.username


    * FULL JOIN SANS INTERSECTION

    SELECT *
    FROM A
    FULL JOIN B ON A.key = B.key
    WHERE A.key IS NULL
    OR B.key IS NULL

    SELECT *
    FROM annonce
    FULL JOIN membre
    ON annonce.auteur = membre.username
    WHERE annonce.auteur IS NULL
    OR membre.username IS NULL



## CLE ETRANGERE ET RELATIONS ENTRE TABLES

    MODELISATION CONCEPTUEL DES TABLES SQL

    annonce
    membre
    newsletter
    contact

    * ENSUITE IL FAUT SE POSER LA QUESTION DES RELATIONS ENTRE LES TABLES

    annonce ET membre SONT EN RELATION
    * UNE ANNONCE EST PUBLIEE PAR UN MEMBRE
    * UN MEMBRE PEUT PUBLIER PLUSIEURS ANNONCES

    annonce ET newsletter ? NON
    annonce ET contact ? NON

    * AVEC SQL, ON A CES 3 DIFFERENTES RELATIONS POSSIBLES
    ONE TO ONE  
    =>  POUR UNE LIGNE DE LA TABLE A 
        JE PEUX ASSOCIER UNE LIGNE DE LA TABLE B

    ONE TO MANY
    => POUR UNE LIGNE DE LA TABLE A
        JE PEUX ASSOCIER PLUSIEURS LIGNES DE LA TABLE B
    => POUR UNE LIGNE DE LA TABLE B
        JE PEUX ASSOCIER UNE LIGNE DE LA TABLE A

    MANY TO MANY
    => POUR UNE LIGNE DE LA TABLE A
        JE PEUX ASSOCIER PLUSIEURS LIGNES DE LA TABLE B
    => POUR UNE LIGNE DE LA TABLE B
        JE PEUX ASSOCIER PLUSIEURS LIGNES DE LA TABLE A

    EXEMPLE: ONE TO ONE
    TABLE A annonce
                id          => CLE PRIMAIRE
                titre
                description
                photo
                prix

    TABLE B annonce_voiture
                id
                kilometrage
                moteur
                annonce_id      
                => JE RAJOUTE UNE CLE ETRANGERE VERS LA TABLE annonce
                        (FOREIGN KEY)

    POUR UNE LIGNE DE MA TABLE A, 
    JE PEUX AVOIR DES INFORMATIONS COMPLEMENTAIRES DANS LA TABLE B


    EXEMPLE: ONE TO MANY
    TABLE A annonce
                id          => CLE PRIMAIRE
                titre
                photo
                description
                membre_id   => CLE ETRANGERE VERS LA TABLE membre
    TABLE B membre
                id          => CLE PRIMAIRE
                username
                email
                annonce_id  => CLE ETRANGERE VERS LA TABLE annonce
                => ATTENTION: NE CONVIENT PAS CAR CELA VOUDAIT DIRE
                    QU'UN MEMBRE N'AURAIT QU'UNE SEULE ANNONCE


    UNE ANNONCE EST PUBLIEE PAR UN SEUL MEMBRE
    MAIS UN MEMBRE PEUT PUBLIER PLUSIEURS ANNONCES

    EXEMPLE: MANY TO MANY
    TABLE A recette
                id
                titre
                photo
    TABLE B ingredient
                id
                nom
                description

    ON DOIT CREER UNE TABLE C DE RELATION
        recette_ingredient
                id
                recette_id          => CLE ETRANGERE
                ingredient_id       => CLE ETRANGERE

    UNE RECETTE UTILISE PLUSIEURS INGREDIENTS
    UN INGREDIENT PEUT ETRE UTILISE DANS PLUSIEURS RECETTES

    * LE PIRE POUR LE DEV EST LE MANY TO MANY
        TABLE RECETTE
    id      titre 
    1       crepe
    2       cookies

        TABLE INGREDIENT
    id      nom
    1       lait
    2       oeuf    
    3       farine
    4       sel
    5       sucre
    6       beurre
    7       chocolat
    8       levure
    9       beurre d'amande
    10      noisettes

        TABLE recette_ingredient
    id      recette_id      ingredient_id
    1       1               1
    2       1               2
    3       1               3
    4       1               4
    5       1               5
    6       1               6
    7       2               2
    8       2               3
    9       2               5
    10      2               7
    11      2               8
    12      2               9
    13      2               10

    SI JE VEUX RECUPERER LES INGREDIENT DE LA RECETTE DES CREPES
    => IL FAUT FAIRE UNE PREMIERE JOINTURE 
            ENTRE LA TABLE recette 
            ET LA TABLE recette_ingredient
        ET AUSSI UNE DEUXIEME JOINTURE
            ENTRE LA TABLE recette_ingredient
            ET LA TABLE ingredient

    POURQUOI C'EST LE PIRE:
    * ON DOIT RAJOUTER UNE TABLE INTERMEDIAIRE
    * ET ON DOIT FAIRE DES REQUETES AVEC 2 JOINTURES

    SELECT *
    FROM recette
    INNER JOIN recette_ingredient
    ON recette.id = recette_ingredient.recette_id
    INNER JOIN ingredient
    ON recette_ingredient.ingredient_id = ingredient.id



## LARAVEL ET LA BASE DE DONNEES

    https://laravel.com/docs/6.x

    https://laravel.com/docs/6.x/database

    MySQL 5.6+


    DANS LARAVEL, LA CONNEXION A LA BDD SE FAIT A TRAVERS LE FICHIER 
    config/databases.php
    MAIS CE FICHIER UTILISE LES VARIABLES QUI SONT DANS
    .env

    => IL FAUT MODIFIER LES VALEURS DANS .env

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mpequipe     => NOM DE LA DATABASE MYSQL
    DB_USERNAME=root         => NOM DU USER SQL
    DB_PASSWORD=             => ATTENTION, CA PEUT CHANGER SUIVANT PC/MAC

## POUR CREER LA DATABASE ET LES TABLES


    CORRIGER UN PROBLEME 
    SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was 
    too long; max key length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))


    https://laravel-news.com/laravel-5-4-key-too-long-error


## CREER UNE NOUVELLE TABLE SQL

    SI ON VEUT CREER LA TABLE SQL contacts
    JE LANCE LA LIGNE DE COMMANDE
    php artisan make:Model Contact -mcr  

    => database/migrations/2019_10_16_094902_create_contacts_table.php

    DANS CE FICHIER PHP, JE VAIS ECRIRE LE CODE PHP
    POUR AJOUTER MES COLONNES DANS LA TABLE SQL

    https://laravel.com/docs/6.x/migrations#creating-columns
 
## VALIDATION DE FORMULAIRES

    https://laravel.com/docs/6.x/validation#manually-creating-validators

    COMMENT ON PEUT AJOUTER DE LA SECURITE 
    POUR VERIFIER LES INFOS DES FORMULAIRES


    ATTENTION: LA SECURITE DANS LE HTML N'EST PAS UNE VRAIE SECURITE
    CAR LE CODE HTML ARRIVE DANS LES NAVIGATEURS DES VISITEURS
    SUR LEURS ORDINATEURS
    => ILS FONT CE QU'ILS VEULENT AVEC CE CODE
    => OUTILS DE DEVELOPPEURS DANS LES NAVIGATEURS
    => HACKING EST TROP FACILE

    => LA VRAIE SECURITE DOIT SE FAIRE SUR LE SERVEUR
    => CAR LE SERVEUR NOUS APPARTIENT
    => ON GARDE LE CONTROLE SUR LE SERVEUR


## EXEMPLE AVEC LARAVEL ET ANNONCES

    * MODELISATION CONCEPTUELLE DES DONNEES (MCD)

    DEFINIR LA TABLE SQL annonces
        id          BIGINT          INDEX=PRIMARY   A_I (LARAVEL LE FAIT POUR NOUS)
        titre       VARCHAR(191)
        contenu     TEXT
        photo       VARCHAR(191)
        adresse     VARCHAR(191)
        categorie   VARCHAR(191)

    * AVANT, ON CREAIT LES TABLES SQL AVEC PHPMYADMIN
    * AVEC LARAVEL, ON UTILISE UNE LIGNE DE COMMANDE

    php artisan make:model Annonce -mcr

    // php SERT A LANCER UN CODE PHP EN LIGNE DE COMMANDE
    // artisan EST UN PROGRAMME PHP FOURNI PAR LARAVEL
    // make:model EST L'INSTRUCTION QU'ON DONNE AU PROGRAMME artisan
    // Annonce => La classe PHP QUE LARAVEL VA CREER POUR NOUS
    // -mcr     => ON VEUT PRE-MACHER DU CODE POUR FAIRE UN CRUD
                => LARAVEL VA PREPARER LE CODE POUR OBTENIR UNE TABLE SQL annonces


    POUR LANCER LA LIGNE DE COMMANDE
    ON VA OUVRIR UN TERMINAL DANS LE DOSSIER QUI CONTIENT LE CODE LARAVEL
    => DANS MON CAS, C'EST LE DOSSIER mpequipe

    php artisan make:model Annonce -mcr

    SI TOUT SE PASSE BIEN (QUE DU VERT...)
    LARAVEL A CREE DES NOUVEAXU FICHIERS

    database/migrations/2019_10_17_095930_create_annonces_table.php

    IL FAUT MODIFIER LE CODE DE CE FICHIER POUR AJOUTER NOS COLONNES


    https://laravel.com/docs/6.x/migrations#creating-columns

    // IL FAUT AJOUTER LE CODE PHP OBJET POUR AJOUTER NOS COLONNES

## LANCER LA COMMANDE PHP POUR CREER LA TABLE SQL

    DE NOUVEAU IL FAUT LANCER UNE LIGNE DE COMMANDE 
    DANS MON DOSSIER mpequipe

    php artisan migrate:refresh

    => SI TOUT SE PASSE BIEN (PAS DE ROUGE OU DE COULEUR AGRESSIVE ;-p)
    => VERIFIER QUE LA TABLE SQL annonces A BIEN ETE CREE DANS PHPMYADMIN

    NOTE: ON POURRAIT CREER LES TABLES SQL AVEC PHPMYADMIN...



## FORMULAIRE DE CREATE

    AJOUTER LE CODE HTML POUR LE FORMULAIRE DE CREATE
    ATTENTION: IL FAUT AJOUTER @csrf POUR AJOUTER UNE SECURITE DE LARAVEL
    (CSRF => ATTAQUES DE HACKER Cross Site Request Forgery)


        <!-- CONVENTION LARAVEL POUR LE CREATE action="annonce/store" -->
        <form method="POST" action="annonce/store">
            <input type="text" name="titre" required placeholder="entrez votre titre">
            <textarea name="contenu" required placeholder="entrez votre contenu"></textarea>
            <input type="text" name="photo" required placeholder="entrez votre URL DE photo">
            <input type="text" name="adresse" required placeholder="entrez votre adresse">
            <input type="text" name="categorie" required placeholder="entrez votre categorie">
            <button type="submit">PUBLIER UNE ANNONCE</button>
            <!-- RACCOURCI BLADE POUR AJOUTER UN CHAMP HIDDEN -->
            @csrf
        </form>


    IL FAUT MAINTENANT CREER LA ROUTE annonce/store
    DANS LE FICHIER routes/web.php IL FAUT AJOUTER LA NOUVELLE ROUTE


    // POUR CREER LA ROUTE QUI VA GERER LE CRUS SUR LES ANNONCES
    // CREATE
    // any => ON PEUT UTILISER GET OU POST
    // /annonce/store  => URL QUE LE NAVIGATEUR VA UTILISER
    // AnnonceController => classe qui contient les codes PHP POUR LE CRUD SUR LA TABLE SQL annonces
    // store        => LA METHODE DANS LA CLASSE AnnonceController QUE LARAVEL VA ACTIVER
    Route::any('/annonce/store', 'AnnonceController@store');


## AJOUTER LE CODE DE TRAITEMENT DANS LE CONTROLLER

    DANS app/Http/Controllers/AnnonceController.php
    ON VA AJOUTER LE CODE DE TRAITEMENT POUR LE FORMULAIRE DE CREATE

    // NE PAS OUBLIER DE RAJOUTER CETTE LIGNE 
    // POUR POUVOIR UTILISER LA VALIDATION
    use Validator;

    // ...

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

            // SECURITE: ICI ON DOIT VERIFIER QUE LES INFOS SONT CORRECTES
            // ON DOIT RECUPERER LES INFOS ENVOYEES PAR LE NAVIGATEUR        
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL annonces
            // https://laravel.com/docs/5.7/validation#manually-creating-validators
            // https://laravel.com/docs/5.7/validation#available-validation-rules

            $validator = Validator::make($request->all(), [
                'titre'     => 'required|max:160',
                'contenu'   => 'required',
                'photo'     => 'required|max:160',
                'adresse'   => 'required|max:160',
                'categorie' => 'required|max:160',
                'prix'      => 'required|numeric|min:0|max:2000000',
            ]);

            if ($validator->fails()) 
            {
                // CAS OU IL Y A DES ERREURS
                $tabAssoJson["erreur"] = "IL Y A DES ERREURS";
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
                Annonce::create($request->only([
                    "titre", "contenu", "photo", "adresse", "categorie", "prix"
                ]));
            }

            return $tabAssoJson;
            // NOTE: CE SERA LARAVEL QUI VA TRANSFORMER 
            // LE TABLEAU ASSOCIATIF EN JSON
        }



    POUR POUVOIR UTILISER Annonce::create
    IL FAUT AJOUTER DU CODE DANS 
    app/Annonce.php
    * AJOUTER UNE PROPRIETE D'OBJET AVEC LE NOM $fillable


    <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Annonce extends Model
    {
        // PROPRIETES D'OBJET
        protected $fillable = [
            "titre", "contenu", "photo", "adresse", "categorie", "prix"
        ];

    }


## LUNDI 21/10

## LOGIN AVEC LARAVEL


    ATTENTION: CA A CHANGE ENTRE LAVAREL 5 ET 6

    https://laravel-news.com/running-make-auth-in-laravel-6

    LE CODE POUR LA PARTIE auth EST MAINTENANT DANS UN PACKAGE OPTIONNEL

    => IL FAUT LE RAJOUTER A NOTRE PROJET LARAVEL
    => UNE LIGNE DE COMMANDE AVEC composer

    OUVRIR UN TERMINAL DANS LE DOSSIER DE NOTRE LARAVEL
    (PRECISEMENT: LE DOSSIER QUI CONTIENT LE FICHIER composer.json)

    SUR WINDOWS
    composer require laravel/ui


    SUR MAC
    (LE MIEUX EST DE METTRE LE FICHIER composer.phar DANS LE MEME DOSSIER QUE LE FICHIER composer.json)

    php composer.phar require laravel/ui

    SI TOUT SE PASSE BIEN... 
    ON A CHARGE DE NOUVEAUX CODE LARAVEL
    DANS NOTRE PROJET



    MAINTENANT JE PEUX UTILISER LA COMMANDE POUR CREER LE CODE DU LOGIN

    php artisan ui:auth

    NORMALEMENT, CA SE PASSE BIEN

        Authentication scaffolding generated successfully.


    CETTE BASE DE CODE NE SUFFIT PAS POUR NOTRE PROJET DE MARKETPLACE


    NOTE: AVEC git UNE PERSONNE LANCE CES COMMANDES...
    => CELA VA CREER LES FICHIERS
    => LES AUTRES VONT POUVOIR FAIRE LE PULL POUR LE RECUPERER
    => MAIS IL FAUDRA QUAND MEME LANCER 

    SUR WINDOWS

        composer update

    SUR MAC

        php composer.phar update

    => CELA VA AJOUTER LE CODE LARAVEL POUR LA PARTIE AUTHENFICATION
    => SINON, IL MANQUE DU CODE ET VOUS AVEZ DES ERREURS...

    => NORMALEMENT, ON LE FAIT DES LE DEPART A L'INSTALLATION DE LARAVEL

    POUR VERIFIER, IL FAUT TESTER LES URLS DANS SON SITE
    /home
    /register
    /login
    /logout

## MARDI 22/10

COURS POUR LE MARDI

## ON VA AJOUTER LA COLONNE level SUR LA TABLES users

    DANS LE FICHIER database/migrations/....create_table_users.php
    ON AJOUTE LA COLONNE level COMME integer

        // https://laravel.com/docs/5.0/schema#adding-columns

            $table->integer('level');


## ON VA AJOUTER LA RELATION ONE TO MANY ENTRE users et annonces

ONE TO ONE
ONE TO MANY
MANY TO MANY

IL FAUT SE POSER LA QUESTION
* POUR UNE ANNONCE COMBIEN ON PEUT ASSOCIER DE USER ?
=> ONE
=> une annonce est publiée par un utilisateur

* POUR UN USER COMBIEN ON PEUT ASSOCIER D'ANNONCES ?
=> MANY
=> un utilisateur peut publier plusieurs annonces

=> AVEC SQL, POUR AJOUTER UNE RELATION ONE TO MANY
=> ON VA AJOUTER UNE COLONNE CLE ETRANGERE user_id DANS LA TABLE annonces
=> CA ME DONNE COMME INFORMATION: POUR UNE ANNONCE C'EST TEL USER QUI L'A CREE
=> CA REPOND A NOS BESOINS => COOL
=> ASTUCE: ON AJOUTE LA COLONNE DANS LA TABLE DU MANY
=> un user peut avoir plusieurs annonces
=> on ajoute la colonne user_id dans la table SQL annonces

=> ON VA AJOUTER UNE COLONNE CLE ETRANGERE annonce_id DANS LA TABLE users
=> CA ME DONNE INFORMATION: POUR UN USER C'EST CETTE ANNONCE QU'IL A CREE
=> FAUX
=> un utilisateur peut publier plusieurs annonces

AJOUTER LE CODE DANS 
database/migrations/....create_table_annonces.php


            // https://laravel.com/docs/5.0/schema#foreign-keys
            // ON AJOUTE UNE COLONNE DE CLE ETRANGERE 
            // POUR LA RELATION ONE TO MANY	
            // AVEC LA TABLE SQL users
            $table->bigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');

## RELANCER LA CREATION DES TABLES SQL A PARTIR DU CODE PHP

LANCER LA COMMANDE EN LIGNE

    php artisan migrate:refresh
















