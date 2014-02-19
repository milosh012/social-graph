# Social Graph

The purpose of this task is to create a method of examining a social network.
You are given data (data.json) representing a group of people, in the form of a social graph.
Each person listed has one or more connections within the group.

Come up with a data structure to store and query the information found in the JSON file.

You should then create a public API in the language of your choice which allows for
three basic operations to be executed for a certain person:

- **Direct friends**: Return those people who are directly connected to the chosen person.
- **Friends of friends**: Return those who are two steps away, but not directly connected to the chosen person.
- **Suggested friends**: Return people in the group who know 2 or more direct friends of the chosen person, but are not directly connected to her.

Your API can be exposed as public functions, a REST-endpoint, a command line interface,
whatever fits the choice of your technology stack best.

## Table of contents

- [Requirements](#requirements)
    - [Dev Requirements](#dev-requirements)
- [Installation](#installation)
- [Running application](#running-application)
- [Insepecting API from console](#insepecting-api-from-console)
- [Running tests](#running-tests)
    - [Unit tests](#unit-tests)
    - [Integration tests](#integration-tests)
- [Additional notes](#additional-notes)

## Requirements

- PHP >= 5.4
- MCrypt PHP Extension
- MySQL
- Composer globally installed
- Bower globally installed

### Dev Requirements

- PHPUnit

## Installation

1. Clone repo with ```git clone git@github.com:milosh012/social-graph.git```
2. Install PHP deps with (from the root of the project) ```composer install```
3. Install JS deps with ```bower install```
4. Create DB in MySQL with name "socialgraph"
5. Setup mysql configuration in ```app/config/database.php``` (host, username, password, db... 57 - 60 lines)
6. Run migrations ```php artisan migrate```
7. Seed DB with fixtures ```php artisan db:seed```

## Running application

Open console and from the root of the project run small server with
```php artisan serve``` and go to [http://localhost:8000](http://localhost:8000)

## Insepecting API from console

After running application server, you can send API requests with CURL:

- Get all users (GET: /users)

```
curl 'http://localhost:8000/users' -H 'Pragma: no-cache' -H 'Accept: application/json, text/plain, */*'
```

- Get user friends (GET /users/{id}/friends)

```
curl 'http://localhost:8000/users/1/friends' -H 'Pragma: no-cache' -H 'Accept: application/json, text/plain, */*'
```

- Get user friends of friends (GET /users/{id}/friends-of-friends)

```
curl 'http://localhost:8000/users/1/friends-of-friends' -H 'Pragma: no-cache' -H 'Accept: application/json, text/plain, */*'
```

- Get suggested friends (GET /users/{id}/suggested-friends)

```
curl 'http://localhost:8000/users/16/suggested-friends' -H 'Pragma: no-cache' -H 'Accept: application/json, text/plain, */*'
```

## Running tests

To run all tests you will need to have PHPUnit installed.
Navigate to the root of the project and then run ```phpunit```

### Unit tests

To run only unit tests you need to specify group: ```phpunit --group=unit```

### Integration tests

To run only integration tests you need to specify group: ```phpunit --group=integration```

## Additional notes

This is just a development setup and environment. If we want to deploy this on production then we must do some additional steps:

1. Combine and minimize all CSS files
2. Combine and minimize all JS files (maybe we can have 2 files - one for external libs and one for application itself)
3. Put revision number into CSS and JS files names to prevent browser caching on new deploy

For all above tasks I usually use [Gulp](http://gulpjs.com/) tool.

Also, I think that the best type of DB for this kind of application is **Graph DB** (for example [Neo4j](http://www.neo4j.org/)).
I didn't implemented here Neo4j because I never used this in real life (just reading about it).

But with a current project structure it is very easy to change Repository provider to use Neo4j.
In ```app/routes.php``` file we need to change just 2 lines

```
App::bind('Repositories\FriendRepositoryInterface', 'Repositories\EloquentFriendRepository');
App::bind('Repositories\UserRepositoryInterface', 'Repositories\EloquentUserRepository');
```

to become

```
App::bind('Repositories\FriendRepositoryInterface', 'Repositories\Neo4jFriendRepository');
App::bind('Repositories\UserRepositoryInterface', 'Repositories\Neo4jUserRepository');
```

And of course to create that 2 classes and write unit tests for them.
