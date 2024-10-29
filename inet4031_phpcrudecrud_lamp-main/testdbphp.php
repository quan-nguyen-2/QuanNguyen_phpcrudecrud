<?php

// Establish the MySQL connection
$conn = new mysqli('db', 'root', 'secret', 'employees');

// Check for connection success
if ($conn->connect_error) {
    die("MySQL Connection Failed: " . $conn->connect_error);
}
echo "<div>MySQL Connection Succeeded</div><br><br>";

// Create the SQL select statement to retrieve first_name, last_name, and job_title
$sql = "SELECT first_name, last_name, job_title FROM employees WHERE last_name = 'Weedman'";

// Execute the query
$result = $conn->query($sql);

// Check if any records were found
if ($result->num_rows > 0) {
    // Loop through each record and display it
    while ($row = $result->fetch_assoc()) {
        echo "<div>Employee: " . $row["first_name"] . " " . $row["last_name"] . " - Job Title: " . $row["job_title"] . "</div>";
    }
} else {
    echo "<div>No Records Found</div>";
}

// Close the connection to the database
$conn->close();

?>
