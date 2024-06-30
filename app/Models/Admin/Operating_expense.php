<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operating_expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'clause',
        'description',
        'amount',
        'payment_date',
        'person_responsible_for_payment',
        'notes',
        'created_at',
        'updated_at'
    ];
}
