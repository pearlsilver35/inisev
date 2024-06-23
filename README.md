# Subscription Platform
## Note
   
Subscription emails are logged and can be viewed using `cat storage/logs/laravel.log` .

env-example includes all necessary configurations.

When an email is sent to subscribe post endpoint, a user is created if they don't already exist with that email. Therefore, no user creation endpoint or registration is required, following the anonymous, no-authentication request as per the instructions.

Emails can be configured according to any other preferred setup.

PHP 8.0.22 
Laravel Framework 9.52.16

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/pearlsilver35/inisev.git

   ```

2. **Docker setup:**
Setup Docker Compose and run the following command within the project folder:
   ```bash
   docker-compose up -d
   ```

3. **Code setup**
The Laravel project starts automatically within Docker Compose. 
After it's up and running, execute the following command to migrate the database and seed it:       

    ```bash
    docker-compose exec app php artisan migrate --seed
    ```
4. **Testing**
Postman is included in the root folder. 
Import the collection and update the base URL to match your local environment. 
Additionally, to run the queue, execute the following commands in separate terminals:

    ```bash
    docker-compose exec app php artisan queue:work
    docker-compose exec app php artisan posts:notify
    ```
