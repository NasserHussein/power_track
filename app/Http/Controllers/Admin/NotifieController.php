<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotifieRequest;
use App\Models\Admin\Maintenance;
use App\Models\Admin\Notifie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotifieController extends Controller
{
    public function index_de(){
        $notifies_de = Notifie::where('status','0')->get();
        return view('admin.pages.notifie.index_de',compact('notifies_de'));
    }
    public function index_ac(){
        $notifies_ac = Notifie::where('status','1')->get();
        return view('admin.pages.notifie.index_ac',compact('notifies_ac'));
    }
    public function store(NotifieRequest $request , $id){
        $card_id = Maintenance::find($id)->card->id;
        if(!$card_id){
            return abort(404);
        }
        Notifie::create([
            'spare_parts' => $request['spare_parts'],
            'notes' => $request['notes'],
            'notification_date' => $request['notification_date'],
            'maintenance_id' => $id
        ]);
        return redirect()->route('admin.maintenance.cards.index.maintenance',$card_id)->with(['success' => 'تم تحديد موعد جديد للصيانة بنجاح']);
    }
    public function edit($id){
        $notifie = Notifie::find($id);
        if(!$notifie){
            return abort(404);
        }
        return view('admin.pages.notifie.edit',compact('notifie'));
    }
    public function update(NotifieRequest $request , $id){
        $notifie = Notifie::find($id);
        if(!$notifie){
            return abort(404);
        }
        if($request['status'] !== '1'){
            $status = '0';
        }else{
            $status = '1';
        }
        $notifie->update([
            'spare_parts' => $request['spare_parts'],
            'notification_date' => $request['notification_date'],
            'notes' => $request['notes'],
            'status' => $status
        ]);
        return redirect()->route('admin.maintenance_Notifie.edit',$notifie->id)->with(['success' => 'تم تعديل الاخطار بنجاح']);
    }
    public function delete($id){
        $notifie = Notifie::find($id);
        if(!$notifie){
            return abort(404);
        }
        $notifie->delete();
        return redirect()->route('admin.dashboard');
    }
}
