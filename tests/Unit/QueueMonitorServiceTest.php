<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use MattYeend\QueueMonitoring\Models\QueueStats;
use MattYeend\QueueMonitoring\Services\QueueMonitorService;

class QueueMonitorServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_queue_stats_returns_all_stats()
    {
        // Arrange: Create dummy data
        QueueStats::factory()->count(3)->create();

        $service = new QueueMonitorService();

        // Act: Retrieve stats
        $stats = $service->getQueueStats();

        // Assert
        $this->assertCount(3, $stats);
    }

    public function test_update_queue_status_updates_existing_stat()
    {
        // Arrange: Create a queue stat
        $stat = QueueStats::factory()->create([
            'queue' => 'default',
            'processed' => 5,
            'failed' => 1,
            'average_time' => 100,
        ]);

        $service = new QueueMonitorService();

        // Act: Update the queue status
        $service->updateQueueStatus('default', 200, false);

        // Assert
        $stat->refresh();
        $this->assertEquals(6, $stat->processed);
        $this->assertEquals(1, $stat->failed);
        $this->assertEquals(120, $stat->average_time); // New average time
    }

    public function test_update_queue_status_creates_new_stat_if_not_exists()
    {
        $service = new QueueMonitorService();

        // Act: Update the queue status for a non-existing queue
        $service->updateQueueStatus('new-queue', 150, false);

        // Assert
        $stat = QueueStats::where('queue', 'new-queue')->first();
        $this->assertNotNull($stat);
        $this->assertEquals(1, $stat->processed);
        $this->assertEquals(0, $stat->failed);
        $this->assertEquals(150, $stat->average_time);
    }
}
