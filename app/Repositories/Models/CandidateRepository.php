<?php

namespace App\Repositories\Models;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\CandidateInterface;

class CandidateRepository extends EloquentRepository implements CandidateInterface
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
    public function __construct(Candidate $model)
    {
        $this->model = $model;
    }
}