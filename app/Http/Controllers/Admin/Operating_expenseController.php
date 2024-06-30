<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCostRequest;
use App\Http\Requests\Operating_expenseRequest;
use App\Models\Admin\Operating_expense;
use Illuminate\Http\Request;

class Operating_expenseController extends Controller
{
    public function index(){
        $operating_expenses = Operating_expense::all();
        $sum = $operating_expenses->sum('amount');
        return view('admin.pages.operating_expense.index',compact(['operating_expenses','sum']));
    }
    public function create(){
        return view('admin.pages.operating_expense.create');
    }
    public function store(Operating_expenseRequest $request){
        Operating_expense::create([
            'clause' => $request['clause'],
            'description' => $request['description'],
            'amount' => $request['amount'],
            'payment_date' => $request['payment_date'],
            'person_responsible_for_payment' => $request['person_responsible_for_payment'],
            'notes' => $request['notes'],
        ]);
        return redirect()->route('admin.index.operating.expenses')->with(['success' => 'تم تسجيل المصروف بنجاح']);
    }
    public function edit($id){
        $operating_expense = Operating_expense::find($id);
        if(!$operating_expense){
            return abort(404);
        }
        return view('admin.pages.operating_expense.edit',compact('operating_expense'));
    }
    public function update(Operating_expenseRequest $request , $id){
        $operating_expense = Operating_expense::find($id);
        if(!$operating_expense){
            return abort(404);
        }
        $operating_expense->update([
            'clause' => $request['clause'],
            'description' => $request['description'],
            'amount' => $request['amount'],
            'payment_date' => $request['payment_date'],
            'person_responsible_for_payment' => $request['person_responsible_for_payment'],
            'notes' => $request['notes'],
        ]);
        return redirect()->route('admin.index.operating.expenses')->with(['success' => 'تم تعديل المصروف بنجاح']);
    }
    public function delete($id){
        $operating_expense = Operating_expense::find($id);
        if(!$operating_expense){
            return abort(404);
        }
        $operating_expense->delete();
        return redirect()->route('admin.index.operating.expenses')->with(['error' => 'تم حذف المصروف بنجاح']);
    }
    public function determine_specific_loss_period(AdminCostRequest $request){
        $start = $request['start'];
        $end = $request['end'];
        $clause = $request['clause'];
        if($clause == '1' || $clause == null){
        $operating_expenses = Operating_expense::whereBetween('payment_date', [$start, $end])->get();
        $sum = $operating_expenses->sum('amount');
        }else{
        $operating_expenses = Operating_expense::where('clause', $clause)->whereBetween('payment_date', [$start, $end])->get();
        $sum = $operating_expenses->sum('amount');
        }
        return view('admin.pages.operating_expense.specific_index',compact(['operating_expenses','sum','start','end']));
    }
}
