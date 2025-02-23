CREATE TABLE medications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    started_at DATETIME NOT NULL,
    dosage INT NOT NULL,
    note VARCHAR(500)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL
);

INSERT INTO users (name, type) VALUES
('Alice', 'customer'),
('Bob', 'customer'),
('Charlie', 'pharmacist'),
('David', 'pharmacist'),
('Emma', 'customer');

INSERT INTO medications (name, started_at, dosage, note) VALUES
('Ibuprofen', '2024-02-01 08:00:00', 200, 'Take after meals.'),
('Amoxicillin', '2024-02-10 12:00:00', 500, 'Finish the full course.'),
('Metformin', '2024-01-15 07:30:00', 1000, 'Take with breakfast.'),
('Lisinopril', '2024-02-05 09:00:00', 10, 'Monitor blood pressure.'),
('Atorvastatin', '2024-01-25 21:00:00', 20, 'Take before bed.');