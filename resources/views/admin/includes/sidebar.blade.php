<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class="nav-item active"><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
          </li>
          <li class="nav-item active"><a href=""><i class="icon-users"></i>
              <span class="menu-title" data-i18n="nav.dash.main">العملاء</span>
              <span
                  class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Admin\Customer::count() }}</span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.index.customer') }}" data-i18n="nav.dash.ecommerce"> عرض كل العملاء </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.customer') }}" data-i18n="nav.dash.ecommerce">إضافة عميل</a>
                  </li>
              </ul>
          </li>





          <li class="nav-item active"><a href=""><i class="la la-truck"></i>
              <span class="menu-title" data-i18n="nav.dash.main">المعدات</span>
              <span
                  class="badge badge badge-success badge-pill float-right mr-2">{{ App\Models\Admin\Card::where('type_card', '0')->get()->count() }}</span>
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

                        <li><a class="menu-item" href="{{ route('admin.types.cards',1) }}" data-i18n="nav.dash.crypto">ستاكر كهراباء
                            <span class="badge badge badge-secondary  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ستاكر كهراباء' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'باور بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ريتش تراك' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'هاند بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة كهرباء' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة ديزل' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'أوردر بيكر' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيزر ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'مان ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'حضان' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',11) }}" data-i18n="nav.dash.crypto">بطاريات
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'بطاريات' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',12) }}" data-i18n="nav.dash.crypto">تنجر شحن
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'تنجر شحن' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',13) }}" data-i18n="nav.dash.crypto">أطارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'أطارات' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيارة' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                    </ul>
                  </li>
              </ul>
          </li>

          <li class="nav-item active"><a href=""><i class="la la-truck"></i>
              <span class="menu-title" data-i18n="nav.dash.main">معدات الشركات</span>
              <span
                  class="badge badge badge-primary badge-pill float-right mr-2">{{ App\Models\Admin\Card::where('type_card', '1')->get()->count() }}</span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.types.cards',15) }}" data-i18n="nav.dash.ecommerce"> عرض كل معدات الشركات </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.company.car.cards') }}" data-i18n="nav.dash.ecommerce">إضافة معدة</a>
                  </li>
              </ul>
          </li>

          <li class="nav-item active"><a href=""><i class="la la-truck"></i>
              <span class="menu-title" data-i18n="nav.dash.main">معدات العملاء</span>
              <span
                  class="badge badge badge-danger badge-pill float-right mr-2">{{ App\Models\Admin\Customer_card::count() }}</span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.index.customer.Card') }}" data-i18n="nav.dash.ecommerce"> عرض كل معدات العملاء </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.customer.Card') }}" data-i18n="nav.dash.ecommerce">إضافة معدة</a>
                  </li>
              </ul>
          </li>


          <li class="nav-item active"><a href=""><i class="la la-dashboard"></i>
              <span class="menu-title" data-i18n="nav.dash.main">عداد المعدة &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i style="color: rgb(255, 0, 242)" class="la la-hourglass-start"></i></span>
            </a>

              <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.index.hour.cards',15) }}" data-i18n="nav.dash.crypto">معدات الشركات
                        <span class="badge badge badge-primary  badge-pill float-right mr-2">
                            {{ App\Models\Admin\Card::where( 'type_card' , '1')->count() }}</span>
                    </a>

                    </li>
                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',1) }}" data-i18n="nav.dash.crypto">ستاكر كهراباء
                            <span class="badge badge badge-secondary  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ستاكر كهراباء' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'باور بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ريتش تراك' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'هاند بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة كهرباء' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة ديزل' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'أوردر بيكر' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيزر ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'مان ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'حضان' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيارة' , 'type_card' => '0'])->count() }}</span>
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
                  <li class=""><a class="menu-item" href="{{ route('admin.maintenance.cards.maintenance.determine') }}" data-i18n="nav.dash.ecommerce">صيانات مجمعه</a>
                  </li>

                    <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',15) }}" data-i18n="nav.dash.crypto">معدات شركات
                        <span class="badge badge badge-primary  badge-pill float-right mr-2">
                            {{ App\Models\Admin\Card::where('type_card' , '1')->count() }}</span>
                    </a>

                    </li>
                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',1) }}" data-i18n="nav.dash.crypto">ستاكر كهراباء
                            <span class="badge badge badge-secondary  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ستاكر كهراباء' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'باور بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ريتش تراك' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'هاند بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة كهرباء' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة ديزل' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'أوردر بيكر' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيزر ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'مان ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'حضان' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',11) }}" data-i18n="nav.dash.crypto">بطاريات
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'بطاريات' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',12) }}" data-i18n="nav.dash.crypto">تنجر شحن
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'تنجر شحن' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',13) }}" data-i18n="nav.dash.crypto">أطارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'أطارات' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيارة' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                    </ul>
                  </li>
              </ul>

          <li class="nav-item active"><a href=""><i class="la la-pied-piper-alt"></i>
              <span class="menu-title" data-i18n="nav.dash.main">الفنيين</span>
              <span
                  class="badge badge badge-warning badge-pill float-right mr-2">{{ App\Models\Admin\Technician::count() }}</span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.index.technician') }}" data-i18n="nav.dash.ecommerce"> عرض كل الفنيين </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.technician') }}" data-i18n="nav.dash.ecommerce">إضافة فني</a>
                  </li>
              </ul>
          </li>

          </li>
          <li class="nav-item active"><a href=""><i class="la la-credit-card"></i>
              <span class="menu-title" data-i18n="nav.dash.main">حساب التكلفة&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color: green" class="la la-money"></i></span>

            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.select.accounts.mirror') }}" data-i18n="nav.dash.ecommerce">مراية الحسابات</a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.cost.cards.determine_the_duration.cards',0) }}" data-i18n="nav.dash.ecommerce">اجمالي تكلفة الصيانة</a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.cost.cards.determine_the_duration.cards',1) }}" data-i18n="nav.dash.ecommerce">اجمالي تكلفة الصيانة للشركات</a>
                  </li>
                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',1) }}" data-i18n="nav.dash.crypto">ستاكر كهراباء
                            <span class="badge badge badge-secondary  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ستاكر كهراباء' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'باور بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ريتش تراك' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'هاند بالت' , 'type_card' => '0'])->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة كهرباء' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'ونش شوكة ديزل' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'أوردر بيكر' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيزر ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'مان ليفت' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'حضان' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',11) }}" data-i18n="nav.dash.crypto">بطاريات
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'بطاريات' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',12) }}" data-i18n="nav.dash.crypto">تنجر شحن
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'تنجر شحن' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',13) }}" data-i18n="nav.dash.crypto">أطارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'أطارات' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where(['name' => 'سيارة' , 'type_card' => '0'])->count() }}</span>
                        </a>
                        </li>

                    </ul>
                  </li>
              </ul>
          </li>
          <li class="nav-item active"><a href=""><i class="icon-graph"></i>
              <span class="menu-title" data-i18n="nav.dash.main">المصروفات التشغيلية</span>
              <span style="color: red">&nbsp;&nbsp;<i class="icon-bar-chart"></i></span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.index.operating.expenses') }}" data-i18n="nav.dash.ecommerce"> عرض المصروفات التشغيلية </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.operating.expenses') }}" data-i18n="nav.dash.ecommerce">إضافة مصروفات</a>
                  </li>
              </ul>
          </li>
          <li class="nav-item active"><a href=""><i class="la la-sort-amount-desc"></i>
              <span class="menu-title" data-i18n="nav.dash.main">الخسائر</span>
              <span style="color: #0059ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ft-battery"></i></span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.index.Losses') }}" data-i18n="nav.dash.ecommerce"> عرض الخسائر </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.Losses') }}" data-i18n="nav.dash.ecommerce">إضافة خسائر</a>
                  </li>
              </ul>
          </li>
      </ul>
  </div>
</div>
