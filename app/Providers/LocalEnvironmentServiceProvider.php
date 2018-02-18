<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
/**
 * APP_ENV = localのみで設定してたいProvider,Aliasを設定する
 * ServiceProvider
 */
class LocalEnvironmentServiceProvider extends ServiceProvider {

    /**
     * APP_ENV = localでのみ設定したいProviderのList
     * @var array
     */
    protected $localProviders = [
        'Barryvdh\Debugbar\ServiceProvider',
    ];

    /**
     * APP_ENV = localでのみ設定したいAliasesのList
     * @var array
     */
    protected $facadeAliases = [
        'Debugbar' => 'Barryvdh\Debugbar\Facade',
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->isLocal())
        {
            $this->registerServiceProviders();
            $this->registerFacadeAliases();
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * 追加で使用するserviceproviderをloadする
     * Base file providers load is /config/app.php => providers
     */
    protected function registerServiceProviders()
    {
        foreach ($this->localProviders as $provider)
        {
            $this->app->register($provider);
        }
    }

    /**
     * 追加で使用するAliaseをロードする
     * Base file Alias load is /config/app.php => aliases
     */
    public function registerFacadeAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->facadeAliases as $alias => $facade)
        {
            $loader->alias($alias, $facade);
        }
    }
}
