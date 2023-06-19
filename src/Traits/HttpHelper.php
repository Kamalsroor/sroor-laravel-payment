<?php

declare(strict_types=1);


namespace Sroor\Payment\Traits;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait HttpHelper {

    /**
     * Make http post request
     * @param string $url
     * @param array $payload
     * @return Response
     */
    private function makeRequest(string $url, array $payload): Response {
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ])->post(
            $url,
            $payload
        );
        return $response;
    }


}