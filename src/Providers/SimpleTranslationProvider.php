<?php
namespace Juwai\LaravelBase\Providers;

use Juwai\LaravelBase\Overrides\Lang\SimpleTranslator;
use Illuminate\Translation\TranslationServiceProvider;

class SimpleTranslationProvider extends TranslationServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLoader();

        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];

            $locale = $app['config']['app.locale'];

            $trans = new SimpleTranslator($loader, $locale);

            $trans->setFallback($app['config']['app.fallback_locale']);

            return $trans;
        });
    }
}
