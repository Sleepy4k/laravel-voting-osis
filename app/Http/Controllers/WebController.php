<?php

namespace App\Http\Controllers;

use App\Traits\SystemLog;

class WebController extends Controller
{
    use SystemLog;

    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    protected function redirectError($error)
    {
        $this->sendReportLog('error', $error->getMessage());

        if (auth()->check() && auth()->user()->getRoleNames()[0] == 'superadmin') {
            toastr()->error($error->getMessage(), 'Debug');
        }

        return back();
    }
}