@extends('admin.layouts.app')

@section('content')
    @include('admin.parts.content-header', ['page_title' => 'Dashboard v1'])

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->

                    <!-- /.card -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-shopping-basket mr-1"></i>
                                        Останні замовлення
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">
                                                    №
                                                </th>
                                                <th style="width: 20%">
                                                    Покупець
                                                </th>
                                                <th style="width: 20%">
                                                    Сума
                                                </th>
                                                <th style="width: 20%">
                                                    Статус
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="sortable-y" data-url="{{ route('lte3.data.save') }}">
                                            @foreach ($orders as $order)
                                                <tr id="{{ $loop->index }}" class="va-center">
                                                    <td style="width: 1%">
                                                        {{ $order->id }}
                                                    </td>
                                                    <td style="width: 20%">
                                                        {{ $order->user->name }}
                                                    </td>
                                                    <td style="width: 20%">
                                                        {{ $order->total_amount }}
                                                    </td>
                                                    <td style="width: 20%">
                                                        {{ $order->status }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </section>
                    </div>
                </section>


                <section class="col-lg-5 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Інфо
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-shopping-cart"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Кількість товарів</span>
                                        <span class="info-box-number">{{ $productCount }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-shopping-basket"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Кількість замовлень</span>
                                        <span class="info-box-number">{{ $orderCount }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="fas fa-envelope"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Кількість підписників</span>
                                        <span class="info-box-number">{{ $subscriberCount }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Кількість клієнтів</span>
                                        <span class="info-box-number">{{ $clientCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('styles')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/vendor/adminlte/plugins/summernote/summernote-bs4.min.css">
@endpush

@push('scripts')
    <!-- ChartJS -->
    <script src="/vendor/adminlte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/vendor/adminlte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/vendor/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/vendor/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/vendor/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/vendor/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/vendor/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/vendor/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/vendor/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/vendor/adminlte/dist/js/pages/dashboard.js"></script>
@endpush
