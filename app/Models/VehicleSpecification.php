<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleSpecification extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'vehicle_id',
        'specs',
        'specs_value'
    ];

    /**
     * Get the user that owns the VehicleSpecification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Unit(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle');
    }
}
