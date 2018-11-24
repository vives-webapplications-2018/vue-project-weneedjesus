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
 
 CREATE TABLE products( 
 id int NOT NULL AUTO_INCREMENT, 
 name VARCHAR(64) NOT NULL, 
 price DOUBLE NOT NULL, 
 quantity INT NOT NULL,
 description text, 
 PRIMARY KEY (id) 
 );
