<x-layouts.guest title="Registreren">
    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="form-header">
            <img src="{{ asset('images/logo.webp') }}" alt="{{ config('app.name') }} logo">
            <h1 class="text-dark fw-bolder mb-3">Registreren</h1>
            <span class="text-gray-500 fw-semibold fs-6">Make a byte out of design</span>
        </div>

        <x-form.form-group type="text" name="name" label="Naam" placeholder="Naam" />
        <x-form.form-group type="email" name="email" label="E-mailadres" placeholder="E-mailadres" />
        <x-form.form-group type="password" name="password" label="Wachtwoord" placeholder="Wachtwoord" />

        <x-button variant="auth">Registreren</x-button>

        <div class="register-link">
            Heb je al een account? <a href="{{ route('login') }}">Login</a>.
        </div>
    </form>
</x-layouts.guest>

