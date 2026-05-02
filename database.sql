-- DATABASE SCHEMA FOR PRIMARY SCHOOL INFORMATION SYSTEM
-- This schema defines the structure of the database for a primary school information system. It includes tables for standards, students, parents/guardians, teachers, classes, terms, enrollments, attendance, and grades.
CREATE DATABASE IF NOT EXISTS primary_school_info_system;
USE primary_school_info_system;



-- 3. Teacher
CREATE TABLE Teacher (
    teacher_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    class VARCHAR(20) NOT NULL,
    subjects_taught VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    date_of_start DATE NOT NULL,
    place_of_residence VARCHAR(255) NOT NULL
);

-- 7. Attendance (per term)
CREATE TABLE Attendance (
    attendance_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    class_id INT NOT NULL,
    term_id INT NOT NULL,
    date DATE NOT NULL,
    status VARCHAR(15) NOT NULL,         -- 'Present', 'Absent', 'Late'
    remarks VARCHAR(200),
    FOREIGN KEY (student_id) REFERENCES Student(student_id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES Class(class_id) ON DELETE CASCADE,
    FOREIGN KEY (term_id) REFERENCES Term(term_id),
    UNIQUE KEY (student_id, class_id, term_id, date)
    );
    
    CREATE TABLE student (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    middle_name VARCHAR(50),
    last_name VARCHAR(50),
    gender VARCHAR(10),
    date_of_birth DATE,
    parent_fname VARCHAR(50),
    parent_lname VARCHAR(50),
    parent_phone VARCHAR(20),
    parent_email VARCHAR(100),
    class VARCHAR(20),
    enrollment_date DATE,
    special_needs VARCHAR(100),
    address TEXT
);

CREATE TABLE grades (
    grade_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    term VARCHAR(10),

    mathematics INT,
    english INT,
    biology INT,
    chemistry INT,
    physics INT,
    geography INT,
    history INT,
    computer INT,

    total INT,
    average DECIMAL(5,2),
    grade VARCHAR(5),
    status VARCHAR(10),

    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(255),
    role VARCHAR(20),   -- 'teacher'
    class INT NULL
);