<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth.header :title="__('Crear cuenta')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth.session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <input
            type="text"
            wire:model="name"
            required
            autofocus
            autocomplete="name"
            placeholder="Nombre completo"
            class="w-full h-[40px] border rounded-md shadow-md bg-primary-50 pl-3 text-md placeholder-neutral-800"
        />
        @error('name')
        <span class="text-red-100 text-sm">{{ $message }}</span>
    @enderror

        <!-- Email Address -->
        <input
            type="email"
            wire:model="email"
            required
            autocomplete="email"
            placeholder="Correo"
            class="w-full h-[40px] border rounded-md shadow-md bg-primary-50 pl-3 text-md placeholder-neutral-800"
        />
        @error('name')
        <span class="text-red-100 text-sm">{{ $email }}</span>
    @enderror

        <!-- Password -->
        <input
            type="password"
            wire:model="password"
            required
            autocomplete="new-password"
            placeholder="Contraseña"
            class="w-full h-[40px] border rounded-md shadow-md bg-primary-50 pl-3 text-md placeholder-neutral-800"
        />
        @error('password')
        <span class="text-red-100 text-sm">{{ $message }}</span>
    @enderror

        <!-- Confirm Password -->
        <input
            type="password"
            wire:model="password_confirmation"
            required
            autocomplete="new-password"
            placeholder="Confirmar contraseña"
            class="w-full h-[40px] border rounded-md shadow-md bg-primary-50 pl-3 text-md placeholder-neutral-800"
        />
        @error('password_confirmation')
        <span class="text-[var(--color-red-100)] text-sm">{{ $message }}</span>
    @enderror

        <div class="flex items-center justify-end">
            <button type="submit" class="w-full bg-accent-300 text-white h-[40px] border rounded-md shadow-md hover:bg-accent-400 hover:box-border hover:border-2 hover:border-accent-200 hover:shadow-md hover:shadow-accent-200">
                {{ __('Crear cuenta') }}
            </button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Ya tienes una cuenta?') }}
        <a href="{{ route('login') }}" wire:navigate
        class="inline-block text-primary-300 underline underline-offset-2 hover:scale-105 transition-transform duration-200">
            {{ __('Iniciar Sesion') }}
        </a>
    </div>
</div>
