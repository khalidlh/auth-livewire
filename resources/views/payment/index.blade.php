<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir Méthode de Paiement</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .payment-card {
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .payment-card:hover {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        .icon-size {
            width: 80px;  /* Ajuste la taille de l'image selon vos besoins */
            height: auto;
        }

        .card-body h5 {
            margin-bottom: 20px;
        }

        .back-button {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row text-center">
        <h2>Choisissez une méthode de paiement</h2>
    </div>

    <div class="row mt-5 justify-content-center">
        <!-- Bouton de retour -->
        <div class="col-12 text-center back-button">
            <button class="btn btn-secondary" onclick="window.location.href='{{ route('home') }}'">
                <i class="fas fa-arrow-left"></i> Retour
            </button>
        </div>

        <!-- Stripe Payment Option -->
        <div class="col-md-4">
            <div class="card payment-card" onclick="window.location.href='{{ route('stripe.checkout') }}'">
                <div class="card-body text-center">
                    <img src="{{ asset('build/assets/images/stripe.png') }}" alt="Stripe" class="icon-size">
                    <h5 class="card-title mt-3">Stripe</h5>
                    <p class="card-text">Payer en toute sécurité avec Stripe</p>
                    <button class="btn btn-primary mt-3">Payer avec Stripe</button>
                </div>
            </div>
        </div>

        <!-- PayPal Payment Option -->
        <div class="col-md-4">
            <div class="card payment-card" onclick="window.location.href='{{ route('create.payment') }}'">
                <div class="card-body text-center">
                    <img src="{{ asset('build/assets/images/paypal.jpg') }}" alt="PayPal" class="icon-size">
                    <h5 class="card-title mt-3">PayPal</h5>
                    <p class="card-text">Payer facilement avec PayPal</p>
                    <button class="btn btn-info mt-3">Payer avec PayPal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
