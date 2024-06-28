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

          <li class="nav-item active"><a href=""><i class="la la-truck"></i>
              <span class="menu-title" data-i18n="nav.dash.main">المعدات</span>
              <span
                  class="badge badge badge-success badge-pill float-right mr-2">{{ App\Models\Admin\Card::count() }}</span>
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
                                {{ App\Models\Admin\Card::where('name' , 'ستاكر كهراباء')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'باور بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ريتش تراك')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'هاند بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة كهرباء')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة ديزل')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'أوردر بيكر')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيزر ليفت')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مان ليفت')->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.types.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حضان')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',11) }}" data-i18n="nav.dash.crypto">بطاريات
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'بطاريات')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',12) }}" data-i18n="nav.dash.crypto">تنجر شحن
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'تنجر شحن')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',13) }}" data-i18n="nav.dash.crypto">أطارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'أطارات')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.types.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيارة')->count() }}</span>
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

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',1) }}" data-i18n="nav.dash.crypto">ستاكر كهراباء
                            <span class="badge badge badge-secondary  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ستاكر كهراباء')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'باور بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ريتش تراك')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'هاند بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة كهرباء')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة ديزل')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'أوردر بيكر')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيزر ليفت')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مان ليفت')->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حضان')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.index.hour.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيارة')->count() }}</span>
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

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',1) }}" data-i18n="nav.dash.crypto">ستاكر كهراباء
                            <span class="badge badge badge-secondary  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ستاكر كهراباء')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'باور بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ريتش تراك')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'هاند بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة كهرباء')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة ديزل')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'أوردر بيكر')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيزر ليفت')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مان ليفت')->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حضان')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',11) }}" data-i18n="nav.dash.crypto">بطاريات
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'بطاريات')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',12) }}" data-i18n="nav.dash.crypto">تنجر شحن
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'تنجر شحن')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',13) }}" data-i18n="nav.dash.crypto">أطارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'أطارات')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.maintenance.cards.index.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيارة')->count() }}</span>
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
                  <li class=""><a class="menu-item" href="{{ route('admin.cost.cards.determine_the_duration.cards') }}" data-i18n="nav.dash.ecommerce">حساب اجمالي تكلفة الصيانة</a>
                  </li>
                    <li class="nav-item"><a href=""><i class="icon-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">أختر نوع المعدة</span>
                     </a>
                    <ul class="menu-content">

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',1) }}" data-i18n="nav.dash.crypto">ستاكر كهراباء
                            <span class="badge badge badge-secondary  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ستاكر كهراباء')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',2) }}" data-i18n="nav.dash.crypto">باور بالت
                            <span class="badge badge badge-primary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'باور بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',3) }}" data-i18n="nav.dash.crypto">ريتش تراك
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ريتش تراك')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',4) }}" data-i18n="nav.dash.crypto">هاند بالت
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'هاند بالت')->count() }}</span>
                        </a>

                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',5) }}" data-i18n="nav.dash.crypto">ونش شوكة كهرباء
                            <span class="badge badge badge-info  badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة كهرباء')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',6) }}" data-i18n="nav.dash.crypto">ونش شوكة ديزل
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'ونش شوكة ديزل')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',7) }}" data-i18n="nav.dash.crypto">أوردر بيكر
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'أوردر بيكر')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',8) }}" data-i18n="nav.dash.crypto">سيزر ليفت
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيزر ليفت')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',9) }}" data-i18n="nav.dash.crypto">مان ليفت
                            <span class="badge badge badge-success badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'مان ليفت')->count() }}</span>
                        </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',10) }}" data-i18n="nav.dash.crypto">حضان
                            <span class="badge badge badge-secondary badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'حضان')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',11) }}" data-i18n="nav.dash.crypto">بطاريات
                            <span class="badge badge badge-warning badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'بطاريات')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',12) }}" data-i18n="nav.dash.crypto">تنجر شحن
                            <span class="badge badge badge-info badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'تنجر شحن')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',13) }}" data-i18n="nav.dash.crypto">أطارات
                            <span class="badge badge badge-danger badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'أطارات')->count() }}</span>
                        </a>
                        </li>

                        <li><a class="menu-item" href="{{ route('admin.cost.cards.index.cards',14) }}" data-i18n="nav.dash.crypto">سيارة
                            <span class="badge badge badge-light badge-pill float-right mr-2">
                                {{ App\Models\Admin\Card::where('name' , 'سيارة')->count() }}</span>
                        </a>
                        </li>

                    </ul>
                  </li>
              </ul>
          </li>
      </ul>
  </div>
</div>
