
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/bootstrap.css">
   <script src="../js/jquery-3.6.0.min.js"></script>
   <script src="../js/bootstrap.js"></script>
   
    <style>
      
     
        nav {
        line-height:30px;
        background-color: #eeeeee;
        height:250px;
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
    <?php include ("menu2.php"); ?> 
  
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
            <div class="container" style="width:900px; margin-left:50px;">
                <h3 style="text-align: center;font-weight: bold">DANH SÁCH BÁC SĨ</h3> 
                <button style="float: right;margin-left: 2px;" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#sua">Cập nhật</button> 
                <button style="float: right;margin-left: 2px;" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#xem">Xem thông tin</button>
               <?php
                   $link = $p->connect();
                   $sql = "select * from bacsi";
                   $ketqua = mysqli_query($link,$sql);
                   @mysqli_close($link);
                   $i = mysqli_num_rows($ketqua);
                   if($i>0)
                   {
                       echo'  <table class="table table-bordered">
                           <tr style="text-align: center;font-weight: bold">
                               <th >STT</th>
                               <th scope="col">HỌ TÊN</th>
                               <th>GIỚI TÍNH</th>
                               <th>SỐ ĐIỆN THOẠI</th>
                               <th>CHUYÊN KHOA</th>
                              
                           </tr>
                       ';
                       $dem = 1;
                       while($row = mysqli_fetch_array($ketqua))
                       {
                           $id_bacsi = $row['id_bacsi'];
                           $ten = $row['tenbacsi'];
                           $gioitinh = $row['gioitinh'];
                           $sdt = $row['sdt'];
                           $id_khoa = $row['id_khoa'];
                           echo ' 
                      
                               <tr>
                                   <td style="text-align: center;"><a href="?id='.$id_bacsi.'">'.$dem.'</a></td>
                                   <td><a href="?id='.$id_bacsi.'">'.$ten.'</a></td>
                                   <td><a href="?id='.$id_bacsi.'">'.$gioitinh.'</a></td>
                                   <td><a href="?id='.$id_bacsi.'">'.$sdt.'</a></td>
                                   <td><a href="?id='.$id_bacsi.'">'.$p->laycot("select tenkhoa from khoa where id_khoa ='$id_khoa'").'</a></td>
                                   
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


    <!--Modal nút XEM thông tin-->
    <div class="modal" id="xem">
       <div class="modal-dialog">
          <div class="modal-content">

      <!-- Modal Header -->
              <div class="modal-header">
                 <h4 class="modal-title">THÔNG TIN BÁC SĨ</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

      <!-- Modal body -->
               <div class="modal-body">
               <div id="bs">
               <?php
                    $layid_khoa=$p->laycot("select id_khoa from bacsi where id_bacsi='$layid' limit 1");  
                    $layid_cn=$p->laycot("select id_chinhanh from bacsi where id_bacsi='$layid' limit 1"); 
                ?>
                    <div id="bs_anh"><img src="../img/<?php  echo $p->laycot("select hinhanh from bacsi where id_bacsi='$layid' limit 1")?>" width="150" height="150" /></div>
                    <div id="bs_ten">Tên bác sĩ: <?php  echo $p->laycot("select tenbacsi from bacsi where id_bacsi='$layid' limit 1")?></div>
                    <div id="bs_namsinh">Năm sinh: <?php  echo $p->laycot("select namsinh from bacsi where id_bacsi='$layid' limit 1")?></div>
                    <div id="bs_gioitinh">Giới tính: <?php  echo $p->laycot("select gioitinh from bacsi where id_bacsi='$layid' limit 1")?></div>
                    <div id="bs_chuyenkhoa">Chuyên khoa: <?php echo $p->laycot("select tenkhoa from khoa where id_khoa='$layid_khoa' limit 1")?></div>
                    <div id="bs_sdt">Số điện thoại: <?php  echo $p->laycot("select sdt from bacsi where id_bacsi='$layid' limit 1")?></div>
                    <div id="bs_diachi">Địa chỉ: <?php  echo $p->laycot("select diachi from bacsi where id_bacsi='$layid' limit 1")?></div>
                    <div id="bs_noilv">Nơi làm việc(chi nhánh): <?php  echo $p->laycot("select tenchinhanh from chinhanh where id_chinhanh='$layid_cn' limit 1")?></div>
			   </div>
            
               </div>

      <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>

          </div>
       </div>

    </div>
    


<!--Modal nút SỬA thông tin-->

<div class="modal" id="sua">
       <div class="modal-dialog">
          <div class="modal-content">

      <!-- Modal Header -->
              <div class="modal-header">
                 <h4 class="modal-title">CẬP NHẬT THÔNG TIN BÁC SĨ</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

      <!-- Modal body -->
               <div class="modal-body">
              
            <form action="" method="POST">
                <?php
                    $layid_khoa=$p->laycot("select id_khoa from bacsi where id_bacsi='$layid' limit 1");  
                ?>
                <div id="bs_anh"><img src="../img/<?php  echo $p->laycot("select hinhanh from bacsi where id_bacsi='$layid' limit 1")?>" width="150" height="150" /></div>
                <div class="form-group">
                    <label class="font-weight-bolder">Tên bác sĩ: </label>
                    <input type="text" class="form-control" name="txtten" value="<?php  echo $p->laycot("select tenbacsi from bacsi where id_bacsi='$layid' limit 1")?>">
                </div>
                    <label for="txtid"></label>
                    <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      <select class="form-control" name="txtgioitinh">
                      <option value="<?php  echo $p->laycot("select gioitinh from bacsi where id_bacsi='$layid' limit 1")?>" selected="selected" style="color:white;"><?php  echo $p->laycot("select gioitinh from bacsi where id_bacsi='$layid' limit 1")?></option>
                      <option value="Nữ">Nữ</option>
                      <option value="Nam">Nam</option>
                      </select>
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Năm sinh: </label>
                      <input type="text" class="form-control" name="txtns" value="<?php  echo $p->laycot("select namsinh from bacsi where id_bacsi='$layid' limit 1")?>">
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Chyên khoa: </label>
                      <select class="form-control" name="txtck">
                      <option value="<?php echo $p->laycot("select id_khoa from bacsi where id_khoa='$layid_khoa' limit 1")?>" selected="selected" style="color:white;"><?php echo $p->laycot("select tenkhoa from khoa where id_khoa='$layid_khoa' limit 1")?></option>
                      <option value="1">Khoa dinh dưỡng</option>
                      <option value="2">Khoa nội tổng quát</option>
                      <option value="3">Khoa ngoại</option>
                      <option value="4">Khoa tim mạch</option>
                      <option value="5">Khoa hô hấp</option>
                      <option value="6">Khoa tai mũi họng</option>
                      <option value="7">Khoa răng hàm mặt</option>
                      <option value="8">Khoa tâm lý</option>
                      </select>
                </div>
              
                <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="txtsdt"  minlength="8" maxlength="10"  value="<?php  echo $p->laycot("select sdt from bacsi where id_bacsi='$layid' limit 1")?>">
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="txtdiachi"  value="<?php  echo $p->laycot("select diachi from bacsi where id_bacsi='$layid' limit 1")?>">
                </div>  
                <div class="form-group">
                    <?php
                        $layid_cn=$p->laycot("select id_chinhanh from bacsi where id_bacsi='$layid' limit 1"); 
                    ?>
                      <label class="font-weight-bolder">Nơi làm việc(chi nhánh):</label>
                      <select class="form-control" name="txtnlv">
                      <option value="<?php  echo $p->laycot("select id_chinhanh from bacsi where id_chinhanh='$layid_cn' limit 1")?>" selected="selected" style="color:white;"><?php  echo $p->laycot("select tenchinhanh from chinhanh where id_chinhanh='$layid_cn' limit 1")?></option>
                      <option value="1">12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Tp.HCM</option>
                      <option value="2">466 Cao Thắng, P.12, Quận 10, Tp.HCM</option>
                      <option value="3">93 Nguyễn Trãi, Tp.HCM</option>
                      </select>
                </div>
                
            </div>   

      <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="submit" id="nut" name="capnhat" value="Cập nhật" class="btn btn-primary">Cập nhật</button>
                 <button type="submit" id="nut" name="xoa" value="Xóa" class="btn btn-danger">Xóa</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               </form>
          </div>
       </div>

    </div>
    <?php
        if(isset($_POST['xoa']))
        {
            $idxoa=$_REQUEST['txtid'];
            if($idxoa>0)
            {
                if($p->themxoasua("DELETE from bacsi where id_bacsi='$idxoa' limit 1")==1)
                {
                    header('location:qlbacsi.php');
                }
                else
                {
                    echo'Xóa không thành công.';
                }
            }
            else
            {
                echo'Vui lòng chọn bác sĩ cần xóa.';	
            }
        }
        if(isset($_POST['capnhat']))
        {
            $idsua=$_REQUEST['txtid'];
            $ten = $_REQUEST['txtten'];
            $gioitinh = $_REQUEST['txtgioitinh'];
            $namsinh = $_REQUEST['txtns'];
            $chuyenkhoa = $_REQUEST['txtck'];
            $sdt = $_REQUEST['txtsdt'];
            $diachi = $_REQUEST['txtdiachi'];
            $noilv = $_REQUEST['txtnlv'];
            if($idsua>0)
            {
                if($p->themxoasua("UPDATE bacsi SET tenbacsi = '$ten', gioitinh = '$gioitinh', namsinh = '$namsinh', id_khoa = '$chuyenkhoa', diachi = '$diachi', sdt = '$sdt', id_chinhanh = '$noilv' WHERE id_bacsi ='$idsua' LIMIT 1 ;")==1)
                {  
                    header('location:qlbacsi.php');
                }
                else
                {
                    echo'<script>alert("Cập nhật thông tin không thành công!")</script>';	
                }
            }
            else
            {
                echo'<script>alert("Vui lòng chọn bác sĩ cần cập nhật thông tin!")</script>';	
            }
        }
    ?>
   
    </body>
    </html>



