<x-layout>
    <x-card>
        <x-slot name="title">Reset Password</x-slot>
        
        <p class="text-muted mb-4">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
        </p>
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Add form fields here -->
        </form>
        
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none">
                <i class="fas fa-arrow-left me-1"></i> Back to login
            </a>
        </div>
    </x-card>
</x-layout>
