<?php

namespace App\Repositories\Models;

use App\Models\User;
use App\Traits\UploadFile;
use App\Contracts\Models\UserInterface;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository implements UserInterface
{
    use UploadFile;

    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param Model $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        if (array_key_exists('role', $payload)) {
            $role = $payload['role'];

            unset($payload['role']);
        }

        $model = $this->model->create($payload);

        if (array_key_exists('role', $payload)) {
            $model->assignRole($role);
        } else {
            $model->assignRole('user');
        }

        return $model->fresh();
    }
    
    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return Model
     */
    public function update(int $modelId, array $payload): bool
    {
        if (array_key_exists('role', $payload)) {
            $role = $payload['role'];

            unset($payload['role']);
        }

        $model = $this->findById($modelId);

        if (array_key_exists('role', $payload)) {
            $model->syncRoles($role);
        }

        return $model->update($payload);
    }
}