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
                <li>
                    <a href="{{ route('admin.index') }}">
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
                    <a href="{{route('payment.index') }}">
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
                    <h4 class="header-title">Create User</h4>
                    {{-- <p class="sub-header">
                        You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                    </p> --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Firstname" class="col-form-label">Full Name</label>
                                 <input type="text"  id="name" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label">Email address</label>
                                <input type="email"  id="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password" {{ old('password') }}>

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

                        </div>
                            </div>


                        <button type="submit" class="btn btn-primary">Add</button></a>
                        </div>
                        {{-- <a href="{{url('agent') }}"> --}}
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
