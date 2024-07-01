@extends('layouts.admin')
@section('title')
جميع الحسابات
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h4 class="content-header-title">تكاليف الصيانة من يوم <span style="color: red">{{ $start }}</span> الي يوم <span style="color: red">{{ $end }}</span></h4>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.cost.cards.determine_the_duration.cards') }}">تفاصيل عن تكلفة الصيانة</a>
                            </li>
                            <li class="breadcrumb-item active">تكاليف الصيانة
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="card-body card-dashboard">
                    <table class="display nowrap table-striped table-bordered "  style="width:900px;height: 100px;text-align: center">
                        <thead>
                        <tr style="height: 40px" class="bg-primary white">
                            <th>اجمالي تكلفة الصيانة في هذه المدة</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $maintenances_sum }} ج.م</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h5 class="content-header-title">المصاريف التشغيلية من يوم <span style="color: red">{{ $start }}</span> الي يوم <span style="color: red">{{ $end }}</span></h5>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.operating.expenses') }}">تفاصيل عن المصاريف التشغيلية</a>
                            </li>
                            <li class="breadcrumb-item active">المصاريف التشغيلية
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="card-body card-dashboard">
                    <table class="display nowrap table-striped table-bordered "  style="width:900px;height: 100px;text-align: center">
                        <thead>
                        <tr style="height: 40px" class="bg-primary white">
                            <th>اجمالي المصاريف التشغيلية في هذه المدة</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses_sum }} ج.م</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
                <h4 class="content-header-title">اجمالي البنود التشغيلية</h4>
            <section id="dom">
                <div class="card-body card-dashboard">
                    <table class="display nowrap table-striped table-bordered "  style="width:900px;height: 100px;text-align: center">
                        <thead>
                        <tr style="height: 40px" class="bg-primary white">
                            <th>أيجار مصنع</th>
                            <th>رواتب العامليين</th>
                            <th>فواتير المياة</th>
                            <th>فواتير الكهرباء</th>
                            <th>حراسة وتأمين</th>
                            <th>مصاريف محاسب</th>
                            <th>مستلزمات مكتب</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','أيجار مصنع')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','رواتب العامليين')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','فواتير المياة')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','فواتير الكهرباء')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','حراسة وتأمين')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','مصاريف محاسب')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','مستلزمات مكتب')->sum('amount') }} ج.م</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section id="dom">
                <div class="card-body card-dashboard">
                    <table class="display nowrap table-striped table-bordered "  style="width:900px;height: 100px;text-align: center">
                        <thead>
                        <tr style="height: 40px" class="bg-primary white">
                            <th>مصاريف ضيافة</th>
                            <th>فواتير خطوط التليفون</th>
                            <th>صيانات مصنع</th>
                            <th>تأمينات</th>
                            <th>ضرائب</th>
                            <th>اخري</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','مصاريف ضيافة')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','فواتير خطوط التليفون')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','صيانات مصنع')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','تأمينات')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','ضرائب')->sum('amount') }} ج.م</div></td>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses->where('clause','اخري')->sum('amount') }} ج.م</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h5 class="content-header-title">أجمالي الخسائر من يوم <span style="color: red">{{ $start }}</span> الي يوم <span style="color: red">{{ $end }}</span></h5>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.Losses') }}">تفاصيل عن الخسائر</a>
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
                <div class="card-body card-dashboard">
                    <table class="display nowrap table-striped table-bordered "  style="width:900px;height: 100px;text-align: center">
                        <thead>
                        <tr style="height: 40px" class="bg-primary white">
                            <th>اجمالي الخسائر في هذه المدة</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $losses_sum }} ج.م</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="content-header row">
                <h4 class="content-header-title">اجمالي المبالغ المصروفة + الصيانات + الخسائر من يوم <span style="color: red">{{ $start }}</span> الي يوم <span style="color: red">{{ $end }}</span></h4>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="card-body card-dashboard">
                    <table class="display nowrap table-striped table-bordered "  style="width:900px;height: 100px;text-align: center">
                        <thead>
                        <tr style="height: 40px" class="bg-primary white">
                            <th>اجمالي المبالغ المصروفة + الصيانات + الخسائر</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div style="font-size: 30px;color: rgb(15, 73, 3)">{{ $operating_expenses_sum + $maintenances_sum + $losses_sum }} ج.م</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    </div>
</div>
@endsection
