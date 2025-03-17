<x-layout>
    <x-card>
        <x-slot name="title">Create an Account</x-slot>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Add form fields here -->
        </form>
        
        <div class="text-center mt-4">
            <p>Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Log in</a></p>
        </div>
    </x-card>
</x-layout>
