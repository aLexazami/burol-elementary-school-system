/* This SQL script creates a database and a table for storing feedback form data.
   The feedback table includes various fields to capture user information and feedback details.
   Upon creating this SQL this also  serves as to ensures that the data is safely inserted into the database while protecting against SQL injection attacks.*/
CREATE DATABASE IF NOT EXISTS buroles_database;

USE buroles_database;

CREATE TABLE feedback_respondents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NULL,
  date DATE NOT NULL,
  age VARCHAR(50) NOT NULL,
  sex VARCHAR(10) NOT NULL,
  customer_type VARCHAR(50) NOT NULL,
  service_availed_id INT NOT NULL,
  region VARCHAR(255) NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (service_availed_id) REFERENCES services(id)
);

CREATE TABLE services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  customer_type ENUM('Citizen', 'Government', 'Business') NOT NULL
);

CREATE TABLE IF NOT EXISTS feedback_answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    respondent_id INT NOT NULL,
    citizen_charter_awareness VARCHAR(10) NULL,
    cc1 VARCHAR(255) NULL,
    cc2 VARCHAR(255) NULL,
    cc3 VARCHAR(255) NULL,
    sqd1 VARCHAR(255) NOT NULL,
    sqd2 VARCHAR(255) NOT NULL,
    sqd3 VARCHAR(255) NOT NULL,
    sqd4 VARCHAR(255) NOT NULL,
    sqd5 VARCHAR(255) NOT NULL,
    sqd6 VARCHAR(255) NOT NULL,
    sqd7 VARCHAR(255) NOT NULL,
    sqd8 VARCHAR(255) NOT NULL,
    remarks TEXT NULL,
    FOREIGN KEY (respondent_id) REFERENCES feedback_respondents(id) ON DELETE CASCADE ON UPDATE CASCADE

);

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(55) NOT NULL,
    middle_name VARCHAR(55) NULL,
    last_name VARCHAR(55) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT
);

CREATE TABLE IF NOT EXISTS permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT
);

CREATE TABLE IF NOT EXISTS role_permissions (
    role_id INT NOT NULL,
    permission_id INT NOT NULL,
    PRIMARY KEY (role_id, permission_id),
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE ON UPDATE CASCADE
);