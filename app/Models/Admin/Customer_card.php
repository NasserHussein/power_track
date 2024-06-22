<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_card extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'serial_no',
        'chassis_no',
        'card_model',
        'date_of_purchase',
        'notes',
        'customer_name',
        'phone_no',
        'email',
        'address',
        'company_name',
        'created_at',
        'updated_at'
    ];
    public function customer_maintenances(){
        return $this->hasMany('App\Models\Customer_maintenance');
    }
}
