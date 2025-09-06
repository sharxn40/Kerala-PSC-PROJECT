-- Create database
CREATE DATABASE IF NOT EXISTS kerala_psc;
USE kerala_psc;

-- Create users table with comprehensive fields
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    religion VARCHAR(50) NOT NULL,
    father_name VARCHAR(100) NOT NULL,
    mother_name VARCHAR(100) NOT NULL,
    caste VARCHAR(50) NOT NULL,
    sub_caste VARCHAR(50) NOT NULL,
    reservation_group VARCHAR(20),
    mobile VARCHAR(15) NOT NULL,
    id_proof_type VARCHAR(50) NOT NULL,
    id_proof_number VARCHAR(100) NOT NULL,
    aadhaar_number VARCHAR(12),
    photo_path VARCHAR(255) NOT NULL,
    signature_path VARCHAR(255) NOT NULL,
    status ENUM('active', 'inactive', 'pending') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert a sample user (password: password123)
INSERT INTO users (username, email, password, full_name, date_of_birth, gender, religion, father_name, mother_name, caste, sub_caste, mobile, id_proof_type, id_proof_number, photo_path, signature_path) VALUES 
('admin', 'admin@keralapsc.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', '1990-01-01', 'male', 'other', 'Admin Father', 'Admin Mother', 'general', 'N/A', '9876543210', 'aadhaar', '123456789012', 'sample_photo.jpg', 'sample_signature.jpg');

-- Note: The password hash above is for 'password123'
-- You can generate new password hashes using PHP's password_hash() function

-- Create additional tables for future features
CREATE TABLE IF NOT EXISTS user_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    notification_title VARCHAR(255) NOT NULL,
    application_number VARCHAR(100) UNIQUE NOT NULL,
    status ENUM('draft', 'submitted', 'under_review', 'approved', 'rejected') DEFAULT 'draft',
    submitted_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    exam_date DATE,
    last_date_to_apply DATE,
    total_vacancies INT,
    category VARCHAR(100),
    status ENUM('active', 'inactive', 'expired') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 