<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Card;
use App\Models\Admin\Customer_maintenance;
use App\Models\Admin\Maintenance;
use App\Models\Admin\Technician;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $techicians = Technician::where('technical_skills','0')->get();
        $assistants = Technician::where('technical_skills','1')->get();
        $customer_maintenances = Customer_maintenance::where('delivery_date', null)->get();
    return view('admin.dashboard',compact(['techicians','assistants','customer_maintenances']));
    }
}
