<?php

namespace App\Services\Api\Auth;

use App\Services\ApiService;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Auth\LoginResource;

class LoginService extends ApiService
{
    /**
     * Store a newly created resource in storage.
     * 
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        try {
            $user = $this->userInterface->findByCustomId([['nis', $request['nis']]]);
        } catch (\Throwable $th) {
            return $this->createResponse(trans('api.login.error'), [
                'error' => trans('api.login.not_found')
            ], 401);
        }

        if (!Hash::check($request['password'], $user->password)) {
            return $this->createResponse(trans('api.login.error'), [
                'error' => trans('api.login.invalid_password')
            ], 401);
        }
        
        $token = $user->createToken(fake()->userName);

        activity('auth')->withProperties($user)->log($user->name . ' berhasil login');

        return $this->createResponse(trans('api.login.success'), [
            'data' => new LoginResource($user),
            'token' => $token->plainTextToken
        ], 202);
    }
}