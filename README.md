## Installation
1. Clone the project:
    ```bash 
    git clone git@github.com:Smolinsky/book-parser.git
    ```
2. Go to project dir: ``cd <project_dir>``

3. Copy .env file from .env.example: ``cp .env.example .env``
4. Run docker containers: ``docker-compose up -d``
5. Go into docker container:
    ```bash 
    docker-compose exec -u sail app bash
    ```
6. Under the docker container run following commands:
    ```bash
    composer install
    php artisan migrate
    ```
7. To parse data in database use
   ```bash
   php artisan parse:books
   ```
8. Open in browser http://localhost:8000 or 8080.
9. Open in browser Swagger doc http://localhost:8080/specification.
10. In root folder has Parser.postman_collection.json file to Postman collection endpoints
   
