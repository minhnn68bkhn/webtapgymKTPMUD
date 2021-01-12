<?php 
    if (!isset($_SESSION["rule"])|| !isset($_SESSION["id"])) {
       header("location:../home/login");
    }
 ?>
<section class="section-product">
<div class="container">
            <div class="login">
                <?php 
                    while ($row = mysqli_fetch_array($data["profile_user"])) {?>
                        <form action="home/chageprofile" method="post">
                                    <?php 
                    if (isset($data["result"])) {
                           if ($data["result"] =="true") {?>
                              <p style="color: #00FF00;">Đổi Thông tin thành công</p>
                           <?php }
                           else{?>
                                 <p style="color:#FF0000;">Chưa nhập thông tin</p>
                           <?php }
                        }
                     ?>
                          <p>Thông tin cá nhân</p>
                        <div class="form-group">
                            <label for="">Họ tên:</label>
                            <input type="text" name="name" placeholder="Nhập tài khoản" value="<?php echo $row["name"] ?>">
                        </div>
                         <div class="form-group">
                            <label for="">Số điện thoại:</label>
                            <input type="text" name="number" placeholder="Nhập số điện thoại" value="<?php echo $row["phone"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ:</label>
                            <input type="text" name="address" placeholder="Nhập địa chỉ"value="<?php echo $row["address"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" name="email" placeholder="Nhập địa chỉ email" value="<?php echo $row["email"] ?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="change_profile" value="Sửa thông tin">
                        </div>

                    </form>
                    <?php }
                 ?>

        </div>

</div>
</section>
