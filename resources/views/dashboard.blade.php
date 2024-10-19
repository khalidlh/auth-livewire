<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f0f8ff; /* Utilisez votre couleur de fond */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Tableau de Bord</h1>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Bienvenue, <strong>{{ Auth::user()->name }}</strong> ! Vous êtes connecté.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="d-flex justify-content-end mb-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Votre contenu ici</h5>
            <p class="card-text">Vous pouvez ajouter des éléments de tableau de bord supplémentaires ici.</p>
        </div>
    </div>
</div>

</body>
</html>
