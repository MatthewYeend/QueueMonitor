<?php

namespace MattYeend\QueueMonitoring;

use Illuminate\Support\ServiceProvider;
use MattYeend\QueueMonitor\Services\QueueMonitorService;

class QueueMonitoringServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/queue-monitor.php', 'queue-monitor');

        $this->app->singleton(QueueMonitorService::class, function ($app) {
            return new QueueMonitorService();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/Http/Resources/views', 'queue-monitor');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        if($this->app->runningInConsole()){
            $this->publishes([
                __DIR__ . '/config/queue-monitor.php' => config_path('queue-monitor.php'),
                __DIR__ . '/Http/Resources/views' => resource_path('views/vendor/queue-monitor'),
            ]);
        }
    }
}