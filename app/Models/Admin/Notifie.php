<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifie extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'spare_parts',
        'notes',
        'notification_date',
        'status',
        'maintenance_id',
        'created_at',
        'updated_at'
    ];
}
