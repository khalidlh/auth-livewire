<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{
    public function activateAccount($token)
    {
        $user = User::where('activation_token', $token)->first();
    
        if ($user) {
            $user->is_active = true;
            $user->activation_token = null; // Réinitialiser le token
            $user->save();
    
            return redirect()->route('login')->with('status', 'Votre compte a été activé avec succès!');
        }
    
        return redirect()->route('login')->with('error', 'Le lien d\'activation est invalide ou a expiré.');
    }

    public function activationMessage()
    {
        return view('activation.activation-message');
    }
    
}
