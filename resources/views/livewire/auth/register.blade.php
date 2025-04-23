<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
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
    <x-auth-header :title="__('Crear cuenta')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Nombre completo')"
            class="bg-[#EBF1FD]"
        />
        @error('name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            type="email"
            required
            autocomplete="email"
            placeholder="Correo"
        />
        @error('name')
        <span class="text-red-500 text-sm">{{ $email }}</span>
    @enderror

        <!-- Password -->
        <flux:input
            wire:model="password"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Contraseña')"
        />
        @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirmar contraseña')"
        />
        @error('password_confirmation')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

        <div class="flex items-center justify-end">
            <button type="submit" class="w-full bg-[#9636AD] text-white h-[40px] border rounded-md shadow-md hover:bg-[#963678]">
                {{ __('Crear cuenta') }}
            </button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Ya tienes una cuenta?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Iniciar Sesion') }}</flux:link>
    </div>
</div>
