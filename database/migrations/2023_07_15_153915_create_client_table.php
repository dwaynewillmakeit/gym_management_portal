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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("start_date");
            $table->string("telephone");
            $table->date("dob");
            $table->string("email")->unique();
            $table->string("emergency_contact_name");
            $table->string("emergency_contact_number");
            $table->string("street");
            $table->string("town");
            $table->string("parish");
            $table->boolean("is_on_diet_plan");
            $table->string("diet_plan_description")->nullable();
            $table->string("bmi");
            $table->string("bone");
            $table->string("muscle");
            $table->string("fat");
            $table->string("water");
            $table->string("body_type");
            $table->string("workout_plan");
            $table->string("target_areas");
            $table->string("personal_training");
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
        Schema::dropIfExists('clients');
    }
};
