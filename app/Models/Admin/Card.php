<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'name',
    'code',
    'part',
    'model',
    'date_of_start',
    'weight',
    'maker',
    'drg_no',
    'dimensions',
    'supplier',
    'inst_bk_no',
    'power',
    'mfg_order_no',
    'maintenance_bk_no',
    'control_voltage',
    'purchase_order_no',
    'capacity',
    'total_amperage',
    'serial_no',
    'material',
    'additional_data',
    'card_hours',
    'date_of_oil',
    'oil_hours',
    'hours_used',
    'remaining_hours',
    'date_of_oil_gearbox',
    'oil_hours_gearbox',
    'hours_used_gearbox',
    'remaining_hours_gearbox',
    'created_at',
    'updated_at'
];
    public function Maintenances(){
        return $this->hasMany('App\Models\Admin\Maintenance');
    }
}
