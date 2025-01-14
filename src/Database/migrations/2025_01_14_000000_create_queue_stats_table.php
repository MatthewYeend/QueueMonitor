<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueStatsTable extends Migration
{
    public function up()
    {
        Schema::create('queue_stats', function (Blueprint $table) {
            $table->id();
            $table->string('queue');
            $table->unsignedInteger('processed')->default(0);
            $table->unsignedInteger('failed')->default(0);
            $table->float('average_time')->default(0.0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('queue_stats');
    }
}
