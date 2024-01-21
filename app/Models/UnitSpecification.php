<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitSpecification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unit_id',
        'type',
        'specification'
    ];

    /**
     * Get the user that owns the UnitSpecification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'id_unit');
    }
}
