<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_leave_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->text('reason');
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('approved_by')->default(0);
            $table->timestamp('approved_on')->nullable();
            $table->unsignedBigInteger('rejected_by')->default(0);
            $table->timestamp('rejected_on')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_leave_requests');
    }
}
