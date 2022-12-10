<?php

namespace App\Services\Web\User;

use App\Services\WebService;

class DashboardService extends WebService
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'candidates' => $this->candidateInterface->all()
        ];
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  array  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $user = auth()->user();

        if ($user->voting_status == 'false') {
            $this->userInterface->update($user->id, [
                'voting_status' => 'true'
            ]);

            $this->votingInterface->create([
                'user_id' => $user->id,
                'candidate_id' => $id
            ]);

            return true;
        }

        return false;
    }
}