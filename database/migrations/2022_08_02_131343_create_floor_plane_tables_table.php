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
        Schema::create('floor_plane_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_plane_id');
            $table->unsignedBigInteger('number');
            $table->unsignedBigInteger('count');
            $table->string('location')->nullable();
            $table->tinyInteger('free')->nullable();
            $table->timestamps();

            $table->foreign('floor_plane_id')
            ->references('id')
            ->on('floor_planes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floor_plane_tables');
    }
};
