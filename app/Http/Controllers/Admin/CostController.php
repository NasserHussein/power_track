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
        }else{
            return abort(404);
        }
        return view('admin.pages.cost.cards.card_index',compact(['cards','cards_name']));
    }
    public function determine_the_duration_of_all_maintenance(){
        return view('admin.pages.cost.determine_the_duration_of_all_maintenance');
    }
    public function maintenance_cost_determine(AdminCostRequest $request){
        $cards = [];
        $start = $request['start'];
        $end = $request['end'];
        $maintenances = Maintenance::whereBetween('date', [$start, $end])->get();
        $cost = $maintenances->sum('cost');
        foreach($maintenances as $maintenance){
            $cards[] = $maintenance->card;
        }
        $cards_unique = array_unique($cards);
        $count_cards = count($cards_unique);
        return view('admin.pages.cost.index_all_cost',compact(['start','end','maintenances','cost','count_cards','cards_unique']));
    }
    public function cost_store(AdminCostRequest $request , $id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        if($card->name == 'ستاكر كهراباء'){
            $code = 1;
        }elseif($card->name == 'باور بالت'){
            $code = 2;
        }elseif($card->name == 'ريتش تراك'){
            $code = 3;
        }elseif($card->name == 'هاند بالت'){
            $code = 4;
        }elseif($card->name == 'ونش شوكة كهرباء'){
            $code = 5;
        }elseif($card->name == 'ونش شوكة ديزل'){
            $code = 6;
        }elseif($card->name == 'أوردر بيكر'){
            $code = 7;
        }elseif($card->name == 'سيزر ليفت'){
            $code = 8;
        }elseif($card->name == 'مان ليفت'){
            $code = 9;
        }elseif($card->name == 'حضان'){
            $code = 10;
        }elseif($card->name == 'بطاريات'){
            $code = 11;
        }elseif($card->name == 'تنجر شحن'){
            $code = 12;
        }elseif($card->name == 'أطارات'){
            $code = 13;
        }elseif($card->name == 'سيارة'){
            $code = 14;
        }
        $start = $request['start'];
        $end = $request['end'];
        $maintenances = Maintenance::where('card_id', $id)->whereBetween('date', [$start, $end])->get()->sortByDesc('date');
        $cost = $maintenances->sum('cost');
        return view('admin.pages.cost.index',compact(['card','code','start','end','maintenances','cost']));
    }
}
