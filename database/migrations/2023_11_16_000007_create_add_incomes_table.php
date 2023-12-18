<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddIncomesTable extends Migration
{
    public function up()
    {
        Schema::create('add_incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->string('income_type');
            $table->string('payment_type');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
