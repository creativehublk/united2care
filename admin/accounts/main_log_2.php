<?php require_once '../imports/global.php' ?>
<?php require_once '../imports/url.php' ?>
<?php require_once '../db/db.php' ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DILFER Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php require_once '../imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">


		<?php
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_name']);
		//check if form is submitted
		if (isset($_POST['login'])) {

			$cus_id = mysqli_real_escape_string($con, $_POST['cus_id']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			$result = mysqli_query($con, "SELECT * FROM `admin` WHERE `username` = '" . $cus_id. "' AND `password` = '" . md5($password) . "'  ");

			if ($row = mysqli_fetch_array($result)) {
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['admin_name'] = $row['username'];

				//AUDIT TRAIL--START//
				// date_default_timezone_set('Asia/Kolkata');
				// $today=date('d-m-Y');
				// $time=date("h:i:sa");
				// $audit_name=$_SESSION['usr_name'];
				// $sql = "INSERT INTO audit_trail (date,time,process,action,description) VALUES ('$today','$time','Login','New Login','User $audit_name logged into the Admin Portal') ";
				// $result = $con->query($sql);
				//AUDIT TRAIL--END//

				header("Location: ../dashboard.php");
			} else {
				$errormsg = "Incorrect username or password!!!";
			}
			
		}
		?>


		<div class="container">
			<div class="row login">
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-4">
						<div class="form-group welcome">
							<h4 class="">Sign In - Admin</h4>
							<img src="<?php echo URL ?>admin/assets/images/logo.png" style="width: 100%">
						</div>
					</div>
					<div class="col-md-8">
						<form role="form" action="main_log.php" method="post" name="loginform">
							<fieldset>
								<div class="form-group">
									<label for="name" class="col-lg-4 control-label">User ID</label>
									<input type="text" name="cus_id" placeholder="Your ID" required class="form-control" />
								</div>
								
								<div class="form-group">
									<label for="name" class="col-lg-2 control-label">Password</label>
									<input type="password" name="password" placeholder="Your Password" required class="form-control" />
								</div>
								
								<div class="form-group">
									<input type="submit" name="login" value="Login" class="btn btn-primary" />
								</div>
						</form>
						<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
					</div>
				</div>
			</div>
		</div>


        <?php include '../imports/footer.php'; ?> 
    </body>

    <?php require_once '../imports/js.php' ?>


</html>


