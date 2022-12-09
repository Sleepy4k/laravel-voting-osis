<?php

namespace App\Repositories;

use App\Contracts\EloquentInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class EloquentRepository implements EloquentInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor.
     * 
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models.
     *
     * @param array $columns
     * @param array $relations
     * @param array $wheres
     * @param string $orderBy
     * @param bool $latest
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = [], array $wheres = [], string $orderBy = 'created_at', bool $latest = true): Collection
    {
        try {
            $model = $this->model->with($relations);

            if (!empty($orderBy)) {
                $model->orderBy($orderBy, $latest ? 'desc' : 'asc');
            }

            if (!empty($wheres)) {
                $model->where($wheres);
            }

            return $model->get($columns);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Get all in pagination models.
     *
     * @param int $paginate
     * @param array $columns
     * @param array $relations
     * @param array $wheres
     * @param string $orderBy
     * @param bool $latest
     * @return Collection
     */
    public function paginate(int $paginate = 10, array $columns = ['*'], array $relations = [], array $wheres = [], string $orderBy = 'created_at', bool $latest = true)
    {
        try {
            $model = $this->model->with($relations);

            if (!empty($orderBy)) {
                $model->orderBy($orderBy, $latest ? 'desc' : 'asc');
            }

            if (!empty($wheres)) {
                $model->where($wheres);
            }

            return $model->select($columns)->paginate($paginate);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Get all trashed models.
     *
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        try {
            return $this->model->onlyTrashed()->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    /**
     * Find model by id.
     *
     * @param int $modelId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model
     */
    public function findById(int $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }
    
    /**
     * Find model by custom id.
     *
     * @param array $wheres
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model
     */
    public function findByCustomId(array $wheres = [], array $columns = ['*'], array $relations = [], array $appends = []): ?Model
    {
        return $this->model->select($columns)->with($relations)->where($wheres)->firstOrFail();
    }

    /**
     * Find trashed model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findTrashedById(int $modelId): ?Model
    {
        return $this->model->withTrashed()->findOrFail($modelId);
    }
    
    /**
     * Find trashed model by custom id.
     *
     * @param array $wheres
     * @return Model
     */
    public function findTrashedByCustomId(array $wheres = []): ?Model
    {
        return $this->model->withTrashed()->where($wheres)->firstOrFail();
    }

    /**
     * Find only trashed model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findOnlyTrashedById(int $modelId): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($modelId);
    }
    
    /**
     * Find only trashed model by custom id.
     *
     * @param array $wheres
     * @return Model
     */
    public function findOnlyTrashedByCustomId(array $wheres = []): ?Model
    {
        return $this->model->onlyTrashed()->where($wheres)->firstOrFail();
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        try {
            $model = $this->model->create($payload);
    
            return $model->fresh();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
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
        try {
            $model = $this->findById($modelId);
    
            return $model->update($payload);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function deleteById(int $modelId): bool
    {
        try {
            return $this->findById($modelId)->delete();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    /**
     * Restore model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function restoreById(int $modelId): bool
    {
        try {
            return $this->findOnlyTrashedById($modelId)->restore();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    /**
     * Permanently delete model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function permanentlyDeleteById(int $modelId): bool
    {
        try {
            return $this->findTrashedById($modelId)->forceDelete();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}