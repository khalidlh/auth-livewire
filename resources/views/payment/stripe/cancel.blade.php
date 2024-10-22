<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Annulé</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @vite('resources/css/app.css')
    <style>
        .cancel-message {
            margin-top: 100px;
        }
        .icon-size {
            font-size: 5rem;
            color: red;
        }
    </style>
</head>
<body>

<div class="container cancel-message text-center">
    <i class="fas fa-times-circle icon-size"></i>
    <h1 class="mt-4">Paiement Annulé</h1>
    <p class="lead">Votre paiement a été annulé. Vous pouvez réessayer ou choisir une autre méthode de paiement.</p>
    <div class="mt-4">
        <a href="{{ route('payment') }}" class="btn btn-danger">Retour à l'Accueil</a>
        <a href="{{ route('stripe.checkout') }}" class="btn btn-primary">Réessayer le Paiement</a>
    </div>
</div>

<!-- Bootstrap JS -->
@vite('resources/js/app.js') 
</body>
</html>
