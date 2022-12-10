<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;

class LoginService extends WebService
{
    /**
     * Store a newly created resource in storage.
     * 
     * @param  array  $request
     * @return boolean
     */
    public function store($request)
    {
        if (auth()->attempt($request)) {
            request()->session()->regenerate();

            $user = auth()->user();

            activity('login')->withProperties($user)->log($user->username.' berhasil login');
            toastr()->success('Kamu berhasil login', 'System');

            return true;
        } else {
            return false;
        }
    }
}