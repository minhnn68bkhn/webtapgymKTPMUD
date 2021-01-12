   <div class="container-fluid">

          <!-- Page Heading -->
            <a class="collapse-item btn-primary btn" href="execrise">Danh sách</a>
          <form action="execrise/insert" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tên bài tập</label>
              <input type="text" class="form-control" name="name" placeholder="Nhập tên bài tập">
            </div>
            <div class="form-group">
              <label for="">Hình ảnh</label>
              <input type="file" class="form-control" name="image" placeholder="Nhập hình ảnh">
            </div>
            <div class="form-group">
              <label for="">Mô tả</label>
             <textarea  id="editor" cols="30" rows="10" name="decription" class="form-control ckeditor"></textarea>
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
              <input type="submit" class="btn btn-primary form-control" name="insert" value="Thêm">
            </div>
          </form>
                 <?php 
            if (isset($data["result"])) {
              if ($data["result"] == "true") {?>
                  <p class="text text-success">Thêm thành công</p>
              <?php }
              else {?>
                  <p class="text text-danger">Thêm thất bại</p>

              <?php }
            }
           ?>
   </div>