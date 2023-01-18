
 <style>
        table {
        display: block;
        height: 200px;
        overflow-y: auto;
        width
        }
        .card{
            border-radius: 20px;
            display: inline-block;
            width: 200px;
            border-bottom: 6px solid #17a2b8;
            margin-top: -15px;
            height: 150px;
        }
        .card-box{
            border-bottom: 6px solid #17a2b8;
            border-radius: 20px;

        }


        .tr{
            border-bottom: 3px solid #17a2b8;
            /* background-color: #08e1ae;
            background-image: linear-gradient(315deg, #8c978b 0%, #292323 74%); */
            /* background-image: linear-gradient(315deg, #627260 0%, #1d2538 74%); */

        }



</style>
  <!-- Start Content-->
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-layer float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Transactions</h6>
                    <h3 class="mb-3" data-plugin="counterup">1,587</h3>
                    <span class="badge badge-success mr-1"> +11% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-dollar-circle float-right m-0 h2"></i>
                    <h6 class="text-muted text-uppercase mt-0">No. of Dues</h6>
                    <h3 class="mb-3"><span data-plugin="counterup">2,782</span></h3>
                    <span class="badge badge-danger mr-1"> -29% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-dollar-circle float-right m-0 h2"></i>
                    <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                    <h3 class="mb-3">$<span data-plugin="counterup">46,782</span></h3>
                    <span class="badge badge-info mr-1"> -29% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-dollar-circle float-right m-0 h2 "></i>
                    <h6 class="text-muted text-uppercase mt-0">Total symbols</h6>
                    <h3 class="mb-3"><span data-plugin="counterup">46,782</span></h3>
                    <span class="badge badge-warning mr-1"> -29% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Stacked Bar Chart</h4>

                <div id="morris-bar-stacked" style="height: 350px;" dir="ltr" class="mt-4 morris-charts"></div>

            </div>
        </div>

    </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">BANKS</h4>


                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Bank Name</th>
                                                <th>No of Transactions</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="tr">
                                                <th scope="row">1</th>
                                                <td>Access</td>
                                                <td>56</td>
                                                <td>9,000,000</td>
                                            </tr>
                                            <tr class="tr">
                                                <th scope="row">2</th>
                                                <td>Fidelity</td>
                                                <td>56</td>
                                                <td>3,000,000</td>
                                            </tr>
                                            <tr class="tr">
                                                <th scope="row">3</th>
                                                <td>Diamond</td>
                                                <td>5</td>
                                                <td>12,000,000</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title">STATES</h4>


                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>State Names</th>
                                                <th>No of Transactions</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Anambra</td>
                                                <td>67</td>
                                                <td>78,000,000</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Kaduna</td>
                                                <td>200</td>
                                                <td>8,000,000</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Kano</td>
                                                <td>67</td>
                                                <td>5,000,000</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>





                        </div>
    <!-- end row -->

     <!-- Footer Start -->
    @include('admin.footer')
    <!-- end Footer -->


</div> <!-- end container-fluid -->

<!-- end content -->


