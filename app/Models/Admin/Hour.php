<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'card_hours',
        'count',
        'date',
        'created_at',
        'updated_at',
        'card_id'
    ];
}
