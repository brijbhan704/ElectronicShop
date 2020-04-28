<!-- <?php
//session_start();
		/*include('include/config.php');
		$sql=mysqli_query($con,"SELECT username FROM admin");
		$data = mysqli_fetch_assoc();
		echo $data['username'];
*/




?> -->
<head>
	<style type="text/css">
		body{
			background-color:#f1f2f7;
		}
		.navbar-inner{
			background-color: #00ccff!important;
		}
	</style>

</head>
<div class="navbar navbar-fixed-top ">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="">
			  		  Admin Panel
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
						<li><a href="#">
							Admin
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="change-password.php">Change Password</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
