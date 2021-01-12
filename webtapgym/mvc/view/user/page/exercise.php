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
						<th>Thứ</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						while ($row = mysqli_fetch_array($data["detail"])) { ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $row["date"] ?></td>
								<td><a href="home/delete_order/<?php echo $row["id"]; ?>" class="btn btn-danger">Xóa</a></td>
								<td><a href="home/execrise_detail/<?php echo $row["id_calendar"] ?>"class="btn btn-warning">Xem chi tiết</a></td>
							</tr>
						<?php 

						$i++;	 }
					 ?>

				</tbody>
			</table>
		</div>
	</section>