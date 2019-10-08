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


