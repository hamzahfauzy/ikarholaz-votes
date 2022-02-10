CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    NRA VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    candidate_name VARCHAR(100) NULL,
    status VARCHAR(20) NULL,
    created_by VARCHAR(100) NOT NULL,
    CONSTRAINT fk_complaints_period_id FOREIGN KEY (period_id) REFERENCES periods(id) ON DELETE CASCADE
);