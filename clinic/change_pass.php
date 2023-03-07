<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['id_user']) && isset($_SESSION['tentaikhoan']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])==1)
{
    include("class/config.php");
    $q = new ketnoi();
    $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'], $_SESSION['phanquyen'],$_SESSION['id_user'],$_SESSION['tentaikhoan']);
}
else
{
    header("location:./login.php");
}
include("class/clsbenhnhan.php");
$p = new benhnhan();
$id_user = $_SESSION['id_user'];
$id = $_SESSION['id'];
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
    <link rel="stylesheet" href="./style/menu.css">
    <style>
        .inform{
            display: flex;
        }
        .information{
            display: flex;
            margin-left: 150px;
            margin-top: 50px;
           width: 1000px;
        }
        .information-details{
            margin-left: 50px;
        
        }
        .information-details p{
            padding: 2px 0px;
        }
        .sidebar{
            width: 250px;
            border: 1px solid black;
            padding-left: 30px;
            height: 500px;
            background-color: #dddd;
        }
        .sidebar_nav{
            list-style: none;
        }
        .sidebar_nav li{
            line-height: 50px;
        }
        .sidebar_nav li a{
            color: black;
        }
        .nut{
            margin-top: 210px;
            margin-left: 100px;
        }
       select.form-control{
        padding: 0px 12px;
       }
       .update{
        padding-left: 200px;
       }
    </style>
</head>
<body>
<div class="row" style="margin: 0px; " id="menu" >
        <div class="col-sm-12" id="menu-list">
            <ul style="margin: 0px;">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="#introduces">GIỚI THIỆU</a></li>
                <li><a href="#doctors">ĐỘI NGŨ BÁC SĨ</a></li>
                <li><a href="datlich.php">ĐẶT LỊCH</a></li>
                <li><a href="xemtintuc.php">TIN TỨC</a></li>
                <li><a href="#khoas">CHUYÊN KHOA</a></li>
                <li><a href="#contact">LIÊN HỆ</a></li>
            </ul>
        </div>
</div>   
<div class="inform">
        <div class="sidebar">
            <ul class="sidebar_nav">
                <li><a href="xemthongtinbn.php"><i class="fa fa-bars"></i>&emsp;THÔNG TIN CÁ NHÂN</a></li>
                <li><a href=""><i class="fa  fa-calendar"></i>&emsp;XEM LỊCH HẸN KHÁM</a></li>
                <li><a href=""><i class="fa fa-bed"></i>&emsp;LỊCH SỬ KHÁM BỆNH</a></li>
                <li><a href="updatetaikhoan.php"><i class="fa fa-address-card"></i>&emsp;CẬP NHẬT TÀI KHOẢN</a></li>
            </ul>
        </div>
        <div class="information">
            <div class="container" style="width: 500px">
                <h2 style="font-weight: bold;">THAY ĐỔI MẬT KHẨU</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Nhập mật khẩu cũ</label>
                        <input type="password" name="oldpass" id="" required="required" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Nhập mật khẩu mới</label>
                        <input type="password" name="newpass" id="" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu mới</label>
                        <input type="password" name="repass" id="" required="required" class="form-control">
                    </div>
                    <button type="submit" name="nut" class="btn btn-primary">Xác nhận</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
 <?php
 if (isset($_POST['nut']))
 {
 $oldpass = md5($_REQUEST['oldpass']);
 $newpass = md5($_REQUEST['newpass']);
 $repass = md5($_REQUEST['repass']);
 
   $sql = "SELECT * FROM taikhoan WHERE id ='$id'";
   $ketqua = mysqli_query($p->connect(),$sql);
   $i = mysqli_num_rows($ketqua);
   if($i>0)
   {
        while($row = mysqli_fetch_array($ketqua))
        {
            $pass = $row['password'];  // trong bảng tài khoản
            if($pass == $oldpass)
            {
                if($newpass == $repass)
                {
                    if($p->themxoasua("UPDATE taikhoan SET `password` = '$newpass' WHERE id = '$id';")==1)
                    {
                        echo "<script>alert('Cập nhật thành công')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Cập nhật không thành công')</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Mật khẩu mới và nhập lại mật khẩu mới không hợp lệ')</script>";
                }
            }
           
        }
   }
 }
 
 ?>
    
    
   
  
<footer><?php include("footer.php") ?></footer>

  
</body>
</html>