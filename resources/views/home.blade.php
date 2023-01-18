@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo">
                <span class="logo-lg">
                    <h1>VonCap</h1>
                    {{-- <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="22"> --}}
                    <!-- <span class="logo-lg-text-light">Highdmin</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">H</span> -->
                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="24">
                </span>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">
            <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Welcome {{ Auth::user()->name }}</a>
            </div>
            <p class="text-muted"></p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="/home">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-danger float-right"></span>
                        <span> DASHBOARD </span>
                    </a>
                </li>
                @can('manage-admin')
                <li>
                    <a href="{{ route('admin.index') }}">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-danger float-right"></span>
                        <span> ADMINISTRATION </span>
                    </a>
                </li>
                @endcan

                @can('manage-admin')
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-settings"></i>
                        <span> SETTINGS </span>
                        <span class="menu-arrow"></span>
                    </a>
                    @endcan
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{url('agent') }}">
                                <i class="icon-user"></i>
                                <span> AGENT </span>
                            </a>
                        </li>
                        @can('manage-admin')
                        <li>
                            <a href="{{url('body') }}">
                                <i class="icon-people"></i>
                                <span> BODY </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('paymentsetup') }}">
                                <i class="mdi mdi-bank-outline"></i>
                                <span> PAYMENT SET-UP </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                <li>
                    <a href="{{route('payment.index') }}">
                        <i class="mdi mdi-bank-outline"></i>
                        <span> PAYMENT </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <!-- Topbar Start -->
    @include('admin.topbar')
    <!-- end Topbar -->




    <div class="content">


        <!-- Start Content-->
         @include('admin.KPI')
        @include('admin.content')

         <!-- end content -->



    <!-- Footer Start -->
    @include('admin.footer')
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('admin.rightbar')

@endsection
