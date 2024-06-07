<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'maintenance',
        'spare_parts',
        'cost',
        'date',
        'duration',
        'technician_name',
        'created_at',
        'updated_at',
        'card_id'
    ];
    protected $hidden = ['pivot'];
    public function card(){
        return $this->belongsTo('App\Models\Admin\Card');
    }
    public function technicians(){
        return $this->belongsToMany('App\Models\Admin\Technician','technician_maintenance');
    }
}
