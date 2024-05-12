<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCostRequest;
use App\Models\Admin\Card;
use App\Models\Admin\Maintenance;
use Illuminate\Http\Request;

class CostController extends Controller
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
        return view('admin.pages.cost.cards.card_index',compact(['cards','name','Collection','Single']));
    }
    public function cost_store(AdminCostRequest $request , $id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
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
        $start = $request['start'];
        $end = $request['end'];
        $maintenances = Maintenance::where('card_id', $id)->whereBetween('date', [$start, $end])->get()->sortByDesc('date');
        $cost = $maintenances->sum('cost');
        return view('admin.pages.cost.index',compact(['card','code','start','end','maintenances','cost']));
    }
}
