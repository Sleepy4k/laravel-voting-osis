<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;
use Illuminate\Http\Request;

class LogoutService extends WebService
{
    /**
     * Store a newly created resource in storage.
     * 
     * @param  Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        activity('auth')->withProperties($user)->log($user->username.' berhasil logout');

        auth()->logout();
         
        $session = $request->session();
        $session->invalidate();
        $session->regenerateToken();

        return $session;
    }
}