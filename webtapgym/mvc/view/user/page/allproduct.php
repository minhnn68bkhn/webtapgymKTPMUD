<section class="section-product">
		<div class="container">
			<div class="row">
				<div class="col-4 title">
					<h3>các bài tập</h3>
				</div>
			</div>
			<div class="show-all">
				<?php 
					while ($row = mysqli_fetch_array($data["allproduct"])) {?>
					<div class="card">
						<a href="home/detail/<?php echo $row["id"]; ?>">
							<div class="image-box">
								<img src="<?php echo $row["image"] ?>" alt="">
							</div>
							<div class="content-box">
								<h2><?php echo $row["name"] ?></h2>
							</div>
						</a>
					</div>
					<?php }
				 ?>
			</div>
			<nav aria-label="Page navigation example">
				  <ul class="pagination">

				<?php $all = mysqli_num_rows($data["panigation"]);
					$one_page =6;
					$ceil = ceil($all/$one_page);
					for ($i=1; $i <= $ceil ; $i++) { ?>
				  	  <li class="page-item"><a class="page-link" href="./home/list&&page=<?php echo $i ?>"><?php echo $i; ?></a></li>	
					<?php }
				 ?>
				  </ul>

				</nav>
		</div>
	</section>