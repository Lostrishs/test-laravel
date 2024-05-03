# Laravel test app

## Installation

1. Set up `.env` file copying it from `env.dist`.
2. Run `docker-compose up -d` to build and run the initial version of the project.
3. Open `http://localhost/` in your browser to check the webserver is working now.
4. Run `php artisan db:seed` to fill the DB with data.


## Routes available
### User
To every user nested articles are attached
1. `GET http://localhost/api/v1/users` - list view
2. `GET http://localhost/api/v1/users/{id}` - view by ID

### Articles
1. `GET http://localhost/api/v1/articles` - list view
2. `GET http://localhost/api/v1/articles/{id}` - view by ID
3. `POST http://localhost/api/v1/articles` - add article
4. `PUT http://localhost/api/v1/articles/{id}` - update by ID
5. `DELETE http://localhost/api/v1/articles/{id}` - delete by ID
