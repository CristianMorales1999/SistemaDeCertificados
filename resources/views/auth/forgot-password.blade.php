<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth.header :title="__('Forgot password')" :description="__('Enter your email to receive a password reset link')" />

    <!-- Session Status -->
    <x-auth.session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6 text-neutral-800">
        <!-- Email Address -->
        <input
            type="email"
            wire:model="email"
            required
            autofocus
            class="w-full h-[40px] border rounded-md shadow-md bg-primary-50 pl-3 text-md placeholder-neutral-800"
            placeholder="email@example.com"
        />
        <flux:button variant="primary" type="submit" class="w-full bg-accent-300 hover:bg-accent-400 hover:box-border hover:border-2 hover:border-accent-200 hover:shadow-md hover:shadow-accent-200">{{ __('Email password reset link') }}</flux:button>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-800">
        {{ __('Or, return to') }}
        <a href="{{ route('login') }}" wire:navigate
        class="inline-block text-primary-300 underline underline-offset-2 hover:scale-105 transition-transform duration-200">
        {{ __('Log in') }}
        </a>
    </div>
</div>
