<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HourCardRequest;
use App\Models\Admin\Card;
use App\Models\Admin\Hour;
use Illuminate\Http\Request;

class HoursController extends Controller
{
     //////////////////// Start Hours Cards Types /////////////////
    public function index($id){
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
        }
        return view('admin.pages.hour.index_cards',compact(['cards','cards_name']));
    }

     //////////////////// End Hours Cards Types /////////////////
     //////////////////// Start Update Hours Card /////////////////
    public function store(HourCardRequest $request , $id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        if(Hour::where('card_id' , $id)->get()->count() == 0){
            $last_hour = 0;
        }else{
            $last_hour = Hour::where('card_id' , $id)->latest()->first()->card_hours;
        }

        if(!$last_hour){
            $count =0;
        }else{
        $count = $request['card_hours'] - $last_hour;
        }
    /////////////////////////////  change OOOOOile   ///////////////////////////////////////////////
        $duration_of_oil = 150;
    /////////////////////////////  change OOOOOile   ///////////////////////////////////////////////
        $hours_used = $request['card_hours'] - $card->oil_hours;
        $remaining_hours = $duration_of_oil - $hours_used;
        $card->update([
            'card_hours' => $request['card_hours']
        ]);
        if($card->oil_hours !== NULL){
        $card->update([
            'hours_used' => $hours_used,
            'remaining_hours' => $remaining_hours
        ]);
        }
        Hour::create([
            'card_hours' => $request['card_hours'],
            'date' => $request['date'],
            'card_id' => $id,
            'count' => $count
        ]);
        if($card->name == 'ستاكر كهراباء'){
            return redirect()->route('admin.index.hour.cards',1)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }else if($card->name == 'باور بالت'){
            return redirect()->route('admin.index.hour.cards',2)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'ريتش تراك'){
            return redirect()->route('admin.index.hour.cards',3)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'هاند بالت'){
            return redirect()->route('admin.index.hour.cards',4)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'ونش شوكة كهرباء'){
            return redirect()->route('admin.index.hour.cards',5)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'ونش شوكة ديزل'){
            return redirect()->route('admin.index.hour.cards',6)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'أوردر بيكر'){
            return redirect()->route('admin.index.hour.cards',7)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'سيزر ليفت'){
            return redirect()->route('admin.index.hour.cards',8)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'مان ليفت'){
            return redirect()->route('admin.index.hour.cards',9)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'حضان'){
            return redirect()->route('admin.index.hour.cards',10)->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
    }
     //////////////////// End Update Hours Card  /////////////////
     //////////////////// Start view all Hours Card  /////////////////
     public function index_machine_cycle($id){
        $hours = Hour::where('card_id', $id)->get()->sortByDesc('date');
        $card = Card::find($id);
        return view('admin.pages.hour.index',compact(['hours','card']));
     }
     //////////////////// End view all Hours Card  /////////////////
     //////////////////// Start Delete all Hours Card  /////////////////
     public function delete_all_hours($id){
        $hours = Hour::where('card_id' , $id)->get();
        foreach($hours as $hour){
            $hour->delete();
        }
        return redirect()->route('admin.machine.cycle.cards',$id)->with(['error' => 'تم حذف جميع القراءات بنجاح']);
     }
     //////////////////// End Delete all Hours Card  /////////////////
     //////////////////// Start Delete Hours Card  /////////////////
     public function delete_hour($hour_id , $card_di){
        $hour = Hour::find($hour_id);
        if(!$hour_id){
            return abort(403);
        }
        $hour->delete();
        return redirect()->route('admin.machine.cycle.cards',$card_di)->with(['error' => 'تم حذف القراءة بنجاح']);
     }
     //////////////////// End Delete Hours Card  /////////////////
}
