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

            session()->put('language_code', $user->language);
            activity('auth')->withProperties($user)->log($user->username.' berhasil login');
            toastr()->success('Kamu berhasil login', 'System');

            return true;
        } else {
            toastr()->error('Nis atau password tidak cocok', 'System');

            return false;
        }
    }
}