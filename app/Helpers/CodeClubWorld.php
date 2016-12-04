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

    public function postClub( $clubDataStr )
    {
        $clubData = json_decode($clubDataStr);

        $payload = [
            'name' => $clubData->name,
            'gender_split' => $clubData->perc_boys.':'.$clubData->perc_girls,
            'size' => $clubData->size,
            'contact_attributes' => [
                'name' => $clubData->contact_name,
                'email' => $clubData->contact_email,
                'skype' => $clubData->contact_skype
            ],
            'venue_attributes' => [
                'name' => $clubData->venue_name,
                'url' => $clubData->venue_url,
                'address_attributes' => [
                    'address_1' => $clubData->address_1,
                    'address_2' => $clubData->address_2,
                    'city' => $clubData->city,
                    'postcode' => $clubData->postcode,
                    'region' => $clubData->region,
                    'latitude' => $clubData->latitude,
                    'longitude' => $clubData->longitude,
                    'country_code' => 'BR'
                ]
            ]
        ];

        $request = [
            'url' => config('code_club_api.create_club_endpoint'),
            'headers' => ['Content-Type: application/json', 
                          'Authorization: '.config('code_club_api.api_bearer_key')],
            'params' => json_encode($payload)
        ];        

        $apiRet = $this->httpClient->post($request)->content();

        return $apiRet == '201';
    }

    public function getHttpClient()
    {
        return $this->httpClient;
    }
}
