Análise dos Cinco Principais Vetores de Ataques Cibernéticos no Brasil

This project is a web-based platform for learning about and practicing cybersecurity attack vectors in a safe, simulated environment. It is built with Laravel 10, PostgreSQL, and runs entirely within a Docker containerized environment for easy setup and portability.
Prerequisites

Before you begin, ensure you have the following software installed on your machine:

    Docker Desktop (or Docker Engine on Linux).

All other dependencies (PHP, Nginx, PostgreSQL, Node.js) are managed by Docker and do not need to be installed on your local machine.
🚀 Step-by-Step Setup Guide

Follow these instructions carefully to get the development environment running.
1. Clone the Repository

First, clone the project to your local machine using Git.

git clone <your-repository-url>
cd <your-project-directory>

2. Configure Environment Variables

The project uses an .env file for all environment-specific configurations.

    Make a copy of the example environment file:

    cp .env.example .env

    Open the .env file and verify the database credentials. They should match the ones set in docker-compose.yml by default. No changes are typically needed.

    DB_CONNECTION=pgsql
    DB_HOST=db
    DB_PORT=5432
    DB_DATABASE=laravel
    DB_USERNAME=laravel
    DB_PASSWORD=secret

3. Build and Run the Docker Containers

This is the main command that will download the necessary images, build your custom application container, and start all the services.

    Run the up command with the -d (detached) and --build flags.

    docker-compose up -d --build

    This process might take a few minutes the first time. Once it's finished, all the services will be running in the background.

4. Install Laravel & NPM Dependencies

Now we need to run commands inside the app container to install the project's dependencies.

    Install PHP packages with Composer:

    docker-compose exec app composer install

    Install JavaScript packages with NPM:

    docker-compose exec app npm install

5. Configure Laravel Application

These commands finalize the Laravel setup inside the container.

    Generate a new application key:

    docker-compose exec app php artisan key:generate

    Run the database migrations to create tables:

    docker-compose exec app php artisan migrate

    Fix storage and cache permissions: This is a crucial step to allow the web server to write to necessary folders.

    docker-compose exec app chown -R www-data:www-data storage bootstrap/cache

    Create the public storage link:

    docker-compose exec app php artisan storage:link

6. Start the Frontend Development Server

The project uses Vite to handle frontend assets (CSS, JS). You must run the Vite development server to see the styles on the website.

    Run the Vite server:

    docker-compose exec app npm run dev

    IMPORTANT: This command will take over your current terminal window and actively watch for file changes. You must leave this terminal running while you are developing.

7. You're All Set!

Open your favorite web browser and navigate to:

http://localhost:8000

You should now see the fully styled Laravel application running.
💻 Daily Development Workflow

    To start the environment:

    docker-compose up -d

    Run the Vite dev server (in its own terminal):

    docker-compose exec app npm run dev

    To run other Artisan commands (in a new terminal):

    docker-compose exec app php artisan <your-command>

    To stop the environment:

    docker-compose down
