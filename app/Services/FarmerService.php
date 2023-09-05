<?php

namespace App\Services;

use App\Repositories\FarmerRepositoryInterface;
use  App\Models\Farmer;
use Illuminate\Support\Collection;

class FarmerService
{
    protected $repository;

    public function __construct(FarmerRepositoryInterface $farmerRepository)
    {
        $this->repository = $farmerRepository;
    }

    /**
     * Retrieve all farmers.
     *
     * @return Collection
     */
    public function all() : Collection
    {
        return $this->repository->all();
    }

    /**
     * Find a farmer by its identifier.
     *
     * @param  int  $id
     * @return Farmer|null
     */
    public function find($id): ?Farmer
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new farmer with the given data.
     *
     * @param  array  $data
     * @return Farmer
     */
    public function create(array $data) : Farmer
    {
        return $this->repository->create($data);
    }

    /**
     * Update the given farmer with the provided data.
     *
     * @param  Farmer  $farmer
     * @param  array  $data
     * @return Farmer
     */
    public function update(Farmer $farmer, array $data) : Farmer
    {
        return $this->repository->update($farmer, $data);
    }

    /**
     * Delete the specified farmer.
     *
     * @param  Farmer  $farmer
     * @return bool
     */
    public function delete(Farmer $farmer): bool 
    {
        return $this->repository->delete($farmer);
    }
}
