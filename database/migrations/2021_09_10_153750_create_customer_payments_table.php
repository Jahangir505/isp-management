<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->string('month');
            $table->string('year');
            $table->date('date');
            $table->double('total_price', 18, 2);
            $table->double('paid_amount', 18, 2);
            $table->double('due_amount', 18, 2);
            $table->timestamps();
            $table->unique(['customer_id', 'month', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_payments');
    }
}
