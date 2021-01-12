   <div class="container-fluid">

          <!-- Page Heading -->

          <div class="table-responsive">
               <a href="javascript:history.go(-1)" class="btn btn-warning form-group">Trở lại</a>
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Tên bài</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Ngày tập</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 1;
                        while ($row = mysqli_fetch_array($data["list"])) {?>
                               <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $row["name"]; ?></td>
                                 <td style="width: 20%;"><img src="<?php echo $row["image"]; ?>" style="width: 100%;" alt=""></td>
                                 <td><?php echo $row["date"]; ?></td>
                               </tr>    
                        <?php

                        $i++; }
                     ?>    
                  </tbody>
                </table>
          </div>
        
   </div>