<?php
session_start();
ob_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['id_user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])==2)
{
	include('../class/config.php');
	$q=new ketnoi();
    $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'], $_SESSION['phanquyen'],$_SESSION['id_user']);
    
}
else
{
	header('location:../login.php');
}
include("../class/clsbacsi.php");
$p = new doctor();
$layid=$_SESSION['id_user'];
$layidpk=0;
if(isset($_REQUEST['id']))
{
	$layidpk=$_REQUEST['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <style>
       
        nav {
        line-height:30px;
        background-color: #eeeeee;
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
         
    
    <?php include("header3.php"); ?>
    <?php include("menu3.php"); ?>
  
     
    <nav>
    <ul>
    <li><a href="xemttcanhan.php"><i class="fa fa-bars"></i>&emsp;Xem thông tin cá nhân</a></li>
            <li><a href="dklichnghi.php"><i class="fa fa-calendar-days"></i>&emsp;Đăng ký lịch nghỉ</a></li>
            <li><a href="xemlichkham.php"><i class="fa fa-calendar-week"></i>&emsp;Xem lịch khám</a></li>
            <li><a href="xemlichsuchuabenh.php"><i class="fa fa-history"></i>&emsp;Lịch sử chữa bệnh</a></li>
            <li><a href="xemBNdki.php"><i class="fa fa-user-plus"></i>&emsp;Bệnh nhân đăng ký khám</a></li>
            <li><a href="qlbenhnhan.php"><i class="fa fa-user"></i>&emsp;Quản lý bệnh nhân</a></li>
            <li><a href="../logout.php"><i class="fa fa-toggle-off"></i>&emsp;Đăng xuất</a></li>
         </ul>
    </nav>
    <section>
        <div class="information">
            <div class="container" style="width:800px; margin-left:15px;">
                <h3 style="text-align: center;font-weight: bold">LỊCH KHÁM</h3>
                <label for="txtid"></label>
                <input name="txtid"  type="hidden"  id="txtid" value="<?php echo $layid; ?>" />      
                <?php
                   $link = $p->connect();
                   $sql = "select * from phieudkkham where id_bacsi='$layid'";
                   $ketqua = mysqli_query($link,$sql);
                   /*@mysqli_close($link);
                   $i = mysqli_num_rows($ketqua);
                   if($i>0)
                   {
                       echo'  <table class="table table-bordered">
                           <tr style="text-align: center;font-weight: bold">
                           <th >STT</th>
                           <th scope="col">BỆNH NHÂN</th>
                           <th>TRIỆU CHỨNG</th>
                           <th>NGÀY HẸN KHÁM</th>
                           <th>GIỜ KHÁM</th>
                          
                           </tr>
                       ';
                       $dem = 1;
                       while($row = mysqli_fetch_array($ketqua))
                       {
                        $id_phieudkkham = $row['id_phieudkkham'];
                        $id_benhnhan = $row['id_benhnhan'];
                        $trieuchung = $row['trieuchung'];
                        $ngayhen = $row['ngayhen'];
                        $giohen = $row['giohen'];
                       
                           echo ' 
                               <tr>
                                   <td style="text-align: center;">'.$dem.'</td>
                                   <td>'.$p->laycot("select tenbenhnhan from benhnhan where id_benhnhan='$id_benhnhan' ").'</td>
                                   <td>'.$trieuchung.'</td>
                                   <td>'.$ngayhen.'</td>
                                   <td>'.$giohen.'</td>
                                  
                               </tr>
                           ';
                           $dem++;
                       }
                       echo'</table>';
                    }*/

               ?>
               
               <button type="button" style="float: right; margin-bottom: 10px;" data-toggle="modal" data-target="#chitiet" class="btn btn-primary"  name="nut">Nhập phiếu khám</button>
                <table border="1" width="1000px" style="text-align:center;">
        	<tr >
             	<th >STT</th>
              
               <th style="width: 200px;">BỆNH NHÂN</th>
              <th >TRIỆU CHỨNG</th>
              <th >NGÀY HẸN KHÁM</th>
              <th >GIỜ HẸN</th>
              <th >TRẠNG THÁI</th>
            </tr>
            <?php
				$i=0;
				while($row=mysqli_fetch_array($ketqua))
				{
					$i++;
         // $id_code = $row['code_phieu'];
          $id_phieudkkham = $row['id_phieudkkham'];
          $id_benhnhan = $row['id_benhnhan'];
          $trieuchung = $row['trieuchung'];
          $ngayhen = $row['ngayhen'];
          $id_bacsi = $row['id_bacsi'];
          $array_ngayhen = explode('_', $row['ngayhen']);
			?>
            <tr>
            	<td><?php echo '<a href="?id='. $id_phieudkkham.'">'.$i.'</a>' ?></td>
                <td><?php echo '<a href="?id='. $id_phieudkkham.'">'.$p->laycot("select tenbenhnhan from benhnhan where id_benhnhan ='$id_benhnhan'").'</a>' ?></td>
                <td><?php echo '<a href="?id='. $id_phieudkkham.'">'.$trieuchung.'</a>' ?></td>
                <td><?php echo '<a href="?id='. $id_phieudkkham.'">'.date('j-m-Y',strtotime($array_ngayhen[1])).'</a>'?></td>
                <td><?php 
				if($array_ngayhen[0] == 1):
					echo "7:00 - 9:00";
				elseif($array_ngayhen[0] == 2):
					echo "9:00 - 11:00";
				elseif($array_ngayhen[0] == 3):
					echo "15:00 - 17:00";
				else:
					echo "17:00 - 19:00";	
				endif; ?></td>
                 <td>
					<?php
						if($row['status']==0)
						{
							echo'<a href="xuly.php?code='.$row['id_phieudkkham'].'">Xác nhận</a>';	
						}else
						{
							echo 'Đã khám';	
						}
					?>
                </td>
            </tr>
            <?php
			}
			?>
    </table>
            </div>
        </div>
        
    </div>
    </section>
     
    <footer>
    <?php include("footer3.php");?>
    </footer>
     
    </body>
    </html>
<!--Modal nhập phiếu khám bệnh-->
<div class="modal " id="chitiet" style="margin-top: 20px; border-radius:10px">
        <div class="modal-dialog">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" >PHIẾU KHÁM BỆNH</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="" method="POST">
                    <div class="form-group">
                      <?php $layid_bn = $p->laycot("SELECT id_benhnhan FROM phieudkkham WHERE id_phieudkkham =".$layidpk."")  ?>
                      <label class="font-weight-bolder">Tên bệnh nhân: </label>
                      <input type="text" class="form-control" name="txtngay" value="<?php 
                       echo $p->laycot("SELECT tenbenhnhan FROM benhnhan WHERE id_benhnhan='$layid_bn'");
                      ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Ngày khám: </label>
                      <input type="text" class="form-control" name="txtngay" value="<?php 
                       echo $p->laycot("SELECT ngayhen FROM phieudkkham WHERE id_phieudkkham='$layidpk'");
                      ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Giờ khám: </label>
                      <input type="time" class="form-control" name="txttime" value="">
                     
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Phí khám </label>
                      <input type="number" class="form-control" name="txtphi" value="<?php 
                             echo $p->laycot("SELECT phikham FROM phieudkkham WHERE id_phieudkkham='$layidpk'");
                                            ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Kết quả: </label>
                      <input type="text" class="form-control" name="txtkq"  value="<?php 
                                        ?>">
                    </div> 
                    <div class="form-group">
                      <label class="font-weight-bolder">Chỉ dẫn: </label>
                      <input type="text" class="form-control" name="txtcd"  value="<?php 
                                        ?>">
                    </div> 
                    <input type="hidden" class="form-control" name="txttoken"  value="<?php 
                        echo $p->laycot("SELECT token FROM phieudkkham WHERE id_phieudkkham='$layidpk'");
                                        ?>">
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="nutluu" value="Lưu"></input>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
        </div>
      </div>
    </div>
  </div>
<?php
if(isset($_POST['nutluu']))
{
    $ten = $_REQUEST['txtten'];
    $ngay = $_REQUEST['txtngay'];
    $gio = $_REQUEST['txttime'];
    $phikham = $_REQUEST['txtphi'];
    $kq = $_REQUEST['txtkq'];
    $chidan = $_REQUEST['txtcd'];
    $token = $_REQUEST['txttoken'];
    $id_phieudkkham = $p->laycot("SELECT id_phieudkkham FROM phieudkkham WHERE id_phieudkkham = '$layidpk'");
    $id_benhnhan = $p->laycot("SELECT id_benhnhan FROM phieudkkham WHERE id_phieudkkham = '$layidpk'");
    $id_bacsi = $p->laycot("SELECT id_bacsi FROM phieudkkham WHERE id_phieudkkham = '$layidpk'");
    if($token!='')
      if($p->themxoasua("INSERT INTO phieukhambenh(giokham, phikham, ketqua, chidan, id_bacsi,token,id_phieudkkham) VALUES ( '$gio', '$phikham', '$kq', '$chidan', '$id_bacsi','$token','$id_phieudkkham')")==1)
      {
          header("location: xemlichkham.php");
      }
      else
      {
          echo '<script>alert("Khong thanh cong")</script>';
      }
    else
    {
      if($p->themxoasua("INSERT INTO phieukhambenh(giokham, phikham, ketqua, chidan, id_bacsi,id_benhnhan,id_phieudkkham) VALUES ( '$gio', '$phikham', '$kq', '$chidan', '$id_bacsi','$id_benhnhan','$id_phieudkkham')")==1)
      {
          header("location: xemlichkham.php");
      }
      else
      {
          echo '<script>alert("Khong thanh cong")</script>';
      }
    }
}

?>
