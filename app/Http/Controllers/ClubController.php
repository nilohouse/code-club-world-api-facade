<?php

namespace App\Http\Controllers;

use App\Helpers\Contracts\CodeClubWorldContract;

use App\ClubData;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    protected $codeClub;

    public function __construct(CodeClubWorldContract $codeClub)
    {
        $this->codeClub = $codeClub;
    }

    public function createClub(Request $request)
    {
        $ret = $this->codeClub->postClub(json_encode($request->clubData));
        return response()->json($ret);
    }
}
