<x-auth-layout title="Forgot Password - AIcademy">
    <x-slot name="heading">Reset Password</x-slot>
    
    <p class="text-muted mb-4">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
    </p>
    
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
        </div>
    </form>
    
    <div class="text-center">
        <a href="{{ route('login') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left me-1"></i> Back to login
        </a>
    </div>
</x-auth-layout>
