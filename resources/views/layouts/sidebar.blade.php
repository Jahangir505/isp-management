<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="{{asset('/assets/images/faces/face1.jpg')}}" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">Jahangir</span>
                        <span class="text-secondary text-small">Software Engineer</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#packages" aria-expanded="false" aria-controls="packages">
                    <span class="menu-title">Packages</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="packages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{url('/packages')}}">Package List</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{url('/package/create')}}">Package Create</a></li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
                    <span class="menu-title">Customers</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="customer">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{url('/customers')}}">Customer List</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{url('/customer/create')}}">Customer Create</a></li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#payments" aria-expanded="false" aria-controls="payments">
                    <span class="menu-title">Payments</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="payments">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{url('/payments')}}">Customer Pay List</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{url('/payment/create')}}">Customer Bill</a></li>

                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-panel">
