<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_image')->nullable();
            $table->string('employee_name');
            $table->string('employee_email');
            $table->string('employee_phone');
            $table->integer('employee_status')->default(1)->comments("1=>active,2=>inactive,3->deleted");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
