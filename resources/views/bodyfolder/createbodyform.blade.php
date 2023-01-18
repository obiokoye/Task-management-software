@extends('layouts.app')

@section('content')

<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo">
                <span class="logo-lg">
                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="22">

                </span>
                <span class="logo-sm">

                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="24">
                </span>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">
            <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"></a>
            </div>
            <p class="text-muted">Admin</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="/home">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-danger float-right"></span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="/home">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-danger float-right"></span>
                        <span> Administration </span>
                    </a>
                </li>

                <li>
                    <a href="{{url('agent') }}">
                        <i class="icon-user"></i>
                        <span> Agent </span>
                    </a>


                </li>

                <li>
                    <a href="{{url('body') }}">
                        <i class="icon-people"></i>
                        <span> Body </span>
                    </a>

                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-bank-outline"></i>
                        <span> Payment Setup </span>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title">Create New Body</h4>
                    {{-- <p class="sub-header">
                        You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                    </p> --}}

                    <form method="POST" action="{{ route('body.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name" class="col-form-label">Body Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('bodyname') }}" placeholder="Body Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address" class="col-form-label">Body Address</label>
                                <input type="address" name="address" class="form-control" id="address" value="{{ old('address') }}" placeholder="Body address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-form-label">Body phone</label>
                                <input type="tel" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" placeholder=" Body phone number">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount" class="col-form-label">Body Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount" value="{{ old('amount') }}" placeholder="Body Amount">
                            </div>
                        </div>

                        </div>
                        <div class="form-group">

                        </div>
                        {{-- <a href="{{url('body') }}"> --}}
                        <button type="submit" class="btn btn-primary">Create</button></a>
                    </form>
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
