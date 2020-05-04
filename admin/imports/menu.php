<header class="main-header">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo URL ?>admin/index.php"><img src="<?php echo URL ?>admin/assets/images/logo.png" width="75"></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar1">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo URL ?>admin/donation/donations.php">Donations</a></li>
					
					<li><a href="<?php echo URL ?>admin/request/donate_request.php">Donation Requestes</a></li>
					
					<li><a href="<?php echo URL ?>admin/posts/posts.php">Posts</a></li>

					<li><a href="<?php echo URL ?>admin/causes/causes.php">Causes</a></li>

					<li><a href="<?php echo URL ?>admin/causes/causes_request.php">Causes Requestes</a></li>

					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Categories <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo URL ?>admin/categories/categories.php">Categories</a></li>
								<li><a href="<?php echo URL ?>admin/categories/create_categories.php">Add Category</a></li>
								<li><a href="<?php echo URL ?>admin/categories/create_sub_categories.php">Add Sub Category</a></li>
							</ul>
						</li>

					<?php if ($_SESSION['admin_level'] == 1) { ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Admin <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo URL ?>admin/admin/users_list.php">Users</a></li>
								<li><a href="<?php echo URL ?>admin/admin/create_user.php">Create Users</a></li>
								<li><a href="<?php echo URL ?>admin/admin/audit_trails.php">Audit Trails</a></li>
							</ul>
						</li>
					<?php } ?>

				</ul>

					<ul class="nav navbar-nav navbar-right">
					
					<?php if (isset($_SESSION['admin_user_id'])) { ?>

						<li><p class="navbar-text">Signed in as <?php echo $_SESSION['admin_name']; ?></p></li>
						<li><a href="<?php echo URL ?>admin/accounts/logout.php" title="Logout" alt="Logout"> <i class="fa fa-sign-in"></i> </a></li>

					<?php } ?>

				</ul>
			</div>
		</div>
	</nav>
</header>