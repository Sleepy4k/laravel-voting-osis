<?php

namespace App\Repositories\Models;

use App\Models\Application;
use Illuminate\Support\Facades\Cache;
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
     * @param  Model  $model
     */
    public function __construct(Application $model)
    {
        $this->model = $model;
    
    }
    
    /**
     * Find model by id.
     *
     * @param  int  $modelId
     * @param  array  $columns
     * @param  array  $relations
     * @param  array  $appends
     * @return Model
     */
    public function findById(int $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Model
    {
        return Cache::remember('application.'.$modelId, now()->addDays(rand(1,2)), function() use ($modelId) {
            return $this->model->findOrFail($modelId);
        });
    }
}