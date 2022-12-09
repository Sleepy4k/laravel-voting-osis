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

        toastr()->error('System having trouble, please try again later', 'System');

        return back();
    }
}