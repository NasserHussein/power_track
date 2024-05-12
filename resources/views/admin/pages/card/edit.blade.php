@extends('layouts.admin')
@section('title')
تعديل بيانات معدة
@endsection
@section('content')
<style>
    input[type="date"]::-webkit-datetime-edit, input[type="date"]::-webkit-inner-spin-button, input[type="date"]::-webkit-clear-button {
  color: #fff;
  position: relative;
}

input[type="date"]::-webkit-datetime-edit-year-field{
  position: absolute !important;
  border-left:1px solid #8c8c8c;
  padding: 2px;
  color:#000;
  left: 56px;
}

input[type="date"]::-webkit-datetime-edit-month-field{
  position: absolute !important;
  border-left:1px solid #8c8c8c;
  padding: 2px;
  color:#000;
  left: 26px;
}


input[type="date"]::-webkit-datetime-edit-day-field{
  position: absolute !important;
  color:#000;
  padding: 2px;
  left: 4px;

}

label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.cards') }}">المعدات</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل بيانات المعدة
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">تعديل بيانات المعدة</h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.update.cards',$card->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1" required>إذا كنت ترغب في تعديل أسم المعدة</label>
                                                    <select name="name" id="profession" class="form-control">
                                                        <option value="" disabled selected>قم بإختر نوع المعدة</option>
                                                        <option @if($card->name == 'حفار') selected @endif value="حفار">حفار</option>
                                                        <option @if($card->name == 'لودر') selected @endif value="لودر">لودر</option>
                                                        <option @if($card->name == 'مولد') selected @endif value="مولد">مولد</option>
                                                        <option @if($card->name == 'كسارة') selected @endif value="كسارة">كسارة</option>
                                                        <option @if($card->name == 'كمبريسور') selected @endif value="كمبريسور">كمبريسور</option>
                                                        <option @if($card->name == 'ماكينة ابحاث') selected @endif value="ماكينة ابحاث">ماكينة ابحاث</option>
                                                    </select>
                                                    @error('name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="icon-note"></i>حدث بيانات المعدة المختارة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم المعدة :Equip. Code</label>
                                                        <input type="text" value="{{ $card->code }}" id="code"
                                                               class="form-control"

                                                               name="code">
                                                               @error('code')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">النوع والموديل Type / Model</label>
                                                        <input type="text" value="{{ $card->model }}" id="model"
                                                               class="form-control"

                                                               name="model">
                                                               @error('model')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تاريخ التشغيل Date Of Start</label>
                                                        <input type="date" value="{{ $card->date_of_start }}" id="date_of_start"
                                                               class="form-control"

                                                               name="date_of_start">
                                                               @error('date_of_start')
                                                               <span class="text-danger">{{ $message }}<br></span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الوزن  Weight</label>
                                                        <input type="text" value="{{ $card->weight }}" id="weight"
                                                               class="form-control"

                                                               name="weight">
                                                               @error('weight')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">إسم الصانع Manufacturer</label>
                                                        <input type="text" value="{{ $card->maker }}" id="maker"
                                                               class="form-control"

                                                               name="maker">
                                                               @error('maker')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم الرسم DRG. No</label>
                                                        <input type="text" value="{{ $card->drg_no }}" id="drg_no"
                                                               class="form-control"

                                                               name="drg_no">
                                                               @error('drg_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الأبعاد  Dimensions</label>
                                                        <input type="text" value="{{ $card->dimensions }}" id="dimensions"
                                                               class="form-control"

                                                               name="dimensions">
                                                               @error('dimensions')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">إسم المورد Supplier</label>
                                                        <input type="text" value="{{ $card->supplier }}" id="supplier"
                                                               class="form-control"

                                                               name="supplier">
                                                               @error('supplier')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بيان كتالوج التشغيل Inst. BK. No.</label>
                                                        <input type="text" value="{{ $card->inst_bk_no }}" id="inst_bk_no"
                                                               class="form-control"

                                                               name="inst_bk_no">
                                                               @error('inst_bk_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">القدرة  ك.وات / حصان HP/KW</label>
                                                        <input type="text" value="{{ $card->power }}" id="power"
                                                               class="form-control"

                                                               name="power">
                                                               @error('power')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم أمر التصنيع MFG order No.</label>
                                                        <input type="text" value="{{ $card->mfg_order_no }}" id="mfg_order_no"
                                                               class="form-control"

                                                               name="mfg_order_no">
                                                               @error('mfg_order_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بيان كتالوجات الصيانة Maintenance BK No.</label>
                                                        <input type="text" value="{{ $card->maintenance_bk_no }}" id="maintenance_bk_no"
                                                               class="form-control"

                                                               name="maintenance_bk_no">
                                                               @error('maintenance_bk_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">فولت التحكم Control Voltage</label>
                                                        <input type="text" value="{{ $card->control_voltage }}" id="control_voltage"
                                                               class="form-control"

                                                               name="control_voltage">
                                                               @error('control_voltage')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم أمر الشراء Purchase Order No.</label>
                                                        <input type="text" value="{{ $card->purchase_order_no }}" id="purchase_order_no"
                                                               class="form-control"

                                                               name="purchase_order_no">
                                                               @error('purchase_order_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">السعة Capacity / Output</label>
                                                        <input type="text" value="{{ $card->capacity }}" id="capacity"
                                                               class="form-control"

                                                               name="capacity">
                                                               @error('capacity')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الامبير الكلي Total Amperage</label>
                                                        <input type="text" value="{{ $card->total_amperage }}" id="total_amperage"
                                                               class="form-control"

                                                               name="total_amperage">
                                                               @error('total_amperage')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الرقم المسلسل Serial No.</label>
                                                        <input type="text" value="{{ $card->serial_no }}" id="serial_no"
                                                               class="form-control"

                                                               name="serial_no">
                                                               @error('serial_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">المعدن Material</label>
                                                        <input type="text" value="{{ $card->material }}" id="material"
                                                               class="form-control"

                                                               name="material">
                                                               @error('material')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بيانات ومعلومات أضافية Additional Data</label>
                                                        <input type="text" value="{{ $card->additional_data }}" id="additional_data"
                                                               class="form-control"

                                                               name="additional_data">
                                                               @error('additional_data')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">القسم</label>
                                                        <input type="text" value="{{ $card->part }}" id="part"
                                                               class="form-control"

                                                               name="part">
                                                               @error('part')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits">
                                                <i class="la la-check-square-o"></i> تحديث
                                                <i style="display: none" class="spinner-button fa fa-spinner fa-spin"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection
