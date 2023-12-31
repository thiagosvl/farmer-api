<?php

namespace App\Repositories;

use App\Models\Farmer;

interface FarmerRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(Farmer $farmer, array $data);

    public function delete(Farmer $farmer);
}
