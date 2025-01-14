<?php

use Illuminate\Support\Facades\Route;
use MattYeend\QueueMonitor\Http\Controllers\QueueMonitorController;

Route::middleware('web')->group(function() {
    Route::get(config('queue-monitor.dashboard_route'), [QueueMonitorController::class, 'index']);
});