<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Card;
use App\Models\Admin\Maintenance;
use App\Models\Admin\Technician;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $cards_oils_gearbox = Card::where('remaining_hours_gearbox', '<=' , 100)->get()->sortBy('remaining_hours_gearbox');
        $techicians = Technician::where('technical_skills','0')->get();
        $assistants = Technician::where('technical_skills','1')->get();
    return view('admin.dashboard',compact(['cards_oils_gearbox','techicians','assistants']));
    }
}
