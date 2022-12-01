<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StorePlantRequest;

class PlantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $plants = Plant::all();
    return view('plant.index', compact('plants'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view('plant.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePlantRequest $request)
  {
    // dd($request);

    Plant::create(array_merge($request->validated(), ['id' => Str::uuid()]));
    // dd($plant);
    return redirect()->route('plants.index')
      ->withSuccess(__('Plant created successfully.'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Plant $plant)
  {
    return view('plant.show', compact('plant'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Plant $plant)
  {
    return view('plant.edit', compact('plant'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(StorePlantRequest $request, Plant $plant)
  {
    $plant->update($request->validated());
    return redirect()->route('plants.index')
      ->withSuccess(__('Plant updated successfully.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Plant $plant)
  {

    $plant->delete();

    return redirect()->route('plants.index')
      ->withSuccess(__('Plant deleted successfully.'));
  }
}
