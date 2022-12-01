@extends('layouts/contentNavbarLayout')

@section('title', 'Devices')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

@endsection
@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid my-5 py-5">
        <div class="row">
            @foreach ($dashboard_data as $data)
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-{{ $data['color'] }} order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">{{ $data['title'] }}</h6>
                            <h2 class="text-right"><i
                                    class="fa fa-{{ $data['icon'] }} f-left"></i><span>{{ $data['total'] }}</span></h2>
                            <p class="m-b-0">
                                <a href={{ route($data['link'] . '.index', auth()->user()->id) }}
                                    class="btn stretched-link float-end">
                                    View</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        body {
            margin-top: 20px;
            background: #FAFAFA;
        }

        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #4099ff, #73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #2ed8b6, #59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg, #FFB64D, #ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #FF5370, #ff869a);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }
    </style>
@endsection
