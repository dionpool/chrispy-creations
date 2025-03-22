<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class LocalizationHelper
{
    public static function getLocalizedRoute($locale = null)
    {
        // If no locale provided, use the opposite of current locale
        if ($locale === null) {
            $locale = App::getLocale() === 'en' ? 'nl' : 'en';
        }

        // Get current route name
        $routeName = Route::currentRouteName();

        // If we're switching to English
        if ($locale === 'en') {
            // If the route name doesn't already have ".en" suffix
            if (!str_ends_with($routeName, '.en')) {
                $routeName = $routeName . '.en';
            }
        }
        // If we're switching to Dutch
        else {
            // Remove ".en" suffix if it exists
            $routeName = str_replace('.en', '', $routeName);
        }

        // Get the route parameters
        $parameters = Route::current()->parameters();

        // Check if the route exists
        if (Route::has($routeName)) {
            return route($routeName, $parameters);
        }

        // Fallback to homepage of that language
        return $locale === 'en' ? url('/en') : url('/');
    }

    public static function localizedRoute($baseName, $parameters = [])
    {
        $locale = app()->getLocale();
        $routeName = $locale === 'en' ? $baseName . '.en' : $baseName;

        return route($routeName, $parameters);
    }

    public static function isActiveRoute($baseName)
    {
        $locale = app()->getLocale();
        $routeName = $locale === 'en' ? $baseName . '.en' : $baseName;

        return request()->routeIs($routeName);
    }
}
