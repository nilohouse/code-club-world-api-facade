<?php

namespace App\Helpers\Contracts;

interface CodeClubWorldContract
{
    public function postClub( $clubData );

    public function getHttpClient();
}
