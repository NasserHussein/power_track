@extends('layouts.admin')
@section('title')
تعديل الأخطار بالصيانة
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
                            <li class="breadcrumb-item"><a href="#">عرض كل الاخطارت الغير نشطة</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل الأخطار بالصيانة
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
                                <h4 class="card-title" id="basic-layout-form">تعديل الأخطار بالصيانة</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.maintenance_Notifie.update',$notifie->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i>حدث بيانات الأخطار</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>قطع الغيار التي تحتاجها للصيانة القادمة</label>
                                                        <input type="text" value="{{ $notifie->spare_parts }}" id="spare_parts"
                                                               class="form-control"
                                                               placeholder="أدخل قطع الغيار التي تحتاجها للصيانة القادمة"
                                                               name="spare_parts">
                                                               @error('spare_parts')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label required for="projectinput1">تاريخ الأخطار بالصيانة</label>
                                                        <input type="date" value="{{ $notifie->notification_date }}" id="notification_date"
                                                            class="form-control"
                                                            placeholder="أدخل تاريخ الصيانة"
                                                            name="notification_date">
                                                            @error('notification_date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">ملاحظات</label>
                                                        <textarea type="text" id="notes"class="form-control" name="notes" placeholder="أدخل ملاحظاتك هنا.....">{{ $notifie->notes }}</textarea>
                                                            @error('notes')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="status" value="1"
                                                                id="switcheryColor4"
                                                                class="switchery" data-color="success"
                                                                @if($notifie->status == '1') checked @endif/>
                                                        <label for="switcheryColor4"
                                                                class="card-title ml-1">حالة الأخطار</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits mr-1">
                                                <i class="la la-check-square-o"></i> تحديث البيانات
                                                <i style="display: none" class="spinner-button fa fa-spinner fa-spin"></i>
                                            </button>
                                            <a href="{{ route('admin.maintenance_Notifie.delete',$notifie->id) }}" class="btn btn-danger button-prevent-multiple-submits"> <i class="la la-bitbucket-square"></i> حذف الاخطار</a>
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
