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
    Schema::table('progress_reports', function (Blueprint $table) {
      $table->foreignId("deleted_by")->nullable()->constrained('users');
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('progress_reports', function (Blueprint $table) {
      $table->dropConstrainedForeignId('deleted_by');
      $table->dropColumn(['deleted_by']);
      $table->dropSoftDeletes();
    });
  }
};
