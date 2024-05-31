<?php

use App\Models\Settings;
use Stichoza\GoogleTranslate\GoogleTranslate;


if (!function_exists('translateThis')) {
    /**
     * Translate any text
     *
     * @param string $text
     * @return string
     */
    function translateThis(string $text): string
    {
        if (translatable()) {
            return GoogleTranslate::trans($text, app()->getLocale());
        } else {
            return $text;
        }
    }
}
if (!function_exists('trnaslatable')) {
    /**
     * Check if translate is on of off
     *
     * @return boolean // returns true if on. returns false if off.
     */
    function translatable(): bool
    {
        $settings = Settings::findOrFail(1);
        $translatable = $settings->is_active;

        return $translatable;
    }
}