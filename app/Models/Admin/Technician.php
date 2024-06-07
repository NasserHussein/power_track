<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'phone_no',
        'email',
        'address',
        'date_of_employment',
        'qualifications',
        'previous_experience',
        'technical_skills',
        'created_at',
        'updated_at'
    ];
    protected $hidden = ['pivot'];
    public function maintenances(){
        return $this->belongsToMany('App\Models\Admin\Maintenance','technician_maintenance');
    }
}
