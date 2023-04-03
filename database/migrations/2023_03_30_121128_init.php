<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("activities", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->time("duration");
            $table->timestamps();
        });

        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->timestamps();
        });

        Schema::create("activity_data", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->references('id')->on('users');
            $table->unsignedBigInteger("activity_id")->references('id')->on('activities');
            $table->time("point_in_time");
            $table->double("speed");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("activities");
        Schema::drop("users");
        Schema::drop('activity_data');
    }
};
