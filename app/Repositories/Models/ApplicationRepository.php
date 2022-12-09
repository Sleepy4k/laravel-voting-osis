<?php

namespace App\Repositories\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\ApplicationInterface;

class ApplicationRepository extends EloquentRepository implements ApplicationInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param Model $model
     */
    public function __construct(Application $model)
    {
        $this->model = $model;
    }
}