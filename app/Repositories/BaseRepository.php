<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $with = [], array $conditions = [])
    {
        $query = $this->model::with($with);

        foreach ($conditions as $condition) {
            $query->where(...$condition);
        }

        return $query->get();
    }

    public function paginate(
        array $with = [],
        int $page = 10,
        array $conditions = [],
        int $skip = 0,
        string $orderBy = 'id',
        string $direction = 'desc'
    ) {
        $query = $this->model::with($with);
    
        foreach ($conditions as $condition) {
            [$field, $operator, $value] = $condition;
    
            // Cas WHERE IN
            if (strtoupper($operator) === 'IN' && is_array($value)) {
                $query->whereIn($field, $value);
            }
            // Cas WHERE LIKE
            elseif (strtoupper($operator) === 'LIKE') {
                $query->where($field, 'LIKE', $value);
            }
            // Cas normal (=, >, <, etc.)
            else {
                $query->where($field, $operator, $value);
            }
        }
    
        return $query->orderBy($orderBy, $direction)
                     ->skip($skip)
                     ->paginate($page);
    }
    

    public function find(string $id, array $with = [])
    {
        return $this->model->with($with)->findOrFail($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $instance = $this->model->findOrFail($id);
        $instance->update($data);
        return $instance;
    }

    public function delete(string $id): bool
    {
        $obj = $this->model::find($id);
        return $obj->delete();
    }
}
