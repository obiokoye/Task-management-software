@extends('layouts.app')

@section('content')

<div class="left-side-menu">

    <div class="slimscroll-menu">


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
                                <span> PAYMENT-SETUP </span>
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

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title">Payment Setup</h4>

                    <form method="POST" action="{{ route('paymentsetup.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputState" class="col-form-label">UNION NAME</label>
                                <select id="union" name="body_id" class="form-control @error('union') is-invalid @enderror" required autocomplete="bodyname" autofocus>
                                    <option selected disabled value="0">SELECT UNION+</option>
                                    @foreach ($bodies as $body )
                                    <option value="{{ $body->id }}">{{ $body->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="col-form-label">PAYMENT TYPE</label>
                                <input type="text" class="form-control @error('payment_type') is-invalid @enderror" name="payment_type" id="payment_type" placeholder="Payment Type" autofocus>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount" class="col-form-label">AMOUNT(&#x20A6)</label>
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="0.00">
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="submit" class="btn btn-danger">Reset</button>

                </div>
                    </div>
                    </form>
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
<!-- ==================================
@endsection
