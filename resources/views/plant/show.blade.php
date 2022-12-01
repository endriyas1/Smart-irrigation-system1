@extends('layouts/contentNavbarLayout')

@section('title', 'Device Plant')
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
    <div class="float">

        <h4 class="fw-bold py-3 mb-4">
            {{-- <span class="text-muted fw-light">{{ $plant->devices()->get()->first->name }} /</span> settings --}}
        </h4>
    </div>
    <a href="{{ route('devices.index') }}" class="btn btn-primary mb-3 "><i class="bx bx-left-arrow"></i> Back </a>


    <div class="row">
      <div class="col-md-2"></div>

        <div class="col-12 col-md-6 col-lg-6 order-3 order-md-2">
            <div class="row">

                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    {{-- <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                    class="rounded"> --}}
                                </div>
                                {{-- <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div> --}}
                            </div>
                            <span class="fw-semibold d-block mb-1">Moisture Threshold</span>
                            <h3 class="card-title mb-2">{{ $plant->soilMoisture }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.14%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    {{-- <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                    class="rounded"> --}}
                                </div>
                                {{-- <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div> --}}
                            </div>
                            <span class="fw-semibold d-block mb-1">Temperature Threshold</span>
                            <h3 class="card-title mb-2">{{ $plant->temperature }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.14%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    {{-- <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                    class="rounded"> --}}
                                </div>
                                {{-- <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div> --}}
                            </div>
                            <span class="fw-semibold d-block mb-1">Humidity Threshold</span>
                            <h3 class="card-title mb-2">{{ $plant->humidity }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.14%</small> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--/ Basic Bootstrap Table -->
      </div>


@endsection
