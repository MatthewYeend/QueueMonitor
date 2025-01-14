<?php

namespace MattYeend\QueueMonitor\Http\Controllers;

use MattYeend\QueueMonitor\Services\QueueMonitorService;

class QueueMonitorController extends Controller
{
    protected $service;

    /**
     * Inject the QueueMonitorService.
     * 
     * @param QueueMonitorService $service
     */
    public function __construct(QueueMonitorService $service)
    {
        $this->service = $service;
    }

    /**
     * Display the queue monitoring dashboard.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stats = $this->service->getQueueStats();
        return view('queue-monitor::dashboard', compact('stats'));
    }
}