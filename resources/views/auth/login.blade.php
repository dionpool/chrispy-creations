<x-layouts.guest title="Inloggen">
    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="form-header">
            <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }} logo">
            <h1 class="text-dark fw-bolder mb-3">Inloggen</h1>
            <span class="text-gray-500 fw-semibold fs-6">Take a byte out of design</span>
        </div>

        <x-form.form-group type="email" name="email" label="E-mailadres" placeholder="E-mailadres" />
        <x-form.form-group type="password" name="password" label="Wachtwoord" placeholder="Wachtwoord" />

        <div class="forgot-pass">
            <a href="#">Wachtwoord vergeten?</a>
        </div>

        <x-button variant="auth">Inloggen</x-button>

        <div class="register-link">
            Nog geen account? <a href="{{ route('register') }}">Registreer</a>.
        </div>
    </form>
</x-layouts.guest>
