# Technologies
- Back-end (Lumen PHP Framework v8.3.1)
- Front-end (Vue.js v3.2.13)
- DB (Postgres v13)
- PHP

# Clone project

$ git clone 

# How to run the services through docker containers
Steps to run the services through docker containers

## Dependencies:
- Docker v20.10.11
- Docker-compose v1.29.2
- Composer v2.0.2

### Back-end setup

back-end$ mv .env.example back-end
back-end$ composer install

### Front-end setup

front-end$ cd /front-end
front-end$ yarn OR npm install

### Docker services setup

### Build docker service images
$ docker-compose build

### Create db service data volume
$ docker volume create --name=eae-data

### Up services
$ docker-compose up (or docker-compose up -d to run in daemon mode)

### Run back-end service migrations
$ docker exec -it eae-technical-test_api_1 php artisan migrate

### Run back-end service seeds
$ docker exec -it eae-technical-test_api_1 php artisan db:seed

### Run back-end unit test
$ docker exec -it eae-technical-test_api_1 php ./vendor/phpunit/phpunit/phpunit

# How to run the services locally
Steps to run the services locally

## Dependencies:
- Npm v6.14.13
- Node v14.17.0 - Obs: you can to use nvm to control it (:
- Composer v2.0.2
- PHP (7.4v / 7.3v)
- Postgres v13

### Back-end setup
back-end$ mv .env.example .env
back-end$ composer install
back-end$ php -S 0.0.0.0:5001 public/index.php

### Front-end setup
front-end$ cd /front-end
front-end$ yarn OR npm install
front-end$ npm run serve -- --port 5003

# Check available service addresses
-- Back-end service available in: http://localhost:5001
-- DB service available in: http://localhost:5002
-- Front-end service available in: http://localhost:5003

# Back-end endpoints:
- GET http://localhost:5001 (API Version)
- GET http://localhost:5001/v1/jobs (Get Jobs)