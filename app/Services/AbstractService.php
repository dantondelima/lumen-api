<?php

namespace App\Services;

use App\Repositories\AbstractRepository;

class AbstractService
{
    protected $repository;

    /**
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find one register
     *
     * @param int $id
     * @return array
     */
    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * Find one register or fail
     *
     * @param int $id
     * @return array
     */
    public function findOrFail(int $id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Find first register
     *
     * @return array
     */
    public function first()
    {
        return $this->repository->first();
    }

    /**
     * Get all registers
     *
     * @return array
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Get with paginate
     *
     * @param $limit
     * @return array
     */
    public function paginate($limit = 10)
    {
        return $this->repository->paginate($limit);
    }

    /**
     * Create new register
     *
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update one register
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete one register
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    /**
     * Force delete one register
     *
     * @param int $id
     * @return array
     */
    public function forceDelete(int $id)
    {
        return $this->repository->findOrFail($id);
    }
}
