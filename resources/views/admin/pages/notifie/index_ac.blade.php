@extends('layouts.admin')
@section('title')
الأخطارات نشطة
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">الأخطارات نشطة</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.maintenance_Notifie.index_de') }}">الأخطارات الغير نشطة</a>
                            </li>
                            <li class="breadcrumb-item active">الأخطارات النشطة
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع  الأخطارات النشطة </h4>
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
                                        <tr>

                                            <th>رقم<br>المعدة</th>
                                            <th>نوع <br>المعدة</th>
                                            <th>ما تم في <br>الصيانة</th>
                                            <th>قطع الغيار<br>المستخدمة</th>
                                            <th>تاريخ الزيارة</th>
                                            <th>الإجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($notifies_ac)
                                            @foreach ($notifies_ac as $notifie_ac)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $notifie_ac->maintenance->card->card_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:110px;">{{ $notifie_ac->maintenance->card->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:200px;">{{ $notifie_ac->maintenance->maintenance }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:200px">{{ $notifie_ac->spare_parts }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px">{{ $notifie_ac->notification_date }}</div></td>
                                                    <td>
                                                        <a href="{{ route('admin.maintenance_Notifie.edit',$notifie_ac->id) }}" class="btn mr-1 mb-1 btn-success btn-sm">
                                                            تعديل
                                                        </a>
                                                        <a href="{{ route('admin.maintenance_Notifie.delete',$notifie_ac->id) }}" class="btn mr-1 mb-1 btn-danger btn-sm">
                                                            حذف
                                                        </a>
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
