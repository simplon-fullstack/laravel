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


    SI DURANT L'INSTALLATION, VOUS DEVEZ CHOISIR UNE VERSION DE PHP
    ALORS CHERCHER LE FICHIER

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


