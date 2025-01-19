<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use MattYeend\QueueMonitoring\Models\QueueStats;

class QueueStatsTest extends TestCase
{
    use RefreshDatabase;

    public function test_queue_stats_can_be_created()
    {
        // Arrange: Create a queue stat
        $stat = QueueStats::create([
            'queue' => 'default',
            'processed' => 10,
            'failed' => 2,
            'average_time' => 100.5,
        ]);

        // Assert
        $this->assertDatabaseHas('queue_stats', [
            'queue' => 'default',
            'processed' => 10,
            'failed' => 2,
            'average_time' => 100.5,
        ]);
    }

    public function test_queue_stats_default_values()
    {
        // Arrange: Create a queue stat with minimal data
        $stat = QueueStats::create([
            'queue' => 'default',
        ]);

        // Assert: Check default values
        $this->assertEquals(0, $stat->processed);
        $this->assertEquals(0, $stat->failed);
        $this->assertEquals(0.0, $stat->average_time);
    }
}
