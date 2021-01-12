<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/webtapgym/">
    <link rel="stylesheet" href="public/css/register.css">
    <title>Login</title>
</head>
<body>
            <p style="color:#fff; position: absolute;top: 10%; z-index: 10;">Đã có tài khoản <a href="home/login">Đăng nhập</a></p>
        <div class="login">
            <form action="home/register" method="POST">
                <div class="form-group">
                    <label for="">Họ tên:</label>
                    <input type="text" name="name" placeholder="Nhập họ tên" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">tài khoản:</label>
                    <input type="text" name="username" placeholder="Nhập tài khoản" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu:</label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại:</label>
                    <input type="text" id="phone" name="number" placeholder="Nhập số điện thoại" autocomplete="off">
                    <label class="text text-warning" id="text"></label>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ:</label>
                    <input type="text" name="address" placeholder="Nhập địa chỉ" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" name="email" placeholder="Nhập địa chỉ email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">giới tính:</label>
                    Nam<input type="radio" name="gender" checked="checked" value="Nam">
                    Nữ<input type="radio" name="gender" value="Nữ">
                </div>
                <div class="form-group">
                    <input type="submit" name="register" value="Đăng ký">
                </div>
            </form>
            <?php 
                if (isset($data["result"])) {
                    if ($data["result"]=="true") {?>
                        <p><?php echo "Đăng ký thành công"; ?></p>
                    <?php }
                    else {?>
                        <p><?php echo "Tài khoản có thể đã tồn tại"; ?></p>
                    <?php }

                }
             ?>
             <?php
                if (isset($data["true"])) {
                     if ($data["true"]==1) {?>
                         <p>chưa điền đầy đủ thông tin</p>
                     <?php }
                 } 
              ?>
            
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('form').click(function(){
    var vnf_regex = /((0|03|07|08|05)+([0-9][0-9]{9|10})\b)/g;
        var mobile = $('#phone').val();
        if(mobile !==''){
            if (vnf_regex.test(mobile) == false) 
            {
                $("#text").html("Số điện thoại của bạn không đúng định dạng!")
            }else{
                $("#text").html("Số điện thoại của bạn hợp lệ!")
            }
        }else{
            $("#text").html("Bạn chưa điền số điện thoại!")
        }
    });
    });

</script>
</html>