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
    <div class="float">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Registered /</span> Devices
            <a href="{{ route('devices.create') }}" class="btn btn-primary float-end">Add <i class="bx bx-plus"></i></a>
        </h4>
    </div>

    @if ($devices->count() > 0)
        <!-- Basic Bootstrap Table -->
        <div class="card ">
            <h5 class="card-header">Your Devices</h5>

            <div class=" text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Device location</th>
                            <th>Motor Status</th>
                            <th>plant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($devices as $device)
                            <tr>
                                <td><i class="menu-icon tf-icons bx bx-devices text-danger me-3"></i>
                                    <strong>{{ $device->name }}</strong>
                                </td>
                                <td>{{ $device->server_name }}</td>

                                <td><span class="badge bg-label-primary me-1">{{ $device->motor_status }}</span></td>
                                @php
                                    foreach ($device->plants as $plant) {
                                        $plant = $plant;
                                    }
                                @endphp
                                <td><span class="badge bg-label-success me-1">{{ $plant->name }}</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('devices.edit', ['user' => auth()->user()->id, 'device' => $device->id]) }}"><i
                                                    class="bx bx-edit-alt me-2"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="{{ route('settings.index', ['user' => auth()->user()->id, 'device' => $device->id, 'setting' => $device->id]) }}"><i
                                                    class="bx bx-edit me-2"></i> Setting</a>
                                            <a class="dropdown-item"
                                                href="{{ route('sensors.index', ['user' => auth()->user()->id, 'device' => $device->id]) }}"><i
                                                    class="bx bx-edit-alt me-2"></i> Show Detail
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('plants.show', ['user' => auth()->user()->id, 'plant' => $plant->id]) }}"><i
                                                    class="bx bx-edit-alt me-2"></i> Plant settings
                                            </a>
                                            <div class="dropdown-item text-danger">
                                                <form action="{{ route('devices.destroy', $device->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item text-danger" type="submit"><i
                                                            class="bx bx-trash "></i> Delete</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    @else
        <div class="container-xxl container-p-y">
            <div class="misc-wrapper">
                <h2 class="mb-2 mx-2">No Added Device yet!</h2>
                <p class="mb-4 mx-2">
                    Please add your device to start your smart devices </p>
                <a href="{{ route('devices.create') }}" class="btn btn-primary">Add Device <i class="bx bx-plus"></i></a>
                <div class="mt-4">
                    <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png') }}"
                        alt="girl-doing-yoga-light" width="500" class="img-fluid">
                </div>
            </div>
        </div>
    @endif


@endsection
