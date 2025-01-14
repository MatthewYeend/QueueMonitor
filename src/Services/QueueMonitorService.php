<?php

namespace MattYeend\QueueMonitor\Services;

use MattYeend\QueueMonitor\Models\QueueStats;

class QueueMonitorService
{
    /**
     * Get statistics for all queues.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getQueueStats()
    {
        return QueueStats::all();
    }

    /**
     * Update queue stats after job processing.
     * 
     * @param string $queue
     * @param float $processingTime
     * @param bool $failed
     * @return void
     */
    public function updateQueueStatus(string $queue, float $processingTime, bool $failed = false)
    {
        $stats = QueueStats::firstOrCreate(['queue' => $queue]);

        $stats->processing++;

        if($failed) {
            $stats->failed++;
        }

        $totalJobs = $stats->processed + $stats->failed;
        $stats->average_time = (($stats->average_time * ($totalJobs -1)) + $processingTime) / $totalJobs;

        $stats->save();
    }
}