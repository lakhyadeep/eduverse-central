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
        Schema::table('student_details', function (Blueprint $table) {
            //
            $table->bigInteger('alternate_mobile')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->string('caste')->nullable();
            $table->string('identification_mark')->nullable();
            $table->string('religion')->nullable();
            $table->date('date_of_admission')->nullable();
            $table->string('last_exam_result', 100)->nullable();
            $table->boolean('differently_abled')->default(0);
            $table->text('differently_abled_specification')->nullable();

            $table->boolean('transferred_from_other_school')->default(0);
            $table->text('previous_school_details')->nullable();
            $table->string('board_of_affiliation')->nullable();
            $table->string('student_previous_medium')->nullable();
            $table->text('academic_qualification')->nullable();


            $table->string('fathers_fname')->nullable();
            $table->string('fathers_mname')->nullable();
            $table->string('fathers_lname')->nullable();
            $table->string('mothers_fname')->nullable();
            $table->string('mothers_mname')->nullable();
            $table->string('mothers_lname')->nullable();

            $table->boolean('fm_is_guardian')->default(1);
            $table->string('guardians_fname')->nullable();
            $table->string('guardians_mname')->nullable();
            $table->string('guardians_lname')->nullable();
            $table->string('academic_year', 100)->nullable();
            $table->unsignedBigInteger('mother_tongue_id');


            $table->string('lac',100)->nullable();
            $table->string('hpc',100)->nullable();
            $table->string('block', 100)->nullable();
            $table->string('cluster', 100)->nullable();
            $table->string('habiation', 100)->nullable();

            $table->foreign('mother_tongue_id')->references('id')->on('mother_tongue_master')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_details', function (Blueprint $table) {
            //
        });
    }
};
