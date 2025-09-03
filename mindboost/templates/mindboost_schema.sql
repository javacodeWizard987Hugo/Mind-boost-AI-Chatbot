-- Create the database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS mindboost;

-- Use the mindboost database
USE mindboost;

-- Drop the table if it already exists (optional, good for clean re-imports)
-- DROP TABLE IF EXISTS contact_submissions;

-- Create the contact_submissions table
CREATE TABLE contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: You could add a simple comment indicating the table was created
-- SELECT 'Table contact_submissions created successfully in mindboost database.' AS status;
