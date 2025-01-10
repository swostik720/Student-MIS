-- Create a database named student_mis and use it
CREATE DATABASE student_mis;
USE student_mis;

-- Create a table named student in database 
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    roll_number VARCHAR(50) NOT NULL UNIQUE,
    faculty ENUM('CSIT', 'BBA', 'BIM') NOT NULL,
    semester ENUM('1', '2', '3', '4', '5', '6', '7', '8') NOT NULL, 
    section ENUM('A', 'B') NOT NULL,
    dob DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    address VARCHAR(255) NOT NULL,
    status ENUM('Active', 'Inactive') NOT NULL,
    photo VARCHAR(255), -- To store the filename or path of the uploaded photo
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);








