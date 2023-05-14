<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "wedding_invitation";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $attendance = $_POST["attendance"];
    $adults_acompanee = $_POST["adults_acompanee"];
    $kids_acompanee = $_POST["kids_acompanee"];
    $alcohol_drinker = $_POST["alcohol_drinker"];
    $pref_alcohol = $_POST["pref_alcohol"];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO rsvps (name, attendance, adults_acompanee, kids_acompanee, alcohol_drinker, pref_alcohol) VALUES 
    ('$name', '$attendance', '$adults_acompanee', '$kids_acompanee', '$alcohol_drinker', '$pref_alcohol')";
    if ($conn->query($sql) === true) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>