<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('user_ip')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('package_id');
            $table->date('join_date');
            $table->date('gender')->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Banned'])->default('Active');
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
        Schema::dropIfExists('customers');
    }
}
