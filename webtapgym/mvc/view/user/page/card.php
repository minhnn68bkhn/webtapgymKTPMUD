<?php 
    if (!isset($_SESSION["rule"])|| !isset($_SESSION["id"])) {
       header("location:../home/login");
    }
 ?>
<section class="section-product">
		<div class="container">
			<form action="home/insert_detail" method="post">
				<table class="table table-dark">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên bài tập</th>
							<th>Hình ảnh</th>
							<th>Thuộc nhóm cơ</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
							<?php 
							$i =1;
								if (isset($_SESSION["cart"])) {
									foreach ($_SESSION["cart"] as  $value) {?>
										<tr>
											<td><?php echo $i ?></td>
											<td><?php echo $value["name_"] ?></td>
											<td style="width: 20%;"><img src="<?php echo $value["image"] ?>" alt="" style="width: 100%;"></td>
											<td><?php echo $value["name_execrise"] ?></td>
											<td><a href="home/delete_cart/<?php echo $value["id"]; ?>" class="btn btn-danger">Xóa</a></td>

										</tr>
									<?php
									$i++; }
								}
							 ?>
					</tbody>
				</table>
				<div class="form-group">
					<label for="" style="color:#fff;">Chọn ngày tập</label>
					<select name="calendar">
						<?php while ($date = mysqli_fetch_array($data["calendar"])) {?>
							<option value="<?php echo $date["id"] ?>"><?php echo $date["name"] ?></option>	
						<?php } ?>
					</select>
					<button type="submit" name="add_order" class="btn btn-warning">Thêm vào danh sách bài tập</button>
				</div>
			</form>

		</div>
	</section>