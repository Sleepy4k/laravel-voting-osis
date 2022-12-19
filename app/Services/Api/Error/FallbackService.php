<?php

namespace App\Services\Api\Error;

use App\Services\ApiService;

class FallbackService extends ApiService
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->createResponse(trans('api.fallback.error'), [
            'error' => trans('api.fallback.message')
        ], 404);
    }
}