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
                                                        <option @if($card->name == 'ستاكر كهراباء') selected @endif value="ستاكر كهراباء">ستاكر كهراباء</option>
                                                        <option @if($card->name == 'باور بالت') selected @endif value="باور بالت">باور بالت</option>
                                                        <option @if($card->name == 'ريتش تراك') selected @endif value="ريتش تراك">ريتش تراك</option>
                                                        <option @if($card->name == 'هاند بالت') selected @endif value="هاند بالت">هاند بالت</option>
                                                        <option @if($card->name == 'ونش شوكة كهرباء') selected @endif value="ونش شوكة كهرباء">ونش شوكة كهرباء</option>
                                                        <option @if($card->name == 'ونش شوكة ديزل') selected @endif value="ونش شوكة ديزل">ونش شوكة ديزل</option>
                                                        <option @if($card->name == 'أوردر بيكر') selected @endif value="أوردر بيكر">أوردر بيكر</option>
                                                        <option @if($card->name == 'سيزر ليفت') selected @endif value="سيزر ليفت">سيزر ليفت</option>
                                                        <option @if($card->name == 'مان ليفت') selected @endif value="مان ليفت">مان ليفت</option>
                                                        <option @if($card->name == 'حضان') selected @endif value="حضان">حضان</option>
                                                        <option @if($card->name == 'بطاريات') selected @endif value="بطاريات">بطاريات</option>
                                                        <option @if($card->name == 'تنجر شحن') selected @endif value="تنجر شحن">تنجر شحن</option>
                                                        <option @if($card->name == 'أطارات') selected @endif value="أطارات">أطارات</option>
                                                        <option @if($card->name == 'سيارة') selected @endif value="سيارة">سيارة</option>
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
                                                        <label for="projectinput1">رقم المعدة</label>
                                                        <input type="text" value="{{ $card->card_no }}" id="card_no"
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
                                                        <input type="text" value="{{ $card->part }}" id="part"
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
                                                        <input type="text" value="{{ $card->card_model }}" id="card_model"
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
                                                        <input type="text" value="{{ $card->model_year }}" id="model_year"
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
                                                        <input type="text" value="{{ $card->brand_name }}" id="brand_name"
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
                                                        <input type="text" value="{{ $card->mast_type }}" id="mast_type"
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
                                                        <input type="text" value="{{ $card->tire_type }}" id="tire_type"
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
                                                        <input type="text" value="{{ $card->card_load }}" id="card_load"
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
                                                        <input type="text" value="{{ $card->chassis_no }}" id="chassis_no"
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
                                                        <input type="text" value="{{ $card->safety }}" id="safety"
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
                                                        <input type="text" value="{{ $card->battery }}" id="battery"
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
                                                        <input type="text" value="{{ $card->charger }}" id="charger"
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
                                                        <input type="text" value="{{ $card->charging_plug }}" id="charging_plug"
                                                               class="form-control"
                                                               placeholder="أدخل فيشة شحن"
                                                               name="charging_plug">
                                                               @error('charging_plug')
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
