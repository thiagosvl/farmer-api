<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    protected $fillable = ['corporate_name', 'trading_name', 'business_id', 'cell_phone', 'city', 'state'];
}
