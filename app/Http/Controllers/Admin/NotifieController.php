<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotifieRequest;
use App\Models\Admin\Maintenance;
use App\Models\Admin\Notifie;
use Illuminate\Http\Request;

class NotifieController extends Controller
{
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
}
