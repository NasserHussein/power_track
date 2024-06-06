@extends('layouts.admin')
@section('title')
تعديل بيانات فني
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.technician') }}">الفنيين</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل بيانات فني
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
                                <h4 class="card-title" id="basic-layout-form">تعديل بيانات الفني</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.update.technician',$techician->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i>حدث بيانات الفني</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>أسم الفني</label>
                                                        <input type="text" value="{{ $techician->name }}" id="name"
                                                               class="form-control"
                                                               placeholder="أدخل أسم الفني"
                                                               name="name">
                                                               @error('name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>تليفون الفني</label>
                                                        <input type="text" value="{{ $techician->phone_no }}" id="phone_no"
                                                               class="form-control"
                                                               placeholder="أدخل تليفون الفني"
                                                               name="phone_no">
                                                               @error('phone_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">E-Mail</label>
                                                        <input type="email" value="{{ $techician->email }}" id="email"
                                                               class="form-control"
                                                               placeholder="أدخل E-Mail"
                                                               name="email">
                                                               @error('email')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">عنوان الفني</label>
                                                        <input type="text" value="{{ $techician->address }}" id="address"
                                                               class="form-control"
                                                               placeholder="أدخل عنوان الفني"
                                                               name="address">
                                                               @error('address')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تاريخ التوظيف</label>
                                                        <input type="date" value="{{ $techician->date_of_employment }}" id="date_of_employment"
                                                               class="form-control"
                                                               placeholder="أدخل تاريخ التوظيف"
                                                               name="date_of_employment">
                                                               @error('date_of_employment')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">المؤهلات</label>
                                                        <input type="text" value="{{ $techician->qualifications }}" id="qualifications"
                                                               class="form-control"
                                                               placeholder="أدخل المؤهلات"
                                                               name="qualifications">
                                                               @error('qualifications')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الخبرات السابقة</label>
                                                        <input type="text" value="{{ $techician->previous_experience }}" id="previous_experience"
                                                               class="form-control"
                                                               placeholder="أدخل الخبرات السابقة"
                                                               name="previous_experience">
                                                               @error('previous_experience')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>المهارات الفنية</label>
                                                    <select name="technical_skills" id="profession" class="form-control">
                                                        <option value="" disabled selected>إختر مهارة العامل</option>
                                                        <option value="0" @if($techician->technical_skills == '0') selected @endif>فني</option>
                                                        <option value="1" @if($techician->technical_skills == '1') selected @endif>مساعد</option>
                                                    </select>
                                                               @error('technical_skills')
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
                                                <i class="la la-check-square-o"></i> تحديث البيانات
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
