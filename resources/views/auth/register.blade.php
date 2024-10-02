<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistiques AppS</title>
    <link rel="stylesheet" href="{{asset('assets/logreg.css')}}">
</head>

<body>
    <div class="container">
        <form class="login-form" action="{{route('register')}}" method="post">
            @csrf
            <img src="{{asset('assets/img/logo.jpg')}}" alt="Logistiques AppS">
            <h2>Inscription</h2>
            <div class="input-group">
                <input type="text" id="email" required name="name">
                <label for="email">Name:</label>
            </div>
            <div class="input-group">
                <input type="email" id="email" required name="email">
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <input type="password" id="password" required name="password">
                <label for="password">Mot de passe</label>
            </div>
            <div class="input-group">
                <input type="password" name="password_confirmation" required>
                <label>Confirm Password</label>
            </div>
            <button type="submit" class="btn">Valider</button>
            <p class="signup-link">j ai deja un compte ? -> <u><a href="{{route('login')}}">mon compte</a></u></p>
        </form>
    </div>
</body>

</html>