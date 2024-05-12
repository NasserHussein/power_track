<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Admin\Customer;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('admin.pages.customer.index',compact('customers'));
    }
    public function create(){
        return view('admin.pages.customer.create');
    }
    public function store(CustomerRequest $request){
        Customer::create([
            'company_name' => $request['company_name'],
            'name_manager' => $request['name_manager'],
            'phone_no' => $request['phone_no'],
            'email' => $request['email'],
            'company_address' => $request['company_address'],
            'date_of_contract' => $request['date_of_contract']
        ]);
        return redirect()->route('admin.index.customer')->with(['success' => 'تم تسجيل بيانات العميل بنجاح']);
    }
    public function edit($id){
        $customer = Customer::find($id);
        if(!$customer){
            return abort(404);
        }
        return view('admin.pages.customer.edit',compact('customer'));
    }
    public function update(CustomerRequest $request , $id){
        $customer = Customer::find($id);
        if(!$customer){
            return abort(404);
        }
        $customer->update([
            'company_name' => $request['company_name'],
            'name_manager' => $request['name_manager'],
            'phone_no' => $request['phone_no'],
            'email' => $request['email'],
            'company_address' => $request['company_address'],
            'date_of_contract' => $request['date_of_contract']
        ]);
        return redirect()->route('admin.index.customer')->with(['success' => 'تم تعديل بيانات العميل بنجاح']);
    }
    public function delete($id){
        $customer = Customer::find($id);
        if(!$customer){
            return abort(404);
        }
        $customer->delete();
        return redirect()->route('admin.index.customer')->with(['error' => 'تم حذف بيانات العميل بنجاح']);
    }
}
