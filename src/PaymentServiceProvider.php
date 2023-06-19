<?php

declare(strict_types=1);


namespace Sroor\Payment;

use Illuminate\Support\ServiceProvider;
use Sroor\Payment\Payment;



class PaymentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/payment.php' => config_path('payment.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/payment.php', 'payment');

        // PayMob Facede.
        $this->app->bind('payment', function () {
            return new Payment();
        });
    }
}