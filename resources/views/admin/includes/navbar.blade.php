<nav style="background-color: #f2bc1eed"
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                    class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <img class="brand-logo" alt="modern admin logo" style="width: 30px;height: 30px;"
                             src="{{ asset('assets/admin/images/logo/power_track.png') }}">
                        <h1 class="brand-text">POWER TRACK</h1>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                        class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                        class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">مرحباَ
                  <span

                      class="user-name text-bold-700"> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>

                </span>
                            <span class="avatar avatar-online">
                  <img  style="height: 35px;" src="{{ asset('assets/images/admin/admin_image/'.auth()->user()->photo) }}" alt="Farag" src=""><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.edite.personal.data') }}"><i
                            class="la la-cog"></i> تعديل الملف الشخصي </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.edit.pass.data') }}"><i
                            class="la la-key"></i>تغيير كلمة المرور</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ft-power"></i> تسجيل
                                الخروج </a>
                        </div>
                    </li>

                    <li class="dropdown dropdown-notification nav-item dropdown-notifications">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow notif-count" data-count="">{{ App\Models\Admin\Card::where('remaining_hours', '<=' , 0)->count() }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">الاشعارات</span>

                                </h6>
                               {{-- <a href=""> <span
                                    class="notification-tag badge badge-default badge-danger float-right m-0">أزالة جميع الاشعارات</span></a> --}}
                            </li>
                            @foreach ( App\Models\Admin\Card::where('remaining_hours', '<=' , 0)->get()->sortBy('remaining_hours')  as $card_oil)
                            <li class="scrollable-container media-list w-100">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i style="background-color: #FFC107"
                                            class="ft-filter icon-bg-circle "></i></div>
                                        <div class="media-body">
                                            <h5 style="color: blue" class="media-heading">{{ $card_oil->name }} رقم {{ $card_oil->card_no }}</h5>
                                            <p>يحتاج تغيير زيت ضروري</p>
                                            <small>
                                                <time style="font-size: 15px" class="media-meta text-muted danger"
                                                      datetime="2015-06-11T18:29:20+08:00">{{ $card_oil->remaining_hours }} ساعة
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                            class="ficon ft-mail"> </i>
                             <span class="badge badge-pill badge-default badge-info badge-default badge-up badge-glow notif-count" data-count="">{{ App\Models\Admin\Notifie::where('status' , '1' )->where('notification_date' , '<=' ,Carbon\Carbon::now('Asia/Baghdad')->subDays(-1)->toDateString())->count() }}</span>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">الرسائل</span>
                                </h6>
                                <span
                                    class="notification-tag badge badge-default badge-success float-right m-0">جديد</span>
                            </li>
                            <li class="scrollable-container media-list w-100">
                            @if(App\Models\Admin\Notifie::where('status' , '1' )->where('notification_date' , '<=' ,Carbon\Carbon::now('Asia/Baghdad')->subDays(-1)->toDateString())->get()->sortBy('notification_date')->count() > '0')
                            @foreach (App\Models\Admin\Notifie::where('status' , '1' )->where('notification_date' , '<=' ,Carbon\Carbon::now('Asia/Baghdad')->subDays(-1)->toDateString())->get()->sortBy('notification_date') as $notifie)
                                <a href="{{ route('admin.maintenance_Notifie.edit',$notifie->id) }}">
                                    <div class="media">
                                        <div class="media-left">
                                            <span style="width: 55px !important;"  class="avatar avatar-sm avatar-online rounded-circle">
                                            <img src="{{ asset('assets/admin/images/chatboot.png') }}"
                                                alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            @if($notifie->maintenance->card->type_card == '0')<h8 style="color: red">معدات شركة باور تراك</h8>@endif
                                            @if($notifie->maintenance->card->type_card == '1')<h8 style="color: red">معدات شركات</h8>@endif
                                            <h6 class="media-heading">{{ $notifie->maintenance->card->name }} رقم {{ $notifie->maintenance->card->card_no }} في شركة {{ $notifie->maintenance->card->part }}</h6>
                                            <p class="notification-text font-small-3 text-muted"><div style="font-size: 17px;word-wrap: break-word;width:260px;">يحتاج لتغيير {{ $notifie->spare_parts }}</div></p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="2015-06-11T18:29:20+08:00">تاريخ الزيارة @if($notifie->notification_date <= Carbon\Carbon::now('Asia/Baghdad')->toDateString()) <span style="color : red;"> @endif {{ $notifie->notification_date }} @if($notifie->notification_date <= Carbon\Carbon::now('Asia/Baghdad')->toDateString())</span> @endif
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            @endif
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                    href="{{ route('admin.maintenance_Notifie.index_de') }}">عرض كل الرسائل الغير نشطة</a></li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
