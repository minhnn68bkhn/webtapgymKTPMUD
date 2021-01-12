   <div class="container-fluid">

          <!-- Page Heading -->
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
          <form action="type/insert" method="post">
            <div class="form-group">
              <label for="">Tên nhóm cơ</label>
              <input type="text" class="form-control" name="name" placeholder="Nhập tên nhóm cơ">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary form-control" name="insert" value="Thêm">
            </div>
          </form>
   </div>