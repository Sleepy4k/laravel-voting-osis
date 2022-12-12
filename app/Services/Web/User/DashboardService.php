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
     * Store a newly created resource in storage.
     * 
     * @param  array  $request
     * @return boolean
     */
    public function store($request)
    {
        if (auth()->user()->voting_status == 'false') {
            $this->votingInterface->create($request);
            $this->candidateInterface->findById($request['candidate_id'])->increment('total_voting');
            $this->userInterface->update($request['user_id'], [
                'voting_status' => 'true'
            ]);

            toast()->success('Kamu berhasil memilih kandidat nomor ' . $request['candidate_id'], 'System');

            return true;
        }

        return false;
    }
}