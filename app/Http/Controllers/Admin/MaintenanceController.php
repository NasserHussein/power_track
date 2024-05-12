<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminMaintenanceRequest;
use App\Models\Admin\Card;
use App\Models\Admin\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index_cards($id){
        if($id == 1){
            $cards = Card::where('name' , 'حفار')->get();
            $name = 'الحفار';
            $Collection = 'الحفارات';
            $Single = 'حفار';
        }elseif($id == 2){
            $cards = Card::where('name' , 'لودر')->get();
            $name = 'اللودر';
            $Collection = 'اللوادر';
            $Single = 'لودر';
        }elseif($id == 3){
            $cards = Card::where('name' , 'مولد')->get();
            $name = 'المولد';
            $Collection = 'المولدات';
            $Single = 'مولد';
        }elseif($id == 4){
            $cards = Card::where('name' , 'كسارة')->get();
            $name = 'الكسارة';
            $Collection = 'الكسارات';
            $Single = 'كسارة';
        }elseif($id == 5){
            $cards = Card::where('name' , 'كمبريسور')->get();
            $name = 'الكمبريسور';
            $Collection = 'الكمريسورات';
            $Single = 'كمبريسور';
        }elseif($id == 6){
            $cards = Card::where('name' , 'ماكينة ابحاث')->get();
            $name = 'ماكينة الأبحاث';
            $Collection = 'ماكينات الأبحاث';
            $Single = $name;
        }else{
            return abort(404);
        }
        return view('admin.pages.maintenance.cards.card_index',compact(['cards','name','Collection','Single']));
    }
    public function maintenanc_store(AdminMaintenanceRequest $request , $id){
        Maintenance::create([
            'maintenance' => $request['maintenance'],
            'spare_parts' => $request['spare_parts'],
            'cost' => $request['cost'],
            'date' => $request['date'],
            'duration' => $request['duration'],
            'technician_name' => $request['technician_name'],
            'card_id' => $id
        ]);
        return redirect()->route('admin.maintenance.cards.index.maintenance',$id)->with(['success' => 'تم تسجيل بيانات الصيانة بنجاح']);
    }
    public function index_maintenance($id){
        $card = Card::find($id);
        if($card->name == 'حفار'){
            $code = 1;
        }elseif($card->name == 'لودر'){
            $code = 2;
        }elseif($card->name == 'مولد'){
            $code = 3;
        }elseif($card->name == 'كسارة'){
            $code = 4;
        }elseif($card->name == 'كمبريسور'){
            $code = 5;
        }elseif($card->name == 'ماكينة ابحاث'){
            $code = 6;
        }
        $maintenances = Maintenance::where('card_id' , $id)->get()->sortByDesc('date');
        return view('admin.pages.maintenance.index',compact(['card','maintenances','code']));
    }
    public function maintenanc_update(AdminMaintenanceRequest $request ,$maintenanc_id){
        $maintenance = Maintenance::find($maintenanc_id);
        if(!$maintenance){
            return abort(404);
        }
        $card_id = $maintenance->card_id;
        $maintenance->update([
            'maintenance' => $request['maintenance'],
            'spare_parts' => $request['spare_parts'],
            'cost' => $request['cost'],
            'date' => $request['date'],
            'duration' => $request['duration'],
            'technician_name' => $request['technician_name'],
        ]);
        return redirect()->route('admin.maintenance.cards.index.maintenance',$card_id)->with(['success' => 'تم تعديل بيانات الصيانة بنجاح']);
    }
    public function maintenanc_delete($id){
        $maintenance = Maintenance::find($id);
        if(!$maintenance){
            return abort(404);
        }
        $card_id = $maintenance->card_id;
        $maintenance->delete();
        return redirect()->route('admin.maintenance.cards.index.maintenance',$card_id)->with(['erorr' => 'تم حذف عملية الصيانة بنجاح']);
    }
}
