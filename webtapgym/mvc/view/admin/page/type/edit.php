   <div class="container-fluid">

          <!-- Page Heading -->
          <?php 
            if (isset($data["result"])) {
              if ($data["result"] == "true") {?>
                  <p class="text text-success">Sửa thành công</p>
              <?php }
              else {?>
                  <p class="text text-danger">Sửa thất bại</p>

              <?php }
            }
           ?>
           <?php 
              while ($row = mysqli_fetch_array($data["edit"])) {?>    
               <form action="type/update/<?php echo $row["id"]; ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="<?php echo $row["name"] ?>">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary form-control" name="update" value="Sửa">
                </div>
              </form>
              <?php }
            ?>

   </div>