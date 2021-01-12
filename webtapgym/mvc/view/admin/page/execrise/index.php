   <div class="container-fluid">

          <!-- Page Heading -->
          <?php 
                  if (isset($data["result"])) {
                if ($data["result"] == "true") {?>
                    <p class="text text-success">Xóa thành công</p>
                <?php }
                else {?>
                    <p class="text text-danger">Xóa thất bại</p>

                <?php }
              }
           ?>
          <a href="execrise/insert_form" class="btn btn-warning">Thêm</a>
          <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Tên bài tập</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Mô tả</th>
                      <th scope="col">Nhóm cơ</th>
                      <th >&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 1;
                        while ($row = mysqli_fetch_array($data["execrise"])) {?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["name"] ?></td>
                                <td style="width: 20%;"><img src="<?php echo $row["image"]; ?>" alt="" style="width: 100%;"></td>
                                <td><p>
                                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample<?php echo $row["id"] ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                     Xem nội dung
                                    </a>
                                  </p>
                                  <div class="collapse" id="collapseExample<?php echo $row["id"] ?>">
                                    <div class="card card-body">
                                      <?php echo $row["decription"] ?>
                                    </div>
                                  </div>
                                </td>
                                <td><?php echo $row["name_execrise"]; ?></td>
                                <td><a href="execrise/edit/<?php echo $row["id"] ?>" class="btn btn-primary">Sửa</a></td>
                                <td><a href="execrise/delete/<?php echo $row["id"] ?>" class="btn btn-danger">Xóa</a></td>
                              </tr>
                          <?php 
                         $i++;
                             }
                       ?>
               
                  </tbody>
                </table>
          </div>
        
   </div>