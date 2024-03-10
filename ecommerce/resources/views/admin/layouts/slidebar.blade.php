<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('admin-asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="">
            <p class="p-2"></p>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ url('admin-asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a class="d-block text-uppercase">{{ Auth::user()->name }}</a>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <div class="nav-item">
                    <li>
                        <a href="{{ url('admin/dashboard') }}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/list') }}" class="nav-link ">
                            <i class="nav-icon fas fa-regular fa-user"></i>
                            <p>
                                Admin
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/product') }}" class="nav-link ">
                            <i class="nav-icon fas fa-solid fa-globe"></i>
                            <p>
                                Product
                            </p>
                        </a>
                    </li>

                    </class>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Charts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                    <li>
                        <a href="{{ url('admin/logout') }}" class="nav-link active">
                            <i class="nav-icon fas fa-unlock-alt"></i>

                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>