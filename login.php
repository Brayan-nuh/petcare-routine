<?php
session_start();

// Database configuration
$servername = "localhost";
$dbusername = "root"; // Default XAMPP username
$dbpassword = ""; // Default XAMPP password
$dbname = "signup"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log error to a file or display a generic message
    error_log("Connection failed: " . $conn->connect_error);
    die("Database connection failed. Please try again later.");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    echo "Received Username: " . htmlspecialchars($username) . "<br>";
    echo "Received Password: " . htmlspecialchars($password) . "<br>";


    // Check if username and password are not empty
    if (!empty($username) && !empty($password)) {
        //prepare  a SQL  statement to find user by username
        $query = "SELECT * FROM users WHERE username = ?";

        // Prepare the statement
        if ($stmt = $conn->prepare($query)) {
            // Bind parameters to prevent SQL injection
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            
           
            // Check if a user with the given username exists
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                
                echo "Fetched username from DB: " . htmlspecialchars($user['username']) . "<br>";
                echo "Fetched Password Hash: " . htmlspecialchars($user['password']) . "<br>";

                // Verify the password using password_verify
                if (password_verify($password, $user['password'])) {
                     // Set session variable (assuming 'id' is a column in 'users' table)
                     $_SESSION['user_id'] = $user['id'];

                     session_write_close(); // Ensure session is saved
                    header("Location: homepage.php");  // Redirect to a secured page
                    exit;
                } else {
                    // Incorrect password
                    echo "Invalid password.";
                }
            } else {
                // User not found
                echo "User does not exist.";
            }

            // Close the statement
            $stmt->close();
        } else {
            // Log error to a file
            error_log("Error in query: " . $conn->error);
            echo "An error occurred. Please try again later.";
        }
    }
}

// Close the database connection
$conn->close();
?>
