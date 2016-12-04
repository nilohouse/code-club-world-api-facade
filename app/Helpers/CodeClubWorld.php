<?php

namespace App\Helpers;

use App\Helpers\Contracts\CodeClubWorldContract;

use Vinelab\Http\Client as HttpClient;

class CodeClubWorld implements CodeClubWorldContract
{
    private $httpClient;

    public function __construct(HttpClient $client)
    {
        $this->httpClient = $client;
    }

    public function postClub( $clubData )
    {
       $request = [
            'url' => config('code_club_api.create_club_endpoint'),
            'headers' => ['Content-Type: application/json', 
                          'Authorization: '.config('code_club_api.api_bearer_key')]
        ];

        $apiRet = $this->httpClient->post($request)->content();

        return $apiRet == '201';
    }

    public function getHttpClient()
    {
        return $this->httpClient;
    }
}
