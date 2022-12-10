<?php

namespace App\Repositories\Models;

use App\Models\Voting;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\VotingInterface;

class VotingRepository extends EloquentRepository implements VotingInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param  Model  $model
     */
    public function __construct(Voting $model)
    {
        $this->model = $model;
    }
}