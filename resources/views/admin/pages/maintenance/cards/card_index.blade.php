@extends('layouts.admin')
@section('title')
صيانة {{ $cards_name }}
@endsection
@section('content')
<style>
    label[required]:after {content:'*';color:red;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">صيانات ال{{ $cards_name }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> صيانات ال{{ $cards_name }}
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع المعدات المسجلة المسجلة {{ $cards->count() }} {{ $cards_name }}</h4>
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

                                            <th>رقم المعدة</th>
                                            <th>
                                                @if($code == '0')
                                                موديل المعدة
                                                @endif
                                                @if($code == '1')
                                                نوع المعدة
                                                @endif
                                            </th>
                                                @if($code == '0')
                                            <th>الرقم الشاسية</th>
                                                @endif
                                                @if($code == '1')
                                            <th>الموقع</th>
                                                @endif
                                            <th>التكلفة الاجمالية للصيانات</th>
                                            <th>سجل حياة الماكينة</th>
                                            <th>تسجيل صيانة جديدة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($cards)
                                            @foreach ($cards as $card)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->card_no }}</div></td>
                                                @if($code == '0')
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->card_model }}</div></td>
                                                @endif
                                                @if($code == '1')
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->name }}</div></td>
                                                @endif
                                                @if($code == '0')
                                                    <td><div style="word-wrap: break-word;width:180px">{{ $card->chassis_no }}</div></td>
                                                @endif
                                                @if($code == '1')
                                                    <td><div style="word-wrap: break-word;width:180px">{{ $card->part }}</div></td>
                                                @endif
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ App\Models\Admin\Maintenance::where('card_id',$card->id)->sum('cost') }}</div></td>
                                                    <td style="width:170px">
                                                        <a href="{{ route('admin.maintenance.cards.index.maintenance',$card->id) }}" class="btn btn-info btn-min-width box-shadow-3 mr-1 mb-1">
                                                            سجل حياة المعدة
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <button type="button" data-toggle="modal" data-target="#maintenance{{ $card->id }}" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1">
                                                            تسجيل صيانة جديدة
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                        <div class="modal fade text-left" id="maintenance{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel43">تسجيل عملية الصيانة</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.maintenance.cards.store.maintenance',$card->id) }}" method="POST"
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
                                                                                            name="maintenance">{{ old('maintenance') }}</textarea>
                                                                                            @error('maintenance')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label required for="projectinput1">تاريخ الصيانة</label>
                                                                                        <input type="date" value="{{ old('date') }}" id="date"
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
                                                                                        <input type="text" value="{{ old('spare_parts') }}" id="spare_parts"
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
                                                                                        <input type="text" value="{{ old('cost') }}" id="cost"
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
                                                                                        <input type="text" value="{{ old('duration') }}" id="duration"
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
                                                                                        <select name="technicians[]" id="profession" class="form-control authes" style="width: 370px" multiple>
                                                                                            <option  disabled>أختر الفنيين</option>
                                                                                            @isset($technicians)
                                                                                            @foreach ($technicians as $technician)
                                                                                            <option @if( collect(old('technicians'))->contains($technician->id)) selected @endif  value="{{ $technician->id }}">{{ $technician->name }}</option>
                                                                                            @endforeach
                                                                                            @endisset
                                                                                            </select>
                                                                                            @error('technicians')
                                                                                            <span class="text-danger">{{ $message }}</span>
                                                                                            @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-dark btn-min-width mr-1 mb-1" data-dismiss="modal">إغلاق</button>
                                                                            <button type="submit" class="btn btn-success btn-min-width mr-1 mb-1 button-prevent-multiple-submits">
                                                                           حفظ البيانات المطلوبة <i class="ft-save"></i>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.authes').select2({})
})
</script>
@endsection
