<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class="nav-item active"><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
          </li>
          <li class="nav-item active"><a href=""><i class="la la-truck"></i>
              <span class="menu-title" data-i18n="nav.dash.main">المعدات</span>
              <span
                  class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Admin\Card::count() }}</span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.index.cards') }}" data-i18n="nav.dash.ecommerce"> عرض كل المعدات </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.cards') }}" data-i18n="nav.dash.ecommerce">إضافة معدة</a>
                  </li>
                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.digger.cards') }}" data-i18n="nav.dash.crypto">الحفارات
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حفار')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.loader.cards') }}" data-i18n="nav.dash.crypto">اللوادر
                            <span class="badge badge badge-info badge badge-pill bg-blue-grey float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'لودر')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.generator.cards') }}" data-i18n="nav.dash.crypto">المولدات
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مولد')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.crusher.cards') }}" data-i18n="nav.dash.crypto">الكسارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كسارة')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.compressor.cards') }}" data-i18n="nav.dash.crypto">كمبريسور
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كمبريسور')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.research.machine.cards') }}" data-i18n="nav.dash.crypto">ماكينات الأبحاث
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ماكينة ابحاث')->count() }}</span>
                        </a>

                        </li>
                    </ul>
                  </li>
              </ul>
          </li>
          <li class="nav-item active"><a href=""><i class="la la-dashboard"></i>
              <span class="menu-title" data-i18n="nav.dash.main">عداد المعدة &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i style="color: rgb(255, 0, 242)" class="la la-hourglass-start"></i></span>
            </a>

              <ul class="menu-content">

                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.hour.digger.cards') }}" data-i18n="nav.dash.crypto">الحفارات
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حفار')->count() }}</span>
                        </a>

                        </li>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.hour.loader.cards') }}" data-i18n="nav.dash.crypto">اللوادر
                            <span class="badge badge badge-info badge badge-pill bg-blue-grey float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'لودر')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.hour.generator.cards') }}" data-i18n="nav.dash.crypto">المولدات
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مولد')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.hour.crusher.cards') }}" data-i18n="nav.dash.crypto">الكسارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كسارة')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.hour.compressor.cards') }}" data-i18n="nav.dash.crypto">كمبريسور
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كمبريسور')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.hour.research.machine.cards') }}" data-i18n="nav.dash.crypto">ماكينات الأبحاث
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ماكينة ابحاث')->count() }}</span>
                        </a>

                        </li>
                    </ul>
                  </li>
              </ul>
          </li>
          <li class="nav-item active"><a href=""><i class="la la-wrench"></i>
              <span class="menu-title" data-i18n="nav.dash.main">متابعة الصيانة&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ft-settings font-medium-3 spinner red"></i></span>

            </a>
              <ul class="menu-content">

                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',1) }}" data-i18n="nav.dash.crypto">الحفارات
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حفار')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',2) }}" data-i18n="nav.dash.crypto">اللوادر
                            <span class="badge badge badge-info badge badge-pill bg-blue-grey float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'لودر')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',3) }}" data-i18n="nav.dash.crypto">المولدات
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مولد')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',4) }}" data-i18n="nav.dash.crypto">الكسارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كسارة')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',5) }}" data-i18n="nav.dash.crypto">كمبريسور
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كمبريسور')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',6) }}" data-i18n="nav.dash.crypto">ماكينات الأبحاث
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ماكينة ابحاث')->count() }}</span>
                        </a>

                        </li>
                    </ul>
                  </li>
              </ul>
          </li>
          <li class="nav-item active"><a href=""><i class="la la-credit-card"></i>
              <span class="menu-title" data-i18n="nav.dash.main">حساب التكلفة&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color: green" class="la la-money"></i></span>

            </a>
              <ul class="menu-content">

                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',1) }}" data-i18n="nav.dash.crypto">الحفارات
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حفار')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',2) }}" data-i18n="nav.dash.crypto">اللوادر
                            <span class="badge badge badge-info badge badge-pill bg-blue-grey float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'لودر')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',3) }}" data-i18n="nav.dash.crypto">المولدات
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مولد')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',4) }}" data-i18n="nav.dash.crypto">الكسارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كسارة')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',5) }}" data-i18n="nav.dash.crypto">كمبريسور
                            <span class="badge badge badge-warning  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'كمبريسور')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',6) }}" data-i18n="nav.dash.crypto">ماكينات الأبحاث
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ماكينة ابحاث')->count() }}</span>
                        </a>

                        </li>
                    </ul>
                  </li>
              </ul>
          </li>
      </ul>
  </div>
</div>
