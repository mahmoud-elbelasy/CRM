<?php

namespace Crm\Base\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected Model $model;
    public function all()
    {
        return $this->model->all();
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): ?Model
    {
        $this->model->create($data);
        return $this->model;
    }

    public function update(array $data): ?Model
    {
        $model = $this->model->find($data['id'] ?? 0);
        if(! $model){
            return null;
        }
        $model->update($data);
        return $model;
    }

    public function delete($id): ?bool
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel(Model $model): void
    {
        $this->model = $model;
    }
}
