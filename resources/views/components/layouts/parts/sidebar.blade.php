<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
     data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{ route('projects') }}">
            <span class="text-white fw-semibold fs-4">Chrispy Creations</span>
        </a>
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <x-icon variant="toggle" />
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">
                <x-layouts.parts.sidebar-title>Projecten</x-layouts.parts.sidebar-title>
                <x-layouts.parts.sidebar-item route="projects" :active="request()->routeIs('projects')" icon="overview">
                    Overzicht
                </x-layouts.parts.sidebar-item>
                <x-layouts.parts.sidebar-item route="project.new" :active="request()->routeIs('project.new')" icon="add">
                    Nieuw Project
                </x-layouts.parts.sidebar-item>

                <x-layouts.parts.sidebar-title>Categorieën</x-layouts.parts.sidebar-title>
                <x-layouts.parts.sidebar-item route="categories" :active="request()->routeIs('category')" icon="bookmark">
                    Overzicht
                </x-layouts.parts.sidebar-item>
                <x-layouts.parts.sidebar-item route="category.new" :active="request()->routeIs('category.new')" icon="plus">
                    Nieuwe Categorie
                </x-layouts.parts.sidebar-item>
            </div>
        </div>
    </div>
</div>
