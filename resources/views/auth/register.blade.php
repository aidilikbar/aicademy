<x-auth-layout title="Register - AIcademy">
    <x-slot name="heading">Create an Account</x-slot>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                    id="password" name="password" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <div class="password-requirements small mt-2">
                <p class="mb-1">Password must contain:</p>
                <ul class="ps-3">
                    <li id="length" class="text-muted">At least 8 characters</li>
                    <li id="uppercase" class="text-muted">At least 1 uppercase letter</li>
                    <li id="lowercase" class="text-muted">At least 1 lowercase letter</li>
                    <li id="number" class="text-muted">At least 1 number</li>
                </ul>
            </div>
            @error('password')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" 
                id="password_confirmation" name="password_confirmation" required>
        </div>
        
        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    
    <div class="text-center">
        <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Log in</a></p>
    </div>
    
    <x-slot name="scripts">
        <script>
            // Toggle password visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const icon = this.querySelector('i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
            
            // Real-time password validation
            document.getElementById('password').addEventListener('input', function() {
                const password = this.value;
                
                // Check length
                document.getElementById('length').className = 
                    password.length >= 8 ? 'text-success' : 'text-muted';
                
                // Check uppercase
                document.getElementById('uppercase').className = 
                    /[A-Z]/.test(password) ? 'text-success' : 'text-muted';
                
                // Check lowercase
                document.getElementById('lowercase').className = 
                    /[a-z]/.test(password) ? 'text-success' : 'text-muted';
                
                // Check number
                document.getElementById('number').className = 
                    /[0-9]/.test(password) ? 'text-success' : 'text-muted';
            });
        </script>
    </x-slot>
</x-auth-layout>
