<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCostRequest;
use App\Http\Requests\TechnicianRequest;
use App\Models\Admin\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function index(){
        $techicians = Technician::all();
        return view('admin.pages.Technician.index',compact('techicians'));
    }
    public function create(){
        return view('admin.pages.Technician.create');
    }
    public function store(TechnicianRequest $request){
        Technician::create([
            'name' =>$request['name'],
            'phone_no' =>$request['phone_no'],
            'email' =>$request['email'],
            'address' =>$request['address'],
            'date_of_employment' =>$request['date_of_employment'],
            'qualifications' =>$request['qualifications'],
            'previous_experience' =>$request['previous_experience'],
            'technical_skills' =>$request['technical_skills']
        ]);
        return redirect()->route('admin.index.technician')->with(['success' => 'تم تسجيل بيانات الفني بنجاح']);
    }
    public function edit($id){
        $techician = Technician::find($id);
        if(!$techician){
            return abort(404);
        }
        return view('admin.pages.Technician.edit',compact('techician'));
    }
    public function update(TechnicianRequest $request , $id){
        $techician = Technician::find($id);
        if(!$techician){
            return abort(303);
        }
        $techician->update([
            'name' =>$request['name'],
            'phone_no' =>$request['phone_no'],
            'email' =>$request['email'],
            'address' =>$request['address'],
            'date_of_employment' =>$request['date_of_employment'],
            'qualifications' =>$request['qualifications'],
            'previous_experience' =>$request['previous_experience'],
            'technical_skills' =>$request['technical_skills']
        ]);
        return redirect()->route('admin.index.technician')->with(['success' => 'تم تعديل بيانات الفني بنجاح']);
    }
    public function delete($id){
        $techician = Technician::find($id);
        if(!$techician){
            return abort(404);
        }
        $techician->delete();
        return redirect()->route('admin.index.technician')->with(['error' => 'تم حذف بيانات الفني بنجاح']);
    }
    public function business(AdminCostRequest $request , $id){
        $techician = Technician::find($id);
        if(!$techician){
            return abort(404);
        }
        $start = $request['start'];
        $end = $request['end'];
        $maintenances = $techician->maintenances->whereBetween('date', [$start,$end])->sortByDesc('date');
        $customer_maintenances = $techician->customer_maintenances->whereBetween('date_of_finishing', [$start,$end])->sortByDesc('date_of_finishing');
        $count = $maintenances->count() + $customer_maintenances->count();
        $techician_name = $techician->name;
        if($techician->technical_skills == 0){
            $technical_skills = 'الفني';
        }else{
            $technical_skills = 'المساعد';
        }
        return view('admin.pages.Technician.business.index',compact(['technical_skills','start','end','maintenances','customer_maintenances','count','techician_name']));
    }
    public function business_technician(AdminCostRequest $request){
        $start = $request['start'];
        $end = $request['end'];
        $technical_skills = 'فني';
        $techicians = Technician::where('technical_skills','0')->get();
        return view('admin.pages.Technician.business.technician_rate',compact(['start','end','technical_skills','techicians']));
    }
    public function business_assistant(AdminCostRequest $request){
        $start = $request['start'];
        $end = $request['end'];
        $technical_skills = 'مساعد';
        $techicians = Technician::where('technical_skills','1')->get();
        return view('admin.pages.Technician.business.technician_rate',compact(['start','end','technical_skills','techicians']));
    }
}
