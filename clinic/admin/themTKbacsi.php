<?php
session_start();
ob_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['id_user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])==3)
{
	include('../class/config.php');
	$q=new ketnoi();
    $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'], $_SESSION['phanquyen'],$_SESSION['id_user']);
    
}
else
{
	header('location:../login.php');
}
include("../class/clsadmin.php");
$p = new quantrivien();
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
        
        nav {
        line-height:30px;
        background-color: #eeeeee;
        height:400px;
        width:250px;
        float:left;
        padding:5px;
        } 
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
        #erten,#erema,#erpass,#errepass
        {
            color: red;
            font-style: italic;
        }
        nav ul li a{
            color: black;
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
        include("header2.php");
        include("menu2.php");
    ?>
    <nav>
    <ul>
            <li><a href="qlbacsi.php"><i class="fa fa-user-nurse"></i>&emsp;Quản lý bác sĩ</a></li>
            <li><a href="themTKbacsi.php"><i class="fa fa-address-book"></i>&emsp;Cấp tài khoản bác sĩ</a></li>
            <li><a href="qltintuc.php"><i class="fa fa-bell"></i>&emsp;Quản lý tin tức</a></li>
           
            <li><a href="xemBNdki2.php"><i class="fa fa-user-pen"></i>&emsp;Bệnh nhân đăng ký khám</a></li>
            <li><a href="qlbenhnhan2.php"><i class="fa fa-user"></i>&emsp;Quản lý bệnh nhân</a></li>
         </ul>
    </nav>
    <div class="container1">
    <h2>CẤP TÀI KHOẢN BÁC SĨ</h2>
    <form method="POST" id="myform">
        <div class="form-group">
            <label for="ten">Tên tài khoản:</label>
            <input type="text" class="form-control" id="txtten" name="txtten" placeholder="heathylife123">
            <span id="erten">*</span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="txtem" placeholder="heathylifent@gmail.com" name="txtem">
            <span id=erema>*</span>
        </div>
        <div class="form-group">
            <label for="pass">Mật khẩu:</label>
            <input type="password" class="form-control" id="txtpass" placeholder="heathylifent123" name="txtpass">
            <span id="erpass">*</span>
        </div>

        <tr>
           <td colspan="2" align="center">
            <button type="submit" id="btndk" name="dangky" class="btn btn-primary">Đăng ký</button>
            <button type="submit" id="btnthoat" name="thoat" class="btn btn-primary">Thoát</button>
           </td>
        </tr>

        
    </form>
    </div>
    <?php 
        
        if(isset($_POST['dangky']))
           {
            $ten=$_REQUEST['txtten'];
            $email=$_REQUEST['txtem'];
            $pass=md5($_REQUEST['txtpass']);
            $link = $p->connect();
            $sql2 = "INSERT INTO bacsi(id_bacsi,tenbacsi) values (null,'$ten')";
            if($ten!='' && $email!='' &&  $pass!='')
                {
                    if(mysqli_query($link,$sql2))
                    {
                        $last_id = mysqli_insert_id($link);
                        $sql1 = "INSERT INTO taikhoan (email,password,tentaikhoan,phanquyen,id_user) VALUES (
                            '$email','$pass','$ten','2','$last_id')";
                            if(mysqli_query($link,$sql1))
                            {
                                echo '<script>alert("Cấp tài khoản thành công!")</script>';
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
           if(isset($_POST['thoat']))
           {
               header('location:../index.php');
           }
    ?>
    <?php
        include("footer1.php");
    ?>
    </body>
    </html>


    
