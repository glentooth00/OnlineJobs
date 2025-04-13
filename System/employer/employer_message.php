<?php

require '../constants/settings.php'; 
require '../constants/check-login.php';
require '../constants/db_config.php'; 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    echo $user = "Employer";
    echo $message = $_POST['message'];
    echo $job_id = $_POST["job_id"];
    echo $employee_id = $_POST["employee_id"];
    echo $employer_id = $_POST["employer_id"];

    // Convert array to JSON string
    $message_employer = json_encode([
        'user' => $user,
        'message' => $message,
    ]);

    date_default_timezone_set('Asia/Manila');
    $now = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tbl_messages 
        (job_id, employee_id, employer_id, message_employee, message_employer, created_at, updated_at) 
        VALUES (:job_id, :employee_id, :employer_id, :message_employee, :message_employer, :created_at, :updated_at)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':job_id', $job_id, PDO::PARAM_STR);
    $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
    $stmt->bindParam(':employer_id', $employer_id, PDO::PARAM_STR);
    $stmt->bindParam(':message_employee', $message_employee, PDO::PARAM_STR);
    $stmt->bindParam(':message_employer', $message_employer, PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $now, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $now, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Redirect to the previous page and reload it
        echo "<script>
                alert('Message saved successfully!');
                window.history.back();
                location.reload();
              </script>";
        exit;
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

$conn = null;
?>
