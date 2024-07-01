@extends('layouts.admin')
@section('title')
إضافة معدة
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
                            <li class="breadcrumb-item active">أضافة معدة
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
                                <h4 class="card-title" id="basic-layout-form">تسجيل معدة جديدة</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.store.cards') }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1" required>برجاء أختيار أسم المعدة</label>
                                                    <select name="name" id="profession" class="form-control">
                                                        <option value="" disabled selected>إختر نوع المعدة</option>
                                                        <option value="ستاكر كهراباء">ستاكر كهراباء</option>
                                                        <option value="باور بالت">باور بالت</option>
                                                        <option value="ريتش تراك">ريتش تراك</option>
                                                        <option value="هاند بالت">هاند بالت</option>
                                                        <option value="ونش شوكة كهرباء">ونش شوكة كهرباء</option>
                                                        <option value="ونش شوكة ديزل">ونش شوكة ديزل</option>
                                                        <option value="أوردر بيكر">أوردر بيكر</option>
                                                        <option value="سيزر ليفت">سيزر ليفت</option>
                                                        <option value="مان ليفت">مان ليفت</option>
                                                        <option value="حضان">حضان</option>
                                                        <option value="بطاريات">بطاريات</option>
                                                        <option value="تنجر شحن">تنجر شحن</option>
                                                        <option value="أطارات">أطارات</option>
                                                        <option value="سيارة">سيارة</option>
                                                    </select>
                                                    @error('name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i>أضف بيانات المعدة الجديدة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم المعدة</label>
                                                        <input type="text" value="{{ old('card_no') }}" id="card_no"
                                                               class="form-control"
                                                               placeholder="أدخل رقم المعدة"
                                                               name="card_no">
                                                               @error('card_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">القسم</label>
                                                        <input type="text" value="{{ old('part') }}" id="part"
                                                               class="form-control"
                                                               placeholder="أدخل القسم"
                                                               name="part">
                                                               @error('part')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">موديل المعدة</label>
                                                        <input type="text" value="{{ old('card_model') }}" id="card_model"
                                                               class="form-control"
                                                               placeholder="أدخل موديل المعدة"
                                                               name="card_model">
                                                               @error('card_model')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">موديل السنة</label>
                                                        <input type="text" value="{{ old('model_year') }}" id="model_year"
                                                               class="form-control"
                                                               placeholder="أدخل موديل السنة"
                                                               name="model_year">
                                                               @error('model_year')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">أسم البراند</label>
                                                        <input type="text" value="{{ old('brand_name') }}" id="brand_name"
                                                               class="form-control"
                                                               placeholder="أدخل أسم البراند"
                                                               name="brand_name">
                                                               @error('brand_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">نوع الماست</label>
                                                        <input type="text" value="{{ old('mast_type') }}" id="mast_type"
                                                               class="form-control"
                                                               placeholder="أدخل نوع الماست"
                                                               name="mast_type">
                                                               @error('mast_type')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">نوع الاطارات</label>
                                                        <input type="text" value="{{ old('tire_type') }}" id="tire_type"
                                                               class="form-control"
                                                               placeholder="أدخل نوع الاطارات"
                                                               name="tire_type">
                                                               @error('tire_type')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">حمولة المعدة</label>
                                                        <input type="text" value="{{ old('card_load') }}" id="card_load"
                                                               class="form-control"
                                                               placeholder="أدخل حمولة المعدة"
                                                               name="card_load">
                                                               @error('card_load')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم الشاسية</label>
                                                        <input type="text" value="{{ old('chassis_no') }}" id="chassis_no"
                                                               class="form-control"
                                                               placeholder="أدخل رقم الشاسية"
                                                               name="chassis_no">
                                                               @error('chassis_no')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">سيفتي</label>
                                                        <input type="text" value="{{ old('safety') }}" id="safety"
                                                               class="form-control"
                                                               placeholder="أدخل سيفتي"
                                                               name="safety">
                                                               @error('safety')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بطارية</label>
                                                        <input type="text" value="{{ old('battery') }}" id="battery"
                                                               class="form-control"
                                                               placeholder="أدخل بطارية"
                                                               name="battery">
                                                               @error('battery')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">شاحن</label>
                                                        <input type="text" value="{{ old('charger') }}" id="charger"
                                                               class="form-control"
                                                               placeholder="أدخل شاحن"
                                                               name="charger">
                                                               @error('charger')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">فيشة شحن</label>
                                                        <input type="text" value="{{ old('charging_plug') }}" id="charging_plug"
                                                               class="form-control"
                                                               placeholder="أدخل فيشة شحن"
                                                               name="charging_plug">
                                                               @error('charging_plug')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">نظام الهيدروليك</label>
                                                        <input type="text" value="{{ old('hydraulic_system') }}" id="hydraulic_system"
                                                               class="form-control"
                                                               placeholder="أدخل نظام الهيدروليك"
                                                               name="hydraulic_system">
                                                               @error('hydraulic_system')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">ملاحظات</label>
                                                        <input type="text" value="{{ old('notes') }}" id="notes"
                                                               class="form-control"
                                                               placeholder="أدخل ملاحظات"
                                                               name="notes">
                                                               @error('notes')
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
                                                <i class="la la-check-square-o"></i> حفظ
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
