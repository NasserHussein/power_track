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
        $cards = Card::where('type_card' , '0')->get();
        $name = 0;
        $code = '0';
        return view('admin.pages.card.index',compact(['cards','name','code']));
    }
    //////////////////// Start Cards Types /////////////////
    public function index_types($id){
        $name = 1;
        $code = 0;
        if($id == 1){
            $cards = Card::where(['name' => 'ستاكر كهراباء' , 'type_card' => '0'])->get();
            $cards_name = 'ستاكر كهراباء';
        }elseif($id == 2){
            $cards = Card::where(['name' => 'باور بالت' , 'type_card' => '0'])->get();
            $cards_name = 'باور بالت';
        }elseif($id == 3){
            $cards = Card::where(['name' => 'ريتش تراك' , 'type_card' => '0'])->get();
            $cards_name = 'ريتش تراك';
        }elseif($id == 4){
            $cards = Card::where(['name' => 'هاند بالت' , 'type_card' => '0'])->get();
            $cards_name ='هاند بالت';
        }elseif($id == 5){
            $cards = Card::where(['name' => 'ونش شوكة كهرباء' , 'type_card' => '0'])->get();
            $cards_name = 'ونش شوكة كهرباء';
        }elseif($id == 6){
            $cards = Card::where(['name' => 'ونش شوكة ديزل' , 'type_card' => '0'])->get();
            $cards_name = 'ونش شوكة ديزل';
        }elseif($id == 7){
            $cards = Card::where(['name' => 'أوردر بيكر' , 'type_card' => '0'])->get();
            $cards_name = 'أوردر بيكر';
        }elseif($id == 8){
            $cards = Card::where(['name' => 'سيزر ليفت' , 'type_card' => '0'])->get();
            $cards_name = 'سيزر ليفت';
        }elseif($id == 9){
            $cards = Card::where(['name' => 'مان ليفت' , 'type_card' => '0'])->get();
            $cards_name = 'مان ليفت';
        }elseif($id == 10){
            $cards = Card::where(['name' => 'حضان' , 'type_card' => '0'])->get();
            $cards_name = 'حضان';
        }elseif($id == 11){
            $cards = Card::where(['name' => 'بطاريات' , 'type_card' => '0'])->get();
            $cards_name = 'بطاريات';
        }elseif($id == 12){
            $cards = Card::where(['name' => 'تنجر شحن' , 'type_card' => '0'])->get();
            $cards_name = 'تنجر شحن';
        }elseif($id == 13){
            $cards = Card::where(['name' => 'أطارات' , 'type_card' => '0'])->get();
            $cards_name = 'أطارات';
        }elseif($id == 14){
            $cards = Card::where(['name' => 'سيارة' , 'type_card' => '0'])->get();
            $cards_name = 'سيارة';
        }elseif($id == 15){
            $cards = Card::where('type_card' , '1')->get();
            $cards_name = 'معدات الشركات';
            $code = 1;
        }
        return view('admin.pages.card.index',compact(['cards','name','cards_name','code']));
    }
    //////////////////// End Cards Types /////////////////
    public function create(){
        return view('admin.pages.card.create');
    }
    public function create_company_card(){
        return view('admin.pages.companies_cards.create');
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
            'charging_plug' => $request['charging_plug'],
            'hydraulic_system' => $request['hydraulic_system'],
            'notes' => $request['notes'],
            'type_card' => $request['type_card']
        ]);
        if($request['type_card'] == '1'){
            return redirect()->route('admin.types.cards',15)->with(['success' => 'تم تسجيل المعدة بنجاح']);
        }
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
            'charging_plug' => $request['charging_plug'],
            'hydraulic_system' => $request['hydraulic_system'],
            'notes' => $request['notes']
        ]);
        if($card->type_card == '0' && $request['name'] == 'ستاكر كهراباء'){
            return redirect()->route('admin.types.cards',1)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }else if($card->type_card == '0' && $request['name'] == 'باور بالت'){
            return redirect()->route('admin.types.cards',2)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'ريتش تراك'){
            return redirect()->route('admin.types.cards',3)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'هاند بالت'){
            return redirect()->route('admin.types.cards',4)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'ونش شوكة كهرباء'){
            return redirect()->route('admin.types.cards',5)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'ونش شوكة ديزل'){
            return redirect()->route('admin.types.cards',6)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'أوردر بيكر'){
            return redirect()->route('admin.types.cards',7)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'سيزر ليفت'){
            return redirect()->route('admin.types.cards',8)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'مان ليفت'){
            return redirect()->route('admin.types.cards',9)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'حضان'){
            return redirect()->route('admin.types.cards',10)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'بطاريات'){
            return redirect()->route('admin.types.cards',11)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'تنجر شحن'){
            return redirect()->route('admin.types.cards',12)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $request['name'] == 'أطارات'){
            return redirect()->route('admin.types.cards',13)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }else if($card->type_card == '0' && $request['name'] == 'سيارة'){
            return redirect()->route('admin.types.cards',14)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }else if($card->type_card == '1'){
            return redirect()->route('admin.types.cards',15)->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
        }
    }
    public function delete($id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        $card->delete();
        if($card->type_card == '0' && $card->name == 'ستاكر كهراباء'){
            return redirect()->route('admin.types.cards',1)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }else if($card->type_card == '0' && $card->name == 'باور بالت'){
            return redirect()->route('admin.types.cards',2)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'ريتش تراك'){
            return redirect()->route('admin.types.cards',3)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'هاند بالت'){
            return redirect()->route('admin.types.cards',4)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'ونش شوكة كهرباء'){
            return redirect()->route('admin.types.cards',5)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'ونش شوكة ديزل'){
            return redirect()->route('admin.types.cards',6)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'أوردر بيكر'){
            return redirect()->route('admin.types.cards',7)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'سيزر ليفت'){
            return redirect()->route('admin.types.cards',8)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'مان ليفت'){
            return redirect()->route('admin.types.cards',9)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'حضان'){
            return redirect()->route('admin.types.cards',10)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'بطاريات'){
            return redirect()->route('admin.types.cards',11)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'تنجر شحن'){
            return redirect()->route('admin.types.cards',12)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'أطارات'){
            return redirect()->route('admin.types.cards',13)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '0' && $card->name == 'سيارة'){
            return redirect()->route('admin.types.cards',14)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
        else if($card->type_card == '1'){
            return redirect()->route('admin.types.cards',15)->with(['success' => 'تم حذف سجل المعدة بنجاح']);
        }
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
        $duration_of_oil = 150;
    /////////////////////////////  change OOOOOile   ///////////////////////////////////////////////
    $card->update([
        'date_of_oil' => $request['date_of_oil'],
        'oil_hours' => $request['oil_hours'],
        'card_hours' => $request['oil_hours'],
        'hours_used' => 0,
        'remaining_hours' => $duration_of_oil
    ]);
    if($card->type_card == '0'){
        return redirect()->route('admin.types.cards',6)->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
    }elseif($card->type_card == '1'){
        return redirect()->route('admin.types.cards',15)->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
    }
    }
}
