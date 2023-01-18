@extends('layouts.app')

@section('content')


<div class="left-side-menu">

    <div class="slimscroll-menu">

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
                    <a href="#">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-danger float-right"></span>
                        <span> Administration </span>
                    </a>
                </li>

                @can('manage-agent')
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
        <div class="card-box">

            <h4 class="header-title">All Users</h4>
        <div class="table-responsive">
            <table class="table table-dark mb-0">
                <ul class="list-unstyled topnav-menu float-left mb-0">
            </div>
        </ul>
    </li>
                <a href="{{ route('admin.create') }}">
                    <button id="demo-btn-addrow" class="btn btn-primary btn-rounded waves-light waves-effect float-right">
                                <i class="mdi mdi-plus-circle mr-2"></i> Add Users</button></a>
                    <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td>
                                {{-- @can('edit-users') --}}
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                     <a href="{{ route('admin.edit', $user->id) }}"><button type="button" class="btn btn-primary btn-rounded me-md-2 btn-sm">Edit</button></a>
                                 {{-- @endcan --}}

                                {{-- @can('delete-users') --}}
                                     <form action="{{ route('admin.destroy', $user) }}" method="POST" accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-rounded waves-light waves-effect btn-sm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                                {{-- @endcan --}}
                            </div>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
    </div>
</div>
</div>
                        <div class="d-flex justify-content-center">
                            {{-- { $users->links() } --}}
                            {{ $users->links() }}
                        </div>

        </div>
</div>

</div>
{{-- </div> --}}


</div>
</div>






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

