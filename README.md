# Installation and first start

Get project from https://github.com/fica990/boldking.git

`git clone https://github.com/fica990/boldking.git`

Edit /etc/hosts file and add (for example) boldking.local for 127.0.0.1

Create **.env** based on **.env.example**, and edit database section:

```
DB_HOST=boldking_mysql
DB_DATABASE=boldking_task_filip
DB_USERNAME=docker
DB_PASSWORD=docker
```

Start docker for the first time by running this script located in project root

`sh setup.sh`

the script will:
* install composer
* generate app key
* create a database (named **boldking_task_filip**)
* run migrations
---
### Routes (I've also provided Insomnia export with routes)

#### Tasks 1, 2

* POST /orders

#### Task 3

* PUT /customers/{id}/subscription
  
  example for data to send ```{"day_iteration":30}```

#### Task 4

* GET /customers/{id}/last-paid-order

#### Task 5

* GET /customers/multiple-paid-orders

#### Task 6

* GET /customers/subbed-with-paid-order

#### Optional - Delivery creation

* POST /orders/{id}/pay

#### Optional - deliveries csv export

* GET /deliveries/export