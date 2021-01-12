<section class="section-product">
		<div class="container">
			<?php 
				while ($detail = mysqli_fetch_array($data["detail"])) {?>
					<div class="row title-detail">

						<div class="col-12 content-box">
							<form action="home/add_to_card/<?php echo $detail["id"];?>" method="post">
								<div class="form-group">
								<div class="form-group" style="padding-bottom: 20px;">
									<input type="submit" name="insert" class="btn btn-primary " value="Thêm vào danh sách">
								</div>
							</form>
							<h5><?php echo $detail["name"]; ?></h5>

						</div>
					</div>
					<div class="row detail">
						<div class="col-12">
							<?php echo $detail["decription"]; ?>
						</div>
					</div>
				<?php }
			 ?>

		</div>
	</section>