<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Auth AppiDen-School</title>
    <link rel="stylesheet" href="{{asset('assets/fonts/style.css')}}">
    
	<link rel="stylesheet" href="{{asset('assets/auth/style.css')}}" />
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register') }}">
                        @csrf
            <img src="{{asset('assets/img/logo.jpg')}}" alt="AppiDen-School"><br>
				<h1>Inscription </h1><br>
				<input type="text" placeholder="Nom" name="name" required>
				<input type="email" placeholder="Email" name="email" required>
				<input type="password" placeholder="Mot de passe" name="password" required>
				<div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                            @enderror</div>
				<input type="password" placeholder=" Confirm Mot de passe" name="password_confirmation" required>
				<button type="submit">Creer le compte</button>
			</form>
		</div>
		<div class="form-container login-container">
			
        <form method="POST" action="{{ route('login') }}">
                        @csrf
            <img src="{{asset('assets/img/logo.jpg')}}" alt="AppiDen-School"><br>
				<h1>Connexion</h1><br>
				<span>Je n'ai pas de compte</span>
				<input type="email" placeholder="Email" name="email" required>
				<input type="password" placeholder="Mot de passe" name="password" required>
				<button type="submit">Se connecter</button>
			</form>
		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Bienvenu chez AppiDen-School.</h1>
					<p>gerer bien, gerer mieux votre Ecole.</p>
					<button class="ghost" id="login">Se connecter</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Bienvenu chez AppiDen-School.</h1>
					<p>gerer bien, gerer mieux votre Ecole.</p>
					<button class="ghost" id="signUp">Creer un compte</button>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('assets/auth/script.js')}}" charset="utf-8"></script>

</body>

</html>