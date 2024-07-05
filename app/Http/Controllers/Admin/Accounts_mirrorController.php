<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCostRequest;
use App\Models\Admin\Loss;
use App\Models\Admin\Maintenance;
use App\Models\Admin\Operating_expense;
use Illuminate\Http\Request;

class Accounts_mirrorController extends Controller
{
    public function select(){
        return view('admin.pages.accounts_mirror.determine_the_duration_of_all_accounts');
    }
    public function index(AdminCostRequest $request){
        $start = $request['start'];
        $end = $request['end'];
        $maintenances = Maintenance::whereHas('card',function($q){$q->where('type_card','0');})->whereBetween('date', [$start, $end])->get();
        $maintenances_sum = $maintenances->sum('cost');
        $maintenances_companies = Maintenance::whereHas('card',function($q){$q->where('type_card','1');})->whereBetween('date', [$start, $end])->get();
        $maintenances_companies_sum = $maintenances_companies->sum('cost');
        $losses = Loss::whereBetween('date_of_loss', [$start, $end])->get();
        $losses_sum = $losses->sum('amount');
        $operating_expenses = Operating_expense::whereBetween('payment_date', [$start, $end])->get();
        $operating_expenses_sum = $operating_expenses->sum('amount');
        return view('admin.pages.accounts_mirror.index',compact(['start','end','maintenances_sum','losses_sum','operating_expenses_sum','operating_expenses','maintenances_companies_sum']));
    }
}
