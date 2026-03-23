<div class="container mt-5">
    <div class="card p-4 col-md-4 mx-auto">
        <h3 class="mb-3">Register</h3>

        <form wire:submit.prevent="register">
            <input type="text" wire:model="name" placeholder="Name" class="form-control mb-2">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror

            <input type="email" wire:model="email" placeholder="Email" class="form-control mb-2">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror

            <input type="password" wire:model="password" placeholder="Password" class="form-control mb-2">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror

            <input type="password" wire:model="password_confirmation" placeholder="Confirm Password" class="form-control mb-2">

            <button class="btn btn-primary w-100">Register</button>
        </form>

        <p class="mt-2">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</div>