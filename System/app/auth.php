<?php
date_default_timezone_set('Africa/Dar_es_salaam');
$last_login = date('d-m-Y h:i A [T P]'); // Fixed minute format
require '../constants/db_config.php';

$pwdIdno = $_POST['pwdIdno'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE pwdIdno = :pwdIdno");
    $stmt->bindParam(':pwdIdno', $pwdIdno);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);

    if ($rec == 0) {
        header("location:../loginEmployee.php?r=1112");
        exit();
    } else {
        foreach ($result as $row) {
            session_start(); // Start session here

            $role = $row['role'];
            $_SESSION['logged'] = true;
            $_SESSION['role'] = $role;
            $_SESSION['myid'] = $row['member_no'];
            $_SESSION['myemail'] = $row['email'];
            $_SESSION['myphone'] = $row['phone'];
            $_SESSION['mycity'] = $row['city'];
            $_SESSION['mystreet'] = $row['street'];
            $_SESSION['myzip'] = $row['zip'];
            $_SESSION['mycountry'] = $row['country'];
            $_SESSION['mydesc'] = $row['about'];
            $_SESSION['avatar'] = $row['avatar'];
            $_SESSION['lastlogin'] = $row['last_login'];

            if ($role == "employee") {
                $_SESSION['myfname'] = $row['first_name'];
                $_SESSION['mylname'] = $row['last_name'];
                $_SESSION['mydate'] = $row['bdate'];
                $_SESSION['mymonth'] = $row['bmonth'];
                $_SESSION['myyear'] = $row['byear'];
                $_SESSION['myedu'] = $row['education'];
                $_SESSION['mytitle'] = $row['title'];
            } else {
                $_SESSION['compname'] = $row['first_name'];
                $_SESSION['established'] = $row['byear'];
                $_SESSION['comptype'] = $row['title'];
                $_SESSION['myserv'] = $row['services'];
                $_SESSION['myexp'] = $row['expertise'];
                $_SESSION['website'] = $row['website'];
                $_SESSION['people'] = $row['people'];
            }

            // Update last login
            $stmt = $conn->prepare("UPDATE tbl_users SET last_login = :lastlogin WHERE email = :email");
            $stmt->bindParam(':lastlogin', $last_login);
            $stmt->bindParam(':email', $row['email']); // Fixed undefined variable issue
            $stmt->execute();

            // Redirect to user role page
            header("location:../$role");
            exit();
        }
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
