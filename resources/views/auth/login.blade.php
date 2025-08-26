<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth.header :title="__('Iniciar sesión')" :description="__('Ingresa tu correo y contraseña para iniciar sesión')" />

    <!-- Session Status -->
    <x-auth.session-status class="text-center" :status="session('status')" />

    <!-- Formulario de inicio de sesión -->
    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div>
            <input type="email" wire:model="email" class="w-full h-[40px] border rounded-md shadow-md bg-primary-50  pl-3 text-md placeholder-neutral-800" placeholder="Correo" />
        </div>
        @error('email')
        <span class="text-red-100 text-sm">{{ $message }}</span>
    @enderror

        <!-- Password -->
        <div>
            <input type="password" wire:model="password" class="w-full h-[40px] border rounded-md shadow-md bg-primary-50 pl-3 text-md placeholder-neutral-800" placeholder="Contraseña" />
        </div>
        @error('password')
        <span class="text-red-100 text-sm">{{ $message }}</span>
    @enderror

        <!-- Contenedor de Recordarme y Olvidaste tu contraseña -->
        <div class="flex items-center justify-between">
            <flux:checkbox wire:model="remember" :label="__('Recordarme')" />

            @if (Route::has('password.request'))
                <a href="{{route('password.request')}}" wire:navigate
                class="text-sm text-primary-300 underline underline-offset-2 hover:scale-105 transition-transform duration-200">
                {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end">
            <button  type="submit" class="w-full bg-accent-300 text-white h-[40px] border rounded-md shadow-md hover:bg-accent-400 hover:box-border hover:border-2 hover:border-accent-200 hover:shadow-md hover:shadow-accent-200">{{ __('Iniciar sesión') }}</button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 text-center text-sm dark:text-zinc-400">
            {{ __('¿No tienes una cuenta?') }}
            <a href="{{ route('register') }}" wire:navigate
            class="inline-block text-primary-300 underline underline-offset-2 hover:scale-105 transition-transform duration-200">
            {{ __('Regístrate') }}
            </a>
        </div>
    @endif

</div>
