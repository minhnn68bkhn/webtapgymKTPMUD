<?php 
    if (!isset($_SESSION["rule"])|| !isset($_SESSION["id"])) {
       header("location:../home/login");
    }
 ?>
<section class="section-product">
<div class="container">
            <div class="login" style="height: 350px;">
     
                        <form action="home/change" method="post" >
                          <p>Đổi mật khẩu</p>
                                    <?php 
                    if (isset($data["result"])) {
                           if ($data["result"] =="true") {?>
                              <p>Đổi mật khẩu thành công</p>
                           <?php }
                           else{?>
                                 <p>Chưa nhập mật khẩu</p>
                           <?php }
                        }
                     ?>
                        <div class="form-group">
                            <label for="">Mật khẩu mới:</label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu xác nhận:</label>
                            <input type="password" name="password-confim" placeholder="Nhập mật khẩu xác nhận">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="change_pass" value="Lưu">
                        </div>
       
                    </form>

        </div>
</div>
</section>
