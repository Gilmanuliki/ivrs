<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddIncomesTable extends Migration
{
    public function up()
    {
        Schema::table('add_incomes', function (Blueprint $table) {
            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id', 'station_fk_9218866')->references('id')->on('stations');
            $table->unsignedBigInteger('source_type_id')->nullable();
            $table->foreign('source_type_id', 'source_type_fk_9167949')->references('id')->on('sources');
        });
    }
}
