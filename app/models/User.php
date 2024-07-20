<?php
require_once ('app/database.php');

Class User {
    public function create_user($username, $password) {
        // Connect to the database
        $db = db_connect();

        // Check if the username already exists
        $existing_user = $this->get_user_by_username($username);
        if ($existing_user) {
            return "Username already exists";
        }

        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into the database
        $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $statement->execute(array(':username' => $username, ':password' => $hashed_password));

        // Redirect to home page after successful user creation
        header("Location: /index.php");
        exit;
    }


    public function login($username, $password) {
        $db = db_connect();
        // Retrieve user by username
        $user = $this->get_user_by_username($username);
        if (!$user) {
            $this->logAttempt($username, 'bad');
            return "User not found";
        }

        // Verify password hash
        if (password_verify($password, $user['password'])) {
            $this->logAttempt($username, 'good');
            //return "Login successful";
            header("Location: /app/views/home/index.php?username=" . urlencode($username));
            exit; // Ensure script execution stops after redirect
        }
            
        else
        {
            // Log the failed attempt and handle lockout
            $this->logAttempt($username, 'bad');
            return $this->handleLockout($username);
        }
    }

    private function handleLockout($username) {
        $db = db_connect();

        // Count consecutive bad attempts within the last 60 seconds
        $timestamp = date("Y-m-d H:i:s", strtotime("-60 seconds"));
        $statement = $db->prepare("SELECT COUNT(*) FROM login_logs WHERE username = :username AND attempt = 'bad' AND time > :timestamp");
        $statement->execute(array(':username' => $username, ':timestamp' => $timestamp));
        $failed_attempts = $statement->fetchColumn();

        // If there are 3 consecutive failed attempts, implement lockout mechanism
        if ($failed_attempts >= 3) {
            // Log the lockout attempt
            $this->logAttempt($username, 'lockout');

            // Update user table to set a lockout flag or implement other lockout logic
            // For simplicity, let's simulate a lockout by adding a lockout timestamp to the user's record
            $lockout_time = date("Y-m-d H:i:s", strtotime("+60 seconds"));
            $update_statement = $db->prepare("UPDATE users SET lockout_until = :lockout_time WHERE username = :username");
            $update_statement->execute(array(':username' => $username, ':lockout_time' => $lockout_time));

            return "Too many failed attempts. You are temporarily locked out for 60 seconds.";
        }
        return "Incorrect password";
    }

    private function logAttempt($username, $attempt) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO login_logs (username, attempt, time) VALUES (:username, :attempt, NOW())");
        $statement->execute(array(':username' => $username, ':attempt' => $attempt));
    }


private function get_user_by_username($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
    $statement->execute(array(':username' => $username));
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}
}