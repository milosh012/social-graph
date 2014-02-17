## Social Graph

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

### Requirements

- PHP >= 5.3.7
- MCrypt PHP Extension
- MySQL

#### Dev Requirements

- PHPUnit

### Installation

1. Clone repo with ```git clone git@github.com:milosh012/social-graph.git```
2. Create DB in MySQL with name "socialgraph"
3. Setup mysql configuration ```app/config/database.php``` (host, username, password, db... 57 - 60 lines)
4. Run migrations ```php artisan migrate```
5. Seed DB with fixtures ```php artisan db:seed```

### Running app

From the root of the project run small server ```php artisan serve``` and go to [http://localhost:8000](http://localhost:8000)
