<?php

use App\Http\Controllers\Admin\CardsController;
use App\Http\Controllers\Admin\CostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HoursController;
use App\Http\Controllers\Admin\MaintenanceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'guest:admin'],function(){
    Route::get('login','LoginController@index')->name('get.admin.login');
    Route::post('login','LoginController@login')->name('admin.login');
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth:admin'],function(){
    Route::get('/','DashboardController@index')->name('admin.dashboard');
    Route::get('edit-personal-data','CpanelController@edit')->name('admin.edite.personal.data');
    Route::post('edit-personal-data','CpanelController@update')->name('admin.update.personal.data');
    Route::get('edit-personal-password','CpanelController@edit_pass')->name('admin.edit.pass.data');
    Route::post('edit-personal-password','CpanelController@update_pass')->name('admin.update.pass.data');
    Route::get('logout','LoginController@logout')->name('admin.logout');
        ################################# Start cards Route ###################################
Route::group(['prefix'=>'Identification_Cards'],function(){
    Route::get('/','CardsController@index')->name('admin.index.cards');
    Route::get('/create','CardsController@create')->name('admin.create.cards');
    Route::post('/store','CardsController@store')->name('admin.store.cards');
    Route::get('/edit/{id}','CardsController@edit')->name('admin.edit.cards');
    Route::post('/update/{id}','CardsController@update')->name('admin.update.cards');
    Route::get('/delete/{id}','CardsController@delete')->name('admin.delete.cards');
                ###### Start Cards Types Route ######
    Route::get('/digger','CardsController@index_digger')->name('admin.digger.cards');
    Route::get('/loader','CardsController@index_loader')->name('admin.loader.cards');
    Route::get('/generator','CardsController@index_generator')->name('admin.generator.cards');
    Route::get('/crusher','CardsController@index_crusher')->name('admin.crusher.cards');
    Route::get('/compressor','CardsController@index_compressor')->name('admin.compressor.cards');
    Route::get('/research_machin','CardsController@index_research_machine')->name('admin.research.machine.cards');
                ###### End Cards Types Route ######
                ###### Start Cards Oil Registration Route ######
    Route::post('/CardsOilRegistration/{id}','CardsController@oil_registration')->name('admin.cards.oil.registration');
                ###### End Cards Oil Registration Route ######
                ###### Start Cards Oil Gearbox Registration Route ######
    Route::post('/CardsOilGearboxRegistration/{id}','CardsController@oil_registration_gearbox')->name('admin.cards.oil.gearbox.registration');
                ###### End Cards Oil Gearbox Registration Route ######
});
        ################################# End cards Route ###################################
        ################################# Start Hours cards Route ###################################
Route::group(['prefix'=>'Hours_Equipment'],function(){
    Route::get('/digger','HoursController@index_hour_digger')->name('admin.hour.digger.cards');
    Route::get('/loader','HoursController@index_hour_loader')->name('admin.hour.loader.cards');
    Route::get('/generator','HoursController@index_hour_generator')->name('admin.hour.generator.cards');
    Route::get('/crusher','HoursController@index_hour_crusher')->name('admin.hour.crusher.cards');
    Route::get('/compressor','HoursController@index_hour_compressor')->name('admin.hour.compressor.cards');
    Route::get('/research_machin','HoursController@index_hour_research_machine')->name('admin.hour.research.machine.cards');
    Route::post('/store/{id}','HoursController@store')->name('admin.store.hour.cards');
    Route::get('/MachineCycle/{id}','HoursController@index_machine_cycle')->name('admin.machine.cycle.cards');
    Route::get('/delete_all_hours/{id}','HoursController@delete_all_hours')->name('admin.delete_all_hours.cycle.cards');
    Route::get('/delete_hour/{hour_id}/{card_id}','HoursController@delete_hour')->name('admin.delete_hour.cycle.cards');
});
        ################################# End Hours cards Route ###################################
        ################################# Start Maintenance cards Route ###################################
Route::group(['prefix'=>'Maintenance_Equipments'],function(){
    Route::get('/{id}','MaintenanceController@index_cards')->name('admin.maintenance.cards.index.cards');
    Route::get('Machine_life_record/{id}','MaintenanceController@index_maintenance')->name('admin.maintenance.cards.index.maintenance');
    Route::post('/store/{id}','MaintenanceController@maintenanc_store')->name('admin.maintenance.cards.store.maintenance');
    Route::post('/update/{id}','MaintenanceController@maintenanc_update')->name('admin.maintenance.cards.update.maintenance');
    Route::get('/delete/{id}','MaintenanceController@maintenanc_delete')->name('admin.maintenance.cards.delete.maintenance');
});
        ################################# End Maintenance cards Route ###################################
        ################################# Start Cost cards Route ###################################
Route::group(['prefix'=>'Cost_Equipments'],function(){
    Route::get('/{id}','CostController@index_cards')->name('admin.cost.cards.index.cards');
    Route::post('/store/{id}','CostController@cost_store')->name('dmin.cost.cards.store.maintenance');
});
        ################################# End Cost cards Route ###################################
});


//return Card::whereBetween('date_of_start', ['2000-02-04', '2000-02-10'])->get();
//return Card::latest()->first()->code;
//return $month= Card::where('date_of_start', '>', Carbon::now()->startOfMonth()) ->where('date_of_start', '<', Carbon::now()->endOfMonth()) ->get();
/*         $time = strtotime("30-10-2011");
        $final = date("d-m-Y", strtotime("+2 month", $time)); */
