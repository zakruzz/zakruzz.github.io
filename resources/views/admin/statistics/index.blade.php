@extends('admin.app')

@section('title','Visitor Statistics')

@section('style')
    <style>
        #container {
            overflow-y: auto;
            height: 400px;
        }

        .highcharts-figure, .highcharts-data-table table {
            min-width: 350px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>


@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Statistik Pengunjung</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Bulan Agustus</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row">

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                        <h1 class="font-large-2 font-weight-bolder mb-0">{{array_sum($visitor)}}</h1>
                                        <p class="card-text">Pengunjung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                        <h1 class="font-large-2 font-weight-bolder mb-0">{{array_sum($hits)}}</h1>
                                        <p class="card-text">Hits</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom row">
                                <h4 class="col-lg-8 card-title">Statistik Pengunjung</h4>
                                <form class="col-lg-4" action="{{route('admin.statistics.filter')}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="month" class="form-control" placeholder="mm/yyyy" name="date" autocomplete="off" value="{{$query}}" aria-describedby="button-addon2" required>
                                        <div class="input-group-append" id="button-addon2">
                                            <button  type="submit" class="btn btn-outline-primary waves-effect">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="block-content block-content-full">
                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'area'
            },
            title: {
                text: 'Visitor Statistics in <?php echo json_encode($month) ?>'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                borderWidth: 1,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
            },
            xAxis: {
                categories: <?php echo json_encode($date) ?>
            },
            yAxis: {
                title: {
                    text: 'Total'
                }
            },
            plotOptions: {
                area: {
                    fillOpacity: 0.5
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total Visitor',
                data: <?php echo json_encode($visitor) ?>
            }]
        });
    </script>



    <script>
        $("#datepicker").datepicker( {
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });
    </script>
@endsection
