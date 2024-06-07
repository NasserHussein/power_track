@extends('layouts.admin')
@section('title')
العملاء
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">العملاء</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.create.customer') }}">إضافة عميل</a>
                            </li>
                            <li class="breadcrumb-item active">العملاء
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
                                <h4 class="card-title"><i class="la la-group"></i> عدد العملاء الموجودين {{ $customers->count() }}</h4>
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
                                        <tr style="height: 40px" class="bg-success white">
                                            <th>id</th>
                                            <th>أسم الشركة</th>
                                            <th>أسم المسؤول</th>
                                            <th>رقم الهاتف</th>
                                            <th>E-Mail</th>
                                            <th>عنوان الشركة والفروع</th>
                                            <th>تاريخ التعاقد</th>
                                            <th>حسابات العميل</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($customers)
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:20px;">{{ $customer->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $customer->company_name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $customer->name_manager }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px">{{ $customer->phone_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $customer->email }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $customer->company_address }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $customer->date_of_contract }}</div></td>
                                                    <td>
                                                        <div><a style="color: rgb(124, 0, 207);border: 1.5px solid rgba(255, 0, 0, 0.404);border-radius: 8px;" href="{{ route('admin.index.account',$customer->id) }}">حساب العميل</a></div>
                                                    </br>
                                                       <div><a style="color: rgb(255, 0, 0);border: 1.5px solid rgba(27, 175, 84, 0.61);border-radius: 8px;" href="{{ route('admin.create.account',$customer->id) }}">أضافة فاتورة</a></div>
                                                    </td>
                                                    <td>
                                                            <a class="btn mr-1 mb-1 btn-outline-info btn-sm" href="{{ route('admin.edit.customer',$customer->id) }}" >تعديل</a>
                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $customer->id }}" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated bounceIn text-left" id="delete{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
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
                                                                        <a href="{{ route('admin.delete.customer',$customer->id) }}" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
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
