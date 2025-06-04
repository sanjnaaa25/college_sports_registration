CREATE DATABASE college_sports;

USE college_sports;

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    dob DATE,
    email VARCHAR(100),
    mobile VARCHAR(15),
    phone VARCHAR(15),
    college_id VARCHAR(20),
    sport VARCHAR(50),
    team_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);