@extends('layouts.index')
@push('jquery')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel=" https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endpush

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) SPKA-->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Spka</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $spak }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) DATAEMAIL -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Data Email</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataEmail }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope-open-text fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) DATAEMAIL -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataEmail }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) DATAEMAIL -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kontrol Masalah</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataEmail }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bug fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
         <div class="container">
         <div class="card shadow-lg mt-2" style="padding : 3%;background-color: #fffffd;">
            <div class="card-header text-center mb-3" style="background-color: transparent; color :#757575">
                <!-- <h4>Grafik Progess (Box) </h4> -->
            </div>

            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-guletin-tab" data-toggle="tab" href="#nav-guletin" role="tab" aria-controls="nav-guletin" aria-selected="true">Guletin</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-guletin" role="tabpanel" aria-labelledby="nav-guletin-tab">
                        <div class="card">
                            <canvas id="myProgressGuletin"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

      <script>
        var ctx = document.getElementById('myProgressGuletin');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php
                            foreach ($list as $row) {
                                echo '"' . $row->Nm_dinas . '"' . ',';
                            } ?>],
                datasets: [{
                    label: 'Guillotine',
                    data: [<?php foreach ($list as $row) {
                                echo $row->kontrol_count . ',';
                            } ?>],
                    borderWidth: 3,
                    borderColor: '#293B5F',
                    yAxisID: 'y',
                }, ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            },
            stacked: false,

        });
    </script>
    </div>
    <!-- /.container-fluid -->
@endsection
