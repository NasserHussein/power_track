<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCostRequest;
use App\Http\Requests\AdminMaintenanceRequest;
use App\Models\Admin\Card;
use App\Models\Admin\Maintenance;
use App\Models\Admin\Technician;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index_cards($id){
        $code = '0';
        if($id == 1){
            $cards = Card::where(['name' => 'ستاكر كهراباء' , 'type_card' => '0'])->get();
            $cards_name = 'ستاكر كهراباء';
            $technicians = Technician::all();
        }elseif($id == 2){
            $cards = Card::where(['name' => 'باور بالت' , 'type_card' => '0'])->get();
            $cards_name = 'باور بالت';
            $technicians = Technician::all();
        }elseif($id == 3){
            $cards = Card::where(['name' => 'ريتش تراك' , 'type_card' => '0'])->get();
            $cards_name = 'ريتش تراك';
            $technicians = Technician::all();
        }elseif($id == 4){
            $cards = Card::where(['name' => 'هاند بالت' , 'type_card' => '0'])->get();
            $cards_name ='هاند بالت';
            $technicians = Technician::all();
        }elseif($id == 5){
            $cards = Card::where(['name' => 'ونش شوكة كهرباء' , 'type_card' => '0'])->get();
            $cards_name = 'ونش شوكة كهرباء';
            $technicians = Technician::all();
        }elseif($id == 6){
            $cards = Card::where(['name' => 'ونش شوكة ديزل' , 'type_card' => '0'])->get();
            $cards_name = 'ونش شوكة ديزل';
            $technicians = Technician::all();
        }elseif($id == 7){
            $cards = Card::where(['name' => 'أوردر بيكر' , 'type_card' => '0'])->get();
            $cards_name = 'أوردر بيكر';
            $technicians = Technician::all();
        }elseif($id == 8){
            $cards = Card::where(['name' => 'سيزر ليفت' , 'type_card' => '0'])->get();
            $cards_name = 'سيزر ليفت';
            $technicians = Technician::all();
        }elseif($id == 9){
            $cards = Card::where(['name' => 'مان ليفت' , 'type_card' => '0'])->get();
            $cards_name = 'مان ليفت';
            $technicians = Technician::all();
        }elseif($id == 10){
            $cards = Card::where(['name' => 'حضان' , 'type_card' => '0'])->get();
            $cards_name = 'حضان';
            $technicians = Technician::all();
        }elseif($id == 11){
            $cards = Card::where(['name' => 'بطاريات' , 'type_card' => '0'])->get();
            $cards_name = 'بطاريات';
            $technicians = Technician::all();
        }elseif($id == 12){
            $cards = Card::where(['name' => 'تنجر شحن' , 'type_card' => '0'])->get();
            $cards_name = 'تنجر شحن';
            $technicians = Technician::all();
        }elseif($id == 13){
            $cards = Card::where(['name' => 'أطارات' , 'type_card' => '0'])->get();
            $cards_name = 'أطارات';
            $technicians = Technician::all();
        }elseif($id == 14){
            $cards = Card::where(['name' => 'سيارة' , 'type_card' => '0'])->get();
            $cards_name = 'سيارة';
            $technicians = Technician::all();
        }elseif($id == 15){
            $cards = Card::where('type_card' , '1')->get();
            $cards_name = 'معدات شركات';
            $technicians = Technician::all();
            $code = '1';
        }else{
            return abort(404);
        }
        return view('admin.pages.maintenance.cards.card_index',compact(['cards','cards_name','technicians','code']));
    }
    public function maintenanc_store(AdminMaintenanceRequest $request , $id){
            $maintenance_save = Maintenance::create([
            'maintenance' => $request['maintenance'],
            'spare_parts' => $request['spare_parts'],
            'cost' => $request['cost'],
            'date' => $request['date'],
            'duration' => $request['duration'],
            'card_id' => $id
        ]);
        $maintenance = Maintenance::find($maintenance_save->id);
        $maintenance ->technicians() ->syncWithoutDetaching($request['technicians']);
        return redirect()->route('admin.maintenance.cards.index.maintenance',$id)->with(['success' => 'تم تسجيل بيانات الصيانة بنجاح']);
    }
    public function index_maintenance($id){
        $card = Card::find($id);
        $technician1s = Technician::all();
        if($card->type_card == '0' && $card->name == 'ستاكر كهراباء'){
            $code = 1;
        }elseif($card->type_card == '0' && $card->name == 'باور بالت'){
            $code = 2;
        }elseif($card->type_card == '0' && $card->name == 'ريتش تراك'){
            $code = 3;
        }elseif($card->type_card == '0' && $card->name == 'هاند بالت'){
            $code = 4;
        }elseif($card->type_card == '0' && $card->name == 'ونش شوكة كهرباء'){
            $code = 5;
        }elseif($card->type_card == '0' && $card->name == 'ونش شوكة ديزل'){
            $code = 6;
        }elseif($card->type_card == '0' && $card->name == 'أوردر بيكر'){
            $code = 7;
        }elseif($card->type_card == '0' && $card->name == 'سيزر ليفت'){
            $code = 8;
        }elseif($card->type_card == '0' && $card->name == 'مان ليفت'){
            $code = 9;
        }elseif($card->type_card == '0' && $card->name == 'حضان'){
            $code = 10;
        }elseif($card->type_card == '0' && $card->name == 'بطاريات'){
            $code = 11;
        }elseif($card->type_card == '0' && $card->name == 'تنجر شحن'){
            $code = 12;
        }elseif($card->type_card == '0' && $card->name == 'أطارات'){
            $code = 13;
        }elseif($card->type_card == '0' && $card->name == 'سيارة'){
            $code = 14;
        }elseif($card->type_card == '1'){
            $code = 15;
        }
        $maintenances = Maintenance::where('card_id' , $id)->get()->sortByDesc('date');
        return view('admin.pages.maintenance.index',compact(['card','maintenances','code','technician1s']));
    }
    public function maintenance_determine(){
        return view('admin.pages.maintenance.all.determine_the_duration_of_all_maintenance');
    }
    public function maintenance_determine_index(AdminCostRequest $request){
        $start = $request['start'];
        $end = $request['end'];
        $technicians = Technician::all();
        if($request['card_type'] == '0'){
            $maintenances = Maintenance::whereHas('card',function($q){$q->where('type_card' , '0');})->whereBetween('date', [$start, $end])->get();
        }elseif($request['card_type'] == '1'){
            $maintenances = Maintenance::whereHas('card',function($q){$q->where('type_card' , '1');})->whereBetween('date', [$start, $end])->get();
        }else{
            $maintenances = Maintenance::whereBetween('date', [$start, $end])->get();
        }
        return view('admin.pages.maintenance.all.index',compact(['maintenances','technicians','start','end']));
    }
    public function maintenanc_edit($id){
        $maintenance = Maintenance::find($id);
        $technician1s = Technician::all();
        $card_id = $maintenance->card_id;
        if(!$maintenance){
            return abort(404);
        }
        foreach($maintenance->technicians as $te){
        $technicians_id[] = $te->id;
        }
        return view('admin.pages.maintenance.edit',compact(['technicians_id','maintenance','technician1s','card_id']));
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
            'duration' => $request['duration']
        ]);
        $maintenance ->technicians() ->sync($request['technicians']);
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
