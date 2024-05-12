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
        return view('admin.pages.card.index',compact('cards'));
    }
    //////////////////// Start Cards Types /////////////////
    public function index_digger(){
        $cards = Card::where('name' , 'حفار')->get();
        return view('admin.pages.card.types.digger',compact('cards'));
    }
    public function index_loader(){
        $cards = Card::where('name' , 'لودر')->get();
        return view('admin.pages.card.types.loader',compact('cards'));
    }
    public function index_generator(){
        $cards = Card::where('name' , 'مولد')->get();
        return view('admin.pages.card.types.generator',compact('cards'));
    }
    public function index_crusher(){
        $cards = Card::where('name' , 'كسارة')->get();
        return view('admin.pages.card.types.crusher',compact('cards'));
    }
    public function index_compressor(){
        $cards = Card::where('name' , 'كمبريسور')->get();
        return view('admin.pages.card.types.compressor',compact('cards'));
    }
    public function index_research_machine(){
        $cards = Card::where('name' , 'ماكينة ابحاث')->get();
        return view('admin.pages.card.types.research_machine',compact('cards'));
    }
    //////////////////// End Cards Types /////////////////
    public function create(){
        return view('admin.pages.card.create');
    }
    public function store(CardsRequest $request){
        Card::create([
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
