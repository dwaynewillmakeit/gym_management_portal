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
    Schema::create('payment_records', function (Blueprint $table) {
      $table->id();
      $table->foreignId("client_id")->constrained('clients');
      $table->date('date_paid');
      $table->date('period_start');
      $table->date('period_end');
      $table->decimal('amount',10,2);
      $table->foreignId("created_by")->constrained('users');
      $table->foreignId("updated_by")->nullable()->constrained('users');
      $table->foreignId("deleted_by")->nullable()->constrained('users');
      $table->softDeletes();
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
    Schema::dropIfExists('payment_records');
  }
};
