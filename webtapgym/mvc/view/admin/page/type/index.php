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
          <a href="type/insert_form" class="btn btn-warning">Thêm</a>
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên nhóm cơ</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 1;
                        while ($row = mysqli_fetch_array($data["data"])) {?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["name"] ?></td>
                                <td><a href="type/edit/<?php echo $row["id"] ?>" class="btn btn-primary">Sửa</a></td>
                                <td><a href="type/delete/<?php echo $row["id"] ?>" class="btn btn-danger">Xóa</a></td>
                              </tr>
                          <?php 
                         $i++;
                             }
                       ?>
               
                  </tbody>
          </table>
          </div>
        
   </div>