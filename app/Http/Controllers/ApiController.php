<?php

namespace App\Http\Controllers;

use App\Traits\ApiRespons;

class ApiController extends Controller
{
    use ApiRespons;
    
    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    protected function catchError($error)
    {
        $this->sendReportLog('error', $error->getMessage());

        if (auth()->check() && auth()->user()->getRoleNames()[0] != 'user') {
            return $this->createResponse('Server Error', [
                'error' => $error->getMessage()
            ], 500);
        }

        return $this->createResponse('Server Error', [
            'error' => 'Internal server error'
        ], 500);
    }
}