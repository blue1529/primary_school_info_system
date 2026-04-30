<<<<<<< HEAD
# primary_school_info_system
<<<<<<< HEAD
This repository contains files from group one concerning a web development project about a primary schol information system which will be created by group one members
=======
Hello There!!

Below is the code for the database(MySQL) that will be used in this project:

--DATABASE SCHEMA FOR PRIMARY SCHOOL INFORMATION SYSTEM
-- This schema defines the structure of the database for a primary school information system. It includes tables for standards, students, parents/guardians, teachers, classes, terms, enrollments, attendance, and grades.

CREATE DATABASE IF NOT EXISTS primary_school_info_system;
USE primary_school_info_system;

-- 1. class
CREATE TABLE Standard (
    standard_id INT PRIMARY KEY AUTO_INCREMENT,
    standard_name VARCHAR(20) NOT NULL,
    numeric_level INT NOT NULL
);

-- 2. Student
CREATE TABLE Student (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE,
    current_standard_id INT,
    address VARCHAR(200),
    FOREIGN KEY (current_standard_id) REFERENCES Standard(standard_id)
);
-- 2.1 Parent/Guardian
CREATE TABLE ParentGuardian (
    parent_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) unique NOT NULL,
    address VARCHAR(200)
);
-- 2.2 Student photo table (will link to Student table with student_id as foreign key and use the file path to store the photo)
CREATE TABLE StudentPhoto (
    student_id INT NOT NULL,
    photo_path VARCHAR(200) NOT NULL,    -- e.g., 'uploads/students/101.jpg'
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (student_id),            -- one-to-one: one photo per student
    FOREIGN KEY (student_id) REFERENCES Student(student_id) ON DELETE CASCADE
);

-- 3. Teacher
CREATE TABLE Teacher (
    teacher_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL
);
-- 3.1 Teacher photo table (will link to Teacher table with teacher_id as foreign key and use the file path to store the photo)
CREATE TABLE TeacherPhoto (
    teacher_id INT NOT NULL,
    photo_path VARCHAR(200) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (teacher_id),
    FOREIGN KEY (teacher_id) REFERENCES Teacher(teacher_id) ON DELETE CASCADE
);

-- 4. Class
CREATE TABLE Class (
    class_id INT PRIMARY KEY AUTO_INCREMENT,
    class_name VARCHAR(50) NOT NULL,
    standard_id INT NOT NULL,
    teacher_id INT,
    room_number VARCHAR(10),
    FOREIGN KEY (standard_id) REFERENCES Standard(standard_id),
    FOREIGN KEY (teacher_id) REFERENCES Teacher(teacher_id)
);

-- 5. Term
CREATE TABLE Term (
    term_id INT PRIMARY KEY AUTO_INCREMENT,
    term_name VARCHAR(20) NOT NULL,      -- 'Term 1', 'Term 2', 'Term 3'
    academic_year VARCHAR(9) NOT NULL,   -- '2025'
    start_date DATE,
    end_date DATE,
    UNIQUE KEY (term_name, academic_year)  -- one term per year
);

-- 6. Enrollment (per academic year, not per term)
CREATE TABLE Enrollment (
    enrollment_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    class_id INT NOT NULL,
    academic_year VARCHAR(9) NOT NULL,
    status VARCHAR(20) DEFAULT 'active',
    FOREIGN KEY (student_id) REFERENCES Student(student_id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES Class(class_id) ON DELETE CASCADE,
    UNIQUE KEY (student_id, class_id, academic_year)
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

-- 8. Grade (per term andcontains subject)
CREATE TABLE Grade (
    grade_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    class_id INT NOT NULL,
    term_id INT NOT NULL,
    subject_name VARCHAR(50) NOT NULL,
    score DECIMAL(5,2),
    max_score DECIMAL(5,2) DEFAULT 100,
    date_taken DATE,
    FOREIGN KEY (student_id) REFERENCES Student(student_id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES Class(class_id) ON DELETE CASCADE,
    FOREIGN KEY (term_id) REFERENCES Term(term_id)
);
>>>>>>> a16bb42 (db creation and teacher reg creation)
=======
This repository contains files from group one concerning a web development project about a primary school information system which will be created by group one members

## Technologies used
HTML, CSS, PHP, DATABASE, JAVASCRIPT

## GROUP MEMBERS
SANDRA BANDA
CALVIN
REHEMA FAITH
MADALITSO
GOMEGZANI
DIANA DUNCAN
HAROON
VIVIAN

>>>>>>> 6d3ad3d (added login page with html, php and sql)
