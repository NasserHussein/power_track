@extends('layouts.admin')
@section('title')
عداد ماكينة الابحاث
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> ماكينة الابحاث </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> عداد ماكينة الابحاث
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع المكينات المسجلة {{ $cards->count() }} حفارة</h4>
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
                                            <th>رقم ماكينة الابحاث</th>
                                            <th>النوع والموديل</th>
                                            <th>الرقم المسلسل</th>
                                            <th>اخر قراءة للعداد</th>
                                            <th>القراءات السابقة</th>
                                            <th>تسجيل قرائة جديدة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($cards)
                                            @foreach ($cards as $card)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:110px;">{{ $card->code }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->model }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:180px">{{ $card->serial_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->card_hours }}</div></td>                                                    <td style="width:170px">
                                                        <a href="{{ route('admin.machine.cycle.cards',$card->id) }}" class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1">
                                                            لمعرفة القراءات السابقة
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <button type="button" data-toggle="modal" data-target="#Hours-card{{ $card->id }}" class="btn btn-outline-primary btn-min-width btn-glow mr-1 mb-1">
                                                            تحديث قراءة العداد
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated tada text-left" id="Hours-card{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel43" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel43">تحديث قرائة العداد</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.store.hour.cards',$card->id) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <h5>من فضلك أملا البيانات المطلوبة</h5>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput1">تاريخ قراءة العداد</label>
                                                                                        <input type="date" value="{{ old('date') }}" id="date"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل تاريخ قراءة العداد"
                                                                                            name="date">
                                                                                            @error('date')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput1">قراءة العداد الحالي بالساعات</label>
                                                                                        <input type="text" value="{{ old('card_hours') }}" id="card_hours"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل قراءة العداد الحالي بالساعات"
                                                                                            name="card_hours">
                                                                                            @error('card_hours')
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
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- ----End Modal---- --}}
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
