<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use MattYeend\QueueMonitoring\Models\QueueStats;

class QueueMonitorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_renders_correctly()
    {
        // Arrange: Create dummy data
        QueueStats::factory()->create([
            'queue' => 'default',
            'processed' => 10,
            'failed' => 2,
            'average_time' => 150.5,
        ]);

        // Act: Make request to dashboard route
        $response = $this->get('/queue-monitor');

        // Assert: Check response and data
        $response->assertStatus(200);
        $response->assertViewHas('stats', function ($stats){
            return $stats->first()->queue === 'default' &&
                    $stats->first()->processed === 10 &&
                    $stats->first()->failed === 2 &&
                    $stats->first()->average_time === 150.5;
        });
    }
}