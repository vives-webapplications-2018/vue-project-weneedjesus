# Database

**Users**

```sql
CREATE DATABASE kaffie; 
USE kaffie; 
CREATE TABLE users( 
 id int NOT NULL AUTO_INCREMENT, 
 firstname VARCHAR(64) NOT NULL, 
 lastname VARCHAR(64) NOT NULL, 
 password VARCHAR(64) NOT NULL, 
 email VARCHAR(64) NOT NULL, 
 address VARCHAR(64) NOT NULL,  
 zip INT(4) NOT NULL, 
 city VARCHAR(64) NOT NULL, 
 owner BOOLEAN, 
PRIMARY KEY (id) 
 );  

INSERT INTO users (firstname, lastname, password, email, address, zip, city, owner) VALUES 
 ('firstname1', 'lastname1', 'password1', 'email1', 'address1', 8000, 'city1', true);

SELECT * FROM users;  
```

**Products**

```sql
CREATE DATABASE kaffie; 
USE kaffie; 
CREATE TABLE products( 
 id int NOT NULL AUTO_INCREMENT, 
 name VARCHAR(64) NOT NULL, 
 price DOUBLE NOT NULL, 
 description text, 
 PRIMARY KEY (id) 
 );  

INSERT INTO products (name, price, description) VALUES 
 ('Jupiler', '2,20' , 'beer');


SELECT * FROM products;
```