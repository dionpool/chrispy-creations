<header>
    @auth()
        <div class="top-bar">
            <nav class="top-bar-content container">
                <div class="header-mobile-content">
                    <span>{{ __('translation.welcome') }}, {{ Auth::user()->name }}</span>
                    <ul class="account-navigation">
                        @canany(['admin', 'editor'])
                            <x-layouts.parts.nav-link route="projects" active="projects">
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
            <x-layouts.parts.nav-link route="home" active="home">
                {{ __('translation.home') }}
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link route="about" active="about">
                {{ __('translation.over') }}
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link route="contact" active="contact">
                {{ __('translation.contact') }}
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link route="store" active="store">
                {{ __('translation.store') }}
            </x-layouts.parts.nav-link>
        </ul>

        <ul class="primary-navigation">
            <x-layouts.parts.nav-link route="home" active="home">
                {{ __('translation.home') }}
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link route="about" active="about">
                {{ __('translation.over') }}
            </x-layouts.parts.nav-link>
            <li>
                <x-layouts.parts.logo />
            </li>
            <x-layouts.parts.nav-link route="contact" active="contact">
                {{ __('translation.contact') }}
            </x-layouts.parts.nav-link>
            <x-layouts.parts.nav-link route="store" active="store">
                {{ __('translation.store') }}
            </x-layouts.parts.nav-link>
        </ul>

        <div class="language-switcher">
            <a href="{{ App\Helpers\LocalizationHelper::getLocalizedRoute('nl') }}">NL</a> |
            <a href="{{ App\Helpers\LocalizationHelper::getLocalizedRoute('en') }}">EN</a>
        </div>
    </nav>
</header>
