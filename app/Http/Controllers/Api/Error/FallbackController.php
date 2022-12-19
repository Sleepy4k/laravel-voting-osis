<?php

namespace App\Http\Controllers\Api\Error;

use App\Http\Controllers\ApiController;
use App\Services\Api\Error\FallbackService;

class FallbackController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Api\Error\FallbackService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(FallbackService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
