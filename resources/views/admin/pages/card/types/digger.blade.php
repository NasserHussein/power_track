@extends('layouts.admin')
@section('title')
الحفارات
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> الحفارات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الحفارات
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع الحفارات المسجلة {{ $cards->count() }} حفارة</h4>
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
                                        <tr>
                                            <th>رقم الحفار</th>
                                            <th>إسم الحفار</th>
                                            <th>النوع والموديل</th>
                                            <th>الرقم المسلسل</th>
                                            <th>السعة</th>
                                            <th>تفاصيل</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($cards)
                                            @foreach ($cards as $card)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $card->code }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $card->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->model }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px">{{ $card->serial_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->capacity }}</div></td>
                                                    <td>
                                                        <button data-toggle="modal" data-target="#card-details{{ $card->id }}" class="btn mr-1 mb-1 btn-outline-secondary btn-sm">
                                                            المزيد من التفاصيل
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                            <div class="modal fade text-left" id="card-details{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="myModalLabel16">تفاصيل إضافية عن الحفار</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>تفاصيل إضافية عن الحفار</h5>
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th scope="row">القسم</th>
                                                                                            <td>{{ $card->part }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">تاريخ التشغيل</th>
                                                                                            <td>{{ $card->date_of_start }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">عداد الحفار الحالي بالساعات</th>
                                                                                            <td>{{ $card->card_hours }} ساعة</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">الوزن</th>
                                                                                            <td>{{ $card->weight }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">إسم الصانع</th>
                                                                                            <td>{{ $card->maker }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">رقم الرسم</th>
                                                                                            <td>{{ $card->drg_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">الأبعاد</th>
                                                                                            <td>{{ $card->dimensions }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">إسم المورد</th>
                                                                                            <td>{{ $card->supplier }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">بيان كتالوج التشغيل</th>
                                                                                            <td>{{ $card->inst_bk_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">القدرة  ك.وات / حصان</th>
                                                                                            <td>{{ $card->power }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">رقم أمر التصنيع</th>
                                                                                            <td>{{ $card->mfg_order_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">بيان كتالوجات الصيانة</th>
                                                                                            <td>{{ $card->maintenance_bk_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">فولت التحكم </th>
                                                                                            <td>{{ $card->control_voltage }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">رقم أمر الشراء</th>
                                                                                            <td>{{ $card->purchase_order_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">الامبير الكلي</th>
                                                                                            <td>{{ $card->total_amperage }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">المعدن</th>
                                                                                            <td>{{ $card->material }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">بيانات ومعلومات أضافية </th>
                                                                                            <td>{{ $card->additional_data }}</td>
                                                                                        </tr>
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
                                                        @if($card->date_of_oil !== NULL)
                                                        <button data-toggle="modal" data-target="#oil-details{{ $card->id }}" class="btn mr-1 mb-1 btn-primary btn-sm">معلومات عن الزيت</button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated swing text-left" id="oil-details{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel42" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel42">معلومات عن تغيير الزيت</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped bg-info mb-0 white">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>أخر تاريخ لتغيير الزيت</td>
                                                                                        <td>{{ $card->date_of_oil }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>عداد الحفار بالساعات عند تغيير الزيت</td>
                                                                                        <td>{{ $card->oil_hours }} ساعة</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>عداد الحفار بالساعات حاليا</td>
                                                                                        <td>{{ $card->card_hours }} ساعة</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>عدد الساعات المستهلكة بعد تغيير الزيت</td>
                                                                                        <td>{{ $card->hours_used }} ساعة</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>عدد الساعات المتبقية لتغيير الزيت</td>
                                                                                        <td>{{ $card->remaining_hours }} ساعة</td>
                                                                                    </tr>
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
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <a href="{{ route('admin.edit.cards',$card->id) }}" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تعديل
                                                        </a>
                                                        <button type="button" data-toggle="modal" data-target="#delete{{ $card->id }}" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated bounceIn text-left" id="delete{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel46" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel46">حذف بيانات الحفار</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5 style="color: red">هل متأكد من حذف بيانات المعدة</h5>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">لا , تراجع</button>
                                                                        <a href="{{ route('admin.delete.cards',$card->id) }}" class="btn btn-outline-danger">نعم متأكد , قم بالحذف</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- ----End Modal---- --}}
                                                        </div>
                                                        <button type="button" data-toggle="modal" data-target="#OilRegistration{{ $card->id }}" class="btn mr-1 mb-1 btn-success btn-sm round">تم تغيير زيت للحفار</button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal animated tada text-left" id="OilRegistration{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel43" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel43">تغير زيت للحفار</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.cards.oil.registration',$card->id) }}" method="POST"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <h5>من فضلك أملا البيانات المطلوبة</h5>
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1">تاريخ تغيير الزيت</label>
                                                                                    <input type="date" value="{{ old('date_of_oil') }}" id="date_of_oil"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل تاريخ تغيير الزيت"
                                                                                        name="date_of_oil">
                                                                                        @error('date_of_oil')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="projectinput1">عداد الحفار بالساعات</label>
                                                                                    <input type="text" value="{{ old('oil_hours') }}" id="oil_hours"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل عداد الحفار بالساعات"
                                                                                        name="oil_hours">
                                                                                        @error('oil_hours')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                                                                        <button type="submit" class="btn btn-outline-primary button-prevent-multiple-submits">تسجيل بيانات تغيير الزيت
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
