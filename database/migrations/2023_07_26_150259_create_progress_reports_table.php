<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('progress_reports', function (Blueprint $table) {
      $table->id();
      $table->foreignId("client_id")->constrained('clients');
      $table->date('date');
      $table->string('weight');
      $table->string('waist');
      $table->string('thigh');
      $table->string('leg');
      $table->string('arm');
      $table->string('bust');
      $table->foreignId("created_by")->constrained('users');
      $table->foreignId("updated_by")->nullable()->constrained('users');
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
    Schema::dropIfExists('progress_reports');
  }
};
