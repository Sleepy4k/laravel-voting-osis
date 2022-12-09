<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;
use Illuminate\Http\Request;

class LogoutService extends WebService
{
    /**
     * Store function.
     * 
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        activity('logout')->withProperties($user)->log($user->username.' berhasil logout');

        auth()->logout();
         
        $session = $request->session();
        $session->invalidate();
        $session->regenerateToken();

        return $session;
    }
}