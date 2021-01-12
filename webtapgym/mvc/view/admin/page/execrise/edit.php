   <div class="container-fluid">

          <!-- Page Heading -->

          <?php 
              while ($row = mysqli_fetch_array($data["edit"])) {?>
                  <form action="execrise/update/<?php echo $row["id"] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="">Tên bài tập</label>
                      <input type="text" class="form-control" name="name" placeholder="Nhập tên bài tập" value="<?php echo $row["name"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Hình ảnh</label>
                      <input type="file" class="form-control" name="image" placeholder="Nhập hình ảnh">
                    </div>
                    <div class="form-group">
                      <label for="">Mô tả</label>
                     <textarea  id="editor" cols="30" rows="10" name="decription" class="form-control ckeditor"><?php echo $row["decription"]; ?>"</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Nhóm cơ</label>
                      <select name="type" class="form-control">
                        <?php 
                          while ($type = mysqli_fetch_array($data["type"])) {?>
                              <option value="<?php echo $type["id"] ?>"><?php echo $type["name"] ?></option>
                          <?php }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control" name="update" value="Sửa">
                    </div>
                  </form>
              <?php }
           ?>
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
   </div>