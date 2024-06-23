@extends('layouts.admin')
@section('title')
ترتيب ال{{ $technical_skills }}ين من حيث عدد الصيانات
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">ترتيب ال{{ $technical_skills }}ين من حيث عدد الصيانات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.technician') }}">الفنيين</a>
                            </li>
                            <li class="breadcrumb-item active">ترتيب ال{{ $technical_skills }}ين من حيث عدد الصيانات
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
                                <h4 class="card-title"><i class="la la-wrench"></i> جميع أعمال ال{{ $technical_skills }}ين من الفترة <span style="color: red">{{ $start }}</span> إلي <span style="color: red">{{ $end }}</span></h4>
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
                                            <th>أسم ال{{ $technical_skills }}</th>
                                            <th>تليفون ال{{ $technical_skills }}</th>
                                            <th>E-Mail ال{{ $technical_skills }}</th>
                                            <th>تاريخ توظيف ال{{ $technical_skills }}</th>
                                            <th>عدد الصيانات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($techicians)
                                            @foreach ($techicians as $techician)
                                                <tr style="height: 50px">
                                                    <td><div style="word-wrap: break-word;width:200px;">{{ $techician->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $techician->phone_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:200px;">{{ $techician->email }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px">{{ $techician->date_of_employment }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px">{{ $techician->maintenances->whereBetween('date', [$start,$end])->count() + $techician->customer_maintenances->whereBetween('date_of_finishing', [$start,$end])->count()}}</div></td>
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
