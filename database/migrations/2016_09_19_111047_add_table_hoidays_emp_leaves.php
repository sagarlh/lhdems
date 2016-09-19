<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableHoidaysEmpLeaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);            
            $table->date('start_date');
            $table->date('end_date');
            $table->sting('description', 100);

            $table->timestamps();
        });

        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->string('emp_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('leave_type', 3);
            $table->string('status', 1);
            $table->string('description', 200);

            $table->timestamps();

            $table->foreign('emp_id')
                ->references('emp_id')
                ->on('users')
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
        Schema::drop('holidays');
        Schema::drop('employee_leaves');
    }
}
