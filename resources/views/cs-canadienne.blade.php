<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Formulaire de CV</title>
</head>
<body>

<div class="container mt-5">
    <h1>Formulaire de CV</h1>
    <form>
        <!-- Informations personnelles -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Votre nom" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="votre.email@example.com" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" placeholder="+1 (123) 456-7890" required>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" placeholder="Votre adresse" required>
        </div>

        <!-- Profil professionnel -->
        <div class="mb-3">
            <label for="profil" class="form-label">Profil Professionnel</label>
            <textarea class="form-control" id="profil" rows="3" placeholder="Décrivez votre profil professionnel..." required></textarea>
        </div>

        <!-- Expérience professionnelle -->
        <div class="mb-3">
            <label for="experience" class="form-label">Expérience Professionnelle</label>
            <textarea class="form-control" id="experience" rows="3" placeholder="Décrivez votre expérience professionnelle..." required></textarea>
        </div>

        <!-- Éducation -->
        <div class="mb-3">
            <label for="education" class="form-label">Éducation</label>
            <textarea class="form-control" id="education" rows="3" placeholder="Décrivez votre formation académique..." required></textarea>
        </div>

        <!-- Compétences -->
        <div class="mb-3">
            <label for="competences" class="form-label">Compétences</label>
            <textarea class="form-control" id="competences" rows="3" placeholder="Listez vos compétences..." required></textarea>
        </div>

        <!-- Langues -->
        <div class="mb-3">
            <label for="langues" class="form-label">Langues</label>
            <textarea class="form-control" id="langues" rows="3" placeholder="Listez les langues que vous parlez..." required></textarea>
        </div>

        <!-- Références -->
        <div class="mb-3">
            <label for="references" class="form-label">Références</label>
            <textarea class="form-control" id="references" rows="3" placeholder="Indiquez vos références..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>

@vite('resources/js/app.js') 
</body>
</html>
