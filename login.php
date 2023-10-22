<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <!-- Css -->
  <link rel="stylesheet" href="css/login.css" type="text/css">
   <!-- Jquery -->
   <script src="lib/Jquery/Jquery.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<script>
        
function kiemTraDangNhap(){
    a=document.getElementById("username").value;
    b=document.getElementById("password").value;
    if(a == "")
        {
            alert("Tài khoản không được để trống!Vui lòng nhập tài khoản.");
            form.username.focus();
            return false;
        }
    if(b == "")
        {
            alert("Mật khẩu không được để trống!Vui lòng nhập mật khẩu.");
            form.password.focus();
            return false;
        }
    $.ajax({
        url:"php/xulydangnhapadmin.php",
        type:"post",
        data: {
            data_username:a,
            data_password:b
        },
        //async:true,
        success:function(kq){
            if(kq.indexOf("yes")!= -1) 
                {
                    alert("Đăng nhập thành công");
                    window.location="admin.php";
                }
             else {
                alert("Vui lòng kiểm tra lại tài khoản hoặc mật khẩu");
                document.getElementById("username").value="";
                document.getElementById("password").value="";
                form.username.focus();
             }
            // }
        }

    });
}
    </script>
<form action="" method="post" name="form">
  <div class="imgcontainer">
    <img src="img/img_avatar2.gif" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Tên Đăng Nhập</b></label>
    <input type="text" placeholder="Nhập Tài Khoản" id="username" required>

    <label for="password"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập Mật Khẩu" id="password" required>

    <button type="button" onclick="kiemTraDangNhap()">Đăng Nhập</button>
    <label>
      <a href="adminquenpass.php"> Quên Mật Khẩu? </a>
    </label>
  </div>

  
</form>
 

       
           
</body>
</html>