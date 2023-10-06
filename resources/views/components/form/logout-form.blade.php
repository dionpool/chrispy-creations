<form method="POST" action="{{ route('login.destroy') }}">
    @csrf

    <x-button variant="logout">Uitloggen</x-button>
</form>
