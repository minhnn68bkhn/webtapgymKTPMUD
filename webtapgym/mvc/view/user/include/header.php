<html lang="vn">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="http://localhost/webtapgym/">
<link rel="stylesheet" href="public/css/style.css">
<link rel="stylesheet" href="public/css/bootstrap.css">
<link rel="icon" href="public/uploads/logo.png">
<script src="https://kit.fontawesome.com/03bca92048.js" crossorigin="anonymous"></script>
<title>WebSite Gym</title>
</head>
<body>
	<!-- section header -->
	<section class="section-header">
		<div class="container">
			<!-- banner -->
			<div class="banner">
				<a href="home"><img src="public/uploads/logo.png" alt=""></a>
				<h3>Gym Is My Life</h3>
			</div>
			<!-- end banner -->
			<!-- menu header -->
			<div class="menu-header">
				<ul class="menu-parents">
					<li><a href="home">Trang chủ</a></li>
				<?php 
					while ($row = mysqli_fetch_array($data["menu"])) {?>
							<li><a href="home/type_execrise/<?php echo $row["id"]; ?>"><?php echo $row["name"] ?></a></li>
						
					<?php }
				 ?>
				<!-- <li class="child"><a href="#">Description</a>
						<ul class="menu-child">
							<li><a href="#">Tập bụng</a></li>
							<li><a href="#">Tập bụng</a></li>
							<li><a href="#">Tập bụng</a></li>
							<li><a href="#">Tập bụng</a></li>
						</ul>
					</li> -->
				</ul>
				<div class="form-search">
					<input type="text" class="form-control search-input" placeholder="Search" id="search_name">
						<ul class="search" id="search">
						</ul>
				</div>

				<?php 
					if (isset($_SESSION["rule"])) {?>
						<div class="profile">
							<ul class="relative">
									<li><a><?php echo $_SESSION["username"]; ?></a>
									<ul class="menu-profile">
									<li><a href="home/profile">Thông tin cá nhân</a></li>
									<li><a href="home/change_Pass">Đổi mật khẩu</a></li>
									<li><a href="home/exerice">Thông tin lịch tập</a></li>
									<li><a href="home/logout">Đăng xuất</a></li>
									</ul>
								</li>
							</ul>
						</div>
					<?php
					}
					else{?>
					<div class="login-out">
						<a href="home/login">Login</a>
						<a href="home/register">register</a>
					</div>
					<?php }
				 ?>
		

			</div>
			<!-- end menu header -->
		</div>

	</section>