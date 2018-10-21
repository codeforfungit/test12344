<?php

namespace JohnLobo\CustomValidator;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidatorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
       // $this->loadViewsFrom(__DIR__.'/../resources/views', 'passport');
       //  $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'CustomValidator');
        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'johnlobo');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
        $this->app->validator->resolver(function($translator, $data, $rules, $messages) {
            return new CustomValidator($translator, $data, $rules, $messages);
        });

        Validator::extend('foo', function ($attribute, $value, $parameters, $validator) {
            return $value == 'foo';
        });
        Validator::extend('in_phone', function($attribute, $value, $parameters) {
            return substr($value, 0, 3) == '+91';
        });

        Validator::extend('my_custom_validation_rule', function ($attribute, $value, $parameters) {
            return substr($value, 0, 3) == '+91';
        }, 'my custom validation rule message');

        Validator::replacer('my_custom_validation_rule1', function($message, $attribute, $rule, $parameters){
            return str_replace(':foo', $parameters[0], $message);
        });
      require_once  __DIR__.'/Custom/CustomValidationRule.php';
    }



    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/customvalidator.php', 'customvalidator');

        // Register the service the package provides.
        $this->app->singleton('customvalidator', function ($app) {
            return new CustomValidator;
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['customvalidator'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/customvalidator.php' => config_path('customvalidator.php'),
        ], 'customvalidator.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/johnlobo'),
        ], 'customvalidator.views');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/johnlobo'),
        ], 'customvalidator.views');*/

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/johnlobo'),
        ], 'customvalidator.views');

        // Registering package commands.
        // $this->commands([]);
    }
}
