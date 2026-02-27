CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Data into Users
INSERT INTO users (username, email, password) VALUES
('john_doe', 'john@example.com', 'Password123'),
('jane_smith', 'jane@example.com', 'Secret456');

-- Insert Sample Data into Students
INSERT INTO students (student_id, name, email) VALUES
('S1001', 'Alice Johnson', 'alice@student.com'),
('S1002', 'Bob Williams', 'bob@student.com');