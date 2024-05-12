<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'company_name',
        'name_manager',
        'phone_no',
        'email',
        'company_address',
        'date_of_contract',
        'created_at',
        'updated_at'
    ];
}
