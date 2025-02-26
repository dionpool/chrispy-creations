<header>
    @auth()
        <div class="top-bar">
            <nav class="top-bar-content container">
                <div class="header-mobile-content">
                    <span>Welkom, {{ Auth::user()->name }}</span>
                    <ul class="account-navigation">
                        @canany(['admin', 'editor'])
                            <x-layouts.parts.nav-link :route="route('projects')" :active="request()->routeIs('projects')">
                                Dashboard
                            </x-layouts.parts.nav-link>
                        @endcanany
                        <li>
                            <x-form.logout-form />
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    @endauth

    <nav class="navigation-bar" x-data="{ navigationOpen: false }">
        <x-layouts.parts.logo />

        <button class="toggle-menu" @click="navigationOpen = !navigationOpen">
            <i class="fa-solid fa-bars"></i>
        </button>

        <ul class="mobile-navigation" @click.away="navigationOpen = false" x-show="navigationOpen">
            <x-layouts.parts.nav-link :route="route('home')" :active="request()->routeIs('home')">
                Home
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link :route="route('about')" :active="request()->routeIs('about')">
                Over
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link :route="route('contact')" :active="request()->routeIs('contact')">
                Contact
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link :route="route('store')" :active="request()->routeIs('store')">
                Store
            </x-layouts.parts.nav-link>
        </ul>

        <ul class="primary-navigation">
            <x-layouts.parts.nav-link :route="route('home')" :active="request()->routeIs('home')">
                Home
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link :route="route('about')" :active="request()->routeIs('about')">
                Over
            </x-layouts.parts.nav-link>
            <li>
                <x-layouts.parts.logo />
            </li>
            <x-layouts.parts.nav-link :route="route('contact')" :active="request()->routeIs('contact')">
                Contact
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link :route="route('store')" :active="request()->routeIs('store')">
                Store
            </x-layouts.parts.nav-link>
        </ul>
    </nav>
</header>
