# PHX Todo App

A demo todo application built for the PHX runtime, showing how to develop a simple web app using `phx`.

This project is a runtime development example for `phx` and includes authentication, todo management, and a public JSON endpoint.

PHX is designed to simplify API-first development with a built-in runtime and HTTP server, making it a strong option for API development compared to traditional PHP server setups.

Developers can use `phx` directly for development. See the PHX GitHub repository for runtime docs and examples.

## What it includes

- Login and signup flow with session-based authentication
- Todo dashboard with add, toggle complete, and delete actions
- Middleware support for CORS and auth protection
- Runtime-configured HTTP server via `HttpServer`
- MySQL backed storage with auto-migration for `users` and `todos`
- Demo API endpoint at `/api/random`

## Project structure

- `index.php` - application entrypoint and PHX server setup
- `routes/web.php` - route definitions for auth, dashboard, todos, and API
- `controllers/AuthController.php` - authentication handlers
- `controllers/TodoController.php` - todo dashboard and CRUD logic
- `config/database.php` - database connection, migration, and helper functions
- `middleware/` - CORS and auth middleware
- `views/` - HTML views for login, signup, dashboard, and layout

## Requirements

- PHX runtime installed (includes the built-in HTTP server)
- MySQL server accessible at `127.0.0.1:3306`
- Database named `todo_app`

> The current configuration uses:
> - user: `root`
> - password: `MyNewPass@123`

## PHX GitHub

Use the PHX runtime for development and runtime execution. Check the repository for installation and runtime details:

- https://github.com/vickychhetri/phx

## Running the demo

1. Ensure MySQL is running and the `todo_app` database exists.
2. Use the PHX runtime directly, or build a standalone executable.

Run directly:

```bash
phx run index.php
```

Build the app and run the generated binary:

```bash
./phx build -o todowebapp index.php
./todowebapp
```

3. Open the browser at:

```text
http://localhost:8087
```

## Routes

- `/` - redirects to `/dashboard` when authenticated or `/login`
- `/login` - login page
- `/signup` - signup page
- `/logout` - logout and clear session
- `/dashboard` - todo list and management page
- `/todos/add` - create a new todo
- `/todos/toggle/{id}` - toggle todo complete state
- `/todos/delete/{id}` - delete a todo
- `/api/random` - sample public JSON endpoint

## Performance

This demo shows PHX handling API traffic efficiently in a single-runtime setup. A benchmark run against `/api/random` produced the following results:

- Total requests: `100000`
- Concurrency: `100`
- Requests per second: `49661.78`
- Average latency: `0.0020 secs`
- 95th percentile latency: `0.0069 secs`
- 99th percentile latency: `0.0104 secs`

These numbers demonstrate raw request throughput and latency that compare favorably to many standard PHP deployments, especially when PHX is used as a built-in runtime server rather than relying on a separate web server.

<img width="1236" height="930" alt="image" src="https://github.com/user-attachments/assets/0d95f52f-8ddb-43e6-b7e3-94408bf2a92b" />


## Notes

This repository is intended as a developer demo for building applications on the PHX runtime. It demonstrates runtime app composition and a simple MVC-style structure without a full framework.
