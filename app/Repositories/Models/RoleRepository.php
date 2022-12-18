<?php

namespace App\Repositories\Models;

use Spatie\Permission\Models\Role;
use App\Contracts\Models\RoleInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class RoleRepository extends EloquentRepository implements RoleInterface
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
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
    
    /**
     * Create a model.
     *
     * @param  array  $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        if (array_key_exists('permission', $payload)) {
            $permission = $payload['permission'];

            unset($payload['permission']);
        }

        $model = $this->model->create($payload);

        if ($permission) {
            $model->syncPermissions($permission);
        }

        return $model->fresh();
    }
    
    /**
     * Update existing model.
     *
     * @param  int  $modelId
     * @param  array  $payload
     * @return Model
     */
    public function update(int $modelId, array $payload): bool
    {
        if (array_key_exists('permission', $payload)) {
            $permission = $payload['permission'];

            unset($payload['permission']);
        }

        $model = $this->findById($modelId);

        if ($permission) {
            $model->syncPermissions($permission);
        }

        return $model->update($payload);
    }
}