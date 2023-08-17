DROP DATABASE IF EXISTS contact_book;
CREATE DATABASE contact_book;

USE contact_book;

DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  phone BIGINT,
  birthday DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO contacts (first_name, last_name, email, phone, birthday) VALUES
('Wendi', 'Clements', 'wendiclements@pharmacon.com', 9625662947, '1979-12-12'),
('Tamra', 'Alvarado', 'tamraalvarado@pharmacon.com', 9495783043, '1988-12-11'),
('Lacey', 'Cantu', 'laceycantu@pharmacon.com', 8605962964, '1983-03-06'),
('Booker', 'Blake', 'bookerblake@pharmacon.com', 9915982782, '1988-09-20'),
('Elise', 'Kaufman', 'elisekaufman@pharmacon.com', 8115473402, '1972-11-07'),
('Francis', 'Rivas', 'francisrivas@pharmacon.com', 8795752612, '1974-08-29'),
('Bowen', 'Hall', 'bowenhall@pharmacon.com', 9585352360, '1988-08-21'),
('Ruth', 'Mckenzie', 'ruthmckenzie@pharmacon.com', 9285262350, '1999-06-03'),
('Priscilla', 'Shields', 'priscillashields@pharmacon.com', 9935293621, '1987-08-19'),
('Evelyn', 'Simmons', 'evelynsimmons@pharmacon.com', 9674833720, '1979-03-15');