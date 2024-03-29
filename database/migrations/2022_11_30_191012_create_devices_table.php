<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('devices', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignUuid('plant_id')->nullable();
      $table->string('name');
      $table->string('server_name');
      $table->float('moisture')->default(0);
      $table->float('temperature')->default(0);
      $table->float('humidity')->default(0);
      $table->float('water_level')->default(0);
      $table->enum('motor_status', ['opened', 'closed'])->default('closed');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('devices');
  }
};
