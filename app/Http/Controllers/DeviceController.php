<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Response;

class DeviceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $devices = auth()->user()->devices()->get();
    if (auth()->user()->hasRole('admin')) {
      $devices = Device::paginate(10);
    }
    return view('device.index', compact('devices'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $plants = Plant::all();
    return view('device.create', compact('plants'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    // dd($request);
    $this->validate($request, [
      'name' => "required",
      'server_name' => "required|max:255",

    ]);

    $device = $request->user()->devices()->create([
      'id' => Str::uuid(),
      'name' => $request->name,
      'server_name' => $request->server_name,
      // 'plant_id'=>$request->plant
    ]);

    $plant = Plant::find($request->plant);
    // $plant->device()->attach($device);
    $device->plants()->attach($plant);
    $setting = $device->setting()->create([
      'id' => Str::uuid(),
      'moisture_threshold' => $plant->soilMoisture,
      'temperature_threshold' => $plant->temperature,
      'humidity_threshold' => $plant->humidity
    ]);
    $senor = $device->sensors()->create([
      'id' => Str::uuid()
    ]);
    return redirect()->route('devices.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Device  $device
   * @return \Illuminate\Http\Response
   */
  public function show(Device $device)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Device  $device
   * @return \Illuminate\Http\Response
   */
  public function edit(Device $device)
  {
    $plants = Plant::all();

    return view('device.edit', compact('device', 'plants'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Device  $device
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Device $device)
  {
    $device->update($request->only('name', 'server_name'));
    $device->plants()->detach();
    $device->plants()->attach(Plant::find($request->plant));
    return redirect()->route('devices.index', ['user' => auth()->user()->id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Device  $device
   * @return \Illuminate\Http\Response
   */
  public function destroy(Device $device)
  {
    $device->delete();
    return back();
  }

  public function download(Device $device)
  {
    $filename = "attachment; filename=device_data_" . now().'.csv';
    $headers = [
      'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',   'Content-type'        => 'text/csv',   'Content-Disposition' => $filename,   'Expires'             => '0',   'Pragma'              => 'public'
    ];

    $list = $device->sensors()->get()->toArray();

    # add headers for each column in the CSV download
    array_unshift($list, array_keys($list[0]));

    $callback = function () use ($list) {
      $FH = fopen('php://output', 'w');
      foreach ($list as $row) {
        fputcsv($FH, $row);
      }
      fclose($FH);
    };

    return Response::stream($callback, 200, $headers); //use Illuminate\Support\Facades\Response;

  }
}
