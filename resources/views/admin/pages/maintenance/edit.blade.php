@extends('layouts.admin')
@section('title')
تعديل بيانات الصيانة
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.maintenance.cards.index.maintenance',$card_id) }}">الصيانات</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل بيانات الصيانة
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
                                <h4 class="card-title" id="basic-layout-form">تعديل بيانات صيانة</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.maintenance.cards.update.maintenance',$maintenance->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i>عدل بيانات الصيانة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label required for="projectinput1">الأعطال وعمليات الإصلاح / الصيانة الدورية</label>
                                                        <textarea type="text" id="maintenance"
                                                            class="form-control"
                                                            placeholder="أدخل الأعطال وعمليات الإصلاح / الصيانة الدورية"
                                                            name="maintenance">{{ $maintenance->maintenance }}</textarea>
                                                            @error('maintenance')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label required for="projectinput1">تاريخ الصيانة</label>
                                                        <input type="date" value="{{ $maintenance->date }}" id="date"
                                                            class="form-control"
                                                            placeholder="أدخل تاريخ الصيانة"
                                                            name="date">
                                                            @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">قطع الغيار Spare Parts</label>
                                                        <input type="text" value="{{ $maintenance->spare_parts }}" id="spare_parts"
                                                            class="form-control"
                                                            placeholder="أدخل قطع الغيار Spare Parts"
                                                            name="spare_parts">
                                                            @error('spare_parts')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label required for="projectinput1">تكاليف الاصلاح</label>
                                                        <input type="text" value="{{ $maintenance->cost }}" id="cost"
                                                            class="form-control"
                                                            placeholder="أدخل تكاليف الاصلاح"
                                                            name="cost">
                                                            @error('cost')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">زمن الآصلاح عامل . ساعة M.HR</label>
                                                        <input type="text" value="{{ $maintenance->duration }}" id="duration"
                                                            class="form-control"
                                                            placeholder="أدخل زمن الآصلاح عامل . ساعة M.HR"
                                                            name="duration">
                                                            @error('duration')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label required for="projectinput1">القائم بالإصلاح By</label>
                                                        <select name="technicians[]" id="profession" class="form-control authes" style="width: 435px" multiple>
                                                            <option  disabled>أختر الفنيين</option>
                                                            @foreach ($technician1s as $technician)
                                                            <option value="{{$technician->id }}" @if(is_array($technicians_id) && in_array($technician->id , $technicians_id)) selected @endif >{{ $technician->name }}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('technicians')
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.authes').select2({})
})
</script>
@endsection
