
<?php
session_start();
ob_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['id_user']) && isset($_SESSION['tentaikhoan']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])==1)
{
    include("class/config.php");
    $q = new ketnoi();
    $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'], $_SESSION['phanquyen'],$_SESSION['id_user'],$_SESSION['tentaikhoan']);
}
elseif(isset($_SESSION['user_token']))
{
    
}
else
{
    header("location: login.php");
}
include("class/clsbenhnhan.php");
$p = new benhnhan();
$layid=0;
if(isset($_REQUEST['id_pk']))
{
	$layid=$_REQUEST['id_pk'];
}
//$user = $p->show_info($_SESSION['tentaikhoan']);
//$lichkham = $p->showlichhen($user['id_user']);
//$id_user = $_SESSION['id_user'];
//$id = $_SESSION['id'];
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
            /*padding-left: 30px;*/
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
                <li><a href="lichhenkham.php"><i class="fa  fa-calendar"></i>&emsp;XEM LỊCH HẸN KHÁM</a></li>
                <li><a href="lichsukhambenh.php"><i class="fa fa-bed"></i>&emsp;LỊCH SỬ KHÁM BỆNH</a></li>
                <li><a href="updatetaikhoan.php"><i class="fa fa-address-card"></i>&emsp;CẬP NHẬT TÀI KHOẢN</a></li>
            </ul>
        </div>
        <p style="padding-left: 5px;"> <b>Lưu ý: </b> <br>
            <b>Ca 1:</b> 07:00-09:00 <br>
            <b>Ca 2:</b> 09:00-11:00<br>
            <b>Ca 3:</b> 15:00-17:00<br>
            <b>Ca 4:</b> 17:00-19:00</p>
        <div class="information">
        <div class="container" style="width:800px; margin-left:60px;">
                <h3 style="text-align: center;font-weight: bold;">LỊCH SỬ KHÁM BỆNH</h3>
          

                <?php
                if(isset($_SESSION['id_user']))
                {
                    $sql ="SELECT * FROM phieukhambenh WHERE id_benhnhan = ".$_SESSION['id_user']."";
                    $ketqua = mysqli_query($p->connect(),$sql);
                    $i = mysqli_num_rows($ketqua);
                    echo '<form method="POST">';
                    
                    if($i>0)
                    {
                    /* echo' <label for="txtid"></label>
                        <input name="txtid" type="text" id="txtid" value=" '.$layid.'" />';*/
                        echo'<table class="table table-bordered" >
                        <tr>
                            <td align="center" style="font-weight:bold" >STT</td>
                            
                            <td align="center" style="font-weight:bold">Giờ khám</td>
                            <td align="center" style="font-weight:bold">Phí khám</td>
                            <td align="center" style="font-weight:bold">Kết quả</td>
                            <td align="center" style="font-weight:bold">Chỉ dẫn</td>
                        </tr>';
                        $dem = 1;
                        while($row = mysqli_fetch_array($ketqua))
                        {
                            $id_phieukham=$row['id_phieukham'];
                            echo'
                            <tr>
                                <td align="center"><a href="?id_pk='.$id_phieukham.'">'.$dem.'</a></td>
                                
                                <td align="center"><a href="?id_pk='.$id_phieukham.'">'.$row['giokham'].'</a></td>
                                <td align="center"><a href="?id_pk='.$id_phieukham.'">'.$row['phikham'].'</a></td>
                                <td align="center"><a href="?id_pk='.$id_phieukham.'">'.$row['ketqua'].'</a></td>
                                <td align="center"><a href="?id_pk='.$id_phieukham.'">'.$row['chidan'].'</a></td>
                            </tr>
                            ';
                            $dem++;
                        }
                        echo '</table>';
                    
                    }
                    echo'</form>';
                
                }
                elseif(isset($_SESSION['user_token']))
                {
                    $sql1 ="SELECT * FROM phieukhambenh WHERE token = ".$_SESSION['user_token']."";
                    $ketqua1 = mysqli_query($p->connect(),$sql1);
                    $i1 = mysqli_num_rows($ketqua1);
                    echo '<form method="POST">';
                    if($i1>0)
                    {
                        echo'<table class="table table-bordered" style="height:50px" >
                        <tr>
                            <td align="center" style="font-weight:bold">STT</td>
                            <td align="center" style="font-weight:bold">Ngày khám</td>
                            <td align="center" style="font-weight:bold">Giờ khám</td>
                            <td align="center" style="font-weight:bold">Phí khám</td>
                            <td align="center" style="font-weight:bold">Kết quả</td>
                            <td align="center" style="font-weight:bold">Chỉ dẫn</td>
                        </tr>';
                    $dem = 1;
                    while($row = mysqli_fetch_array($ketqua1))
                    {
                        $id_phieukham=$row['id_phieukham'];
                        echo'
                        <tr>
                            <td align="center"><a href="?id_pk='.$id_phieukham.'">'.$dem.'</a></td>
                            <td align="center" ><a href="?id_pk='.$id_phieukham.'">'.$row['ngaykham'].'</a></td>
                            <td align="center" ><a href="?id_pk='.$id_phieukham.'">'.$row['giokham'].'</a></td>
                            <td align="center" ><a href="?id_pk='.$id_phieukham.'">'.$row['phikham'].'</a></td>
                            <td align="center" ><a href="?id_pk='.$id_phieukham.'">'.$row['ketqua'].'</a></td>
                            <td align="center" ><a href="?id_pk='.$id_phieukham.'">'.$row['chidan'].'</a></td>
                        </tr>
                        ';
                        $dem++;
                    }
                    echo '</table>';
                    }
                    echo'</form>';
                }
                ?>
        </div>
        </div>
    </div>
</div>
<footer><?php include("footer.php") ?></footer>
