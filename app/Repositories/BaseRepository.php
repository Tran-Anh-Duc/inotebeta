<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $models;

    public function __construct(Model $models)
    {
        $this->models = $models;
    }

    public function getAll()
    {
        return $this->models->all();
    }

    public function getById($id)
    {
        return $this->models->findOrFail($id);
    }

    public function delete($id)
    {
        $model = $this->models::query()->findOrFail($id);
        $model->delete();
    }
}
