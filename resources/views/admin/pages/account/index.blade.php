@extends('layouts.admin')
@section('title')
حساب {{ $customer->company_name }}
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">حساب <mark>{{ $customer->company_name }}</mark></h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.customer') }}">العملاء</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.create.account',$customer->id) }}">إضافة فاتورة</a>
                            </li>
                            <li class="breadcrumb-item active">حساب <mark>{{ $customer->company_name }}</mark>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                                <div class="card-body card-dashboard">
                                    <table class="display nowrap table-striped table-bordered "  style="width:900px;height: 100px;text-align: center">
                                        <thead>
                                        <tr style="height: 40px" class="bg-primary white">
                                            <th>مدين</th>
                                            <th>دائن</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                    <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $accounts->where('status', 0)->sum('invoice_value') }} ج.م</div></td>
                                                    <td><div style="font-size: 30px;color: rgb(15, 73, 3)">0 ج.م</div></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                    </div>
                                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="la la-group"></i> عدد الفواتير للعميل <mark> {{ $customer->company_name }}</mark> <span style="font-size: 20px;color: red">--></span> {{ $accounts->count() }}</h4>
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
                                    <table class="display nowrap table-striped table-bordered scroll-horizontal"  style="width:auto;text-align: center">
                                        <thead>
                                        <tr style="height: 40px" class="bg-success white">
                                            <th>id</th>
                                            <th>أسم العميل</th>
                                            <th>رقم الفاتورة</th>
                                            <th>الوصف</th>
                                            <th>قيمة الفاتورة</th>
                                            <th>بيانات الفاتورة</th>
                                            <th>تاريخ الفاتورة</th>
                                            <th>الملاحظات</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($accounts)
                                            @foreach ($accounts as $account)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:20px;">{{ $account->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $customer->company_name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $account->invoice_number }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px">{{ $account->description }}</div></td>
                                                    <td>@if($account->status == 1) <s style="font-size: 18px" @endif @if($account->status == 0) <div @endif style="word-wrap: break-word;width:80px;">{{ $account->invoice_value }} ج.م @if(($account->status == 0)) </div> @endif @if(($account->status == 1)) </s> @endif @if(($account->status == 1)) </br> <span style="color: blue">تم تحصيل الرسوم</span> @endif</td>
                                                    <td><div style="word-wrap: break-word;width:120px;">
                                                    <button type="button" class="btn mr-1 mb-1 btn-success btn-sm" data-toggle="modal" data-target="#pulse{{ $account->id }}">
                                                        عرض بيانات</br></br>الفاتورة
                                                    </button>
                                                    {{-- ----Start Modal---- --}}
                                                    <div class="modal animated pulse text-left" id="pulse{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel38" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel38">بيانات الفاتورة رقم {{ $account->invoice_number }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <pre style="font-size: 16px">{{ $account->invoice_data }}</pre>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    {{-- ----End Modal---- --}}
                                                    </div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $account->invoice_date }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $account->notes }}</div></td>
                                                    <td>
                                                            <a class="btn mr-1 mb-1 btn-outline-info btn-sm" href="{{ route('admin.edit.account',$account->id) }}" >تعديل</a>
                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $account->id }}" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated bounceIn text-left" id="delete{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel46">حذف بيانات العميل</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5 style="color: red">هل متأكد من حذف بيانات العميل</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">لا , تراجع</button>
                                                                        <a href="{{ route('admin.delete.account',$account->id) }}" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
                                                                    </div>
                                                                </div>
                                                            </div>
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
