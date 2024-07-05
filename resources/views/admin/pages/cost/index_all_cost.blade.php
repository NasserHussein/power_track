@extends('layouts.admin')
@section('title')
حساب تكلفة الصيانة
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">حساب تكلفة الصيانة</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.cost.cards.determine_the_duration.cards',$id) }}">تحديد مدة اخري</a>
                            </li>
                            <li class="breadcrumb-item active">حساب تكلفة الصيانة
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
                                <h4 class="card-title"><i class="la la-dollar"></i> أجمالي تكلفة الصيانة من يوم <span style="color: red">{{ $start }}</span> إلي <span style="color: red">{{ $end }}</span> هي <span style="color: green;font-size: 20px;background-color: yellow;font-weight: bold">{{ $cost }}$</span></h4>
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

                                            <th>أجمالي عدد الصيانات</th>
                                            <th>أجمالي عدد المعدات التي تم صيانتها</th>
                                            <th>من يوم</th>
                                            <th>الي يوم</th>
                                            <th>تكلفة الصيانة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <tr style="height: 50px">
                                                    <td><div style="word-wrap: break-word;width:150px;font-size: 18px;color: red">{{ $maintenances->count() }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:250px;font-size: 18px;color: blue">

                                                        <button type="button" class="btn mr-1 mb-1 btn-outline-info btn-sm" data-toggle="modal" data-target="#cards">
                                                            {{ $count_cards }} معدات
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                            <div class="modal fade text-left" id="cards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-warning white">
                                                                            <h4 class="modal-title white" id="myModalLabel12"><i class="icon-notebook"></i> أجمالي عدد المعدات التي تم صيانتها</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5><i class="la la-arrow-right"></i> أجمالي عدد المعدات التي تم صيانتها</h5>
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                    <tbody>
                                                                                        @isset($cards_unique)
                                                                                        @foreach ($cards_unique as $card_unique)
                                                                                        <tr>
                                                                                            <th scope="row">{{ $card_unique->name }}</th>
                                                                                            <td>معدة رقم ({{ $card_unique->card_no }}) <span style="font-size: 13px;color: red"> عدد الصيانات--> </span> {{ $card_unique->maintenances->count() }}</td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                        @endisset
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- ----End Modal---- --}}
                                                    </div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;font-size: 18px;color: orangered">{{ $start }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;font-size: 18px;color: orange">{{ $end }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;font-size: 18px;color: green">{{ $cost }} $</div></td>
                                                </tr>
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
