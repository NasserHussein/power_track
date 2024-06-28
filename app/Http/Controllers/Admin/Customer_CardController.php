<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer_cardRequest;
use App\Models\Admin\Customer_card;
use Illuminate\Http\Request;

class Customer_CardController extends Controller
{
    public function index(){
        $customer_cards = Customer_card::all();
        return view('admin.pages.customer_card.index',compact('customer_cards'));
    }
    public function create(){
        return view('admin.pages.customer_card.create');
    }
    public function store(Customer_cardRequest $request){
        Customer_card::create([
            'name' => $request['name'],
            'card_no' => $request['card_no'],
            'serial_no' => $request['serial_no'],
            'chassis_no' => $request['chassis_no'],
            'card_model' => $request['card_model'],
            'date_of_purchase' => $request['date_of_purchase'],
            'notes' => $request['notes'],
            'customer_name' => $request['customer_name'],
            'phone_no' => $request['phone_no'],
            'email' => $request['email'],
            'address' => $request['address'],
            'company_name' => $request['company_name']
        ]);
        return redirect()->route('admin.index.customer.Card')->with(['success' => 'تم تسجيل بيانات المعدة بنجاح']);
    }
    public function edit($id){
        $customer_card = Customer_card::find($id);
        if(!$customer_card){
            return abort(404);
        }
        return view('admin.pages.customer_card.edit',compact('customer_card'));
    }
    public function update(Customer_cardRequest $request , $id){
        $customer_card = Customer_card::find($id);
        if(!$customer_card){
            return abort(404);
        }
        $customer_card->update([
            'name' => $request['name'],
            'card_no' => $request['card_no'],
            'serial_no' => $request['serial_no'],
            'chassis_no' => $request['chassis_no'],
            'card_model' => $request['card_model'],
            'date_of_purchase' => $request['date_of_purchase'],
            'notes' => $request['notes'],
            'customer_name' => $request['customer_name'],
            'phone_no' => $request['phone_no'],
            'email' => $request['email'],
            'address' => $request['address'],
            'company_name' => $request['company_name']
        ]);
        return redirect()->route('admin.index.customer.Card')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
    }
    public function delete($id){
        $customer_card = Customer_card::find($id);
        if(!$customer_card){
            return abort(404);
        }
        $customer_card->delete();
        return redirect()->route('admin.index.customer.Card')->with(['error' => 'تم حذف بيانات المعدة بنجاح']);
    }
}
