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
    public function index_hour_digger(){
        $cards = Card::where('name' , 'حفار')->get();
        return view('admin.pages.hour.types.digger',compact('cards'));
    }
    public function index_hour_loader(){
        $cards = Card::where('name' , 'لودر')->get();
        return view('admin.pages.hour.types.loader',compact('cards'));
    }
    public function index_hour_generator(){
        $cards = Card::where('name' , 'مولد')->get();
        return view('admin.pages.hour.types.generator',compact('cards'));
    }
    public function index_hour_crusher(){
        $cards = Card::where('name' , 'كسارة')->get();
        return view('admin.pages.hour.types.crusher',compact('cards'));
    }
    public function index_hour_compressor(){
        $cards = Card::where('name' , 'كمبريسور')->get();
        return view('admin.pages.hour.types.compressor',compact('cards'));
    }
    public function index_hour_research_machine(){
        $cards = Card::where('name' , 'ماكينة ابحاث')->get();
        return view('admin.pages.hour.types.research_machine',compact('cards'));
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
    if($card->name == 'كسارة'){
        $duration_of_oil =1000;
    }elseif($card->name == 'ماكينة ابحاث'){
        $duration_of_oil =200;
    }else{
    $duration_of_oil =120;
    }
    $duration_of_oil_gearbox =2200;
    /////////////////////////////  change OOOOOile   ///////////////////////////////////////////////
        $hours_used = $request['card_hours'] - $card->oil_hours;
        $remaining_hours = $duration_of_oil - $hours_used;
        $hours_used_gearbox = $request['card_hours'] - $card->oil_hours_gearbox;
        $remaining_hours_gearbox = $duration_of_oil_gearbox - $hours_used_gearbox;
        $card->update([
            'card_hours' => $request['card_hours']
        ]);
        if($card->oil_hours !== NULL){
        $card->update([
            'hours_used' => $hours_used,
            'remaining_hours' => $remaining_hours
        ]);
        }
        if($card->oil_hours_gearbox !== NULL){
        $card->update([
            'hours_used_gearbox' => $hours_used_gearbox,
            'remaining_hours_gearbox' => $remaining_hours_gearbox
        ]);
        }
        Hour::create([
            'card_hours' => $request['card_hours'],
            'date' => $request['date'],
            'card_id' => $id,
            'count' => $count
        ]);
        if($card->name == 'حفار'){
            return redirect()->route('admin.hour.digger.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }else if($card->name == 'لودر'){
            return redirect()->route('admin.hour.loader.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'مولد'){
            return redirect()->route('admin.hour.generator.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'كسارة'){
            return redirect()->route('admin.hour.crusher.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'كمبريسور'){
            return redirect()->route('admin.hour.compressor.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'ماكينة ابحاث'){
            return redirect()->route('admin.hour.research.machine.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
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
