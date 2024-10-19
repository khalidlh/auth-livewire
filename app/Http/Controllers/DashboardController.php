<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Retourne la vue du tableau de bord
    }
    public function logout()
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        return redirect('/')->with('status', 'Vous avez été déconnecté avec succès.'); // Redirection vers la page de connexion
    }
}
