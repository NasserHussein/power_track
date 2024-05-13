<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'invoice_number',
        'description',
        'invoice_value',
        'invoice_data',
        'invoice_date',
        'notes',
        'status',
        'customer_id',
        'created_at',
        'updated_at'
    ];
    public function customer(){
        return $this->belongsTo('App\Models\Admin\Customer');
    }
}
