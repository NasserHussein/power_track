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
        }else{
            return abort(404);
        }
        return view('admin.pages.cost.cards.card_index',compact(['cards','cards_name']));
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
        }
        $start = $request['start'];
        $end = $request['end'];
        $maintenances = Maintenance::where('card_id', $id)->whereBetween('date', [$start, $end])->get()->sortByDesc('date');
        $cost = $maintenances->sum('cost');
        return view('admin.pages.cost.index',compact(['card','code','start','end','maintenances','cost']));
    }
}
