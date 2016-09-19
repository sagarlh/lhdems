<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creating table schema for the department and designation Table
        Schema::create('department', function (Blueprint $table) {
            $table->increments('department_id')->unsigned();
            $table->string('department_name');
            $table->boolean('is_billable');
            $table->timestamps();
        });

        Schema::create('designation', function (Blueprint $table) {
            $table->increments('designation_id')->unsigned();
            $table->string('designation_name');
            $table->integer('department_id')->unsigned();

            $table->foreign('department_id')
                ->references('department_id')
                ->on('department')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('user_desgnation', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('emp_id',15);
            $table->integer('designation_id')->unsigned();

            $table->foreign('emp_id')
                ->references('emp_id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('designation_id')
                ->references('designation_id')
                ->on('designation')
                ->onDelete('cascade');

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
        //droping department and designation table schema
        Schema::drop('department');
        Schema::drop('designation');
        Schema::drop('user_desgnation');
    }
}
