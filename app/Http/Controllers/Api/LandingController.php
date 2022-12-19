<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\LandingService;
use App\Http\Controllers\ApiController;

class LandingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Api\LandingService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(LandingService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
