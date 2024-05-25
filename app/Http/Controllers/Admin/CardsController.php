<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardsOilGearboxRequest;
use App\Http\Requests\CardsOilRequest;
use App\Http\Requests\CardsRequest;
use App\Models\Admin\Card;
use App\Models\Admin\Hour;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index(){
        $cards = Card::all();
        $name = 0;
        return view('admin.pages.card.index',compact(['cards','name']));
    }
    //////////////////// Start Cards Types /////////////////
    public function index_types($id){
        $name = 1;
        if($id == 1){
            $cards = Card::where('name' , 'ستاكر كهراباء')->get();
            $cards_name = 'ستاكر كهراباء';
        }elseif($id == 2){
            $cards = Card::where('name' , 'باور بالت')->get();
            $cards_name = 'باور بالت';
        }elseif($id == 3){
            $cards = Card::where('name' , 'ريتش تراك')->get();
            $cards_name = 'ريتش تراك';
        }elseif($id == 4){
            $cards = Card::where('name' , 'هاند بالت')->get();
            $cards_name ='هاند بالت';
        }elseif($id == 5){
            $cards = Card::where('name' , 'ونش شوكة كهرباء')->get();
            $cards_name = 'ونش شوكة كهرباء';
        }elseif($id == 6){
            $cards = Card::where('name' , 'ونش شوكة ديزل')->get();
            $cards_name = 'ونش شوكة ديزل';
        }elseif($id == 7){
            $cards = Card::where('name' , 'أوردر بيكر')->get();
            $cards_name = 'أوردر بيكر';
        }elseif($id == 8){
            $cards = Card::where('name' , 'سيزر ليفت')->get();
            $cards_name = 'سيزر ليفت';
        }elseif($id == 9){
            $cards = Card::where('name' , 'مان ليفت')->get();
            $cards_name = 'مان ليفت';
        }elseif($id == 10){
            $cards = Card::where('name' , 'حضان')->get();
            $cards_name = 'حضان';
        }elseif($id == 11){
            $cards = Card::where('name' , 'بطاريات')->get();
            $cards_name = 'بطاريات';
        }elseif($id == 12){
            $cards = Card::where('name' , 'تنجر شحن')->get();
            $cards_name = 'تنجر شحن';
        }elseif($id == 13){
            $cards = Card::where('name' , 'أطارات')->get();
            $cards_name = 'أطارات';
        }
        return view('admin.pages.card.index',compact(['cards','name','cards_name']));
    }
    //////////////////// End Cards Types /////////////////
    public function create(){
        return view('admin.pages.card.create');
    }
    public function store(CardsRequest $request){
        Card::create([
            'name' => $request['name'],
            'card_no' => $request['card_no'],
            'part' => $request['part'],
            'card_model' => $request['card_model'],
            'model_year' => $request['model_year'],
            'brand_name' => $request['brand_name'],
            'mast_type' => $request['mast_type'],
            'tire_type' => $request['tire_type'],
            'card_load' => $request['card_load'],
            'chassis_no' => $request['chassis_no'],
            'safety' => $request['safety'],
            'battery' => $request['battery'],
            'charger' => $request['charger'],
            'charging_plug' => $request['charging_plug']
        ]);
        return redirect()->route('admin.index.cards')->with(['success' => 'تم تسجيل المعدة بنجاح']);
    }
    public function edit($id){
        $card = Card::find($id);
        if(!$card){
            return abort(404);
        }
        return view('admin.pages.card.edit',compact('card'));
    }
    public function update(CardsRequest $request , $id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        $card->update([
            'name' => $request['name'],
            'code' => $request['code'],
            'part' => $request['part'],
            'model' => $request['model'],
            'date_of_start' => $request['date_of_start'],
            'weight' => $request['weight'],
            'maker' => $request['maker'],
            'drg_no' => $request['drg_no'],
            'dimensions' => $request['dimensions'],
            'supplier' => $request['supplier'],
            'inst_bk_no' => $request['inst_bk_no'],
            'power' => $request['power'],
            'mfg_order_no' => $request['mfg_order_no'],
            'maintenance_bk_no' => $request['maintenance_bk_no'],
            'control_voltage' => $request['control_voltage'],
            'purchase_order_no' => $request['purchase_order_no'],
            'capacity' => $request['capacity'],
            'total_amperage' => $request['total_amperage'],
            'serial_no' => $request['serial_no'],
            'material' => $request['material'],
            'additional_data' => $request['additional_data'],
        ]);
        if($request['name'] == 'حفار'){
            return redirect()->route('admin.digger.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }else if($request['name'] == 'لودر'){
            return redirect()->route('admin.loader.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($request['name'] == 'مولد'){
            return redirect()->route('admin.generator.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($request['name'] == 'كسارة'){
            return redirect()->route('admin.crusher.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($request['name'] == 'كمبريسور'){
            return redirect()->route('admin.compressor.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($request['name'] == 'ماكينة ابحاث'){
            return redirect()->route('admin.research.machine.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        return redirect()->route('admin.index.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
    }
    public function delete($id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        $card->delete();
        if($card->name == 'حفار'){
            return redirect()->route('admin.digger.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }else if($card->name == 'لودر'){
            return redirect()->route('admin.loader.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->name == 'مولد'){
            return redirect()->route('admin.generator.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->name == 'كسارة'){
            return redirect()->route('admin.crusher.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->name == 'كمبريسور'){
            return redirect()->route('admin.compressor.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->name == 'ماكينة ابحاث'){
            return redirect()->route('admin.research.machine.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        return redirect()->route('admin.index.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
    }
    ////////////////Cards Oil Registration/////////////////
    public function oil_registration(CardsOilRequest $request, $id){
    $card = Card::find($id);
    if(!$card){
        return abort(403);
    }
    //////// register hour /////////////////////
    if(Hour::where('card_id' , $id)->get()->count() == 0){
        $last_hour = 0;
    }else{
        $last_hour = Hour::where('card_id' , $id)->latest()->first()->card_hours;
    }

    if(!$last_hour){
        $count =0;
    }else{
    $count = $request['oil_hours'] - $last_hour;
    }
    Hour::create([
    'card_hours' => $request['oil_hours'],
    'date' => $request['date_of_oil'],
    'card_id' => $id,
    'count' => $count
    ]);
    //////// End register hour /////////////////////
    /////////////////////////////  change OOOOOile   ///////////////////////////////////////////////
    if($card->name == 'كسارة'){
        $duration_of_oil =1000;
    }elseif($card->name == 'ماكينة ابحاث'){
        $duration_of_oil =200;
    }else{
    $duration_of_oil =120;
    }
    /////////////////////////////  change OOOOOile   ///////////////////////////////////////////////
    $card->update([
        'date_of_oil' => $request['date_of_oil'],
        'oil_hours' => $request['oil_hours'],
        'card_hours' => $request['oil_hours'],
        'hours_used' => 0,
        'remaining_hours' => $duration_of_oil
    ]);
        if($card->name == 'حفار'){
            return redirect()->route('admin.digger.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
        }else if($card->name == 'لودر'){
            return redirect()->route('admin.loader.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
        }
        else if($card->name == 'مولد'){
            return redirect()->route('admin.generator.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
        }
        else if($card->name == 'كسارة'){
            return redirect()->route('admin.crusher.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
        }
        else if($card->name == 'كمبريسور'){
            return redirect()->route('admin.compressor.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
        }
        else if($card->name == 'ماكينة ابحاث'){
            return redirect()->route('admin.research.machine.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
        }
        return redirect()->route('admin.index.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
    }
    ////////////////Cards Oil Gearbox Registration/////////////////
    public function oil_registration_gearbox(CardsOilGearboxRequest $request, $id){
    $card = Card::find($id);
    if(!$card){
        return abort(403);
    }
    //////// register hour /////////////////////
    if(Hour::where('card_id' , $id)->get()->count() == 0){
        $last_hour = 0;
    }else{
        $last_hour = Hour::where('card_id' , $id)->latest()->first()->card_hours;
    }

    if(!$last_hour){
        $count =0;
    }else{
    $count = $request['oil_hours_gearbox'] - $last_hour;
    }
    Hour::create([
    'card_hours' => $request['oil_hours_gearbox'],
    'date' => $request['date_of_oil_gearbox'],
    'card_id' => $id,
    'count' => $count
    ]);
    //////// End register hour /////////////////////
    $duration_of_oil_gearbox =2200;
    $card->update([
        'date_of_oil_gearbox' => $request['date_of_oil_gearbox'],
        'oil_hours_gearbox' => $request['oil_hours_gearbox'],
        'card_hours' => $request['oil_hours_gearbox'],
        'hours_used_gearbox' => 0,
        'remaining_hours_gearbox' => $duration_of_oil_gearbox
    ]);
        if($card->name == 'حفار'){
            return redirect()->route('admin.digger.cards')->with(['success' => 'تم تسجيل بيانات تغيير زيت الفتيس الجديدة']);
        }else if($card->name == 'لودر'){
            return redirect()->route('admin.loader.cards')->with(['success' => 'تم تسجيل بيانات تغيير زيت الفتيس الجديدة']);
        }
        else if($card->name == 'مولد'){
            return redirect()->route('admin.generator.cards')->with(['success' => 'تم تسجيل بيانات تغيير زيت الفتيس الجديدة']);
        }
        else if($card->name == 'كسارة'){
            return redirect()->route('admin.crusher.cards')->with(['success' => 'تم تسجيل بيانات تغيير زيت الفتيس الجديدة']);
        }
        else if($card->name == 'كمبريسور'){
            return redirect()->route('admin.compressor.cards')->with(['success' => 'تم تسجيل بيانات تغيير زيت الفتيس الجديدة']);
        }
        else if($card->name == 'ماكينة ابحاث'){
            return redirect()->route('admin.research.machine.cards')->with(['success' => 'تم تسجيل بيانات تغيير زيت الفتيس الجديدة']);
        }
        return redirect()->route('admin.index.cards')->with(['success' => 'تم تسجيل بيانات تغيير زيت الفتيس الجديدة']);
    }
}
