<?php

namespace App\Repositories;

use App\Models\Farmer;
use Illuminate\Database\Eloquent\Collection;

class EloquentFarmerRepository implements FarmerRepositoryInterface
{
    /**
     * Retrieve all farmers from the database.
     *
     * @return Collection|Farmer[]
     */
    public function all(): Collection
    {
        return Farmer::all();
    }

    /**
     * Find a farmer by its primary key.
     *
     * @param  int  $id
     * @return Farmer|null
     */
    public function find($id): ?Farmer
    {
        return Farmer::find($id);
    }

    /**
     * Create a new farmer in the database.
     *
     * @param  array  $data
     * @return Farmer
     */
    public function create(array $data): Farmer
    {
        return Farmer::create($data);
    }

    /**
     * Update a given farmer with the provided data.
     *
     * @param  Farmer  $farmer
     * @param  array  $data
     * @return Farmer
     */
    public function update(Farmer $farmer, array $data): Farmer
    {
        $farmer->update($data);
        
        return $farmer;
    }

    /**
     * Delete the specified farmer from the database.
     *
     * @param  Farmer  $farmer
     * @return bool
     */
    public function delete(Farmer $farmer): bool
    {        
        return $farmer->delete();
    }
}
