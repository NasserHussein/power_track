<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loss extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'description_of_loss',
        'date_of_loss',
        'amount',
        'cause_of_loss',
        'created_at',
        'updated_at'
    ];
}
