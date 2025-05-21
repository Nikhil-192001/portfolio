<?php
// Database connection
$host = 'localhost';      // your host
$db   = 'portfolio';   // your database name
$user = 'root';   // your database user
$pass = '';   // your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs and sanitize
    $name = $conn->real_escape_string(trim($_POST['Name']));
    $email = $conn->real_escape_string(trim($_POST['Email']));
    $subject = $conn->real_escape_string(trim($_POST['Subject']));
    $message = $conn->real_escape_string(trim($_POST['Message']));

    // Basic validation (you can expand this)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill all the fields.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO `nikhil-portfolio` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
        // Redirect or show a success message here
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
