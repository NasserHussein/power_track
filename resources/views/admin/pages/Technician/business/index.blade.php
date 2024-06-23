@extends('layouts.admin')
@section('title')
أعمال {{ $technical_skills }} {{ $techician_name }}
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">أعمال {{ $technical_skills }} {{ $techician_name }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.technician') }}">الفنيين</a>
                            </li>
                            <li class="breadcrumb-item active"> أعمال {{ $technical_skills }} {{ $techician_name }}
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
                                <h4 class="card-title"><i class="la la-wrench"></i> جميع أعمال {{ $technical_skills }} {{ $techician_name }} من الفترة <span style="color: red">{{ $start }}</span> إلي <span style="color: red">{{ $end }}</span> = <span style="color: green;font-size: 20px;background-color: yellow;font-weight: bold">{{ $count }} عمليات صيانة</span></h4>
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

                                            <th>نوع المعدة</th>
                                            <th>رقم المعدة</th>
                                            <th>موديل المعدة</th>
                                            <th>رقم الشاسية</th>
                                            <th>ما تم في الصيانة</th>
                                            <th>قطع الغيار المستخدمة</th>
                                            <th>تاريخ الصيانة</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($maintenances)
                                            @foreach ($maintenances as $maintenance)
                                                <tr style="height: 50px">
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $maintenance->card->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:50px;">{{ $maintenance->card->card_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $maintenance->card->card_model }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px">{{ $maintenance->card->chassis_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:190px">{{ $maintenance->maintenance }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:190px">{{ $maintenance->spare_parts }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $maintenance->date }}</div></td>
                                                </tr>
                                            @endforeach
                                            @endisset
                                            @isset($customer_maintenances)
                                            @foreach ($customer_maintenances as $customer_maintenance)
                                                <tr style="height: 50px;background-color: rgba(255, 0, 0, 0.452);color: white">
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $customer_maintenance->customer_card->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:50px;">معدة عميل</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $customer_maintenance->customer_card->card_model }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px">رقم السريال <br>{{ $customer_maintenance->customer_card->serial_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:190px">{{ $customer_maintenance->work_details }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:190px">{{ $customer_maintenance->spare_parts }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $customer_maintenance->date_of_finishing }}</div></td>
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
