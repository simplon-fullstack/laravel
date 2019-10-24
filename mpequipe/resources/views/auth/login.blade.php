<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SITE MARKETPLACE</title>

    <link rel="stylesheet" href="<?php echo url('/assets/css/style.css') ?>">
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
    <header>
        <h1>MON SITE MARKETPLACE</h1>
        <nav>
            <ul>
                <li><a href="<?php echo url('/') ?>">accueil</a></li>
                <li><a href="<?php echo url('/annonces') ?>">annonces</a></li>
                <li><a href="<?php echo url('/register') ?>">inscription</a></li>
                <li><a href="<?php echo url('/espace-membre') ?>">espace membre</a></li>
                <li><a href="<?php echo url('/galerie') ?>">galerie</a></li>
                <li><a href="<?php echo url('/contact') ?>">contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>JE MODIFIE LE CODE DU LOGIN</h1>
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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

