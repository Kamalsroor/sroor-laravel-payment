<?php

declare(strict_types=1);


namespace Sroor\Payment\Traits;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait PaymobHelper {



    /**
     * build iframe url using payment key and iframe id.
     * @param string $paymentKey
     * @param string $iframeId
     * @return string
     */
    private function buildIframeUrl(string $paymentKey, string $iframeId): string
    {
        return 'https://accept.paymobsolutions.com/api/acceptance/iframes/' . $iframeId . '?payment_token=' . $paymentKey;
    }
}