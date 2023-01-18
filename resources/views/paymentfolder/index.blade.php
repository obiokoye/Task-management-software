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
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title">Payment Confirmation</h4>

                    <form method="POST" action="{{ route('payment.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputState" class="col-form-label">UNION NAME</label>
                                <select id="union" class="form-control @error('union') is-invalid @enderror" required autocomplete="bodyname" autofocus>
                                    <option selected="true" disabled="true" value="0">SELECT UNION+</option>
                                    @foreach ($bodies as $body )
                                    <option value="{{ $body->id }}">{{ $body->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputState" class="col-form-label">PAYMENT TYPE</label>
                                <select id="payment_type" class="form-control @error('payment_type') is-invalid @enderror" required autocomplete="payment_type" autofocus>

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4" class="col-form-label">Amount payable(&#x20A6)</label>
                                <input type="text" class="form-control @error('amountpayable') is-invalid @enderror" name="amountpayable" id="amountPayable" placeholder="0.00" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount" class="col-form-label">Amount(&#x20A6)</label>
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="0.00">
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md-2 col-form-label" for="date">Date</label>
                                <div class="col-md-10">
                                    <input class="form-control @error('date') is-invalid @enderror"  id="date" type="date" name="date">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th width="32%">First Name</th>
                                    <th width="32%">Last Name</th>
                                    <th width="32%">Bank</th>
                                    <th width="4%">Payment prove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            {{-- <label for="inputAddress2" class="col-form-label">First Name</label> --}}
                                            <input type="text" class="form-control @error('fname') is-invalid @enderror" name="firstname" id="firstname" placeholder="First Name">
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname" placeholder="Last Name">
                                            @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('bankname') is-invalid @enderror" name="bankname" id="bankname" placeholder="Bank Name">
                                            @error('bankname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fileUpload">
                                            <input type="file" class="upload" style="width: 200px" name="file" onchange="loadFile(event, 'file')">
                                        </div><br/>
                                        <img class="img-responsive" id="file" width="80" height="80" style="margin-left:12px;" />
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <button type="submit" class="btn btn-danger">Reset</button>
                    </div>

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
<!-- ============================================================== -->
<script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('admin.rightbar')
<div class="rightbar-overlay"></div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $( document ).ready(function() {

        $(document).on('change', '#union',function(){
            // console.log("hmm its a change");

            var union_id=$(this).val();
            // console.log(union_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('payment/getpay')!!}',
                data:{'id':union_id},
                success:function(data){
                    // console.log('success');

                    // console.log(data);

                    // console.log(data.length);
                    op+='<option value="0" selected disabled>chose body</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].union_id+'</option>';
                    }

                    div.find('.union_id').html(" ");
                    div.find('.union_id').append(op);

                },
                error:function(){

                }
            });
        });
    });
</script>
@endsection
{{-- <script>

    // this will help format the amount in each seleted body
//     function addCommas(nStr){
//         nStr += '';
//         var x = nStr.split('.');
//         var x1 = x[0];
//         var x2 = x.length > 1 ? '.' + x[1] : '';
//         var rgx = /(\d+)(\d{3})/;
//         while (rgx.test(x1)){
//             x1 = x1.replace(rgx, '$1' + ',' + '$2');
//         }
//         return x1 + x2;
//     }
//     //this will display an image
//     var loadFile = function(event, id) {
//         var output = document.getElementById(id);
//         output.src = URL.createObjectURL(event.target.files[0]);
//     }

//     // $( document ).ready(function() {
//     //     $('#union').on('change', function(){
//     //         //console.log( 'used for changing items' );
//     //         const amountPayable = @json($bodies);
//     //         $('#amountPayable').attr('readonly', 'readonly');
//     //         $('#amountPayable').val('');

//     //         let selectedUnion = $('#union option:selected').val();
//     //         let selected_union = amountPayable.find(function(currentValue, index, arr){
//     //             return currentValue.id == selectedUnion;
//     //         });
//     //         //console.log( selected_union.fee.amount );
//     //         $('#amountPayable').val(addCommas(parseFloat(selected_union.fee.amount).toFixed(2)));
//     //     });
//     // });
// </script> --}}


