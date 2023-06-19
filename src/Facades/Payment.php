<?php

declare(strict_types=1);


namespace Sroor\Payment\Facades;

use Illuminate\Support\Facades\Facade;

class Paymnet extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'payment';
    }
}