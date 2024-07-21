<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#f4f4f4 url(public/img/slider.jpg);" data-overlay="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->


<!-- ============================ User Dashboard ================================== -->
<section class="gray pt-5 pb-5">
    <div class="container-fluid">

        <div class="row">

            <!-- dashboard navbar start -->
            <?php require_once 'sidebar.php'; ?>
            <!-- dashboard navbar end -->

            <div class="col-lg-9 col-md-8">
                <div class="dashboard-body">
                    <div class="row">
                        <!-- col-lg-4 col-md-6 col-sm-12 -->
                        <div class="col-sm-6 col-md-5 col-lg-6">
                            <div class="dashboard_stats_wrap widget-1">
                                <div class="dashboard_stats_wrap_content">
                                    <h4><?php echo $propertyCount; ?></h4><span>Tin cho thuê</span>
                                </div>
                                <div class="dashboard_stats_wrap-icon"><i class="ti-location-pin"></i></div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-6">
                            <div class="dashboard_stats_wrap widget-1">
                                <div class="dashboard_stats_wrap_content">
                                    <h4><?php echo $newsCount; ?></h4> <span>Tin tức</span>
                                </div>
                                <div class="dashboard_stats_wrap-icon"><i class="fa fa-newspaper"></i></div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-6">
                            <div class="dashboard_stats_wrap widget-1">
                                <div class="dashboard_stats_wrap_content">
                                    <h4> <?php echo $userCount; ?></h4> <span>Người dùng</span>
                                </div>
                                <div class="dashboard_stats_wrap-icon"><i class="fa fa-users"></i></div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-5 col-lg-6">
                            <div class="dashboard_stats_wrap widget-1">
                                <div class="dashboard_stats_wrap_content">
                                    <h4><?php echo $totalViewCount; ?></h4> <span>Khách truy cập</span>
                                </div>
                                <div class="dashboard_stats_wrap-icon"><i class="fa fa-eye"></i></div>
                            </div>
                        </div>

                    </div>
                    <!--  row -->

                    <div class="row">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Extra Area Chart</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-inline text-center m-t-40">
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-warning"></i>Bất động sản</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-danger"></i>Tin tức</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-success"></i>Người dùng</h5>
                                        </li>
                                    </ul>
                                    <div class="chart" id="extra-area-chart" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ User Dashboard End ================================== -->