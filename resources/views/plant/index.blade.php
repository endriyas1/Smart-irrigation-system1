@extends('layouts/contentNavbarLayout')

@section('title', 'plants')
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
            <span class="text-muted fw-light">Registered /</span> Plants
            @can('plants.create')
                <a href="{{ route('plants.create') }}" class="btn btn-primary float-end">Add <i class="bx bx-plus"></i></a>
            @endcan
        </h4>
    </div>

    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>
    @if ($plants->count() > 0)
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Your plants</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Moisture</th>
                            <th>Temperature</th>
                            <th>Humidity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($plants as $plant)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $plant->name }}</strong>
                                </td>
                                <td>{{ $plant->soilMoisture }}</td>
                                <td>{{ $plant->temperature }}</td>
                                <td>{{ $plant->humidity }}</td>
                                <td>
                                    @can('plants.show')
                                    <td><a href="{{ route('plants.show', $plant->id) }}" class="btn btn-warning btn-sm">Show</a>
                                    </td>
                                @endcan
                                @can('plants.edit')
                                    <td><a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                @endcan
                                @can('plants.destroy')
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['plants.destroy', $plant->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                @endcan
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
                <h2 class="mb-2 mx-2">No plants added yet!</h2>
                <p class="mb-4 mx-2">
                    Please add your plants to start your smart plants </p>
                <a href="{{ route('plants.create') }}" class="btn btn-primary">Add plant <i class="bx bx-plus"></i></a>
                <div class="mt-4">
                    <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png') }}"
                        alt="girl-doing-yoga-light" width="500" class="img-fluid">
                </div>
            </div>
        </div>
    @endif


@endsection
