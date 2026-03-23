<div class="container mt-5">
    <div class="card p-4 col-md-4 mx-auto">
        <h3 class="mb-3">Login</h3>

        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form wire:submit.prevent="login">
            <input type="email" wire:model="email" placeholder="Email" class="form-control mb-2">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror

            <input type="password" wire:model="password" placeholder="Password" class="form-control mb-2">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror

            <button class="btn btn-primary w-100">Login</button>
        </form>

        <p class="mt-2">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>
</div>