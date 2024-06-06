<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
