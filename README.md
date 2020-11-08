# Docker, Laravel 8, Sqlite3, PHP 7.4, NGINX


## Docker

Open in root project ( ex: cd My/project)<br /><br />

### cd to the location where you cloned the project

cd /var/www/html/project<br /><br />

### Start the containers

```
docker-compose up -d
```
<br />
### Open the container

```
docker-compose exec laravel-php-fpm bash
```
<br />
### Install Dependencies

```
composer install
```
<br />
## Open application in browser

> GET Customers - http://localhost:8081/customers

