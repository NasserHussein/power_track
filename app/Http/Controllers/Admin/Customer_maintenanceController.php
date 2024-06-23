<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer_maintenanceRequest;
use App\Http\Requests\Customer_report_maintenanceRequest;
use App\Models\Admin\Customer_maintenance;
use App\Models\Admin\Technician;
use Illuminate\Http\Request;

class Customer_maintenanceController extends Controller
{
    public function index($id){
        $customer_maintenances = Customer_maintenance::where('customer_card_id', $id)->get();
        return view('admin.pages.customer_card.maintenance.index',compact('customer_maintenances'));
    }
    public function store(Customer_maintenanceRequest $request , $id){
        Customer_maintenance::create([
            'card_state' => $request['card_state'],
            'problem_description' => $request['problem_description'],
            'received_date' => $request['received_date'],
            'notes' => $request['notes'],
            'customer_card_id' => $id
        ]);
        return redirect()->route('admin.index.customer.maintenance',$id)->with(['success' => 'تم تسجيل بيانات صيانة المعدة بنجاح']);
    }
    public function edit($id){
        $customer_maintenance = Customer_maintenance::find($id);
        if(!$customer_maintenance){
            return abort(404);
        }
        return view('admin.pages.customer_card.maintenance.edit',compact('customer_maintenance'));
    }
    public function update(Customer_maintenanceRequest $request , $id){
        $customer_maintenance = Customer_maintenance::find($id);
        if(!$customer_maintenance){
            return abort(404);
        }
        $customer_maintenance->update([
            'card_state' => $request['card_state'],
            'problem_description' => $request['problem_description'],
            'received_date' => $request['received_date'],
            'notes' => $request['notes']
        ]);
        return redirect()->route('admin.index.customer.maintenance',$customer_maintenance->customer_card_id)->with(['success' => 'تم تعديل بيانات صيانة المعدة بنجاح']);

    }
    public function edit_report($id){
        $technicians_id = [];
        $techicians = Technician::all();
        $customer_maintenance = Customer_maintenance::find($id);
        if(!$customer_maintenance){
            return abort(404);
        }
        foreach($customer_maintenance->technicians as $te){
        $technicians_id[] = $te->id;
        }
        return view('admin.pages.customer_card.maintenance.create',compact(['customer_maintenance','techicians','technicians_id']));
    }
    public function update_report(Customer_report_maintenanceRequest $request, $id){
        $customer_maintenance = Customer_maintenance::find($id);
        if(!$customer_maintenance){
            return abort(404);
        }
        $customer_maintenance->update([
            'card_state_after_maintenance' => $request['card_state_after_maintenance'],
            'work_details' => $request['work_details'],
            'spare_parts' => $request['spare_parts'],
            'date_of_finishing' => $request['date_of_finishing'],
            'delivery_date' => $request['delivery_date'],
            'maintenance_cost' => $request['maintenance_cost']
        ]);
        $customer_maintenance ->technicians() ->sync($request['technicians']);
        return redirect()->route('admin.index.customer.maintenance',$customer_maintenance->customer_card_id)->with(['success' => 'تم اضافة تقرير الصيانة بنجاح']);
    }
    public function delete($id){
        $customer_maintenance = Customer_maintenance::find($id);
        $card_id = $customer_maintenance->customer_card_id;
        if(!$customer_maintenance){
            return abort(404);
        }
        $customer_maintenance->delete();
        return redirect()->route('admin.index.customer.maintenance',$card_id)->with(['error' => 'تم حذف بيانات الصيانة بنجاح']);
    }
}
