@extends('layouts.admin')
@section('title')
معدات العملاء
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> معدات العملاء </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">إضافة بيانات معدة وعميل</a>
                            </li>
                            <li class="breadcrumb-item active"> معدات العملاء
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع المعدات المسجلة 100 معدة</h4>
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
                                            <th>رقم الشاسية</th>
                                            <th>رقم التسلسلي</th>
                                            <th>تاريخ الشراء</th>
                                            <th>صيانات المعدة</th>
                                            <th>بيانات العميل</th>
                                            <th>تفاصيل اضافية</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:50px;">5158</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">ونش شوكة ديزل</div></td>
                                                    <td><div style="word-wrap: break-word;width:110px;">1545145151515151</div></td>
                                                    <td><div style="word-wrap: break-word;width:110px;">1515155asd4545485485</div></td>
                                                    <td><div style="word-wrap: break-word;width:75px">25-01-2024</div></td>
                                                    <td>
                                                        <div style="word-wrap: break-word;width:100px;">
                                                            <a href="#" class="btn mr-1 mb-1 btn-outline-secondary btn-sm">الصيانات </a>
                                                            <a href="#" class="btn mr-1 mb-1 btn-outline-secondary btn-sm">أضف صيانة</a>
                                                        </div>
                                                    </td>
                                                    <td><div style="word-wrap: break-word;width:90px;">
                                                        <button type="button" class="btn mr-1 mb-1 btn-outline-warning btn-sm" data-toggle="modal" data-target="#Customer">
                                                            بيانات</br>العميل
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                            <div class="modal fade text-left" id="Customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-warning white">
                                                                            <h4 class="modal-title white" id="myModalLabel12"><i class="icon-notebook"></i> بيانات العميل</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5><i class="la la-arrow-right"></i> بيانات العميل</h5>
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th scope="row">اسم العميل</th>
                                                                                            <td>محمد عماد</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">رقم الهاتف</th>
                                                                                            <td>01123040964</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">البريد الالكتروني</th>
                                                                                            <td>svadahsd@jdsgfbsadf.afha</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">العنوان</th>
                                                                                            <td>يشلاليشسايا</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">الشركة 'اذا كان العميل شركة'</th>
                                                                                            <td>يشلاليشسايا</td>
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
                                                    </div></td>
                                                    <td><div style="word-wrap: break-word;width:113px;">1515155asd4545485485</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">

                                                        <a href="#" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تعديل
                                                        </a>

                                                        <button type="button" data-toggle="modal" data-target="#delete" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated bounceIn text-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
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
                                                                        <a href="#" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- ----End Modal---- --}}

                                                    </div></td>
                                                </tr>

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
