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
    Schema::table('users', function (Blueprint $table) {

      $table->boolean('is_active')->default(true)->after('remember_token');
      $table->foreignId("created_by")->nullable()->constrained('users');
      $table->foreignId("updated_by")->nullable()->constrained('users');

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {

      $table->dropForeign(['created_by']);
      $table->dropForeign(['updated_by']);
      $table->dropColumn(['is_active', 'created_by', 'updated_by']);

    });
  }
};
