<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_portal";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $application_id = $_POST['application_id'];
        $status = $_POST['status'];
        $job_id = $_POST['job_id'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE tbl_job_applications SET status = :status WHERE id = :id");
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $application_id);
        $stmt->execute();

        // Redirect to the applicants' page after successful update
        header("Location: view-applicants.php?jobid=$job_id");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
