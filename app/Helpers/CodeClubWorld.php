<?php

namespace App\Helpers;

use App\Helpers\Contracts\CodeClubBRContract;

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
        
    }

    public function getHttpClient()
    {
        return $this->httpClient;
    }
}
