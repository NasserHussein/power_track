@extends('layouts.admin')
@section('title')
تعديل بيانات أستلام المعدة
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.customer.maintenance',$customer_maintenance->customer_card_id ) }}">صيانات المعدة</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل بيانات أستلام المعدة
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
                                <h4 class="card-title" id="basic-layout-form">تعديل بيانات أستلام المعدة</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.update.customer.maintenance',$customer_maintenance->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i>عدل بيانات أستلام المعدة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>حالة المعدة عند الأستلام</label>
                                                        <input type="text" value="{{ $customer_maintenance->card_state }}" id="card_state"
                                                               class="form-control"
                                                               placeholder="أدخل حالة المعدة عند الأستلام"
                                                               name="card_state">
                                                               @error('card_state')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>وصف المشكلة التي تحتاجها المعدة</label>
                                                        <input type="text" value="{{ $customer_maintenance->problem_description }}" id="problem_description"
                                                               class="form-control"
                                                               placeholder="أدخل وصف المشكلة التي تحتاجها المعدة"
                                                               name="problem_description">
                                                               @error('problem_description')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">ملاحظات</label>
                                                        <textarea type="text" id="notes"class="form-control" name="notes" placeholder="أدخل ملاحظاتك هنا.....">{{ $customer_maintenance->notes }}</textarea>
                                                            @error('notes')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>تاريخ الاستلام</label>
                                                        <input type="date" value="{{ $customer_maintenance->received_date }}" id="received_date"
                                                               class="form-control"
                                                               placeholder="أدخل تاريخ الاستلام"
                                                               name="received_date">
                                                               @error('received_date')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">حالة المعدة بعد الصيانة</label>
                                                        <input type="text" value="{{ $customer_maintenance->card_state_after_maintenance }}" id="card_state_after_maintenance"
                                                               class="form-control"
                                                               placeholder="أدخل حالة المعدة بعد الصيانة"
                                                               name="card_state_after_maintenance" readonly>
                                                               @error('card_state_after_maintenance')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">قطع الغيار التي تم تغييرها</label>
                                                        <input type="text" value="{{ $customer_maintenance->spare_parts }}" id="spare_parts"
                                                               class="form-control"
                                                               placeholder="أدخل قطع الغيار التي تم تغييرها"
                                                               name="spare_parts" readonly>
                                                               @error('spare_parts')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تكلفة الصيانة</label>
                                                        <input type="text" value="{{ $customer_maintenance->maintenance_cost }}" id="maintenance_cost"
                                                               class="form-control"
                                                               placeholder="أدخل تكلفة الصيانة"
                                                               name="maintenance_cost" readonly>
                                                               @error('maintenance_cost')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تاريخ الانتهاء من الصيانة</label>
                                                        <input type="date" value="{{ $customer_maintenance->date_of_finishing }}" id="date_of_finishing"
                                                               class="form-control"
                                                               placeholder="أدخل تاريخ الانتهاء من الصيانة"
                                                               name="date_of_finishing" readonly>
                                                               @error('date_of_finishing')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>تفاصيل العمل الذي تم في المعدة</label>
                                                        <input type="text" value="{{ $customer_maintenance->work_details }}" id="work_details"
                                                               class="form-control"
                                                               placeholder="أدخل تفاصيل العمل الذي تم في المعدة"
                                                               name="work_details" readonly>
                                                               @error('work_details')
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
                                                <i class="la la-check-square-o"></i> حفظ التغييرات
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
