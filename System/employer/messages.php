<!doctype html>
<html lang="en">
<?php 
require '../constants/settings.php'; 
require 'constants/check-login.php';
require '../constants/db_config.php'; ;

if ($user_online == "true") {
if ($myrole == "employer") {
}else{
header("location:../");		
}
}else{
header("location:../");	
}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>JobAbility - Company Profile</title>
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Bwire Jobs" />
    <meta property="og:description" content="Online Job Management / Job Portal" />

	<link rel="shortcut icon" href="../images/ico/favicon.png">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="../icons/linearicons/style.css">
	<link rel="stylesheet" href="../icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../icons/rivolicons/style.css">
	<link rel="stylesheet" href="../icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="../icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="../icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="../icons/flaticon-ventures/flaticon-ventures.css">

	<link href="../css/style.css" rel="stylesheet">
	
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">

		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="../"><img src="../images/Jlogo.jpg" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="../">Home</a>
								
							</li>
							
							<li>
								<a href="../job-list.php">Job List</a>

							</li>
							
							<li>
								<a href="../employers.php">Employers</a>
							</li>
							
							<li>
								<a href="../employees.php">Employees</a>
							</li>
							
							<li>
								<a href="../contact.php">Contact Us</a>
							</li>

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
							<li><a href="../logout.php">logout</a></li>
							<li><a href="./">Profile</a></li>
						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
		</header>

		<div class="main-wrapper">
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="../">JobAbility</a></li>
						<li><span>Profile</span></li>
					</ol>
					
				</div>
				
			</div>

			
			<div class="admin-container-wrapper">

				<div class="container">
				
					<div class="GridLex-gap-15-wrappper">
					
						<div class="GridLex-grid-noGutter-equalHeight">
						
							<div class="GridLex-col-3_sm-4_xs-12">
							
								<div class="admin-sidebar">
										
										
									<div class="admin-user-item for-employer">
										
										<div class="image">
										<?php 
										if ($logo == null) {
										print '<center>Company Logo Here</center>';
										}else{
										echo '<center><img alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($logo).'"/></center>';	
										}
										?><br>
										</div>
										
										<h4><?php echo "$compname"; ?></h4>
										
									</div>
									
									<div class="admin-user-action text-center">
									
										<a href="post-job.php" class="btn btn-primary btn-sm btn-inverse">Post a Job</a>
										
									</div>
									
									<ul class="admin-user-menu clearfix">
										<li  class="active">
											<a href="./"><i class="fa fa-user"></i> Profile</a>
										</li>
										<li class="">
										<a href="change-password.php"><i class="fa fa-key"></i> Change Password</a>
										</li>
										<li class="">
										<a href="messages.php"><i class="fa fa-commenting" aria-hidden="true"></i>
										</i>Messages</a>
										</li>
			
										<li>
											<a href="../company.php?ref=<?php echo "$myid"; ?>"><i class="fa fa-briefcase"></i> Company Overview</a>
										</li>
										<li>
											<a href="my-jobs.php"><i class="fa fa-bookmark"></i> Posted Jobs</a>
										</li>
										<li>
											<a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
										</li>
									</ul>
									
								</div>

							</div>
							
							<div class="GridLex-col-9_sm-8_xs-12">
							
								<div class="admin-content-wrapper">

									<div class="admin-section-title">
									
                                    <div class="messages-list">
									<?php 
$myid; 

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to calculate time elapsed
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    // Use a local variable instead of dynamically adding $w to $diff
    $weeks = floor($diff->d / 7);
    $diff->d -= $weeks * 7;

    $string = [
        'y' => 'year', 'm' => 'month', 'd' => 'day',
        'h' => 'hour', 'i' => 'minute', 's' => 'second',
    ];

    // Add weeks manually to the string
    if ($weeks > 0) {
        $string = ['w' => $weeks] + $string;
    }

    foreach ($string as $k => &$v) {
        if (is_numeric($v)) {
            $v = $v . ' ' . $k . ($v > 1 ? 's' : '');
        } elseif ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

// Query to get the total count of messages
$messages_sql = "SELECT COUNT(*) FROM tbl_messages WHERE employer_id = :myid";
$messages_stmt = $conn->prepare($messages_sql);
$messages_stmt->bindParam(':myid', $myid);
$messages_stmt->execute();
$messages_count = $messages_stmt->fetchColumn(); // Get the count of messages

?>

<?php if ($messages_count > 0): ?>
    <?php 
    // Get the latest message sent by the employer or employee
    $messages_sql = "SELECT * FROM tbl_messages WHERE employer_id = :myid ORDER BY created_at DESC LIMIT 1";
    $stmt = $conn->prepare($messages_sql);
    $stmt->bindParam(':myid', $myid);
    $stmt->execute();
    ?>
    
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="message-item" style="margin-bottom:20px;">
            <div class="message-header">
                <strong>
                    <?php 
                        // Correcting the logic to fetch employer's name
                        $employer_id = $row['employer_id']; 

                        // Fetch the employer's name based on employer_id
                        $sql = "SELECT first_name FROM tbl_users WHERE member_no = :employer_id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':employer_id', $employer_id);
                        $stmt->execute();
                        
                        $employer_name = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Extract the employer's first name
                        $employer_firstname = $employer_name['first_name'];
                    ?>
                    <?= htmlspecialchars($employer_firstname) ?>
                </strong>
                <span class="text-muted">- <?= time_elapsed_string($row['created_at']) ?></span>
            </div>
            <div class="message-body mb-5">
                <?php
                // Check if the message_employee field is not null or empty before decoding
                $employeeMessage = !empty($row['message_employee']) ? json_decode($row['message_employee'], true) : null;
                ?>
                <p><?= nl2br(htmlspecialchars($employeeMessage['message'] ?? '')) ?></p>
            </div>
            <button class="btn btn-primary btn-reply" data-toggle="modal" data-target="#chatModal">Reply</button>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No messages found.</p>
<?php endif; ?>



<!-- Chat Modal -->
<div id="chatModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chat with Applicant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Scrollable Chat Box -->
				<div class="chat-box" style="height: 300px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px; background: #f9f9f9;">
	<?php
	$chat_sql = "SELECT * FROM tbl_messages WHERE employer_id = :myid ORDER BY created_at ASC";
	$chat_stmt = $conn->prepare($chat_sql);
	$chat_stmt->bindParam(':myid', $myid);
	$chat_stmt->execute();

	while ($chat = $chat_stmt->fetch(PDO::FETCH_ASSOC)):

		$employeeMsg = !empty($chat['message_employee']) ? json_decode($chat['message_employee'], true) : null;
		$employerMsg = !empty($chat['message_employer']) ? json_decode($chat['message_employer'], true) : null;
	
		// Display employee message if it exists
		if (!empty($employeeMsg['message'])):
			?>
			<div class="chat-message text-left" style="margin-bottom: 10px;">
				<div style="display: inline-block; max-width: 70%; background: #e2f0d9; padding: 10px; border-radius: 10px;">
					<p style="margin: 0;"><?= nl2br(htmlspecialchars($employeeMsg['message'])) ?></p>
					<small class="text-muted"><?= date('m/d/Y h:i A', strtotime($chat['created_at'])) ?></small>
				</div>
			</div>
		<?php
		endif;
	
		// Display employer message if it exists
		if (!empty($employerMsg['message'])):
			?>
			<div class="chat-message text-right" style="margin-bottom: 10px;float: inline-end;">
				<div style="display: inline-block; max-width: 100%; background: #d9edf7; padding: 20px; border-radius: 10px;">
					<p style="margin: 0;"><strong>
						<?php if($chat['employer_id']) :?>
							Me :
						<?php endif; ?>
						<br>
					</strong> <?= nl2br(htmlspecialchars($employerMsg['message'])) ?></p>
					<small class="text-muted"><?= date('m/d/Y h:i A', strtotime($chat['created_at'])) ?></small>
				</div>
			</div>
		<?php
		endif;
	
	endwhile;
	
	?>
</div>




                <!-- Input Box -->
                <div class="message-input mt-3">
                    <form action="messages.php" method="post">
                    <textarea class="form-control" name="message" rows="3" placeholder="Type your message..." style="width: 470px;"></textarea>

					<?php 
					$myid;
						$chat_sql = "SELECT * FROM tbl_messages WHERE employer_id = :myid ORDER BY created_at ASC";
						$chat_stmt = $conn->prepare($chat_sql);
						$chat_stmt->bindParam(':myid', $myid);
						$chat_stmt->execute();

						$result = $chat_stmt->fetch(PDO::FETCH_ASSOC);

						// var_dump($result);


					?>
                    <input type="hidden" id="employer_id" name="employer_id" value="<?=  $result['employer_id']  ?>">
                    <input type="hidden" id="employee_id" name="employee_id" value="<?=$result['employee_id'] ?>">
                    <input type="hidden" id="job_id" name="job_id" value="<?=$result['job_id'] ?>">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Send</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php 

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

?>

<style>
    .messages-container {
        margin-top: 20px;
    }
    .message-card {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
        border-left: 5px solid #007bff;
    }
    .message-card.unread {
        background: #e9ecef;
        border-left: 5px solid #dc3545;
    }
    .message-header {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
    }
    .message-content {
        margin-top: 10px;
        color: #555;
    }
    .message-actions {
        margin-top: 10px;
    }
    .btn {
        margin-right: 10px;
    }

    /* Additional chat styles */
    .chat-message {
    max-width: 70%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
    clear: both;
    background-color: #e2e2e2;
}

.chat-message.text-left {
    text-align: left;
}
.chat-message.text-right {
    text-align: right;
}



    .chat-message p {
        margin: 5px 0;
    }
	.chat-box{
		height: 300px;
    overflow-y: scroll;
    border: 1px solid #ddd;
    padding: 10px;
    background: #f9f9f9;
    width: 82.5%;
	}
</style>

								<hr>
								<!-- <div class="message-item">
									<div class="message-header">
										<strong>Another Employer</strong> <span class="text-muted">- Yesterday</span>
									</div>
									<div class="message-body">
										<p>We have an interview scheduled for you tomorrow...</p>
									</div>
									<button class="btn btn-primary btn-reply" data-toggle="modal" data-target="#chatModal">Reply</button>
								</div> -->
							</div>
									
								    </div>

							</div>
							
						</div>

					</div>

				</div>
			
			</div>

			<footer class="footer-wrapper">
			
				<div class="main-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-9">
							
								<div class="row">
								
									<div class="col-sm-6 col-md-4">
									
										<div class="footer-about-us">
											<h5 class="footer-title">About JobAbility</h5>
											<p>JobAbility is a job portal, online job management system developed by Graduating Students in NISU Lemery Campus for their Capstone Project.</p>
										
										</div>

									</div>
									
									<div class="col-sm-6 col-md-5 mt-30-xs">
										<h5 class="footer-title">Quick Links</h5>
										<ul class="footer-menu clearfix">
											<li><a href="../">Home</a></li>
											<li><a href="../job-list.php">Job List</a></li>
											<li><a href="../employers.php">Employers</a></li>
											<li><a href="../employees.php">Employees</a></li>
											<li><a href="../contact.php">Contact Us</a></li>
											<li><a href="#">Go to top</a></li>

										</ul>
									
									</div>

								</div>

							</div>
							
							<div class="col-sm-12 col-md-3 mt-30-sm">
							
								<h5 class="footer-title">JobAbility Contact</h5>
								
								<p>Address : NISU</p>
								<p>Email : <a href="mailto:JobAbility@gmail.com">JobAbility@gmail.com</a></p>
								<p>Phone : <a href="tel:+233546607474">+233 546 607 474</a></p>
								
							</div>

							
						</div>
						
					</div>
					
				</div>
				
				<div class="bottom-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-4 col-md-4">
					
								
								<p class="copy-right">&#169; Copyright <?php echo date('Y'); ?> BSIT 4-B</p>
								
							</div>
							
							<div class="col-sm-4 col-md-4">
							
								<ul class="bottom-footer-menu">
									<li><a >Capstone Project</a></li>
								</ul>
							
							</div>
							
							<div class="col-sm-4 col-md-4">
								<ul class="bottom-footer-menu for-social">
									<li><a href="<?php echo "$tw"; ?>"><i class="ri ri-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
									<li><a href="<?php echo "$fb"; ?>"><i class="ri ri-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
									<li><a href="<?php echo "$ig"; ?>"><i class="ri ri-instagram" data-toggle="tooltip" data-placement="top" title="instagram"></i></a></li>
								</ul>
							</div>
						
						</div>

					</div>
					
				</div>
			
			</footer>
			
		</div>

	</div>

 
 
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="../js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="../js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<script type="text/javascript" src="../js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="../js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="../js/customs.js"></script>


</body>



</html>