<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class DashboardService extends WebService
{
    /**
     * Display a listing of the resource.
     * 
     * @return array
     */
    public function index()
    {
        $data = [
            'users' => $this->userInterface->all(['*'], [], [], 'created_at', true, ['user']),
            'already_choose' => $this->userInterface->all(['*'], [], [['voting_status', 'true']], 'created_at', true, ['user']),
            'candidates' => $this->candidateInterface->all(),
            'voters' => $this->votingInterface->all(['*'], ['user'], [], 'created_at', true)->take(4),
            'chart' => [
                'series' => [],
                'label' => []
            ]
        ];

        foreach ($data['candidates'] as $candidate) {
            $data['chart']['series'][] = $candidate->total_voting;
            $data['chart']['label'][] = $candidate->chairman . ' & ' . $candidate->vice_chairman;
        }

        return $data;
    }
}