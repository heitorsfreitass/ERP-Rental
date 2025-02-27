<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_id',
        'maintenance_date',
        'description',
        'cost'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
