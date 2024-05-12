@extends('layouts.admin')
@section('title')
@if($card->name !== 'ماكينة ابحاث')
سجل حياة ال{{ $card->name }}
@endif
@if($card->name == 'ماكينة ابحاث')
سجيل حياة ماكينة الأبحاث
@endif
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">صيانات @if($card->name !== 'ماكينة ابحاث')ال{{ $card->name }}@endif @if($card->name == 'ماكينة ابحاث')ماكينة الأبحاث@endif</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.maintenance.cards.index.cards',$code) }}">متابعة صيانة @if($card->name !== 'ماكينة ابحاث')ال{{ $card->name }}@endif @if($card->name == 'ماكينة ابحاث')ماكينة الأبحاث@endif</a>
                            </li>
                            <li class="breadcrumb-item active"> صيانات @if($card->name !== 'ماكينة ابحاث')ال{{ $card->name }}@endif @if($card->name == 'ماكينة ابحاث')ماكينة الأبحاث@endif
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع  الصيانات المسجلة {{ $maintenances->count() }} </h4>
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

                                            <th>رقم @if($card->name !== 'ماكينة ابحاث')ال{{ $card->name }}@endif @if($card->name == 'ماكينة ابحاث')ماكينة الأبحاث@endif</th>
                                            <th>ما تم في <br>الصيانة</th>
                                            <th>قطع الغيار<br>المستخدمة</th>
                                            <th>تكلفة<br>الصيانة</th>
                                            <th>تاريخ الصيانة</th>
                                            <th>الزمن المستغرق<br>في الصيانة</th>
                                            <th>القائم<br>بالإصلاح</th>
                                            <th>الإجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($maintenances)
                                            @foreach ($maintenances as $maintenance)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $card->code }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:180px;">{{ $maintenance->maintenance }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:130px;">{{ $maintenance->spare_parts }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:50px">{{ $maintenance->cost }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px">{{ $maintenance->date }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:70px">{{ $maintenance->duration }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $maintenance->technician_name }}</div></td>
                                                    <td>
                                                        <button type="button" data-toggle="modal" data-target="#maintenance{{ $maintenance->id }}" class="btn mr-1 mb-1 btn-success btn-sm">
                                                            تعديل
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal fade text-left" id="maintenance{{ $maintenance->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel43">تعديل بيانات الصيانة</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.maintenance.cards.update.maintenance',$maintenance->id) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <h5>من فضلك أملا البيانات المطلوبة</h5>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label required for="projectinput1">الأعطال وعمليات الإصلاح / الصيانة الدورية</label>
                                                                                        <textarea type="text" id="maintenance"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل الأعطال وعمليات الإصلاح / الصيانة الدورية"
                                                                                            name="maintenance">{{ $maintenance->maintenance }}</textarea>
                                                                                            @error('maintenance')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label required for="projectinput1">تاريخ الصيانة</label>
                                                                                        <input type="date" value="{{ $maintenance->date }}" id="date"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل تاريخ الصيانة"
                                                                                            name="date">
                                                                                            @error('date')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput1">قطع الغيار Spare Parts</label>
                                                                                        <input type="text" value="{{ $maintenance->spare_parts }}" id="spare_parts"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل قطع الغيار Spare Parts"
                                                                                            name="spare_parts">
                                                                                            @error('spare_parts')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label required for="projectinput1">تكاليف الاصلاح</label>
                                                                                        <input type="text" value="{{ $maintenance->cost }}" id="cost"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل تكاليف الاصلاح"
                                                                                            name="cost">
                                                                                            @error('cost')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput1">زمن الآصلاح عامل . ساعة M.HR</label>
                                                                                        <input type="text" value="{{ $maintenance->duration }}" id="duration"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل زمن الآصلاح عامل . ساعة M.HR"
                                                                                            name="duration">
                                                                                            @error('duration')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label required for="projectinput1">القائم بالإصلاح By</label>
                                                                                        <input type="text" value="{{ $maintenance->technician_name }}" id="technician_name"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل القائم بالإصلاح By"
                                                                                            name="technician_name">
                                                                                            @error('technician_name')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-dark btn-min-width mr-1 mb-1" data-dismiss="modal">إغلاق</button>
                                                                            <button type="submit" class="btn btn-success btn-min-width mr-1 mb-1">حفظ البيانات المطلوبة <i class="ft-save"></i>
                                                                                <i style="display: none" class="spinner-button fa fa-spinner fa-spin"></i>
                                                                            </button>
                                                                        </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- ----End Modal---- --}}
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
