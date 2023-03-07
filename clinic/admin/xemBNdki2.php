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
    <style>
       
        nav {
        line-height:30px;
        background-color:#eeeeee;
        height:300px;
        width:250px;
        float:left;
        padding:5px;
        }
        
        section {
        width:350px;
        float:left;
        padding:10px;
        }
        footer {
    
        clear:both;
     
        }
        nav ul li a{
            color: black;
        }
        </style>
</head>
<body>
         
   
    <?php include("header2.php"); ?>
    <?php include("menu2.php"); ?>

    <nav>
    <ul>
            <li><a href="qlbacsi.php"><i class="fa fa-user-nurse"></i>&emsp;Quản lý bác sĩ</a></li>
            <li><a href="themTKbacsi.php"><i class="fa fa-address-book"></i>&emsp;Cấp tài khoản bác sĩ</a></li>
            <li><a href="qltintuc.php"><i class="fa fa-bell"></i>&emsp;Quản lý tin tức</a></li>
            
            <li><a href="xemBNdki2.php"><i class="fa fa-user-pen"></i>&emsp;Bệnh nhân đăng ký khám</a></li>
            <li><a href="qlbenhnhan2.php"><i class="fa fa-user"></i>&emsp;Quản lý bệnh nhân</a></li>
         </ul>
    </nav>
    <section>
        <div class="information">
            <div class="container" style="width:800px; margin-left:50px;">
                <h3 style="text-align: center;font-weight: bold">DANH SÁCH BỆNH NHÂN ĐĂNG KÝ KHÁM</h3>
                            
                <?php
                   $link = $p->connect();
                   $sql = "select * from phieudkkham";
                   $ketqua = mysqli_query($link,$sql);
                   @mysqli_close($link);
                   $i = mysqli_num_rows($ketqua);
                   if($i>0)
                   {
                       echo'  <table class="table table-bordered">
                           <tr style="text-align: center;font-weight: bold">
                              <th>STT</th>
                              <th scope="col">BỆNH NHÂN</th>
                              <th>TRIỆU CHỨNG</th>
                              <th>NGÀY HẸN KHÁM</th>
                              <th>BÁC SĨ</th>
                           </tr>
                       ';
                       $dem = 1;
                       while($row = mysqli_fetch_array($ketqua))
                       {
                        $id_phieudkkham = $row['id_phieudkkham'];
                        $id_benhnhan = $row['id_benhnhan'];
                        $trieuchung = $row['trieuchung'];
                        $ngayhen = $row['ngayhen'];
                        $id_bacsi = $row['id_bacsi'];
                           echo ' 
                               <tr>
                                   <td style="text-align: center;">'.$dem.'</td>
                                   <td>'.$p->laycot("select tenbenhnhan from benhnhan where id_benhnhan ='$id_benhnhan'").'</td>
                                   <td>'.$trieuchung.'</td>
                                   <td>'.$ngayhen.'</td>
                                   <td>'.$p->laycot("select tenbacsi from bacsi where id_bacsi ='$id_bacsi'").'</td>
                               </tr>
                           ';
                           $dem++;
                       }
                       echo'</table>';
                    }
               ?>
            </div>
        </div>
        
    </div>
    </section>
     
    <footer>
    <?php include("footer1.php");?>
    </footer>
     
    </body>
    </html>


    
