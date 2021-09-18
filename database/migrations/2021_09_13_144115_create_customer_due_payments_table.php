<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDuePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_due_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->date('date');
            $table->double('prev_due', 18, 2);
            $table->double('paid_amount', 18, 2);
            $table->double('after_pay_due',18, 2);
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
        Schema::dropIfExists('customer_due_payments');
    }
}
