<?php

namespace App\Http\Controllers;

use App\Traits\FormatApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, FormatApiResponse;

    public function apiWelcome()
    {
        $appName = config('app.name');
        return response()->json(['message' => "WELLCOME TO $appName API"]);
    }
}
