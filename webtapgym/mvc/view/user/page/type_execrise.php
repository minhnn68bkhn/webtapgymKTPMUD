<section class="section-product">
		<div class="container">
			<div class="row">
				<div class="col-4 title">
					<h3>các bài tập</h3>
				</div>
			</div>
			<div class="show-all">
				<?php 
					while ($execrise = mysqli_fetch_array($data["type_execrise"])) {?>
						<div class="card">
							<a href="home/detail/<?php echo $execrise["id"]; ?>">
								<div class="image-box">
									<img src="<?php echo $execrise["image"] ?>" alt="">
								</div>
								<div class="content-box">
									<h2><?php echo $execrise["name"]; ?></h2>
								</div>
							</a>
						</div>
					<?php }
				 ?>

			</div>
		</div>
	</section>