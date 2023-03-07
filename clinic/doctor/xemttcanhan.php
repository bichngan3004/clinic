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
        .container{
            display: flex;
        }
        .information{
            margin-top: 20px;
        }
        .information_detail{
            margin-left: 100px;
            line-height: 30px;
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
    <h4 style="font-weight: bold">THÔNG TIN CÁ NHÂN</h4>
        <div class="information">
           
            <div class="container" style="width:800px; margin-left:15px;">
                
                <label for="txtid"></label>
                <input name="txtid"  type="hidden"  id="txtid" value="<?php echo $layid; ?>" />       
       
               <?php
                    $layid_khoa=$p->laycot("select id_khoa from bacsi where id_bacsi='$layid' limit 1");  
                    $layid_cn=$p->laycot("select id_chinhanh from bacsi where id_bacsi='$layid' limit 1"); 
                ?>
                    <div class="img" id="bs_anh">
                        <img src="../img/<?php  echo $p->laycot("select hinhanh from bacsi where id_bacsi='$layid' limit 1")?>" width="150" height="150" />
                        <p style="width:150px; padding-top:20px; padding-left:30px;"><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p>
                    </div>
                    <div class="information_detail">
                        <div id="bs_ten"><b>Tên bác sĩ: </b><?php  echo $p->laycot("select tenbacsi from bacsi where id_bacsi='$layid' limit 1")?></div>
                        <div id="bs_namsinh"><b>Năm sinh: </b><?php  echo $p->laycot("select namsinh from bacsi where id_bacsi='$layid' limit 1")?></div>
                        <div id="bs_gioitinh"><b>Giới tính: </b><?php  echo $p->laycot("select gioitinh from bacsi where id_bacsi='$layid' limit 1")?></div>
                        <div id="bs_chuyenkhoa"><b>Chuyên khoa: </b><?php echo $p->laycot("select tenkhoa from khoa where id_khoa='$layid_khoa' limit 1")?></div>
                        <div id="bs_sdt"><b>Số điện thoại: </b><?php  echo $p->laycot("select sdt from bacsi where id_bacsi='$layid' limit 1")?></div>
                        <div id="bs_diachi"><b>Địa chỉ: </b><?php  echo $p->laycot("select diachi from bacsi where id_bacsi='$layid' limit 1")?></div>
                        <div id="bs_noilv"><b>Nơi làm việc(chi nhánh): </b><?php  echo $p->laycot("select tenchinhanh from chinhanh where id_chinhanh='$layid_cn' limit 1")?></div>
                        <button type="button"  style="margin-top:15px" class="btn btn-primary"  data-toggle="modal" data-target="#sua">Cập nhật</button>
                        <button type="button" style="margin-top:15px" class="btn btn-danger" ><a href="../logout.php" style="color:white;text-decoration: none;">Đăng xuất</a></button>
                    </div>
            </div>
        </div>
    </section>
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
                    <?php
                        $layid_cn=$p->laycot("select id_chinhanh from bacsi where id_bacsi='$layid' limit 1"); 
                    ?>
                      <label class="font-weight-bolder">Nơi làm việc(chi nhánh):</label>
                      <select class="form-control" name="txtnlv" id="noilamviec">
                      <option value="<?php  echo $p->laycot("select id_chinhanh from bacsi where id_chinhanh='$layid_cn' limit 1")?>" selected="selected" style="color:white;"><?php  echo $p->laycot("select tenchinhanh from chinhanh where id_chinhanh='$layid_cn' limit 1")?></option>
                      <!--<option value="1">12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Tp.HCM</option>
                      <option value="2">466 Cao Thắng, P.12, Quận 10, Tp.HCM</option>
                      <option value="3">93 Nguyễn Trãi, Tp.HCM</option>-->
                      <?php
                        $sql = "SELECT * FROM chinhanh";
                        $ketqua = mysqli_query($p->connect(),$sql);
                        $i=mysqli_num_rows($ketqua);
                        if($i>0)
                        {
                            while( $row = mysqli_fetch_array($ketqua))
                            {
                                echo '<option value="'.$row['id_chinhanh'].'">'.$row['tenchinhanh'].'</option>';
                            }
                        }
                        
                    ?>
                      </select>
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Chyên khoa: </label>
                      <select class="form-control" name="txtck" id="id_khoa">
                      <option value="<?php echo $p->laycot("select id_khoa from bacsi where id_khoa='$layid_khoa' limit 1")?>" selected="selected" style="color:white;"><?php echo $p->laycot("select tenkhoa from khoa where id_khoa='$layid_khoa' limit 1")?></option>
                      <!--<option value="1">Khoa dinh dưỡng</option>
                      <option value="2">Khoa nội tổng quát</option>
                      <option value="3">Khoa ngoại</option>
                      <option value="4">Khoa tim mạch</option>
                      <option value="5">Khoa hô hấp</option>
                      <option value="6">Khoa tai mũi họng</option>
                      <option value="7">Khoa răng hàm mặt</option>
                      <option value="8">Khoa tâm lý</option>-->
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
               
                
            </div>   

      <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="submit" id="nut" name="capnhat" value="Cập nhật" class="btn btn-primary">Cập nhật</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               </form>
          </div>
       </div>

    </div>
    <?php
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
                    header('location:xemttcanhan.php');
                }
                else
                {
                    echo'<script>alert("Cập nhật thông tin không thành công!")</script>';	
                }
            }
            else
            {
                echo'<script>alert("Lỗi!!")</script>';	
            }
        }
    ?>
    <!--Modal sửa hình-->
    <div class="modal" id="change_image">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <label for="myimg"></label>
                        <input type="file" name="myimg" id="myimg" />
                        <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="hinh" value="Lưu"></input>
                    <a href='#' class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <?php
  if(isset($_POST['hinh']))
    {
        $name=$_FILES['myimg']['name'];
		$size=$_FILES['myimg']['size'];
		$tmp_name=$_FILES['myimg']['tmp_name'];
		$type=$_FILES['myimg']['type'];
      if($name!='')
      {
        $name=time()."_".$name;
        if($p->myupfile($name,$tmp_name,"../img")==1)
        {
            if(isset($_SESSION['id_user']))
            {
                if($p->themxoasua("UPDATE bacsi SET hinhanh = '$name' WHERE id_bacsi = ".$_SESSION['id_user']."")==1)
                {
                  header("location:xemttcanhan.php");
                }
                else
                {
                  echo '<script>Cập nhật hình không thành công</script>';
                }
            }
         
        }
        else
        {
            echo '<script>Up hình không thành công</script>';
        }
      }
      else
      {
        echo '<script>Vui lòng chọn hình đại diện</script>';
      }
    }
    
?>
<script>
    jQuery(document).ready(function($)
    {
        $("#noilamviec").change(function(event){
            noilamviecId = $("#noilamviec").val();
            $.post('khoa1.php', {"noilamviecid": noilamviecId}, function(data)
            {
                $("#id_khoa").html(data);
            });
        });
    });
    
</script>
    <footer>
    <?php include("footer3.php");?>
    </footer>
     
    </body>
    </html>


    
