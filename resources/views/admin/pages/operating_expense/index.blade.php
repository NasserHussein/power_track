@extends('layouts.admin')
@section('title')
المصروفات التشغيلية
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">المصروفات التشغيلية</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.create.operating.expenses') }}">إضافة مصروف</a>
                            </li>
                            <li class="breadcrumb-item active">المصروفات التشغيلية
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="la la-pied-piper-alt"></i> اجمالي عدد المصروفات التشغيلية  {{ $sum }}$</h4>
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
                                <div class="card-body card-dashboard">
                                    <table class=" display nowrap table-striped table-bordered scroll-horizontal"  style="width:auto;text-align: center">
                                        <thead>
                                            <div class="row">
                                                <div style="margin-right:350px;">
                                                <div style="margin-left: 50px" class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" data-toggle="modal" data-target="#determine_the_period_of_losses" class="btn btn-outline-warning btn-min-width btn-glow mr-1 mb-1">
                                                        تحديد فترة لحساب المصروفات التشغيلية
                                                    </button>
                                                    {{-- ----Start Modal---- --}}
                                                    <div class="modal fade text-left" id="determine_the_period_of_losses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel43">الفترة المراد حساب التكلفة فيها</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form class="form form-prevent-multiple-submits" action="{{ route('admin.determine.specific.expense.period.expenses') }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <h5>من فضلك أملا البيانات المطلوبة</h5>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label required for="projectinput1">بداية الفترة</label>
                                                                                    <input type="date" value="{{ old('start') }}" id="start"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل تاريخ الصيانة"
                                                                                        name="start">
                                                                                        @error('start')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label required for="projectinput1">نهاية الفترة</label>
                                                                                    <input type="date" value="{{ old('end') }}" id="end"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل تاريخ الصيانة"
                                                                                        name="end">
                                                                                        @error('end')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1" required>إختر البند الذي تريد البحث عنه</label>
                                                                                    <select name="clause" id="profession" class="form-control">
                                                                                        <option value="" disabled selected>إختر بند من هذه البنود</option>
                                                                                        <option @if(old('clause') == '1') selected @endif value="1">كل البنود</option>
                                                                                        <option @if(old('clause') == 'أيجار مصنع') selected @endif value="أيجار مصنع">أيجار مصنع</option>
                                                                                        <option @if(old('clause') == 'رواتب العامليين') selected @endif value="رواتب العامليين">رواتب العامليين</option>
                                                                                        <option @if(old('clause') == 'فواتير المياة') selected @endif value="فواتير المياة">فواتير المياة</option>
                                                                                        <option @if(old('clause') == 'فواتير الكهرباء') selected @endif value="فواتير الكهرباء">فواتير الكهرباء</option>
                                                                                        <option @if(old('clause') == 'حراسة وتأمين') selected @endif value="حراسة وتأمين">حراسة وتأمين</option>
                                                                                        <option @if(old('clause') == 'مصاريف محاسب') selected @endif value="مصاريف محاسب">مصاريف محاسب</option>
                                                                                        <option @if(old('clause') == 'مستلزمات مكتب') selected @endif value="مستلزمات مكتب">مستلزمات مكتب</option>
                                                                                        <option @if(old('clause') == 'مصاريف ضيافة') selected @endif value="مصاريف ضيافة">مصاريف ضيافة</option>
                                                                                        <option @if(old('clause') == 'فواتير خطوط التليفون') selected @endif value="فواتير خطوط التليفون">فواتير خطوط التليفون</option>
                                                                                        <option @if(old('clause') == 'صيانات مصنع') selected @endif value="صيانات مصنع">صيانات مصنع</option>
                                                                                        <option @if(old('clause') == 'تأمينات') selected @endif value="تأمينات">تأمينات</option>
                                                                                        <option @if(old('clause') == 'ضرائب') selected @endif value="ضرائب">ضرائب</option>
                                                                                        <option @if(old('clause') == 'اخري') selected @endif value="اخري">اخري</option>
                                                                                    </select>
                                                                                    @error('clause')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-dark btn-min-width mr-1 mb-1" data-dismiss="modal">إغلاق</button>
                                                                        <button type="submit" class="btn btn-warning btn-min-width mr-1 mb-1">اتمام البحث <i class="ft-save"></i>
                                                                            <i style="display: none" class="spinner-button fa fa-spinner fa-spin"></i>
                                                                        </button>
                                                                    </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- ----End Modal---- --}}
                                                </div>
                                                </div>
                                                </div>
                                            </div>
                                        <tr style="height: 40px;background-color: #f29d1e" class="white">
                                            <th>id</th>
                                            <th>بند</th>
                                            <th>الوصف</th>
                                            <th>المبلغ</th>
                                            <th>المكلف بالدفع</th>
                                            <th>تاريخ المصروف</th>
                                            <th>الملاحظات</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($operating_expenses)
                                            @foreach ($operating_expenses as $operating_expense)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:50px;">{{ $operating_expense->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $operating_expense->clause }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:125px;">{{ $operating_expense->description }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px">{{ $operating_expense->amount }}$</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $operating_expense->person_responsible_for_payment }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $operating_expense->payment_date }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $operating_expense->notes }}</div></td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <a href="{{ route('admin.edit.operating.expenses',$operating_expense->id) }}" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تعديل
                                                        </a>
                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $operating_expense->id }}" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                            <div class="modal animated bounceIn text-left" id="delete{{ $operating_expense->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="myModalLabel46">حذف المصروف</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5 style="color: red">هل متأكد من حذف المصروف</h5>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">لا , تراجع</button>
                                                                            <a href="{{ route('admin.delete.operating.expenses',$operating_expense->id) }}" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- ----End Modal---- --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
