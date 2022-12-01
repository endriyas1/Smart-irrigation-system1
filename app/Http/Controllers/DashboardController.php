<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use App\Models\Plant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function index()
  {
    if (auth()->user()->hasRole('admin')) {
      $total_devices = Device::count();
      $total_users = User::count();
      $total_plants = Plant::count();

      return view(
        'admin_dashboard',
        [
          'dashboard_data' => [
            [
              'total' => $total_devices,
              'title' => "Total Device",
              'link' => "devices",
              'icon' => 'devices',
              'color' => 'green'
            ],
            [
              'total' => $total_users,
              'title' => "Total Users",
              'link' => "users",
              'icon' => 'user-plus',
              'color' => 'yellow'

            ],
            [
              'total' => $total_plants,
              'title' => "Total Plants",
              'link' => "plants",
              'icon' => 'product-hunt',
              'color' => 'pink'

            ],
          ]
        ]
      );
    }
    $devices = auth()->user()->devices()->paginate(1);
    $devices2 = json_encode($devices);
    return view('home', compact('devices', 'devices2'));
  }
  //
}
