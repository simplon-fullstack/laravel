<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SITE MARKETPLACE</title>

    <link rel="stylesheet" href="<?php echo url('/assets/css/style.css') ?>">
</head>
<body>
    <header>
        <h1>MON SITE MARKETPLACE</h1>
        <nav>
            <ul>
                <li><a href="<?php echo url('/') ?>">accueil</a></li>
                <li><a href="<?php echo url('/espace-membre') ?>">espace membre</a></li>
                <li><a href="<?php echo url('/galerie') ?>">galerie</a></li>
                <li><a href="<?php echo url('/contact') ?>">contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h3>MA SECTION ACCUEIL</h3>
        </section>

        <section>
            <h3>FORMULAIRE DE NEWSLETTER</h3>
            <form action="newsletters/store" method="POST">
                <input type="text" name="nom" required>
                <input type="email" name="email" required>
                <button type="submit">INSCRIPTION</button>
                <!-- VA CREER UN CHAMP INPUT HIDDEN POUR LARAVEL (SECURITE) -->
                @csrf
            </form>
        </section>
    </main>
    <footer>
    <nav>
            <ul>
                <li><a href="<?php echo url('/espace-membre') ?>">membre</a></li>
                <li><a href="<?php echo url('/espace-admin') ?>">admin</a></li>
            </ul>
        </nav>
        <p>tous droits réservés 2019</p>
    </footer>

    <script src="<?php echo url('/assets/js/main.js') ?>"></script>
</body>
</html>