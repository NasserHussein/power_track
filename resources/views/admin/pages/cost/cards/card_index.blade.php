@extends('layouts.admin')
@section('title')
حساب تكلفة {{ $name }}
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">تكلفة {{ $name }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> حساب تكلفة {{ $name }}
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع {{ $Collection }} المسجلة 22 {{ $Single }}</h4>
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

                                            <th>رقم {{ $name }}</th>
                                            <th>النوع والموديل</th>
                                            <th>الرقم المسلسل</th>
                                            <th>التكلفة الاجمالية للصيانات</th>
                                            <th>حساب تكلفة صيانة المعدة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($cards)
                                            @foreach ($cards as $card)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->code }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->model }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:180px">{{ $card->serial_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ App\Models\Admin\Maintenance::where('card_id',$card->id)->sum('cost') }}</div></td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <button type="button" data-toggle="modal" data-target="#cost{{ $card->id }}" class="btn btn-info btn-min-width mr-1 mb-1">
                                                         أدخال الفترة التي تريد حساب تكلفة الصيانة لها
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal fade text-left" id="cost{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel43">الفترة المراد حساب التكلفة فيها</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form class="form form-prevent-multiple-submits" action="{{ route('dmin.cost.cards.store.maintenance',$card->id) }}" method="POST"
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
