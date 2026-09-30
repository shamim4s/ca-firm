<?php
require_once __DIR__ . '/../core/Database.php';

try {
    $db = Database::getConnection();
    
    // Generate a valid bcrypt hash for the password
    $hash = password_hash('Admin@123!', PASSWORD_BCRYPT);
    
    // Update the existing user if they exist
    $stmt = $db->prepare("UPDATE users SET password_hash = ? WHERE email = 'admin@cafirm.com'");
    $stmt->execute([$hash]);
    
    // If the user doesn't exist, insert them
    if ($stmt->rowCount() === 0) {
        $db->prepare("INSERT INTO users (name, email, password_hash, role) VALUES ('System Admin', 'admin@cafirm.com', ?, 'admin')")->execute([$hash]);
    }
    
    echo "<div style='font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;'>";
    echo "<h1 style='color: #1e3a8a;'>Admin Account Reset Successful!</h1>";
    echo "<p>Your admin credentials have been successfully created/updated with a valid hash.</p>";
    echo "<p><strong>Email:</strong> admin@cafirm.com<br>";
    echo "<strong>Password:</strong> Admin@123!</p>";
    echo "<p style='color: #b91c1c; font-weight: bold;'>IMPORTANT: For security reasons, please delete this 'reset_admin.php' file immediately after confirming you can log in.</p>";
    echo "<a href='./admin/login' style='background: #1e3a8a; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 10px;'>Go to Admin Login</a>";
    echo "</div>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
