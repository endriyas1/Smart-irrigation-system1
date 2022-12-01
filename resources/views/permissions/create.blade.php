@extends('layouts/contentNavbarLayout')

@section('title', 'Add Plant')
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

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Plant/</span> Add</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Plant</h5> <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form name="deviceAddForm" method="POST" action="{{ route('plants.store') }}">
                      @csrf
                      <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="name">Plant Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="eg. Potato" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="server_name">Optimal Temperature</label>
                            <div class="col-sm-9">
                                <input type="number" min="0" max="100" class="form-control" id="temperature" name="temperature"
                                    placeholder="Relative temperature" />
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-3  col-form-label" for="server_name">Humidity</label>
                          <div class="col-sm-9">
                              <input type="number"  min="0" max="100" class="form-control" id="humidity" name="humidity"
                                  placeholder="Humidity" />
                          </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="server_name">Soil Moisture</label>
                        <div class="col-sm-9">
                            <input type="number"  min="0" max="100" class="form-control" id="soil_moisture" name="soil_moisture"
                                placeholder="Soil Moisture" />
                        </div>
                    </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>

    </div>


@endsection
