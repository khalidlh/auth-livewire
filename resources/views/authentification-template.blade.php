<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }

        .form-image {
            width: 100%;
            height: 100%;
            /* Fait en sorte que l'image prenne la hauteur du conteneur */
            object-fit: cover;
            /* Permet de garder les proportions de l'image */
        }

        .card {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            /* Permet le passage à la ligne pour les petits écrans */
        }

        .image-container {
            width: 300px;
            /* Largeur fixe pour le conteneur de l'image */
            height: 400px;
            /* Hauteur fixe pour le conteneur de l'image */
            overflow: hidden;
            /* Cacher les débordements */
            margin-right: 20px;
            /* Espace entre l'image et le formulaire */
        }

        .card-body {
            flex: 1;
            /* Permet au corps de la carte d'occuper tout l'espace restant */
        }

        @media (max-width: 768px) {
            .card {
                flex-direction: column;
                /* Change la direction de flex en colonne pour les écrans plus petits */
            }

            .image-container {
                width: 100%;
                /* L'image occupera toute la largeur sur mobile */
                height: auto;
                /* Ajuste la hauteur automatiquement sur mobile */
                margin-bottom: 20px;
                /* Ajout d'un espace en bas de l'image */
            }
        }

        .title-login,
        .title-register,
        .title-forgot {
            font-weight: bold;
            font-size: 1.5rem;
            color: #007bff;
            /* Couleur bleue pour tous les titres */
        }

        /* Vous pouvez également personnaliser chaque titre avec une couleur différente, si vous le souhaitez */
        .title-register {
            color: #28a745;
            /* Vert pour le registre */
        }

        .title-forgot {
            color: #ffc107;
            /* Jaune pour le mot de passe oublié */
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm">
                    <div class="image-container">
                        <img src="{{ asset('build/assets/images/auth.jpg') }}" alt="Header Image" class="form-image">
                    </div>
                    @livewire('authentification')
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')

</body>

</html>
