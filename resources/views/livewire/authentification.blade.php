<div class="card-body p-4">
    <!-- Afficher les messages de statut ou d'erreur -->
    @if (session()->has('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tabs content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- Login -->
        @if ($showLogin)
        <div class="" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
            <h5 class="card-title text-center mb-3" style="font-weight: bold; font-size: 1.5rem; color: #007bff;">
                <i class="fas fa-user-lock me-2"></i>Login
            </h5>
            
            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="loginEmail" wire:model="email_login" placeholder="Enter your email">
                    </div>
                    @error('email_login') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="loginPassword" wire:model="password_login" placeholder="Enter your password">
                    </div>
                    @error('password_login') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="loginCheck" wire:model="remember">
                        <label class="form-check-label" for="loginCheck">Remember me</label>
                    </div>
                    <a href="#" wire:click.prevent="showForgotPasswordForm" class="link-secondary">Forgot password?</a>
                </div>
                <div class="d-grid mt-4">
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </div>
            </form>
            
            <!-- Bouton pour créer un compte -->
            <div class="mt-3 text-center">
                <span>Don't have an account?</span>
                <button class="btn btn-link" wire:click.prevent="showRegisterForm">Create an account</button>
            </div>
        </div>
        @endif
        

        <!-- Inscription -->
        @if ($showRegister)
        <div class="" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
            <h5 class="card-title text-center mb-3 title-register">
                <i class="fas fa-user-plus me-2"></i>Register
            </h5>
            <form wire:submit.prevent="register">
                <div class="mb-3">
                    <label for="registerName" class="form-label">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="registerName" wire:model="name" placeholder="Enter your full name">
                    </div>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="registerEmail" wire:model="email" placeholder="Enter your email">
                    </div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="registerPassword" wire:model="password" placeholder="Enter your password">
                    </div>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="registerPasswordConfirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="registerPasswordConfirmation" wire:model="password_confirmation" placeholder="Confirm your password">
                    </div>
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="d-grid mt-4">
                    <button class="btn btn-success btn-block" type="submit">Register</button>
                </div>
            </form>
        
            <!-- Bouton pour se connecter -->
            <div class="mt-3 text-center">
                <span>Already have an account?</span>
                <button class="btn btn-link" wire:click.prevent="showLoginForm">Login</button>
            </div>
        </div>
        @endif
        

        <!-- Mot de passe oublié -->
        @if ($showForgotPassword)
        <div class="" id="pills-forgot" role="tabpanel" aria-labelledby="pills-forgot-tab">
            <h5 class="card-title text-center mb-3 title-forgot">
                <i class="fas fa-question-circle me-2"></i>Forgot Password
            </h5>
            <form wire:submit.prevent="sendResetLink">
                <div class="mb-3">
                    <label for="forgotEmail" class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="forgotEmail" wire:model="email_forget" placeholder="Enter your email">
                    </div>
                    @error('email_forget') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="d-grid mt-4">
                    <button class="btn btn-warning btn-block" type="submit">Reset Password</button>
                </div>
            </form>
            <div class="d-grid mt-3">
                <button class="btn btn-secondary btn-block" wire:click="showLoginForm">Back to Login</button>
            </div>
        </div>
    @endif
    
    </div>
    <!-- Fin du contenu des onglets -->
</div>
