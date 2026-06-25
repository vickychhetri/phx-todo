<?php
// index.php
// Production-Ready PHX Todo Application Entrypoint

$server = new HttpServer();

// 1. Configure production-ready server settings
$server->configure([
    'environment' => 'production',
    'workers' => 8,
    'max_connections' => 10000,
    'keep_alive' => 60,
    'rate_limit' => 5000
]);

// 2. Include project files (ordered by dependencies)
// NOTE: If running or copying this project to another location,
// make sure the directory prefix below matches your execution path.
include "config/database.php";
include "middleware/CORSMiddleware.php";
include "middleware/AuthMiddleware.php";
include "views/layout.php";
include "views/login.php";
include "views/signup.php";
include "views/dashboard.php";
include "controllers/AuthController.php";
include "controllers/TodoController.php";

// 3. Register global middlewares in sequence
$server->use("CORSMiddleware");
$server->use("AuthMiddleware");

// 4. Configure database connection pools
$server->database([
    'default' => [
        'driver' => 'mysql',
        'host' => '127.0.0.1:3306',
        'database' => 'todo_app',
        'user' => 'root',
        'password' => 'MyNewPass@123',
        'pool_size' => 15
    ]
]);

// 5. Load and mount application routes
include "routes/web.php";

// 6. Start the server
echo "PHX Todo App starting at http://localhost:8087...\n";
$server->listen(8087);
?>
