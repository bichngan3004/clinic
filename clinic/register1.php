<?php
ob_start();
include("class/config.php");
$p= new ketnoi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
        .container1
        {
            width: 500px;
            border-radius: 10px;
            background-color: #DDDDDD;
            padding: 20px;
            margin: 20px auto;
        }
        h2{
            text-align: center;
        }
        #erten,#erema,#erpass,#errepass,#ernamsinh,#erdiachi,#ersdt
        {
            color: red;
            font-style: italic;
        }
        select.form-control:not([size]):not([multiple]) {
     height: 30px; 
}
      
    </style>
    <script>
        $(document).ready(function(){
            function kiemtraten()
            {
                var ten = $("#txtten").val();
                //var reg = /^[A-Za-z0-9_\.]{6,32}$/;
                var reg=/^([A-Z]{1}[a-z]*\s)*([A-Z]{1}[a-z]*)$/;
                if(reg.test(ten))
                {
                    $("#erten").html("");
                    return true;
                }
                else
                {
                    $("#erten").html("Tên tài khoản không hợp lệ! ");
                    return false;
                }
            }
            $("#txtten").blur(kiemtraten);
            function kiemtraemail()
            {
                var email = $("#txtem").val();
                var reg = /^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/;
                if(reg.test(email))
                {
                    $("#erema").html("");
                    return true;
                }
                else
                {
                    $("#erema").html("Email không hợp lệ hoặc tồn tại!");
                    return false;
                }
            }
            $("#txtem").blur(kiemtraemail);
            function kiemtrapass()
            {
                var pass = $("#txtpass").val();
                var reg = /(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}/;
                if(reg.test(pass))
                {
                    $("#erpass").html("");
                    return true;
                }
                else
                {
                    $("#erpass").html("Mật khẩu không hợp lệ hoặc tồn tại!");
                    return false;
                }
            }
            $("#txtpass").blur(kiemtrapass);
            function xacnhanpass()
            {
                var repass = $("#txtrepass").val();
                var pass = $("#txtpass").val();
                if(repass==pass)
                {
                    $("#errepass").html("");
                    return true;
                }
                else
                {
                    $("#errepass").html("Mật khẩu không hợp lệ!");
                    return false;
                }
            }
            $("#txtrepass").blur(xacnhanpass);
            //kiểm tra số điện thoại
            function kiemtrasdt()
            {
                var sdt = $("#txtsdt").val();
                var reg = /^(0)[0-9]{9}$/;
                if(reg.test(sdt))
                {
                    $("#ersdt").html("");
                    return true;
                }
                else
                {
                    $("#ersdt").html("Số điện thoại không hợp lệ");
                    return false;
                }
            }
            $("#txtsdt").blur(kiemtrasdt);
        })
        
        // hàm điều kiện bắt nhập đầy đủ thoogn tin mới đăng kí được
        $(function()
        {
            $("#myform").validate(
            {
                rules: 
                {
                email: 
                {
                    required: true,
                    email:true
                },
                url: 
                {
                    url:true
                },
                factor:
                {
                    required: true,
                    number:true  
                },
                items:
                {
                    required: true,
                    digits:true
                }
                }
            });    
        });
    </script>
</head>
<body>
    <?php
        include("menu.php");
    ?>
    <div class="container1">
    <h2>ĐĂNG KÝ</h2>
    <form method="POST" id="myform">
        <div class="form-group">
            <label for="ten">Họ và tên</label>
            <input type="text" class="form-control" id="txtten" name="txtten" placeholder="Heathy Life">
            <span id="erten">*</span>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="txtem" placeholder="heathylifent@gmail.com" name="txtem">
            <span id=erema>*</span>
        </div>
        <div class="form-group">
            <label for="pass">Mật khẩu</label>
            <input type="password" class="form-control" id="txtpass" placeholder="heathylifent123" name="txtpass">
            <span id="erpass">*</span>
        </div>
        <div class="form-group">
            <label for="repass">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="txtrepass" placeholder="heathylifent123" name="txtrepass">
            <span id="errepass">*</span>
        </div>
        <div class="form-group">
            <label for="gioitinh">Giới tính</label>
                <select class="form-control" id="gt" name="txtgioitinh">
                    <option value=""></option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>   
                </select>
        </div>
        <div class="form-group">
        <label for="tuoi">Năm sinh</label>
            <input type="text" class="form-control" id="txttuoi" placeholder="Năm sinh" name="txttuoi">
            <span id="ernamsinh">*</span>
        </div>
        <div class="form-group">
            <label for="diachi">Địa chỉ</label>
            <input type="text" class="form-control" id="txtdiachi" placeholder="Địa chỉ" name="txtdiachi">
            <span id="erdiachi">*</span>
        </div>
        <div class="form-group">
            <label for="sdt">Số điện thoại</label>
            <input type="text" class="form-control" id="txtsdt" placeholder="Số điện thoại" name="txtsdt">
            <span id="ersdt">*</span>
        </div>
        <button type="submit" id="btndk" name="nut" class="btn btn-primary">Đăng ký</button>
    </form>
    </div>
    <?php 
        
        if(isset($_POST['nut']))
        {
        //  var_dump($_POST); exit();
            $tenbn=$_REQUEST['txtten'];
            $email=$_REQUEST['txtem'];
            $pass=md5($_REQUEST['txtpass']);
            $repass=md5($_REQUEST['txtrepass']);
            $gioitinh = $_REQUEST['txtgioitinh'];
            $tuoi = $_REQUEST["txttuoi"];
            $diachi = $_REQUEST['txtdiachi'];
            $sdt = $_REQUEST['txtsdt'];
            $link = $p->connect();
            $sql2 = "INSERT INTO benhnhan (id_benhnhan,tenbenhnhan,gioitinh,namsinh,diachi,sdt) values (null,'$tenbn','$gioitinh','$tuoi','$diachi','$sdt')";
            if($tenbn!='' && $email!='' && $pass!='' && $repass!='' && $gioitinh!='' && $tuoi!='' && $diachi !='' && $sdt!='')
            {
                if(mysqli_query($link,$sql2))
                {
                    $last_id = mysqli_insert_id($link);
                    $sql1 = "INSERT INTO taikhoan (email,password,tentaikhoan,phanquyen,id_user) VALUES (
                        '$email','$pass','$tenbn','1','$last_id')";
                         /*echo $last_id; echo '<br>';
                         echo $pass; echo '<br>';
                         echo $repass;echo '<br>';
                         echo $tenbn;echo '<br>';
                         echo $email;
                         exit();*/
                        if(mysqli_query($link,$sql1))
                        {
                            header("location:./login.php");
                        }

                }
                else
                {
                    echo '<script>alert("Đăng ký không thành công!")</script>';
                }
            }
            else
            {
                echo'<script>alert("Vui lòng nhập đầy đủ thông tin!")</script>';
            }

           
        }
    ?>
    <?php
        include("footer.php");
    ?>
</body>
</html>