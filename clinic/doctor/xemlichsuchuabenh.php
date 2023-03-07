<?php
session_start();
ob_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['id_user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])==2)
{
	include('../class/config.php');
	$q=new ketnoi();
    $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'], $_SESSION['phanquyen'],$_SESSION['id_user']);
    $layid=$_SESSION['id_user'];
}
else
{
	header('location:../login.php');
}
include("../class/clsbacsi.php");
$p = new doctor();
$layid_pk=0;
if(isset($_REQUEST['id_pk']))
{
	$layid_pk=$_REQUEST['id_pk'];	
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
        header{clear:both;}
     
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
         
    
    <?php 
     include("header3.php"); 
     include("menu3.php"); 
    ?>
  
     
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
            <div class="container" style="width:700px; margin-left:50px;">
                <h3 style="text-align: center;font-weight: bold">LỊCH SỬ CHỮA BỆNH</h3>  
                <label for="txtid"></label>
                <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid_pk; ?>" /></td> 
                <button style="float: right;margin-left: 2px;" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#xemchitiet">Xem chi tiết</button>
                <?php
                   $link = $p->connect();
                   $sql = "select * from phieukhambenh where id_bacsi='$layid'";
                   $ketqua = mysqli_query($link,$sql);
                  /* @mysqli_close($link);
                   $i = mysqli_num_rows($ketqua);
                   if($i>0)
                   {
                       echo'  <table class="table table-bordered">
                           <tr style="text-align: center;font-weight: bold">
                           <th>STT</th>
                           <th scope="col">BỆNH NHÂN</th>
                           <th>NGÀY KHÁM</th>
                           <th>KẾT QUẢ</th>
                           
                           </tr>
                       ';
                       $dem = 1;
                       while($row = mysqli_fetch_array($ketqua))
                       {
                        $id_phieukham = $row['id_phieukham'];
                        $id_benhnhan = $row['id_benhnhan'];
                        $ngaykham = $row['ngaykham'];
                        $kq = $row['ketqua'];
                        
                           echo ' 
                      
                               <tr>
                                   <td style="text-align: center;"><a href="?id_pk='.$id_phieukham.'">'.$dem.'</td>
                                   <td><a href="?id_pk='.$id_phieukham.'">'.$p->laycot("select tenbenhnhan from benhnhan where id_benhnhan ='$id_benhnhan'").'</td>
                                   <td><a href="?id_pk='.$id_phieukham.'">'.$ngaykham.'</td>
                                   <td><a href="?id_pk='.$id_phieukham.'">'.$kq.'</td>
                                  
                               </tr>
                           ';
                           $dem++;
                       }
                       echo'</table>';
                    }*/
               ?>
                 <table border="1" width="1000px" style="text-align:center;">
        	
            <tr style="text-align: center;font-weight: bold">
                           <th>STT</th>
                           <th scope="col">BỆNH NHÂN</th>
                           <th>NGÀY KHÁM</th>
                           <th>KẾT QUẢ</th>
                           
                          
            </tr>
            <?php
				$i=0;
				while($row=mysqli_fetch_array($ketqua))
				{
					$i++;
         // $id_code = $row['code_phieu'];
         $id_phieukham = $row['id_phieukham'];
         $id_benhnhan = $row['id_benhnhan'];
         //$id_benhnhan = $p->laycot("select id_benhnhan from phieukhambenh where id_phieukham = '$layid_pk' ");
         //$ngaykham = $row['ngaykham'];
         $kq = $row['ketqua'];
        //$token = $row['token'];
         $id_pdk= $p->laycot("select id_phieudkkham from phieukhambenh where id_phieukham ='$id_phieukham' ");
			?>
            <tr>
                <td style="text-align: center;"><?php echo' <a href="?id_pk='.$id_phieukham.'">'.$i.'</a>'?></td>
                <td><?php echo '<a href="?id_pk='.$id_phieukham.'">'.$p->laycot("select tenbenhnhan from benhnhan where id_benhnhan ='$id_benhnhan'").'</a>'?></td>
                <td><?php echo '<a href="?id_pk='.$id_phieukham.'">'.$p->laycot("select ngayhen from phieudkkham where id_phieudkkham='$id_pdk' limit 1").'</a>'?></td>
                <td><?php echo'<a href="?id_pk='.$id_phieukham.'">'.$kq.'</a>'?></td>
    
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
     
<!--Modal nút XEM thông tin-->
<div class="modal" id="xemchitiet">
       <div class="modal-dialog">
          <div class="modal-content">

      <!-- Modal Header -->
              <div class="modal-header">
                 <h4 class="modal-title">PHIẾU KHÁM BỆNH</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

      <!-- Modal body -->
               <div class="modal-body">
               <div id="pk">
               <?php   $id_benhnhan=$p->laycot("select id_benhnhan from phieukhambenh where id_phieukham='$layid_pk' limit 1");
                       $token = $p->laycot("select token from phieukhambenh where token='$layid_pk' limit 1");
                       $id_pdkham= $p->laycot("select id_phieudkkham from phieukhambenh where id_phieukham ='$layid_pk' ");
               ?>       
                    <div id="bn_ten">Tên bệnh nhân: <?php  echo $p->laycot("select tenbenhnhan from benhnhan where id_benhnhan='$id_benhnhan' limit 1")?></div>
                    <div id="bn_namsinh">Ngày khám: <?php  echo $p->laycot("select ngayhen from phieudkkham where id_phieudkkham='$id_pdkham' limit 1")?></div>
                    <div id="bn_gioitinh">Giờ khám: <?php  echo $p->laycot("select giokham from phieukhambenh where id_phieukham='$layid_pk' limit 1")?></div>
                    <div id="bn_sdt">Phí khám: <?php  echo $p->laycot("select phikham from phieukhambenh where id_phieukham='$layid_pk' limit 1")?></div>
                    <div id="bn_diachi">Kết quả: <?php  echo $p->laycot("select ketqua from phieukhambenh where id_phieukham='$layid_pk' limit 1")?></div>
                    <div id="bn_diachi">Bác sĩ khám: <?php  echo $p->laycot("select tenbacsi from bacsi where id_bacsi='$layid' limit 1")?></div>
			   </div>
            
               </div>

      <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>

          </div>
       </div>

    </div>
    


    </body>
    </html>


    
