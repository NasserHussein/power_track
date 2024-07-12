<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\Accounts_mirrorController;
use App\Http\Controllers\Admin\CardsController;
use App\Http\Controllers\Admin\CostController;
use App\Http\Controllers\Admin\Customer_CardController;
use App\Http\Controllers\Admin\Customer_maintenanceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HoursController;
use App\Http\Controllers\Admin\LossController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\NotifieController;
use App\Http\Controllers\Admin\Operating_expenseController;
use App\Http\Controllers\Admin\TechnicianController;
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
        ################################# Start Customers Route ###################################
Route::group(['prefix'=>'Customers'],function(){
    Route::get('/','CustomerController@index')->name('admin.index.customer');
    Route::get('/create','CustomerController@create')->name('admin.create.customer');
    Route::post('/store','CustomerController@store')->name('admin.store.customer');
    Route::get('/edit/{id}','CustomerController@edit')->name('admin.edit.customer');
    Route::post('/update/{id}','CustomerController@update')->name('admin.update.customer');
    Route::get('/delete/{id}','CustomerController@delete')->name('admin.delete.customer');
});
        ################################# End Customers Route ###################################
        ################################# Start Technicians Route ###################################
Route::group(['prefix'=>'Technicians'],function(){
    Route::get('/','TechnicianController@index')->name('admin.index.technician');
    Route::get('/create','TechnicianController@create')->name('admin.create.technician');
    Route::post('/store','TechnicianController@store')->name('admin.store.technician');
    Route::get('/edit/{id}','TechnicianController@edit')->name('admin.edit.technician');
    Route::post('/update/{id}','TechnicianController@update')->name('admin.update.technician');
    Route::get('/delete/{id}','TechnicianController@delete')->name('admin.delete.technician');
    Route::post('/business/{id}','TechnicianController@business')->name('admin.business.technician');
    Route::post('/business-technician','TechnicianController@business_technician')->name('admin.business_technician.technician');
    Route::post('/business-assistant','TechnicianController@business_assistant')->name('admin.business_assistant.technician');
});
        ################################# End Technicians Route ###################################
        ################################# Start accounts Route ###################################
Route::group(['prefix'=>'Accounts'],function(){
    Route::get('/{id}','AccountController@index')->name('admin.index.account');
    Route::get('/create/{id}','AccountController@create')->name('admin.create.account');
    Route::post('/store/{id}','AccountController@store')->name('admin.store.account');
    Route::get('/edit/{id}','AccountController@edit')->name('admin.edit.account');
    Route::post('/update/{id}','AccountController@update')->name('admin.update.account');
    Route::get('/delete/{id}','AccountController@delete')->name('admin.delete.account');
});
        ################################# End accounts Route ###################################
        ################################# Start cards Route ###################################
Route::group(['prefix'=>'Identification_Cards'],function(){
    Route::get('/','CardsController@index')->name('admin.index.cards');
    Route::get('/create','CardsController@create')->name('admin.create.cards');
    Route::get('/create-company-card','CardsController@create_company_card')->name('admin.create.company.car.cards');
    Route::post('/store','CardsController@store')->name('admin.store.cards');
    Route::get('/edit/{id}','CardsController@edit')->name('admin.edit.cards');
    Route::post('/update/{id}','CardsController@update')->name('admin.update.cards');
    Route::get('/delete/{id}','CardsController@delete')->name('admin.delete.cards');
                ###### Start Cards Types Route ######
    Route::get('/card/{id}','CardsController@index_types')->name('admin.types.cards');
                ###### End Cards Types Route ######
                ###### Start Cards Oil Registration Route ######
    Route::post('/cards-oil-registration/{id}','CardsController@oil_registration')->name('admin.cards.oil.registration');
                ###### End Cards Oil Registration Route ######
});
        ################################# End cards Route ###################################
        ################################# Start Customer_Card Route ###################################
Route::group(['prefix'=>'Customer_Card'],function(){
    Route::get('/','Customer_CardController@index')->name('admin.index.customer.Card');
    Route::get('/create','Customer_CardController@create')->name('admin.create.customer.Card');
    Route::post('/store','Customer_CardController@store')->name('admin.store.customer.Card');
    Route::get('/edit/{id}','Customer_CardController@edit')->name('admin.edit.customer.Card');
    Route::post('/update/{id}','Customer_CardController@update')->name('admin.update.customer.Card');
    Route::get('/delete/{id}','Customer_CardController@delete')->name('admin.delete.customer.Card');
});
        ################################# End Customer_Card Route ###################################
        ################################# Start Customer_maintenance Route ###################################
Route::group(['prefix'=>'Customer_maintenance'],function(){
    Route::get('/{id}','Customer_maintenanceController@index')->name('admin.index.customer.maintenance');
    Route::post('/store/{id}','Customer_maintenanceController@store')->name('admin.store.customer.maintenance');
    Route::get('/edit/{id}','Customer_maintenanceController@edit')->name('admin.edit.customer.maintenance');
    Route::post('/update/{id}','Customer_maintenanceController@update')->name('admin.update.customer.maintenance');
    Route::get('/add-report/{id}','Customer_maintenanceController@edit_report')->name('admin.edit_report.customer.maintenance');
    Route::post('/update-report/{id}','Customer_maintenanceController@update_report')->name('admin.update_report.customer.maintenance');
    Route::get('/delete/{id}','Customer_maintenanceController@delete')->name('admin.delete.customer.maintenance');
});
        ################################# End Customer_maintenance Route ###################################
        ################################# Start Hours cards Route ###################################
Route::group(['prefix'=>'Hours_Cards'],function(){
    Route::get('/{id}','HoursController@index')->name('admin.index.hour.cards');
    Route::post('/store/{id}','HoursController@store')->name('admin.store.hour.cards');
    Route::get('/MachineCycle/{id}','HoursController@index_machine_cycle')->name('admin.machine.cycle.cards');
    Route::get('/delete-all_hours/{id}','HoursController@delete_all_hours')->name('admin.delete_all_hours.cycle.cards');
    Route::get('/delete-hour/{hour_id}/{card_id}','HoursController@delete_hour')->name('admin.delete_hour.cycle.cards');
});
        ################################# End Hours cards Route ###################################
        ################################# Start Maintenance cards Route ###################################
Route::group(['prefix'=>'Maintenance_Equipments'],function(){
    Route::get('/{id}','MaintenanceController@index_cards')->name('admin.maintenance.cards.index.cards');
    Route::get('Machine-life-record/{id}','MaintenanceController@index_maintenance')->name('admin.maintenance.cards.index.maintenance');
    Route::post('/store/{id}','MaintenanceController@maintenanc_store')->name('admin.maintenance.cards.store.maintenance');
    Route::get('/edit/{id}','MaintenanceController@maintenanc_edit')->name('admin.maintenance.cards.edit.maintenance');
    Route::post('/update/{id}','MaintenanceController@maintenanc_update')->name('admin.maintenance.cards.update.maintenance');
    Route::get('/delete/{id}','MaintenanceController@maintenanc_delete')->name('admin.maintenance.cards.delete.maintenance');
    Route::get('/maintenance-determine/all','MaintenanceController@maintenance_determine')->name('admin.maintenance.cards.maintenance.determine');
    Route::post('/maintenance-determine/index','MaintenanceController@maintenance_determine_index')->name('admin.maintenance.cards.maintenance.determine.index');
});
        ################################# End Maintenance cards Route ###################################
        ################################# Start Notifie cards Route ###################################
Route::group(['prefix'=>'Maintenance_Notifie'],function(){
    Route::get('/inactive','NotifieController@index_de')->name('admin.maintenance_Notifie.index_de');
    Route::get('/active','NotifieController@index_ac')->name('admin.maintenance_Notifie.index_ac');
    Route::post('/store/{id}','NotifieController@store')->name('admin.maintenance_Notifie.store');
    Route::get('/edit/{id}','NotifieController@edit')->name('admin.maintenance_Notifie.edit');
    Route::post('/update/{id}','NotifieController@update')->name('admin.maintenance_Notifie.update');
    Route::get('/delete/{id}','NotifieController@delete')->name('admin.maintenance_Notifie.delete');
});
        ################################# End Notifie cards Route ###################################
        ################################# Start Cost cards Route ###################################
Route::group(['prefix'=>'Cost_Equipments'],function(){
    Route::get('/index/{id}','CostController@index_cards')->name('admin.cost.cards.index.cards');
    Route::post('/store/{id}','CostController@cost_store')->name('dmin.cost.cards.store.maintenance');
                            /////////////////////all/////////////////
    Route::get('/determine-the-duration/{id}','CostController@determine_the_duration_of_all_maintenance')->name('admin.cost.cards.determine_the_duration.cards');
    Route::post('/maintenance-cost-determine','CostController@maintenance_cost_determine')->name('admin.cost.cards.maintenance_cost_determine.maintenance');
});
        ################################# End Cost cards Route ###################################
        ################################# start loss Route ###################################
Route::group(['prefix'=>'Losses'],function(){
    Route::get('/','LossController@index')->name('admin.index.Losses');
    Route::get('/create','LossController@create')->name('admin.create.Losses');
    Route::post('/store','LossController@store')->name('admin.store.Losses');
    Route::get('/edit/{id}','LossController@edit')->name('admin.edit.Losses');
    Route::post('/update/{id}','LossController@update')->name('admin.update.Losses');
    Route::get('/delete/{id}','LossController@delete')->name('admin.delete.Losses');
    Route::post('/determine-specific-loss-period','LossController@determine_specific_loss_period')->name('admin.determine.specific.loss.period.Losses');
});
        ################################# End loss Route ###################################
        ################################# Starat Operating_expenses Route ###################################
Route::group(['prefix'=>'operating-expenses'],function(){
    Route::get('/','Operating_expenseController@index')->name('admin.index.operating.expenses');
    Route::get('/create','Operating_expenseController@create')->name('admin.create.operating.expenses');
    Route::post('/store','Operating_expenseController@store')->name('admin.store.operating.expenses');
    Route::get('/edit/{id}','Operating_expenseController@edit')->name('admin.edit.operating.expenses');
    Route::post('/update/{id}','Operating_expenseController@update')->name('admin.update.operating.expenses');
    Route::get('/delete/{id}','Operating_expenseController@delete')->name('admin.delete.operating.expenses');
    Route::post('/determine-specific-operating-expenses-period','Operating_expenseController@determine_specific_loss_period')->name('admin.determine.specific.expense.period.expenses');
});
        ################################# End Operating_expenses Route ###################################
        ################################# Start mirror Route ###################################
Route::group(['prefix'=>'accounts-mirror'],function(){
    Route::get('/','Accounts_mirrorController@select')->name('admin.select.accounts.mirror');
    Route::post('/index','Accounts_mirrorController@index')->name('admin.index.accounts.mirror');
});
        ################################# End mirror Route ###################################
Route::get('/n',function(){
    return view('admin.pages.all-expenses.index');
});
});


//return Card::whereBetween('date_of_start', ['2000-02-04', '2000-02-10'])->get();
//return Card::latest()->first()->code;
//return $month= Card::where('date_of_start', '>', Carbon::now()->startOfMonth()) ->where('date_of_start', '<', Carbon::now()->endOfMonth()) ->get();
/*         $time = strtotime("30-10-2011");
        $final = date("d-m-Y", strtotime("+2 month", $time)); */
