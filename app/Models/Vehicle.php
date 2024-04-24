<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'vehicle_photo',
    ];

    public function vehicleSpecifications()
    {
        return $this->hasMany(VehicleSpecification::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
