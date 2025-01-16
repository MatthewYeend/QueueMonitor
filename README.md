# Queue Monitor

A Laravel package for real-time monitoring of queues with stats on processing time, failed jobs, and retry status.

--- 

## Features
- Real-time queue monitoring.
- Detailed stats on processing time and retries.
- Notifications for failed jobs.

--- 

## Installation
1. Require the package via Composer
    ```bash
    composer require MattYeend/queue-monitor
    ```
2. Publish the configuration, views, and migrations: 
    ```bash
    php artisan vendor:publish --provider="MattYeend\QueueMonitoring\QueueMonitoringServiceProvider"
    ```
3. Run the migrations to create the necessary database table:
    ```bash
    php artisan migrate
    ```
4. Access the dashboard at `/queue-monitor` (or a custom route if configured)

---

## Configuration
### `.env` File
To configure email notifications for failed jobs, add the following line to your `.env` file:
```ini
QUEUE_MONITOR_NOTIFICATION_EMAIL=devops@yourcompany.com
```
This will be used to send notifications for failed jobs. If not set, it will default to `admin@example.com`.
### Custom Dashboard Route
To change the default URL route, modify the `config/queue-monitor.php` file. For example
```php
'dashboard_route' => '/admin/queue-status',
```

---

## License
This package is licensed under the MIT License.

---

## Contributing
Feel free to fork the repository and submit pull requests for improvements or new features!
