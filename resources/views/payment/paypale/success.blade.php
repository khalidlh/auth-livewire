<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement PayPal Réussi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite('resources/css/app.css')
   
    <style>
        .success-message {
            margin-top: 100px;
        }
        .icon-size {
            font-size: 5rem;
            color: green;
        }
    </style>
</head>
<body>

<div class="container success-message text-center">
    <i class="fas fa-check-circle icon-size"></i>
    <h1 class="mt-4">Paiement PayPal Réussi !</h1>
    <p class="lead">Merci pour votre paiement. Votre transaction a été traitée avec succès.</p>
    <div class="mt-4">
        <a href="{{ route('payment') }}" class="btn btn-success">Retour à l'Accueil</a>
        <a href="{{ route('create.payment') }}" class="btn btn-primary">Faire un Autre Paiement</a>
    </div>
</div>

<!-- Bootstrap JS -->
@vite('resources/js/app.js') 
</body>
</html>
