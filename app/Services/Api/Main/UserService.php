<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\UserResource;

class UserService extends ApiService
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userInterface->all(['*'], [], [], 'created_at', true, ['user']);

        if (count($users) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => UserResource::collection($users)
            ], 202);
        }

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => trans('api.response.no_data')
        ], 202);
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $nis
     * @return \Illuminate\Http\Response
     */
    public function show($nis)
    {
        $user = $this->userInterface->findByCustomId([['nis', $nis]]);

        if (empty($user)) {
            return $this->createResponse(trans('api.response.not_found'), [
                'error' => trans('api.concert.not_found')
            ], 404);
        }

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new UserResource($user)
        ], 206);
    }
}