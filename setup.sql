CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    id_number INT UNIQUE,
    strand VARCHAR(255),
    section VARCHAR(255)

)

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_number INT,
    attendance_date DATE DEFAULT (CURRENT_DATE),
    attendance_time TIME DEFAULT (CURRENT_TIME),
    FOREIGN KEY (id_number) REFERENCES students(id_number)
    
)

CREATE TABLE combined_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    attendance_id INT,
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (attendance_id) REFERENCES attendance(id)

)