@extends('layouts.admin')
@section('title')
الصيانات المجمعة
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">الصيانات المجمعة</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.maintenance.cards.maintenance.determine') }}">اختر المدة المراد عرض الصيانات لها</a>
                            </li>
                            <li class="breadcrumb-item active">الصيانات المجمعة
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
                                <h4 class="card-title"><i class="la la-group"></i>جميع الصيانات المجمعة من يوم <span style="color: red">{{ $start }}</span> إلي <span style="color: red">{{ $end }}</span> هي <span style="color: green;font-size: 20px;background-color: yellow;font-weight: bold">{{ $maintenances->count() }}</span></h4>
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

                                            <th>رقم المعدة</th>
                                            <th>نوع المعدة</th>
                                            <th>حالة المعدة</th>
                                            <th>مكان المعدة</th>
                                            <th>ما تم في الصيانة</th>
                                            <th>قطع الغيار المستخدمة</th>
                                            <th>تكلفة الصيانة</th>
                                            <th>تاريخ الصيانة</th>
                                            <th>القائم<br>بالإصلاح</th>
                                            <th>الإجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($maintenances)
                                            @foreach ($maintenances as $maintenance)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:50px;">{{ $maintenance->card->card_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:70px;">{{ $maintenance->card->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:50px;">@if($maintenance->card->type_card == '0') معدات باور تراك @endif @if($maintenance->card->type_card == '1') معدات شركات @endif</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $maintenance->card->part }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:140px;">{{ $maintenance->maintenance }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $maintenance->spare_parts }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:50px">{{ $maintenance->cost }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px">{{ $maintenance->date }}</div></td>
                                                    <td>
                                                        @if($maintenance->card->name !== 'سيارة')
                                                        <button type="button" class="btn mr-1 mb-1 btn-outline-secondary btn-sm" data-toggle="modal" data-target="#technicians{{ $maintenance->id }}">
                                                            القائمون<br>بالأصلاح
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal fade text-left" id="technicians{{ $maintenance->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-xs" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel20">الفنيون القائمون بالأصلاح</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>الفنيين</h5>
                                                                        <ul class="list-group">
                                                                            @foreach (App\Models\Admin\Maintenance::find($maintenance->id) -> technicians->where('technical_skills' , 0)   as $technicians)
                                                                            <li class="list-group-item bg-blue-grey white">{{ $technicians->name }}</li>
                                                                            @endforeach
                                                                            @if(App\Models\Admin\Maintenance::find($maintenance->id) -> technicians->where('technical_skills' , 0)->count() <= 0)
                                                                            <li class="list-group-item bg-pink white">لا يوجد فنيين</li>
                                                                            @endif
                                                                        </ul>
                                                                        <hr>
                                                                        <h5>المساعدين</h5>
                                                                        <ul class="list-group">
                                                                            @foreach (App\Models\Admin\Maintenance::find($maintenance->id) -> technicians->where('technical_skills' , 1)   as $technicians)
                                                                            <li class="list-group-item bg-blue-grey white">{{ $technicians->name }}</li>
                                                                            @endforeach
                                                                            @if(App\Models\Admin\Maintenance::find($maintenance->id) -> technicians->where('technical_skills' , 1)->count() <= 0)
                                                                            <li class="list-group-item bg-pink white">لا يوجد مساعدين</li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- ----End Modal---- --}}
                                                        @endif
                                                        @if($maintenance->card->name == 'سيارة')
                                                        صيانة خارجية
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.maintenance.cards.edit.maintenance',$maintenance->id) }}" class="btn mr-1 mb-1 btn-success btn-sm">
                                                            تعديل
                                                        </a>
                                                        <a href="{{ route('admin.maintenance.cards.delete.maintenance',$maintenance->id) }}" class="btn mr-1 mb-1 btn-danger btn-sm">
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
