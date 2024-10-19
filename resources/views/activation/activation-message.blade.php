
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation de Compte</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-info" role="alert">
            Un lien d'activation a été envoyé à votre adresse e-mail. Veuillez vérifier votre boîte de réception et suivre le lien pour activer votre compte.
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}" class="btn btn-primary">Retour à la connexion</a>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
