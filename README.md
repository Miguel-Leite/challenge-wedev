# Challenge WeDev

This is a project developed as part of a test provided by WeDev. The application is an API that allows you to manage products and orders from a virtual store. The API was built using Laravel and Docker framework with Sail. The project consists of two main entities: "products" and "orders", with a many-to-many relationship between them, realized by the "order_items" entity. Products have a name, price, status (stock availability) and a relationship to the seller (merchant). Orders have a status, a total amount and a list of products, represented by the "order_items" entity.

# Installation

```bash

# clone this project 
git clone https://github.com/Miguel-Leite/challenge-wedev.git

# access
cd challenge-wedev

# install dependencies
composer install

# generating the docker image

# for ubuntu operating system
sudo docker composer up -d

# for windows operating system
docker-composer up -d

# running the migrations
php artisan migrate

# api is running on port -> 8081
# http://localhost:8081/

```

# Endpoints

### Users

- [x] `GET /api/me`: returns the logged in user information
- [x] `POST /api/login`: Authentication
- [x] `GET /api/Logout`: Session termination
### Users

- [x] `GET /api/users`: Returns all registered users.
- [x] `POST /api/users`: Register a new user.
- [x] `GET /api/users/{id}`: Returns a specific user.
- [x] `PUT /api/users/{id}`: Updates information for an existing user.
- [x] `DELETE /api/users/{id}`: Delete a user.

### Merchants

- [x] `GET /api/merchants`: Returns all registered requests.
- [x] `POST /api/merchants`: Register a new merchant.
- [x] `GET /api/merchants/{id}`: Returns a specific order.
- [x] `PUT /api/merchants/{id}`: Updates information for an existing order.
- [x] `DELETE /api/merchants/{id}`: Delete an merchant.


### Products

- [x] `GET /api/products`: Returns all registered products.
- [x] `POST /api/products`: Register a new product.
- [x] `GET /api/products/{id}`: Returns a specific product.
- [x] `/api/products/{id}`: Updates information for an existing product.
- [x] `DELETE /api/products/{id}`: Delete a product.

### Orders

- [x] `GET /api/orders`: Returns all registered requests.
- [x] `POST /api/orders`: Register a new order.
- [x] `GET /api/orders/{id}`: Returns a specific order.
- [x] `PUT /api/orders/{id}`: Updates information for an existing order.
- [x] `DELETE /api/orders/{id}`: Delete an order.

# Tests

To run the tests, run the following command: 

```bash
  php artisan test 
```

# Technologies

- Laravel 10.x
- PostgreSQL
- PHPUnit




