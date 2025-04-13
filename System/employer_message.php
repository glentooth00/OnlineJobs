<?php

require 'constants/settings.php'; 
require 'constants/check-login.php';
require 'constants/db_config.php'; 

// Connect to database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message_employer = $_POST["message_employer"];
    $job_id = $_POST["job_id"];
    $employee_id = $_POST["employee_id"];
    $employer_id = $_POST["employer_id"];


    // Get current datetime
    date_default_timezone_set('Asia/Manila'); // Set to your timezone
    $now = date('Y-m-d H:i:s');

    // Insert into database using PDO
    $sql = "INSERT INTO tbl_messages (job_id, employee_id, employer_id, message_employer, created_at, updated_at) 
            VALUES (:job_id, :employee_id, :employer_id, :message, :message_order, :created_at, :updated_at)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters as strings
    $stmt->bindParam(':job_id', $job_id, PDO::PARAM_STR);
    $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
    $stmt->bindParam(':employer_id', $employer_id, PDO::PARAM_STR);
    $stmt->bindParam(':message_employer', $message_employer, PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $now, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $now, PDO::PARAM_STR);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>
                alert('Message saved successfully!');
                window.history.back();
              </script>";
        exit; // Stop further execution
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

$conn = null;
?>
