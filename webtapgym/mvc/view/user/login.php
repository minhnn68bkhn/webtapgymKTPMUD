<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/webtapgym/">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Login</title>
</head>
<body>
        <div class="login">
            <p>Chưa có tài khoản <a href="home/register">Đăng ký</a></p>
            <form action="home/login" method="post">
                <div class="form-group">
                    <label for="">Tài khoản:</label>
                    <input type="text" name="username" placeholder="Nhập tài khoản">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu:</label>
                    <input type="password" name="password" placeholder="Nhập tài khoản">
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Đăng nhập">
                </div>
            </form>
            
        </div>
</body>

</html>