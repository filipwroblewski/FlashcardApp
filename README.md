# FlashcardApp

## MVC Structure

```
FlashcardApp
├───config
├───controllers
├───models
├───public
└───views
```

## Set Up Database

### Create database

```sql
CREATE DATABASE flashcards CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
```

### Create tables `flashcards`, `categories`

```sql
CREATE TABLE flashcards (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  id_category INT,
  favourite BOOLEAN
);

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

```

### Database connection

Adjust file content to youre database host, name, user and password. 

config/database.php

```php
<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'flashcards');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
```

## Example flashcards data

```sql
INSERT INTO flashcards (name, description, id_category, favourite)
VALUES ('Co wydarzyło się w 1410 r.', 'Bitwa pod Grunwaldem', 1, FALSE);

INSERT INTO flashcards (name, description, id_category, favourite)
VALUES ('Co wydarzyło się w 1 września 1939 r.', 'Wybuch II wojny światowej', 1, FALSE);

INSERT INTO flashcards (name, description, id_category, favourite)
VALUES ('Co wydarzyło się w 1492 r.', 'Odkrycie Ameryki przez Krzysztofa Kolumba', 1, TRUE);

INSERT INTO flashcards (name, description, id_category, favourite)
VALUES ('Adam Mickiewicz', 'Urodził się na Litwie, napisał "Dziady" i "Pana Tadeusza"', 2, TRUE);

INSERT INTO categories (id, name)
VALUES (1, 'Wydarzenia historyczne');

INSERT INTO categories (id, name)
VALUES (2, 'Znane osoby');
```