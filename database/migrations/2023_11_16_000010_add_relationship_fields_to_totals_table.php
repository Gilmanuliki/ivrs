<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTotalsTable extends Migration
{
    public function up()
    {
        Schema::table('totals', function (Blueprint $table) {
            $table->unsignedBigInteger('station_id')->nullable();
            $table->foreign('station_id', 'station_fk_9167599')->references('id')->on('stations');
        });
    }
}
