@extends('layouts.app')

@section('content')

<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        {{-- <div class="logo-box">
            <a href="index.html" class="logo">
                <span class="logo-lg">
                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="22">
                    <!-- <span class="logo-lg-text-light">Highdmin</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">H</span> -->
                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="24">
                </span>
            </a>
        </div> --}}

        <!-- User box -->
        <div class="user-box">
            <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">{{ Auth::user()->name }}</a>
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
                @can('manage-users')
                    <li>
                        <a href="{{url('agent') }}">
                            <i class="icon-user"></i>
                            <span> Agent </span>
                        </a>
                    </li>
                @endcan

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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Agent</div>

                            <div class="card-body">
                                <form action="{{ route('agents.update', $agent) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group col-md-6">
                                        <label for="name" class="col-form-label">Full Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $agent->name }}" required autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </div>

                                    <div class="form-group col-md-6">
                                            <label for="password" class="col-form-label">Password</label>
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $agent->password }}" required autocomplete="new-password" placeholder="Enter your password" {{ old('password') }}>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                                      <div class="form-group col-md-6">
                                            <label for="confirm-password" class="col-form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="confirm-password" required autocomplete="new-password">
                                        </div>




                                    @csrf
                                    {{ method_field('PUT') }}

                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>


                                </form>
                           </div>
                        </div>
                    </div>
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
