   <div class="container-fluid">

          <!-- Page Heading -->

          <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Tên Khách hàng</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $i=1;
                        while ($row= mysqli_fetch_array($data["get_cus"])) {?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $row["name"]; ?></td>
                              <td><a href="listcus/exe_cus/<?php echo $row["id"]; ?>" class="btn btn-warning">Xem lịch tập</a></td>
                          </tr>
                        <?php
                        $i++; }
                     ?>
                     
                  </tbody>
                </table>
          </div>
        
   </div>