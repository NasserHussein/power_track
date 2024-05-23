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
        'card_no',
        'part',
        'card_model',
        'model_year',
        'brand_name',
        'mast_type',
        'tire_type',
        'card_load',
        'chassis_no',
        'safety',
        'battery',
        'charger',
        'charging_plug',
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
