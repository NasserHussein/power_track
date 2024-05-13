<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Admin\Account;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index($id){
        $customer = Customer::find($id);
        if(!$customer){
            return abort(404);
        }
        $accounts = Account::where('customer_id' ,$id)->get();
        return view('admin.pages.account.index',compact(['customer','accounts']));
    }
    public function create($id){
        $customer = Customer::find($id);
        if(!$customer){
            return abort(404);
        }
        return view('admin.pages.account.create',compact('customer'));
    }
    public function store(AccountRequest $request , $id){
        Account::create([
            'invoice_number' => $request['invoice_number'],
            'description' => $request['description'],
            'invoice_value' => $request['invoice_value'],
            'invoice_data' => $request['invoice_data'],
            'invoice_date' => $request['invoice_date'],
            'notes' => $request['notes'],
            'customer_id' => $id
        ]);
        return redirect()->route('admin.index.account',$id)->with(['success' => 'تم تسجيل فاتورة جديدة علي العميل بنجاح']);
    }
    public function edit($id){
        $account = Account::find($id);
        if(!$account){
            return abort(404);
        }
        $customer = Customer::find($account->customer_id );
        if(!$customer){
            return abort(403);
        }
        return view('admin.pages.account.edit',compact(['account','customer']));
    }
    public function update(AccountRequest $request , $id){
        $account = Account::find($id);
        if(!$account){
            return abort(404);
        }
        if($request['status'] == '1'){
            $status = '1';
        }
        if($request['status'] !== '1'){
            $status = '0';
        }
        $account->update([
            'invoice_number' => $request['invoice_number'],
            'description' => $request['description'],
            'invoice_value' => $request['invoice_value'],
            'invoice_data' => $request['invoice_data'],
            'invoice_date' => $request['invoice_date'],
            'notes' => $request['notes'],
            'status' => $status
        ]);
        return redirect()->route('admin.index.account',$account->customer_id)->with(['success' => 'تم تعديل فاتورة العميل بنجاح']);
    }
    public function delete($id){
        $account = Account::find($id);
        if(!$account){
            return abort(404);
        }
        $customer_id = $account->customer_id;
        $account->delete();
        return redirect()->route('admin.index.account',$customer_id)->with(['error' => 'تم حذف فاتورة العميل بنجاح']);
    }
}
