@extends('layouts.admin')
@section('title')
تعديل فاتورة العميل {{ $customer->company_name }}
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.customer') }}">العملاء</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $customer->company_name }}
                            </li>
                            <li class="breadcrumb-item active">تعديل الفاتورة
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
                                <h4 class="card-title" id="basic-layout-form">تعديل فاتورة العميل {{ $customer->company_name }}</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.update.account',$account->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i> عدل بيانات الفاتورة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>رقم الفاتورة</label>
                                                        <input type="text" value="{{ $account->invoice_number }}" id="invoice_number"
                                                               class="form-control"
                                                               placeholder="أدخل رقم الفاتورة"
                                                               name="invoice_number">
                                                               @error('invoice_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الوصف</label>
                                                        <input type="text" value="{{ $account->description }}" id="description"
                                                               class="form-control"
                                                               placeholder="أدخل الوصف"
                                                               name="description">
                                                               @error('description')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>قيمة الفاتورة</label>
                                                        <input type="text" value="{{ $account->invoice_value }}" id="invoice_value"
                                                               class="form-control"
                                                               placeholder="أدخل قيمة الفاتورة"
                                                               name="invoice_value">
                                                               @error('invoice_value')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>تاريخ الفاتورة</label>
                                                        <input type="date" value="{{ $account->invoice_date }}" id="invoice_date"
                                                               class="form-control"
                                                               placeholder="أدخل تاريخ الفاتورة"
                                                               name="invoice_date">
                                                               @error('invoice_date')
                                                               <span class="text-danger">{{ $message }}<br></span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>بيانات الفاتورة</label>
                                                        <textarea type="text" id="invoice_data"class="form-control" name="invoice_data">{{ $account->invoice_data }}</textarea>
                                                               @error('invoice_data')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الملاحظات</label>
                                                        <input type="text" value="{{ $account->notes }}" id="notes"
                                                               class="form-control"
                                                               placeholder="أدخل الملاحظات"
                                                               name="notes">
                                                               @error('notes')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" name="status" value="1"
                                                                id="switcheryColor4"
                                                                class="switchery" data-color="success"
                                                               @if($account->status == 1) checked @endif/>
                                                        <label for="switcheryColor4"
                                                                class="card-title ml-1">تم تحصيل الفاتورة </label>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits">
                                                <i class="la la-check-square-o"></i> تعديل
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
