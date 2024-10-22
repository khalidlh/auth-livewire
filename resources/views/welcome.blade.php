<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 200px;
            /* Ajustez la hauteur selon vos besoins */
            object-fit: cover;
            /* S'assure que l'image remplit l'espace */
        }
    </style>
    @livewireStyles
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Welcome to Khalid Lahmidi's Projects</h1>
        <div class="row">
            <!-- Section Authentication -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('build/assets/images/auth.jpg') }}" class="card-img-top img-fluid"
                        alt="Authentication" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h2>Authentication</h2>
                        <p>Login or register to access the system.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-user-lock"></i> Login
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section User Management -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('build/assets/images/users1.jpg') }}" class="card-img-top img-fluid"
                        alt="User Management" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h2>User Management </h2>
                        <p>Manage users and their roles.</p>
                        <a href="{{ route('users') }}" class="btn btn-success">
                            <i class="fas fa-users"></i> Manage Users
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section Payment -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('build/assets/images/payment.jpeg') }}" class="card-img-top img-fluid"
                        alt="Payment" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h2>Payment</h2>
                        <p>Securely process payments.</p>
                        <a href="{{ route('payment') }}" class="btn btn-warning">
                            <i class="fas fa-credit-card"></i> Go to Payment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
