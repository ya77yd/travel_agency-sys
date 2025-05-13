<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light"> user:
            {{ Auth::user()->name }}
       </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
       <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                
                
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>                
                                <p>
                            التهيئة 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('airports')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تهيئة المطارات  </p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{url('airlines')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> تهيئة  شركات الطيران</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('suppliers')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> تهيئة  المودرين</p>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a href="{{url('customers')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> تهيئة  العملاء</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('currencies')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> تهيئة  العملات</p>
                            </a>
                        </li>

                        
                    </ul>
                </li>

{{-- التذاكررررررررررررررررررررررررررررررررر --}}
                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="fas fa-money-bill-wave nav-icon"></i>
                        <p>
                             تذاكر الطيران
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('bookings')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الحجوزات  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('tickets')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> ادارة التذاكر  </p>
                            </a>
                        </li>
                       <li class="nav-item">
                            <a href="{{url('transporttickets')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> النقل البري  </p>
                            </a>
                        </li>
                    </ul>
                </li>
                
{{-- الحسااااااابات --}}

<li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="fas fa-money-bill-wave nav-icon"></i>
                        <p>
                             الحسابات 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('accounts')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> الحسابات  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('account_currencies')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> اضافة حسابات  </p>
                            </a>
                        </li>
                       <li class="nav-item">
                            <a href="{{url('payments')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> قيود اليوميه</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
