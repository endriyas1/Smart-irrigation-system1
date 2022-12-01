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
    <div class="bg-light p-4 rounded">
        <h1>Add new plant</h1>
        <div class="lead">
           Add plants to make the device use those settings
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{route('plants.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Plant Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="eg. Potato"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="temperature" class="form-label">Optimal Temperature</label>
                    <input value="{{ old('temperature') }}" type="number" min="0" max="100" class="form-control" name="temperature"
                        placeholder="temperature " required>
                    @if ($errors->has('temperature'))
                        <span class="text-danger text-left">{{ $errors->first('temperature') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                  <label for="humidity" class="form-label">Humidity</label>
                  <input value="{{ old('humidity') }}" type="number" min="0" max="100"class="form-control" name="humidity"
                      placeholder="humidity" required>
                  @if ($errors->has('humidity'))
                      <span class="text-danger text-left">{{ $errors->first('humidity') }}</span>
                  @endif
              </div>

              <div class="mb-3">
                <label for="soilMoisture" class="form-label">Soil Moisture</label>
                <input value="{{ old('soilMoisture') }}" type="number" min="0" max="100" class="form-control" name="soilMoisture"
                    placeholder="Soil Moisture" required>
                @if ($errors->has('soilMoisture'))
                    <span class="text-danger text-left">{{ $errors->first('soilMoisture') }}</span>
                @endif
            </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('plants.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
