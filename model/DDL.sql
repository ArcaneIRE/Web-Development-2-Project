DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;


CREATE TABLE
    users (
        username VARCHAR(30) NOT NULL PRIMARY KEY,
        password VARCHAR(6) NOT NULL,
        firstname VARCHAR(100) NOT NULL,
        surname VARCHAR(100),
        AddressLine1 VARCHAR(100),
        AddressLine2 VARCHAR(100),
        city VARCHAR(100),
        telephone VARCHAR(15),
        mobile VARCHAR(10)
    );

CREATE TABLE
  categories (
      id INTEGER NOT NULL PRIMARY KEY,
      title VARCHAR(50) NOT NULL
  );

CREATE TABLE
    books (
        isbn VARCHAR(13) NOT NULL PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        author VARCHAR(50) NOT NULL,
        edition integer NOT NULL,
        year SMALLINT NOT NULL,
        category_id INTEGER NOT NULL,
        reserved BOOLEAN NOT NULL,
        CONSTRAINT book_category_fk FOREIGN KEY (category_id) REFERENCES categories (id)
    );

CREATE TABLE
    reservations (
        isbn VARCHAR(13) NOT NULL,
        username VARCHAR(30) NOT NULL,
        reservation_date DATE NOT NULL,
        CONSTRAINT reservation_book_fk FOREIGN KEY (isbn) REFERENCES books (isbn),
        CONSTRAINT reservation_username_fk FOREIGN KEY (username) REFERENCES users (username),
        PRIMARY KEY (isbn, username)
    );