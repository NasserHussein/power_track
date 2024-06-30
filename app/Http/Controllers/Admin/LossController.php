<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCostRequest;
use App\Http\Requests\LossRequest;
use App\Models\Admin\Loss;
use Illuminate\Http\Request;

class LossController extends Controller
{
    public function index(){
        $losses = Loss::all();
        $sum = $losses->sum('amount');
        return view('admin.pages.loss.index',compact(['losses','sum']));
    }
    public function create(){
        return view('admin.pages.loss.create');
    }
    public function store(LossRequest $request){
        Loss::create([
            'description_of_loss' => $request['description_of_loss'],
            'date_of_loss' => $request['date_of_loss'],
            'amount' => $request['amount'],
            'cause_of_loss' => $request['cause_of_loss']
        ]);
        return redirect()->route('admin.index.Losses')->with(['success' => 'تم تسجيل الخسارة بنجاح']);
    }
    public function edit($id){
        $loss = Loss::find($id);
        if(!$loss){
            return abort(404);
        }
        return view('admin.pages.loss.edit',compact('loss'));
    }
    public function update(LossRequest $request , $id){
        $loss = Loss::find($id);
        if(!$loss){
            return abort(404);
        }
        $loss->update([
            'description_of_loss' => $request['description_of_loss'],
            'date_of_loss' => $request['date_of_loss'],
            'amount' => $request['amount'],
            'cause_of_loss' => $request['cause_of_loss']
        ]);
        return redirect()->route('admin.index.Losses')->with(['success' => 'تم تعديل الخسارة بنجاح']);
    }
    public function delete($id){
        $loss = Loss::find($id);
        if(!$loss){
            return abort(404);
        }
        $loss->delete();
        return redirect()->route('admin.index.Losses')->with(['error' => 'تم حذف الخسارة بنجاح']);
    }
    public function determine_specific_loss_period(AdminCostRequest $request){
        $start = $request['start'];
        $end = $request['end'];
        $losses = Loss::whereBetween('date_of_loss', [$start, $end])->get();
        $sum = $losses->sum('amount');
        return view('admin.pages.loss.specific_index',compact(['losses','sum','start','end']));
    }
}
