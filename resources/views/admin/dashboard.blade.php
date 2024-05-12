@extends('layouts.admin')
@section('title')
الرئيسية
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
<div class="content-body">
    <div id="crypto-stats-3" class="row">
        <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-2">
                                <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                            </div>
                            <div class="col-5 pl-2">
                                <h4>تكاليف الصيانة</h4>
                            </div>
                            <div class="col-5 text-right">
                                <h4>{{ App\Models\Admin\Maintenance::sum('cost') }} $</h4>
                                <h6 class="danger darken-4">31% <i class="la la-arrow-down"></i></h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <canvas id="btc-chartjs" class="height-75"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-2">
                                <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                            </div>
                            <div class="col-5 pl-2">
                                <h5>المعدات المقتربة</h5>
                                <h5 class="text-muted">لتغيير الزيت</h5>
                            </div>
                            <div class="col-5 text-right">
                                <h2>{{ App\Models\Admin\Card::where('remaining_hours', '<=' , 50)->count() }}</h2>
                                <h6 class="success darken-4">12% <i class="la la-arrow-up"></i></h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <canvas id="eth-chartjs" class="height-75"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-2">
                                <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                            </div>
                            <div class="col-5 pl-2">
                                <h4>عدد المعداد</h4>
                                <h6 class="text-muted">Card ID</h6>
                            </div>
                            <div class="col-5 text-right">
                                <h2>{{ App\Models\Admin\Card::count() }}</h2>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <canvas id="xrp-chartjs" class="height-75"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Candlestick Multi Level Control Chart -->

    <!-- Sell Orders & Buy Order -->
    <div class="row match-height">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اللوادر المقتربة لتغيير زيت الفتيس</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <p class="text-muted">عدد اللوادر: <span style="color: red;font-size:17px">{{ $cards_oils_gearbox->count() }}</span></p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                            <tr>
                                <th>رقم اللودر</th>
                                <th>الزمن المتبقي</th>
                                <th>الزمن المستخدم</th>
                            </tr>
                            </thead>
                            <tbody>
                                @isset($cards_oils_gearbox)
                                @foreach ($cards_oils_gearbox as $card_oils_gearbox)
                            <tr @if($card_oils_gearbox->remaining_hours_gearbox <= 0) class="bg-danger bg-lighten-5" @endif>
                                <td style="color: rgb(226, 43, 144);font-size: 17px">لودر  <span style="color: rgb(63, 16, 233)"> {{ $card_oils_gearbox->code }}</span></td>
                                <td  @if($card_oils_gearbox->remaining_hours_gearbox <= 0) style="color: red;font-size: 20px" @endif style="color: blue;font-size: 20px">{{ $card_oils_gearbox->remaining_hours_gearbox }} ساعة</td>
                                <td @if($card_oils_gearbox->hours_used_gearbox > 2200) style="color: rgb(255, 153, 0);font-size: 17px" @endif style="color: rgb(17, 189, 40);font-size: 17px">{{ $card_oils_gearbox->hours_used_gearbox }} ساعة</td>

                            </tr>
                                @endforeach
                                @endisset
                            {{--
                            <tr class="bg-danger bg-lighten-5" class="bg-success bg-lighten-5">
                                <td>10599.5</td>
                                <td><i class="cc BTC-alt"></i> 0.02000000</td>
                                <td>$ 211.99</td>
                            </tr>
                            --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الوقت المتبقي للمعدة لتغيير الزيت</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <p class="text-muted">عدد المعداد المقتربة لتغيير الزيت: <span style="color: rgb(236, 6, 160);font-size:17px">{{ App\Models\Admin\Card::where('remaining_hours', '<=' , 50)->count() }}</span></p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                            <tr>
                                <th>نوع المعدة</th>
                                <th>رقم المعدة</th>
                                <th>الزمن المتبقي</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ( App\Models\Admin\Card::where('remaining_hours', '<=' , 20)->get()->sortBy('remaining_hours')  as $card_oil)
                            <tr @if($card_oil->remaining_hours <= 0) class="bg-danger bg-lighten-5" @endif>
                                <td>{{ $card_oil->name }}</td>
                                <td>{{ $card_oil->code }}</td>
                                <td @if($card_oil->remaining_hours <= 0) style="color: red" @endif style="color: blue">{{ $card_oil->remaining_hours }} ساعة</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Sell Orders & Buy Order -->
    <!-- Active Orders -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 style="font-size: 20px"  class="card-title">تكلفة صيانة المعداد</h1>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div style="font-size: 20px" class="heading-elements">
                        <p class="text-muted">اجمالي تكلفة الصيانة للمعداد: <span style="color: red">{{ App\Models\Admin\Maintenance::sum('cost') }}$</span></p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="display nowrap table-striped table-bordered scroll-horizontal table table-de mb-0" style="width:auto;text-align: center">
                            <thead>
                            <tr>
                                <th>نوع المعدة</th>
                                <th>رقم المعدة</th>
                                <th>رقم المسلسل الخاص بالمعدة</th>
                                <th>بداية تاريخ المحاسبة</th>
                                <th>نهاية تاريخ المحاسبة</th>
                                <th>التكلفة الكلية<br>لصيانة المعدة</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Admin\Card::all() as $card_cost)
                                @if($card_cost->Maintenances->sum('cost') !== 0)
                            <tr>
                                <td style="color: blue">{{ $card_cost->name }}</td>
                                <td style="font-size: 20px" class="warning">{{ $card_cost->code }}</td>
                                <td style="font-size: 15px" class="success">{{ $card_cost->serial_no }}</td>
                                <td style="font-size: 20px" class="info">{{ $card_cost->Maintenances->min('date') }}</td>
                                <td style="font-size: 20px" class="info">{{ $card_cost->Maintenances->max('date') }}</td>
                                <td style="font-size: 20px" class="danger">{{ $card_cost->Maintenances->sum('cost') }} $</td>
                            </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
{{--
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Active Order</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <td>
                            <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i> Cancel all</button>
                        </td>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Amount BTC</th>
                                <th>BTC Remaining</th>
                                <th>Price</th>
                                <th>USD</th>
                                <th>Fee (%)</th>
                                <th>Cancel</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2018-01-31 06:51:51</td>
                                <td class="success">Buy</td>
                                <td><i class="cc BTC-alt"></i> 0.58647</td>
                                <td><i class="cc BTC-alt"></i> 0.58647</td>
                                <td>11900.12</td>
                                <td>$ 6979.78</td>
                                <td>0.2</td>
                                <td>
                                    <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2018-01-31 06:50:50</td>
                                <td class="danger">Sell</td>
                                <td><i class="cc BTC-alt"></i> 1.38647</td>
                                <td><i class="cc BTC-alt"></i> 0.38647</td>
                                <td>11905.09</td>
                                <td>$ 4600.97</td>
                                <td>0.2</td>
                                <td>
                                    <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2018-01-31 06:49:51</td>
                                <td class="success">Buy</td>
                                <td><i class="cc BTC-alt"></i> 0.45879</td>
                                <td><i class="cc BTC-alt"></i> 0.45879</td>
                                <td>11901.85</td>
                                <td>$ 5460.44</td>
                                <td>0.2</td>
                                <td>
                                    <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2018-01-31 06:51:51</td>
                                <td class="success">Buy</td>
                                <td><i class="cc BTC-alt"></i> 0.89877</td>
                                <td><i class="cc BTC-alt"></i> 0.89877</td>
                                <td>11899.25</td>
                                <td>$ 10694.6</td>
                                <td>0.2</td>
                                <td>
                                    <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2018-01-31 06:51:51</td>
                                <td class="danger">Sell</td>
                                <td><i class="cc BTC-alt"></i> 0.45712</td>
                                <td><i class="cc BTC-alt"></i> 0.45712</td>
                                <td>11908.58</td>
                                <td>$ 5443.65</td>
                                <td>0.2</td>
                                <td>
                                    <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2018-01-31 06:51:51</td>
                                <td class="success">Buy</td>
                                <td><i class="cc BTC-alt"></i> 0.58647</td>
                                <td><i class="cc BTC-alt"></i> 0.58647</td>
                                <td>11900.12</td>
                                <td>$ 6979.78</td>
                                <td>0.2</td>
                                <td>
                                    <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
  --}}
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
