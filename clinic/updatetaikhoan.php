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
$id_user = $_SESSION['id_user'];
include("./class/clsbenhnhan.php");
$p = new benhnhan();
$layid=0;
if(isset($_REQUEST['id']))
{
    $layid=$_REQUEST['id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
<?php include("header.php") ?>
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
            <div class="container">
                <h2 class="update">THÔNG TIN TÀI KHOẢN</h2> 
                <div class="row">
                    <div class="col-6">
                       <p>Email:</p>
                       <p>Mật khẩu:</p>
                    </div>
                    <div class="col-6">
                        <p><?php echo $p->laycot("select email from taikhoan where id_user = '$id_user'")?></p>
                        <p>******</p>
                        <p><a href="change_pass.php">Cập Nhật<img src="./img/update.png" width="20px" class="ml-1"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
    
    
   
  
<footer><?php include("footer.php") ?></footer>


</body>

</html>