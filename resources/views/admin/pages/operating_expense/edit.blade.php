@extends('layouts.admin')
@section('title')
تعديل مصروف
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.operating.expenses') }}">المصروفات التشغيلية</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل مصروف
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
                                <h4 class="card-title" id="basic-layout-form">تعديل مصروف</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.update.operating.expenses',$operating_expense->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1" required>هذا المصروف يندرج تحت اي بند</label>
                                                    <select name="clause" id="profession" class="form-control">
                                                        <option value="" disabled selected>إختر بند من هذه البنود</option>
                                                        <option @if($operating_expense->clause == 'أيجار مصنع') selected @endif value="أيجار مصنع">أيجار مصنع</option>
                                                        <option @if($operating_expense->clause == 'رواتب العامليين') selected @endif value="رواتب العامليين">رواتب العامليين</option>
                                                        <option @if($operating_expense->clause == 'فواتير المياة') selected @endif value="فواتير المياة">فواتير المياة</option>
                                                        <option @if($operating_expense->clause == 'فواتير الكهرباء') selected @endif value="فواتير الكهرباء">فواتير الكهرباء</option>
                                                        <option @if($operating_expense->clause == 'حراسة وتأمين') selected @endif value="حراسة وتأمين">حراسة وتأمين</option>
                                                        <option @if($operating_expense->clause == 'مصاريف محاسب') selected @endif value="مصاريف محاسب">مصاريف محاسب</option>
                                                        <option @if($operating_expense->clause == 'مستلزمات مكتب') selected @endif value="مستلزمات مكتب">مستلزمات مكتب</option>
                                                        <option @if($operating_expense->clause == 'مصاريف ضيافة') selected @endif value="مصاريف ضيافة">مصاريف ضيافة</option>
                                                        <option @if($operating_expense->clause == 'فواتير خطوط التليفون') selected @endif value="فواتير خطوط التليفون">فواتير خطوط التليفون</option>
                                                        <option @if($operating_expense->clause == 'صيانات مصنع') selected @endif value="صيانات مصنع">صيانات مصنع</option>
                                                        <option @if($operating_expense->clause == 'تأمينات') selected @endif value="تأمينات">تأمينات</option>
                                                        <option @if($operating_expense->clause == 'ضرائب') selected @endif value="ضرائب">ضرائب</option>
                                                        <option @if($operating_expense->clause == 'اخري') selected @endif value="اخري">اخري</option>
                                                    </select>
                                                    @error('clause')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-feather"></i>عدل المصروف</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الوصف</label>
                                                        <input type="text" value="{{ $operating_expense->description }}" id="description"
                                                               class="form-control"
                                                               placeholder="أدخل الوصف"
                                                               name="description">
                                                               @error('description')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>المبلغ المدفوع</label>
                                                        <input type="text" value="{{ $operating_expense->amount }}" id="amount"
                                                               class="form-control"
                                                               placeholder="أدخل المبلغ المدفوع"
                                                               name="amount">
                                                               @error('amount')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" required>تاريخ الدفع</label>
                                                        <input type="date" value="{{ $operating_expense->payment_date }}" id="payment_date"
                                                               class="form-control"
                                                               placeholder="أدخل تاريخ الدفع"
                                                               name="payment_date">
                                                               @error('payment_date')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">المكلف بالدفع</label>
                                                        <input type="text" value="{{ $operating_expense->person_responsible_for_payment }}" id="person_responsible_for_payment"
                                                               class="form-control"
                                                               placeholder="أدخل المكلف بالدفع"
                                                               name="person_responsible_for_payment">
                                                               @error('person_responsible_for_payment')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الملاحظات</label>
                                                        <input type="text" value="{{ $operating_expense->notes }}" id="notes"
                                                               class="form-control"
                                                               placeholder="أدخل الملاحظات"
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
