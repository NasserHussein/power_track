@extends('layouts.admin')
@section('title')
سجل حياة معدة
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> صيانات ال{{ $card->name }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.maintenance.cards.index.cards',$code) }}">متابعة  صيانات ال{{ $card->name }}</a>
                            </li>
                            <li class="breadcrumb-item active"> صيانات ال{{ $card->name }}
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

                                            <th>رقم<br>المعدة</th>
                                            <th>ما تم في <br>الصيانة</th>
                                            <th>قطع الغيار<br>المستخدمة</th>
                                            <th>تكلفة<br>الصيانة</th>
                                            <th>تاريخ الصيانة</th>
                                            <th>الزمن<br>المستغرق</th>
                                            <th>القائم<br>بالإصلاح</th>
                                            <th>تحديد<br>موعد</th>
                                            <th>الإجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($maintenances)
                                            @foreach ($maintenances as $maintenance)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:50px;">{{ $card->card_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $maintenance->maintenance }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $maintenance->spare_parts }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:50px">{{ $maintenance->cost }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px">{{ $maintenance->date }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:70px">{{ $maintenance->duration }}</div></td>
                                                    <td>
                                                        @if($card->name !== 'سيارة')
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
                                                        صيانة خارجية
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <button type="button" data-toggle="modal" data-target="#notifie{{ $maintenance->id }}" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تحديد موعد<br>أخر للصيانة
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal fade text-left" id="notifie{{ $maintenance->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel43">تحديد موعد أخر للصيانة</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.maintenance_Notifie.store',$maintenance->id) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <h5>من فضلك أملا البيانات المطلوبة</h5>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput1" required>قطع الغيار التي تحتاجها للصيانة القادمة</label>
                                                                                        <input type="text" value="{{ old('spare_parts') }}" id="spare_parts"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل قطع الغيار التي تحتاجها للصيانة القادمة"
                                                                                            name="spare_parts">
                                                                                            @error('spare_parts')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label required for="projectinput1">تاريخ الأخطار بالصيانة</label>
                                                                                        <input type="date" value="{{ old('notification_date') }}" id="notification_date"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل تاريخ الصيانة"
                                                                                            name="notification_date">
                                                                                            @error('notification_date')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput1">ملاحظات</label>
                                                                                        <textarea type="text" id="notes"class="form-control" name="notes" placeholder="أدخل ملاحظاتك هنا.....">{{ old('notes') }}</textarea>
                                                                                            @error('notes')
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
