<?php
require_once "myDatabase.php";

$email = $_POST["userEmail"];
$password = $_POST["userPassword"];

// Prepare the SQL statement
$select_data = "SELECT * FROM userdetails WHERE userEmail = '$email'";

// Execute the query
$result = $conn->query($select_data);

if ($result->num_rows > 0) {
    // Fetch the row as an associative array
    $row = $result->fetch_assoc();
    // Verify the password
    if ($password == $row['userPassword']){
        // Password is correct
        header("Location: ../index.php");
        exit();
    } else {
        
        print "Incorrect password\n";
    }
} else {
    
    echo "Email not found";
}
?>