
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
   <!--  <script>
        setInterval(function(){
            location.reload();
        }, 10*1000);
    </script> -->
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
            
            <?php
if(isset($_SESSION['id_user']))
{
    
        $sql="SELECT * FROM `phieudkkham` WHERE `id_benhnhan` = ".$_SESSION['id_user']." AND `code_phieu`='yes'";
        $ketqua = mysqli_query($p->connect(),$sql);
        $i = @mysqli_num_rows($ketqua);
        echo '<form method="POST">'; 
        if($i>0)
        {
            echo '<h2 style="text-align:center">LỊCH HẸN KHÁM</h2>';
            echo'<table class="table table-bordered" >
              <tr>
                <td align="center" style="font-weight:bold" >STT</td>
                <td align="center"style="font-weight:bold">Bác sĩ</td>
                <td align="center" style="font-weight:bold">Ngày hẹn</td>
                <td align="center" style="font-weight:bold">Ngày đặt lịch</td>
                <td align="center" style="font-weight:bold">Triệu chứng</td>
                <td align="center" style="font-weight:bold">Phí khám</td>
                <td align="center" style="font-weight:bold">Thông tin</td>
              </tr>';
            $dem = 1;
            while($row = mysqli_fetch_array($ketqua))
            {
                $id_phieudkkham=$row['id_phieudkkham'];
                echo'
                <tr>
                    <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$dem.'</a></td>
                    <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$p->laycot("SELECT tenbacsi FROM bacsi WHERE id_bacsi= ".$row['id_bacsi']."").'</a></td>
                    <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngayhen'].'</a></td>
                    <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngaydatlich'].'</a></td>
                    <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['trieuchung'].'</a></td>
                    <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['phikham'].'</a></td>
                </tr>
                ';
                $dem++;
            }
            
        }
        
        
    if(isset($_SESSION['phieukham'])){       
            if(isset($_COOKIE[$_SESSION['phieukham']])){
           
                //$dem = 1;
                $new_sig="SELECT * FROM `phieudkkham` WHERE `id_benhnhan`=".$_SESSION['id_user']."  AND `id_phieudkkham`=".$_SESSION['phieukham']." AND `code_phieu`='no'";
                $kq=mysqli_query($p->connect(),$new_sig);
                echo '<form method="POST">'; 
                while($row = mysqli_fetch_array($kq))
                {
                    $id_phieudkkham=$row['id_phieudkkham'];
                    echo'
                    <tr>
                        <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$dem.'</a></td>
                        <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$p->laycot("SELECT tenbacsi FROM bacsi WHERE id_bacsi= ".$row['id_bacsi']."").'</a></td>
                        <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngayhen'].'</a></td>
                        <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngaydatlich'].'</a></td>
                        <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['trieuchung'].'</a></td>
                        <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['phikham'].'</a></td>
                        <td align="center" ><button onclick="?id_pk='.$id_phieudkkham.'" class="btn btn-danger" name="nutxoa">Hủy</td>
                    </tr>
                    ';
                    //$dem++;
                }   
                echo '</table>';
            echo'</form>';
            

            }
            else{
                $sql="UPDATE `phieudkkham` SET `code_phieu` = 'yes' WHERE `id_benhnhan`=".$_SESSION['id_user']."  AND `phieudkkham`.`id_phieudkkham` = ".$_SESSION['phieukham']."";
                mysqli_query($p->connect(),$sql);
                unset($_SESSION['phieukham']);
                unset($_SESSION['ngayhen']);
            }
    }
}
            elseif(isset($_SESSION['user_token']))
            {
                $sql1 ="SELECT * FROM phieudkkham WHERE token = ".$_SESSION['user_token']." AND `code_phieu`='yes'";
                $ketqua1 = mysqli_query($p->connect(),$sql1);
                $i1 = mysqli_num_rows($ketqua1);
                echo '<form method="POST">';
                if($i1>0)
                {
                    echo '<h2 style="text-align:center">LỊCH HẸN KHÁM</h2>';
                    echo'<table class="table table-bordered" style="height:50px" >
                    <tr>
                      <td align="center" >STT</td>
                      <td align="center">Bác sĩ</td>
                      <td align="center">Ngày hẹn</td>
                      <td align="center">Ngày đặt lịch</td>
                      <td align="center">Triệu chứng</td>
                      <td align="center">Phí khám</td>
                      <td align="center">Thông tin</td>
                    </tr>';
                  $dem = 1;
                 
                    while($row = mysqli_fetch_array($ketqua1))
                    {
                        $id_phieudkkham=$row['id_phieudkkham'];
                        echo'
                        <tr>
                            <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$dem.'</a></td>
                            <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$p->laycot("SELECT tenbacsi FROM bacsi WHERE id_bacsi= ".$row['id_bacsi']."").'</a></td>
                            <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngayhen'].'</a></td>
                            <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngaydatlich'].'</a></td>
                            <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$row['trieuchung'].'</a></td>
                            <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$row['phikham'].'</a></td>
                               
                        </tr>
                        ';
                        $dem++;
                    }
                
                }
                
                if(isset($_SESSION['phieukham']))
                {
                    if(isset($_COOKIE[$_SESSION['phieukham']]))
                    {
                        //$dem =1;
                        $new_lk= "SELECT * FROM `phieudkkham` WHERE `token`=".$_SESSION['user_token']." AND `id_phieudkkham`=".$_SESSION['phieukham']." AND `code_phieu`='no'";
                        $kq1= mysqli_query($p->connect(),$new_lk);
                        echo '<form method="POST">'; 
                       
                   
                        while($row = mysqli_fetch_array($kq1))
                        {
                            $id_phieudkkham=$row['id_phieudkkham'];
                            echo'
                            <tr>
                                <td align="center"><a href="?id_pk='.$id_phieudkkham.'">'.$dem.'</a></td>
                                <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$p->laycot("SELECT tenbacsi FROM bacsi WHERE id_bacsi= ".$row['id_bacsi']."").'</a></td>
                                <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngayhen'].'</a></td>
                                <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['ngaydatlich'].'</a></td>
                                <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['trieuchung'].'</a></td>
                                <td align="center" ><a href="?id_pk='.$id_phieudkkham.'">'.$row['phikham'].'</a></td>
                                <td align="center" ><button onclick="?id_pk='.$id_phieudkkham.'" class="btn btn-danger" name="nutxoa">Hủy</td>
                            </tr>
                            ';
                            //$dem++;
                        }   
                        echo '</table>';
                            echo'</form>';
                    }
                    else{
                        $sql="UPDATE `phieudkkham` SET `code_phieu` = 'yes' WHERE `token`=".$_SESSION['user_token']."  AND `phieudkkham`.`id_phieudkkham` = ".$_SESSION['phieukham']."";
                        mysqli_query($p->connect(),$sql);
                        unset($_SESSION['phieukham']);
                        unset($_SESSION['ngayhen']);
                    }
                }
            }
             
            
            ?>
        </div>
    </div>
</div>


</body>

</html>

<?php
if(isset($_POST['nutxoa']) && isset($_COOKIE[$_SESSION['phieukham']]))
{
       // $layid=$_REQUEST['id_pk'];
        if($p->themxoasua("DELETE FROM phieudkkham WHERE id_phieudkkham = ".$_SESSION['phieukham']."")==1)
        {
            echo '<script>alert("Hủy thành công ")</script>';
            header("refresh:1;url=lichhenkham.php");
        }
        else
        {
            echo '<script>alert("Hủy lịch không thành công ")</script>';
        } 
}

?>
