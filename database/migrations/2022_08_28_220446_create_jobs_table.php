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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id');
            $table->string('name', 60);
            $table->string('description')->nullable();
            $table->unsignedInteger('worker_id')->nullable();
            $table->string('type_id')->nullable();
            $table->text('file')->nullable();
            $table->text('img')->nullable();
            $table->string('status')->default('To Do');
            $table->unsignedTinyInteger('position')->default(0);
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
        Schema::dropIfExists('jobs');
    }
};
