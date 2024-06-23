# Subscription Platform

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
        docker-compose exec subscription-platform php artisan migrate --seed
    ```
4. **Testing**
Postman is included in the root folder. 
Import the collection and update the base URL to match your local environment. 
Additionally, to run the queue, execute the following commands in separate terminals:

    ```bash
        docker-compose exec subscription-platform php artisan queue:work
        docker-compose exec subscription-platform php artisan posts:notify
    ```
