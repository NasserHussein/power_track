@extends('layouts.admin')
@section('title')
@if($card->name !== 'ماكينة ابحاث')
تكلفة صيانة ال{{ $card->name }}
@endif
@if($card->name == 'ماكينة ابحاث')
تكلفة صيانة ماكينة الأبحاث
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
                <h3 class="content-header-title">تكلفة صيانات @if($card->name !== 'ماكينة ابحاث')ال{{ $card->name }}@endif @if($card->name == 'ماكينة ابحاث')ماكينة الأبحاث@endif</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.cost.cards.index.cards',$code) }}">حساب تكلفة @if($card->name !== 'ماكينة ابحاث')ال{{ $card->name }}@endif @if($card->name == 'ماكينة ابحاث')ماكينة الأبحاث@endif</a>
                            </li>
                            <li class="breadcrumb-item active"> تكلفة صيانة @if($card->name !== 'ماكينة ابحاث')ال{{ $card->name }}@endif @if($card->name == 'ماكينة ابحاث')ماكينة الأبحاث@endif
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
                                <h4 class="card-title"><i class="la la-dollar"></i> أجمالي تكلفة الصيانة من الفترة <span style="color: red">{{ $start }}</span> إلي <span style="color: red">{{ $end }}</span> هي <span style="color: green;font-size: 20px;background-color: yellow;font-weight: bold">{{ $cost }}$</span></h4>
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
                                            <th>ما تم في الصيانة</th>
                                            <th>قطع الغيار المستخدمة</th>
                                            <th>تكلفة الصيانة</th>
                                            <th>تاريخ الصيانة</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($maintenances)
                                            @foreach ($maintenances as $maintenance)
                                                <tr style="height: 50px">
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $card->code }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:280px;">{{ $maintenance->maintenance }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:180px;">{{ $maintenance->spare_parts }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px">{{ $maintenance->cost }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $maintenance->date }}</div></td>
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
