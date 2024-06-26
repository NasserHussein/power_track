@extends('layouts.admin')
@section('title')
الخسائر
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">الخسائر</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.create.Losses') }}">إضافة خسارة</a>
                            </li>
                            <li class="breadcrumb-item active">الخسائر
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
                                <h4 class="card-title"><i class="la la-pied-piper-alt"></i> اجمالي عدد الخسائر {{ $sum }} $</h4>
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
                                            <div class="row">
                                                <div style="margin-right:350px;">
                                                <div style="margin-left: 50px" class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" data-toggle="modal" data-target="#determine_the_period_of_losses" class="btn btn-outline-warning btn-min-width btn-glow mr-1 mb-1">
                                                        تحديد فترة لحساب الخسائر
                                                    </button>
                                                    {{-- ----Start Modal---- --}}
                                                    <div class="modal fade text-left" id="determine_the_period_of_losses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel43">الفترة المراد حساب التكلفة فيها</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form class="form form-prevent-multiple-submits" action="{{ route('admin.determine.specific.loss.period.Losses') }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <h5>من فضلك أملا البيانات المطلوبة</h5>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label required for="projectinput1">بداية الفترة</label>
                                                                                    <input type="date" value="{{ old('start') }}" id="start"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل تاريخ الصيانة"
                                                                                        name="start">
                                                                                        @error('start')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label required for="projectinput1">نهاية الفترة</label>
                                                                                    <input type="date" value="{{ old('end') }}" id="end"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل تاريخ الصيانة"
                                                                                        name="end">
                                                                                        @error('end')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-dark btn-min-width mr-1 mb-1" data-dismiss="modal">إغلاق</button>
                                                                        <button type="submit" class="btn btn-warning btn-min-width mr-1 mb-1">اتمام البحث <i class="ft-save"></i>
                                                                            <i style="display: none" class="spinner-button fa fa-spinner fa-spin"></i>
                                                                        </button>
                                                                    </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- ----End Modal---- --}}
                                                </div>
                                                </div>
                                                </div>
                                            </div>
                                        <tr style="height: 40px;background-color: #f29d1e" class="white">
                                            <th>id</th>
                                            <th>وصف الخسارة</th>
                                            <th>المبلغ</th>
                                            <th>سبب الخسارة</th>
                                            <th>تاريخ الخسارة</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($losses)
                                            @foreach ($losses as $loss)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:50px;">{{ $loss->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:200px;">{{ $loss->description_of_loss }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $loss->amount }} $</div></td>
                                                    <td><div style="word-wrap: break-word;width:280px">{{ $loss->cause_of_loss }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $loss->date_of_loss }}</div></td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <a href="{{ route('admin.edit.Losses',$loss->id) }}" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تعديل
                                                        </a>
                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $loss->id }}" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                            <div class="modal animated bounceIn text-left" id="delete{{ $loss->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="myModalLabel46">حذف الخسارة</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5 style="color: red">هل متأكد من حذف الخسارة</h5>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">لا , تراجع</button>
                                                                            <a href="{{ route('admin.delete.Losses',$loss->id) }}" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- ----End Modal---- --}}
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
