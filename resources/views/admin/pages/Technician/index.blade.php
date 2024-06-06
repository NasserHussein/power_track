@extends('layouts.admin')
@section('title')
الفنيين
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">الفنيين</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.create.technician') }}">إضافة فني</a>
                            </li>
                            <li class="breadcrumb-item active">الفنيين
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
                                <h4 class="card-title"><i class="la la-pied-piper-alt"></i> عدد الفنيين الموجودين {{ $techicians->count() }}</h4>
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
                                            <th>أسم الفني</th>
                                            <th>تليفون الفني</th>
                                            <th>E-Mail</th>
                                            <th>عنوان الفني</th>
                                            <th>تاريخ التوظيف</th>
                                            <th>المؤهلات</th>
                                            <th>الخبرات السابقة</th>
                                            <th>المهرات الفنية</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($techicians)
                                            @foreach ($techicians as $techician)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:20px;">{{ $techician->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $techician->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $techician->phone_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px">{{ $techician->email }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $techician->address }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $techician->date_of_employment }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $techician->qualifications }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $techician->previous_experience }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">@if($techician->technical_skills == '0')فني@endif @if($techician->technical_skills == '1')مساعد@endif</div></td>
                                                    <td>
                                                            <a class="btn mr-1 mb-1 btn-outline-info btn-sm" href="{{ route('admin.edit.technician',$techician->id) }}" >تعديل</a>
                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $techician->id }}" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated bounceIn text-left" id="delete{{ $techician->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
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
                                                                        <a href="{{ route('admin.delete.technician',$techician->id) }}" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
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
