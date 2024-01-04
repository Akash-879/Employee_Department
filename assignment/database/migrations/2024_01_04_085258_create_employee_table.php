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
       Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->integer('salary');
        $table->unsignedBigInteger('dept_id');
        $table->string('hobbies')->nullable();
        $table->enum('gender', ['M', 'F']);
        // $table->timestamps();

        $table->foreign('dept_id')->references('id')->on('departments');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employess');
    }
};
