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

./vendor/bin/sail up -d  
# or
sudo ./vendor/bin/sail up -d 

# migration
sudo ./vendor/bin/sail artisan migrate

# api is running on port -> 8000
# http://localhost:8000/

```

# Endpoints

### Users

- [ ] `GET /api/users`: Returns all registered users.
- [ ] `POST /api/users`: Register a new user.
- [ ] `GET /api/users/{id}`: Returns a specific user.
- [ ] `PUT /api/users/{id}`: Updates information for an existing user.
- [ ] `DELETE /api/users/{id}`: Delete a user.

### Products

- [ ] `GET /api/products`: Returns all registered products.
- [ ] `POST /api/products`: Register a new product.
- [ ] `GET /api/products/{id}`: Returns a specific product.
- [ ] `/api/products/{id}`: Updates information for an existing product.
- [ ] `DELETE /api/products/{id}`: Delete a product.

### Orders

- [ ] `GET /api/orders`: Returns all registered requests.
- [ ] `POST /api/orders`: Register a new order.
- [ ] `GET /api/orders/{id}`: Returns a specific order.
- [ ] `PUT /api/orders/{id}`: Updates information for an existing order.
- [ ] `DELETE /api/orders/{id}`: Delete an order.

# Tests

To run the tests, run the following command: 

```bash
  php artisan test 
```

# Technologies

- Laravel 10.x
- PostgreSQL
- PHPUnit




