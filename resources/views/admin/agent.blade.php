@extends('layouts.app')

@section('content')

<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->

        <div class="logo-box">
            <a href="/home" class="logo">
                <span class="logo-lg">
                    VONCAP
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
                            <a href="">
                                <i class="{{ url('paymentsetup') }}"></i>
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
        @if (session('success'))
        <span class="text-success">{{ session('success') }}</span>
        @endif

        <div class="card-box">
            @can('manage-users')
            <a href="{{ url('addagentform') }}">
                <button id="demo-btn-addrow" class="btn btn-primary btn-rounded waves-light waves-effect float-right">
                    <i class="mdi mdi-plus-circle mr-2"></i> Add Agents</button></a>
                    @endcan
            <h4 class="header-title">All Agents</h4>
            <ul class="list-unstyled topnav-menu float-left mb-0">

                <li class="d-none d-sm-block">
                 <div class="form-group">
                 <form action="{{ url('/agent/search') }}" method="POST" role="search">
                     @csrf
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
             </div>
         </ul>
     </li>

            <div class="table-responsive">
                <table class="table table-dark mb-0">
                    <thead>
                    <tr class="">
                        <th>S/N</th>
                        <th>Agent Name</th>
                        <th>Email</th>
                        <th>Actions</th>


                    </tr>
                    </thead>
                    <tbody>

                    </tr>
                    @foreach ($users as $user )
                    <tr class="bg-pink">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>

                              <a href="agents/{{$user->id}}/edit" class="btn btn-success btn-rounded waves-light waves-effect">Edit</button></a>

                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>

        <div class="d-flex justify-content-center">
            {{$users->links()}}
        </div>


    </div>
</div>
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
