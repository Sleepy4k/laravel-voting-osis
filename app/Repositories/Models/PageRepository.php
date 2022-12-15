<?php

namespace App\Repositories\Models;

use App\Models\Page;
use App\Contracts\Models\PageInterface;
use App\Repositories\EloquentRepository;

class PageRepository extends EloquentRepository implements PageInterface
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
    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}