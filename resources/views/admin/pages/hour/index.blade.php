@extends('layouts.admin')
@section('title')
فترة تشغيل ال{{ $card->name }}
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">فترة تشغيل ال{{ $card->name }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="
                                        @if($card->name == 'ستاكر كهراباء')
                                            {{ route('admin.index.hour.cards',1) }}
                                        @endif
                                        @if($card->name == 'باور بالت')
                                            {{ route('admin.index.hour.cards',2) }}
                                        @endif
                                        @if($card->name == 'ريتش تراك')
                                            {{ route('admin.index.hour.cards',3) }}
                                        @endif
                                        @if($card->name == 'هاند بالت')
                                            {{ route('admin.index.hour.cards',4) }}
                                        @endif
                                        @if($card->name == 'ونش شوكة كهرباء')
                                            {{ route('admin.index.hour.cards',5) }}
                                        @endif
                                        @if($card->name == 'ونش شوكة ديزل')
                                            {{ route('admin.index.hour.cards',6) }}
                                        @endif
                                        @if($card->name == 'أوردر بيكر')
                                            {{ route('admin.index.hour.cards',7) }}
                                        @endif
                                        @if($card->name == 'سيزر ليفت')
                                            {{ route('admin.index.hour.cards',8) }}
                                        @endif
                                        @if($card->name == 'مان ليفت')
                                            {{ route('admin.index.hour.cards',9) }}
                                        @endif
                                        @if($card->name == 'حضان')
                                            {{ route('admin.index.hour.cards',10) }}
                                        @endif

                                ">تحديث عداد ال{{ $card->name }}</a>
                            </li>
                            <li class="breadcrumb-item active"> فترة تشغيل ال{{ $card->name }}
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
                                <h4 class="card-title"><i class="la la-group"></i> عدد ساعات عمل ال{{ $card->name }} {{ $card->card_hours }} ساعة</h4>
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
                                            <th>رقم المعدة</th>
                                            <th>موديل المعدة</th>
                                            <th>قراءات العداد</th>
                                            <th>تاريخ قراءة العداد</th>
                                            <th>مدة تشغيل المعدة</th>
                                            <th>حذف القراءة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($hours)
                                            @foreach ($hours as $hour)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $card->card_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $card->card_model }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:160px">{{ $hour->card_hours }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:140px;">{{ $hour->date }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:140px;">{{ $hour->count }}</div></td>
                                                    <td>
                                                        <a href="{{ route('admin.delete_hour.cycle.cards',['card_id' => $card->id , 'hour_id' => $hour->id]) }}" class="btn btn-social btn-min-width mr-1 mb-1 btn-pinterest"><span class="la la-bitbucket font-medium-3"></span>حذف</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                     <a href="{{ route('admin.delete_all_hours.cycle.cards',$card->id) }}" class="btn btn-social btn-min-width mr-1 mb-1 btn-pinterest"><span class="la la-bitbucket font-medium-3"></span>حذف جميع القراءات&nbsp;&nbsp;&nbsp;</a>
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
