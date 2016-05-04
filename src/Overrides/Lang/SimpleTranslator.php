<?php
namespace Juwai\LaravelBase\Overrides\Lang;

use Illuminate\Translation\Translator;
use Illuminate\Support\Str;

/**
 * This class makes translation strings shorter by allowing them to be passed
 * without catalogue prefix. If a prefix is not supplied it adds a default one
 * that can be configured in config/translation.php.
 */
class SimpleTranslator extends Translator
{
    public function get($key, array $replace = array(), $locale = null, $fallback = true)
    {
        if (Str::contains($key, '.')) {
            return parent::get($key, $replace, $locale);
        }

        $defaultPrefix = config('translation.default_prefix');

        return parent::get("$defaultPrefix.$key", $replace, $locale);
    }
}
