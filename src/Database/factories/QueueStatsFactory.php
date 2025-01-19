<?php

namespace MattYeend\QueueMonitoring\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use MattYeend\QueueMonitoring\Models\QueueStats;

class QueueStatsFactory extends Factory
{
    protected $model = QueueStats::class;

    public function definition()
    {
        return [
            'queue' => $this->faker->word,
            'processed' => $this->faker->numberBetween(0, 100),
            'failed' => $this->faker->numberBetween(0, 50),
            'average_time' => $this->faker->randomFloat(2, 0, 500),
        ];
    }
}
