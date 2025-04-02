<?php

require 'constants/settings.php'; 
require 'constants/check-login.php';
require 'constants/db_config.php'; 

// Connect to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = $_POST["message"];
    $job_id = $_POST["job_id"];
    $employee_id = $_POST["employee_id"];
    $employer_id = $_POST["employer_id"];

    // Insert into database using PDO
    $sql = "INSERT INTO tbl_messages (job_id, employee_id, employer_id, message) VALUES (:job_id, :employee_id, :employer_id, :message)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters as strings
    $stmt->bindParam(':job_id', $job_id, PDO::PARAM_STR);
    $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
    $stmt->bindParam(':employer_id', $employer_id, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>
                alert('Message saved successfully!');
                window.history.back();
              </script>";
        exit; // Stop further execution
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Improved error reporting
    }
}

$conn = null;
?>
