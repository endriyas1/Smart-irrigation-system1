@extends('layouts/contentNavbarLayout')

@section('title', 'Add Device')
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

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Devices/</span> Add</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update Device</h5> <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form name="deviceAddForm" method="POST"
                        action="{{ route('devices.update', ['device' => $device->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Device Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Device 1" value="{{ old('name', $device->name) }} " />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="server_name">Device location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="server_name" name="server_name"
                                    placeholder="Device location" value="{{ old('server_name', $device->server_name) }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="plant" class="col-sm-2 col-form-label">Which Plant?</label>
                            <div class="col-sm-10">

                                <select class="form-control" name="plant" required>
                                    <option value="">Select Plant</option>
                                    @foreach ($plants as $plant)
                                        <option value="{{ $plant->id }}"
                                            {{ $plant->name ==$device->plants()->get()->first()->name? 'selected': '' }}>
                                            {{ $plant->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('plant'))
                                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('devices.index') }}" class="btn btn-default">Cancel</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>

    </div>


@endsection
