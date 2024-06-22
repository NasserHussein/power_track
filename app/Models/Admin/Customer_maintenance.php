<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_maintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'card_state',
        'problem_description',
        'received_date',
        'work_details',
        'card_state_after_maintenance',
        'spare_parts',
        'maintenance_cost',
        'date_of_finishing',
        'delivery_date',
        'notes',
        'customer_card_id',
        'created_at',
        'updated_at'
    ];
    protected $hidden = ['pivot'];
    public function customer_card(){
        return $this->belongsTo('App\Models\Customer_card');
    }
    public function technicians(){
        return $this->belongsToMany('App\Models\Technician','technician_customer_maintenance');
    }
}
