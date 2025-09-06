<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    
    // Validate and sanitize input data
    $full_name = trim($_POST['full_name']);
    $date_of_birth = $_POST['date_of_birth'];
    $gender = trim($_POST['gender']);
    $religion = trim($_POST['religion']);
    $father_name = trim($_POST['father_name']);
    $mother_name = trim($_POST['mother_name']);
    $caste = trim($_POST['caste']);
    $sub_caste = trim($_POST['sub_caste']);
    $reservation_group = trim($_POST['reservation_group']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $id_proof_type = trim($_POST['id_proof_type']);
    $id_proof_number = trim($_POST['id_proof_number']);
    $aadhaar_number = trim($_POST['aadhaar_number']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    // Validation
    if (empty($full_name)) $errors[] = "Full name is required";
    if (empty($date_of_birth)) $errors[] = "Date of birth is required";
    if (empty($gender)) $errors[] = "Gender is required";
    if (empty($religion)) $errors[] = "Religion is required";
    if (empty($father_name)) $errors[] = "Father's name is required";
    if (empty($mother_name)) $errors[] = "Mother's name is required";
    if (empty($caste)) $errors[] = "Caste is required";
    if (empty($sub_caste)) $errors[] = "Sub caste is required";
    if (empty($email)) $errors[] = "Email is required";
    if (empty($mobile)) $errors[] = "Mobile number is required";
    if (empty($id_proof_type)) $errors[] = "ID proof type is required";
    if (empty($id_proof_number)) $errors[] = "ID proof number is required";
    if (empty($username)) $errors[] = "Username is required";
    if (empty($password)) $errors[] = "Password is required";
    
    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    // Mobile validation
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $errors[] = "Mobile number must be 10 digits";
    }
    
    // Age validation (must be 18 or above)
    $dob = new DateTime($date_of_birth);
    $today = new DateTime();
    $age = $today->diff($dob)->y;
    if ($age < 18) {
        $errors[] = "You must be 18 years or above to register";
    }
    
    // Password validation
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    
    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $errors[] = "Username already exists";
    }
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $errors[] = "Email already registered";
    }
    
    // File upload validation
    $photo = $_FILES['photo'];
    $signature = $_FILES['signature'];
    
    // Photo validation
    if ($photo['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Photo upload failed";
    } else {
        $allowed_types = ['image/jpeg', 'image/jpg'];
        if (!in_array($photo['type'], $allowed_types)) {
            $errors[] = "Photo must be in JPG format";
        }
        if ($photo['size'] > 30 * 1024) { // 30KB
            $errors[] = "Photo size must be less than 30KB";
        }
    }
    
    // Signature validation
    if ($signature['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Signature upload failed";
    } else {
        $allowed_types = ['image/jpeg', 'image/jpg'];
        if (!in_array($signature['type'], $allowed_types)) {
            $errors[] = "Signature must be in JPG format";
        }
        if ($signature['size'] > 30 * 1024) { // 30KB
            $errors[] = "Signature size must be less than 30KB";
        }
    }
    
    // If no errors, proceed with registration
    if (empty($errors)) {
        try {
            // Create uploads directory if it doesn't exist
            $uploads_dir = 'uploads/';
            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0777, true);
            }
            
            // Generate unique filenames
            $photo_ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
            $signature_ext = pathinfo($signature['name'], PATHINFO_EXTENSION);
            $photo_filename = 'photo_' . time() . '_' . uniqid() . '.' . $photo_ext;
            $signature_filename = 'signature_' . time() . '_' . uniqid() . '.' . $signature_ext;
            
            // Move uploaded files
            if (move_uploaded_file($photo['tmp_name'], $uploads_dir . $photo_filename) &&
                move_uploaded_file($signature['tmp_name'], $uploads_dir . $signature_filename)) {
                
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert user data
                $stmt = $conn->prepare("INSERT INTO users (username, email, password, full_name, date_of_birth, gender, religion, father_name, mother_name, caste, sub_caste, reservation_group, mobile, id_proof_type, id_proof_number, aadhaar_number, photo_path, signature_path, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                
                $stmt->bind_param("sssssssssssssssss", 
                    $username, $email, $hashed_password, $full_name, $date_of_birth, 
                    $gender, $religion, $father_name, $mother_name, $caste, 
                    $sub_caste, $reservation_group, $mobile, $id_proof_type, 
                    $id_proof_number, $aadhaar_number, $photo_filename, $signature_filename
                );
                
                if ($stmt->execute()) {
                    // Registration successful
                    $_SESSION['registration_success'] = true;
                    $_SESSION['username'] = $username;
                    header("Location: registration_success.php");
                    exit();
                } else {
                    $errors[] = "Registration failed. Please try again.";
                }
            } else {
                $errors[] = "File upload failed";
            }
        } catch (Exception $e) {
            $errors[] = "An error occurred during registration";
        }
    }
    
    // If there are errors, redirect back to registration form
    if (!empty($errors)) {
        $_SESSION['registration_errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header("Location: register.php?error=validation_failed");
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
?> 