<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalsTable extends Migration
{
    public function up()
    {
        Schema::create('totals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total');
            $table->string('category');
            $table->string('nationality');
            $table->string('gender');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
