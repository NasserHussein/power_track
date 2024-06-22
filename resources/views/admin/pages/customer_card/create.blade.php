@extends('layouts.admin')
@section('title')
إضافة بيانات معدة وعميل
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.customer.Card') }}">معدات العملاء</a>
                            </li>
                            <li class="breadcrumb-item active">إضافة بيانات معدة وعميل
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
                                <h4 class="card-title" id="basic-layout-form">تسجيل بيانات معدة وعميل</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.store.customer.Card') }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i>أضف بيانات المعدة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>نوع المعدة</label>
                                                        <input type="text" value="{{ old('name') }}" id="name"
                                                               class="form-control"
                                                               placeholder="أدخل نوع المعدة"
                                                               name="name">
                                                               @error('name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>الرقم التسلسلي</label>
                                                        <input type="text" value="{{ old('serial_no') }}" id="serial_no"
                                                               class="form-control"
                                                               placeholder="أدخل الرقم التسلسلي"
                                                               name="serial_no">
                                                               @error('serial_no')
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
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تاريخ الشراء</label>
                                                        <input type="date" value="{{ old('date_of_purchase') }}" id="date_of_purchase"
                                                               class="form-control"
                                                               placeholder="أدخل تاريخ الشراء"
                                                               name="date_of_purchase">
                                                               @error('date_of_purchase')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تفاصيل اضافية</label>
                                                        <input type="text" value="{{ old('notes') }}" id="notes"
                                                               class="form-control"
                                                               placeholder="أدخل تفاصيل اضافية"
                                                               name="notes">
                                                               @error('notes')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="la la-user-plus"></i>أضف بيانات العميل</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>أسم العميل</label>
                                                        <input type="text" value="{{ old('customer_name') }}" id="customer_name"
                                                               class="form-control"
                                                               placeholder="أدخل أسم العميل"
                                                               name="customer_name">
                                                               @error('customer_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>رقم الهاتف</label>
                                                        <input type="text" value="{{ old('phone_no') }}" id="phone_no"
                                                               class="form-control"
                                                               placeholder="أدخل رقم الهاتف"
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
                                                        <label for="projectinput1">البريد الالكتروني</label>
                                                        <input type="email" value="{{ old('email') }}" id="email"
                                                               class="form-control"
                                                               placeholder="أدخل البريد الالكتروني"
                                                               name="email">
                                                               @error('email')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">عنوان العميل ان وجد</label>
                                                        <input type="text" value="{{ old('address') }}" id="address"
                                                               class="form-control"
                                                               placeholder="أدخل عنوان العميل ان وجد"
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
                                                        <label for="projectinput1">أسم الشركة إذا كان العميل شركة</label>
                                                        <input type="text" value="{{ old('company_name') }}" id="company_name"
                                                               class="form-control"
                                                               placeholder="أدخل أسم الشركة إذا كان العميل شركة"
                                                               name="company_name">
                                                               @error('company_name')
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
