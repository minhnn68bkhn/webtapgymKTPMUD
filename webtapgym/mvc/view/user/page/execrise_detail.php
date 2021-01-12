<?php 
    if (!isset($_SESSION["rule"])|| !isset($_SESSION["id"])) {
       header("location:../home/login");
    }
 ?>
<section class="section-product">
		<div class="container">
			<table class="table table-dark">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên bài</th>
						<th>Hình ảnh</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						while ($row = mysqli_fetch_array($data["detail_exercise"])) {?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $row["name"] ?></td>
								<td style="width: 20%"><img src="<?php echo $row["image"] ?>" alt="" style="width: 100%"></td>
								<td><a href="home/detail/<?php echo $row["id"] ?>"class="btn btn-warning">Xem chi tiết</a></td>
								<td><a href="home/delete/<?php echo $row["id_detail"] ?>"class="btn btn-danger">Xóa</a></td>
							</tr>
						<?php 

						$i++;	 }
					 ?>

				</tbody>
			</table>
		</div>
	</section>