<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EntriesActorsRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries_actors', function (Blueprint $table) {
            $table->foreign('entry_id')->references('id')->on('entries');
            $table->foreign('actor_id')->references('id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
