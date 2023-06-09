# FlashcardApp

## MVC Structure

```
FlashcardApp
├───config
├───controllers
├───models
├───public
│   └───css
├───scss
└───views
```

___

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

___

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

```sql
ALTER TABLE flashcards ADD COLUMN seen BOOLEAN DEFAULT FALSE;
```

___

## Set Up SCSS

### Download and Install

Download [Node.js](https://nodejs.org/)

```
npm init -y
```

```
npm install gulp gulp-sass --save-dev
```

```
npm install sass
```

### Transpiling SCSS to CSS

```
gulp
```

___

## Working with git

```
git clone https://github.com/filipwroblewski/FlashcardApp.git
```
```
git switch develop
```

### Adding New Feature

Adding new feature branch based on develop branch
```
git checkout -b feature/feature-name develop
```

You can make changes (also you can repeat 1, 2, 3)
  1.  ```
      git add .
      ```
  2.  ```
      git commit -m "Implement feature-name"
      ```
  3.  ```
      git push origin feature/feature-name
      ```

When you are done with feature. 
```
git checkout develop
```
```
git merge --no-ff feature/feature-name
```
```
git push origin develop
```

Now you can start from Adding New Feature

### Adding Something to feature/existing-feature-brnach

```
git checkout feature/existing-feature-brnach
```
```
git merge develop
```
You can make changes (also you can repeat 1, 2, 3, 4)
  1.  ```
      git add .
      ```
  2.  ```
      git commit -m "Implement feature-name"
      ```
  3.  ```
      git push origin feature/existing-feature-brnach
      ```

When you are done with feature. 
```
git checkout develop
```
```
git merge --no-ff feature/feature-name
```
```
git push origin develop
```