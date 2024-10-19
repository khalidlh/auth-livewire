<?php

namespace App\Livewire;

use App\Models\User;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AccountCreated;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;

class Authentification extends Component
{
    public $email;
    public $name;
    public $password;
    public $password_confirmation;
    public $email_login;
    public $password_login;
    public $email_forget;
    public $showLogin = true;
    public $remember = false;
    public $showRegister = false;
    public $showForgotPassword = false;

    public function login()
    {
        $this->validate([
            'email_login' => 'required|email',
            'password_login' => 'required|min:6',
        ]);
    
        // Tenter de se connecter
        if (Auth::attempt(['email' => $this->email_login, 'password' => $this->password_login], $this->remember)) {
            // Vérifier si l'utilisateur est activé
            $user = Auth::user();
            if ($user->is_active) { // Assurez-vous que le champ 'is_active' existe dans votre modèle User
                return redirect()->route('dashboard'); // Redirection vers le tableau de bord
            } else {
                Auth::logout(); // Déconnexion de l'utilisateur
                return redirect()->route('activation.message'); // Redirection vers la page d'activation
            }
        } else {
            session()->flash('error', 'Identifiants invalides.');
        }
    }
    

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'activation_token' => Str::random(60),
        ]);
    
        $activationLink = route('activation', ['token' => $user->activation_token]);
    
        Notification::send($user, new AccountCreated($activationLink));
    
        // Redirection vers la page d'activation
        return redirect()->route('activation.message');
    }

    public function sendResetLink()
    {
        // Valider l'adresse email
        $this->validate(['email_forget' => 'required|email']);
    
        // Essayer d'envoyer le lien de réinitialisation
        $status = Password::sendResetLink(['email' => $this->email_forget]);
    
        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('status', 'Un lien de réinitialisation a été envoyé à votre adresse e-mail.');
        } else {
            // Gestion des erreurs
            if ($status === Password::INVALID_USER) {
                session()->flash('error', 'Aucun utilisateur trouvé avec cet e-mail.');
            } else {
                session()->flash('error', 'Erreur lors de l\'envoi du lien de réinitialisation. Veuillez réessayer.');
            }
        }
    }
    

    public function showRegisterForm()
    {
        $this->reset(['email', 'password', 'password_confirmation']);
        $this->showRegister = true;
        $this->showForgotPassword = false;
        $this->showLogin = false;
    }

    public function showLoginForm()
    {
        $this->reset(['email_login', 'password_login']);
        $this->showRegister = false;
        $this->showForgotPassword = false;
        $this->showLogin = true;
    }

    public function showForgotPasswordForm()
    {
        $this->reset('email_forget');
        $this->showForgotPassword = true;
        $this->showRegister = false;
        $this->showLogin = false;
    }

    public function render()
    {
        return view('livewire.authentification');
    }
}
