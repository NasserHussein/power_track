@extends('layouts.admin')
@section('title')
صيانات المعدة
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> صيانات المعدة </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.customer.Card') }}">معدات العملاء</a>
                            </li>
                            <li class="breadcrumb-item active"> صيانات المعدة
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع الصيانات المسجلة للمعدة {{ $customer_maintenances->count() }} صيانة</h4>
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
                                        <tr>
                                            <th>ID</th>
                                            <th>نوع المعدة</th>
                                            <th>تاريخ الاستلام</th>
                                            <th>حالة المعدة عند الأستلام</th>
                                            <th>وصف المشكلة التي تحتاجها المعدة</th>
                                            <th>تفاصيل</th>
                                            <th>تفاصيل<br>إضافية</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($customer_maintenances)
                                            @foreach ($customer_maintenances as $customer_maintenance)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:50px;">{{ $customer_maintenance->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $customer_maintenance->customer_card->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:75px">{{ $customer_maintenance->received_date }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $customer_maintenance->card_state }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:208px;">{{ $customer_maintenance->problem_description }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:113px;">{{ $customer_maintenance->notes }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">
                                                        <button type="button" class="btn mr-1 mb-1 btn-outline-warning btn-sm" data-toggle="modal" data-target="#notes">
                                                            تفاصيل</br>إضافية
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                            <div class="modal fade text-left" id="notes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-warning white">
                                                                            <h4 class="modal-title white" id="myModalLabel12"><i class="icon-notebook"></i> تفاصيل اضافية</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5><i class="la la-gears"></i> تفاصيل عن حالة المعدة بعد الصيانة</h5>
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th scope="row">تفاصيل العمل الذي تم في المعدة</th>
                                                                                            <td>{{ $customer_maintenance->work_details }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">قطع الغيار التي تم تغييرها</th>
                                                                                            <td>{{ $customer_maintenance->spare_parts }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">تكلفة الصيانة</th>
                                                                                            <td>{{ $customer_maintenance->maintenance_cost }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">حالة المعدة بعد الصيانة</th>
                                                                                            <td>{{ $customer_maintenance->card_state_after_maintenance }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">تاريخ الانتهاء من الصيانة</th>
                                                                                            <td>{{ $customer_maintenance->date_of_finishing }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">القائمون علي الاصلاح</th>
                                                                                            <td>
                                                                                                @foreach ($customer_maintenance->technicians as $technician)
                                                                                                - {{ $technician->name }}<br>
                                                                                                @endforeach
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">تاريخ التسليم</th>
                                                                                            <td>{{ $customer_maintenance->delivery_date }}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- ----End Modal---- --}}
                                                        <a href="{{ route('admin.edit_report.customer.maintenance',$customer_maintenance->id) }}" class="btn mr-1 mb-1 btn-outline-success btn-sm">إضافة<br>تقرير</a>
                                                    </div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">

                                                        <a href="{{ route('admin.edit.customer.maintenance',$customer_maintenance->id) }}" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تعديل
                                                        </a>

                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $customer_maintenance->id }}" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated bounceIn text-left" id="delete{{ $customer_maintenance->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel46">حذف بيانات المعدة</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5 style="color: red">هل متأكد من حذف بيانات المعدة</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">لا , تراجع</button>
                                                                        <a href="{{ route('admin.delete.customer.maintenance',$customer_maintenance->id) }}" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- ----End Modal---- --}}

                                                    </div></td>
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
