<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Update as necessary
$dbname = "ctf_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . " (Error code: " . mysqli_connect_errno() . ")");
}

// Debug connection status (remove in production)
echo "Connection successful.<br>";

// Get input from the user
$input_username = $_POST['username'] ?? '';
$input_password = $_POST['password'] ?? '';

// SQL query (intentionally vulnerable to SQL injection for CTF)
$query = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";

// Debug the query being executed (remove in production)
echo "Executing query: $query<br>";

// Execute the query
$result = $conn->query($query);

// Check if query succeeded and return a result
if ($result && $result->num_rows > 0) {
    // Custom success message
    echo "<h1>Welcome to the most amazing CTF challenge you've ever seen!</h1>";
    echo "<p>Use this site to decode the flag: <a href='https://www.base64decode.org/' target='_blank'>Base64 Decoder</a></p>";
    echo "<p>Oh yeah, you'll need this one too: <a href='https://www.boxentriq.com/code-breaking/caesar-cipher' target='_blank'>Caesar Cipher Decoder</a> HINT: My lucky number is 7 :)</p>";
    echo "<p>Encoded flag: <strong>bXNobntkdmRfZnZiX212YnVrX2FvbF9tc2hufQ==</strong></p>";
} else {
    echo "Incorrect username/password.";
}

// Close the connection
$conn->close();
?>
