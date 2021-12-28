<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Find one register
     *
     * @paran int $id
     * @return array
     */
    public function find(int $id)
    {
        return $this->model::find($id)->toArray();
    }

    /**
     * Find one register or fail
     *
     * @paran int $id
     * @return array
     */
    public function findOrFail(int $id)
    {
        return $this->model::findOrFail($id)->toArray();
    }

    /**
     * Find first register
     *
     * @return array
     */
    public function first()
    {
        return $this->model::first()->toArray();
    }

    /**
     * Get all registers
     *
     * @return array
     */
    public function all()
    {
        return $this->model::all()->toArray();
    }

    /**
     * Gte with paginate
     *
     * @return array
     */
    public function paginate($limit = 10)
    {
        return $this->model::paginate($limit);
    }

    /**
     * Create new register
     *
     * @paran array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->model::create($data)->toArray();
    }

    /**
     * Update one register
     *
     * @paran int $id
     * @paran array $data
     * @return array
     */
    public function update(int $id, array $data)
    {
        return $this->model::findOrFail($id)->update($data);
    }

    /**
     * Delete one register
     *
     * @paran int $id
     * @return array
     */
    public function delete(int $id)
    {
        return $this->model::findOrFail($id)->delete();
    }

    /**
     * Force delete one register
     *
     * @paran int $id
     * @return array
     */
    public function forceDelete(int $id)
    {
        return $this->model::findOrFail($id)->forceDelete();
    }
}
