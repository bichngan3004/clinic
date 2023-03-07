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


//$id_user = $_SESSION['id_user'];
//$id_token = $_SESSION['user_token'];
//echo $id_token; exit();
include("./class/clsbenhnhan.php");
$p = new benhnhan();

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
        <div class="information">
        <div class="image">
				<!--<img src="./img/6bs.jpg" width="150px" height="150px" alt=""> -->
				<img src="./img/<?php 
                if(isset($_SESSION['id_user']))
                {
                    echo $p->laycot("select hinhanh from benhnhan where id_benhnhan =".$_SESSION['id_user']."");
                }
                else
                {
                    echo $p->laycot("select hinhanh from benhnhan where token =".$_SESSION['user_token']."");
                }
                
                ?>" width="150px" height="150px" alt="">
				<p style="width:150px; padding-top:20px; padding-left:30px;"><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p>
			</div>
            <?php // $p->xemthongtin("select * from benhnhan where id_benhnhan=".$_SESSION['id_user']."");
                if(isset($_SESSION['id_user']))
                {
                    $p->xemthongtin("SELECT * FROM benhnhan WHERE id_benhnhan =".$_SESSION['id_user']."");
                }
                else
                {
                    $p->xemthongtin("SELECT * FROM benhnhan WHERE token=".$_SESSION['user_token']."");
                }
            ?>
        </div>
        
    </div>
    <!--Modal đổi ảnh-->
    
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
        if($p->myupfile($name,$tmp_name,"img")==1)
        {
            if(isset($_SESSION['id_user']))
            {
                if($p->themxoasua("UPDATE benhnhan SET hinhanh = '$name' WHERE id_benhnhan = ".$_SESSION['id_user']."")==1)
                {
                  header("location:xemthongtinbn.php");
                }
                else
                {
                  echo '<script>Cập nhật hình không thành công</script>';
                }
            }
            else
            {
                if($p->themxoasua("UPDATE benhnhan SET hinhanh = '$name' WHERE token = ".$_SESSION['user_token']."")==1)
                {
                  header("location:xemthongtinbn.php");
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
    <!--Modal cập nhật thông tin-->
    <div class="modal " id="modalUpdate" style="margin-top: 20px; border-radius:10px">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" >Cập nhật thông tin cá nhân</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Họ và tên: </label>
                      <input type="text" class="form-control" name="txtten" value="<?php 
                      //echo $p->laycot("select tenbenhnhan from benhnhan where id_benhnhan='$id_user'")
                            if(isset($_SESSION['id_user']))
                            {
                                echo $p->laycot("select tenbenhnhan from benhnhan where id_benhnhan=".$_SESSION['id_user']."");
                            }
                            else
                            {
                                echo $p->laycot("select tenbenhnhan from benhnhan where token=".$_SESSION['user_token']."");
                            }
                            ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      
                      <select class="form-control" name="txtgioitinh">
                        <option value="<?php 
                        if(isset($_SESSION['id_user']))
                        {
                             echo $p->laycot("select gioitinh from benhnhan where id_benhnhan=".$_SESSION['id_user']."");
                        }
                        elseif(isset($_SESSION['user_token']))
                        {
                            echo $p->laycot("select gioitinh from benhnhan where id_benhnhan=".$_SESSION['user_token']."");
                        }
                        ?>" selected="selected" style="color:white;">
                        <?php 
                            if(isset($_SESSION['id_user']))
                            {
                                 echo $p->laycot("select gioitinh from benhnhan where id_benhnhan=".$_SESSION['id_user']."");
                            }
                            elseif(isset($_SESSION['user_token']))
                            {
                                echo $p->laycot("select gioitinh from benhnhan where id_benhnhan=".$_SESSION['user_token']."");
                            }
                        ?>
                        </option>
                        <option value="Nữ">Nữ</option>
                        <option value="Nam">Nam</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Năm sinh: </label>
                      <input type="number" class="form-control" name="txttuoi" value="<?php //echo $p->laycot("select tuoi from benhnhan where id_benhnhan='$id_user'") 

                                        if(isset($_SESSION['id_user']))
                                        {
                                            echo $p->laycot("select namsinh from benhnhan where id_benhnhan=".$_SESSION['id_user']."");
                                        }
                                        else
                                        {
                                            echo $p->laycot("select namsinh from benhnhan where token=".$_SESSION['user_token']."");
                                        }
                                            ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="txtsdt"  minlength="8" maxlength="12" required="required" value="<?php //echo $p->laycot("select sdt from benhnhan where id_benhnhan='$id_user'")
                                        if(isset($_SESSION['id_user']))
                                        {
                                            echo $p->laycot("select sdt from benhnhan where id_benhnhan=".$_SESSION['id_user']."");
                                        }
                                        else
                                        {
                                            echo $p->laycot("select sdt from benhnhan where token=".$_SESSION['user_token']."");
                                        }
                                        ?>">
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="txtdiachi" minlength="8" maxlength="80" required="required" value="<?php //echo $p->laycot("select diachi from benhnhan where id_benhnhan='$id_user'")
                                        if(isset($_SESSION['id_user']))
                                        {
                                            echo $p->laycot("select diachi from benhnhan where id_benhnhan=".$_SESSION['id_user']."");
                                        }
                                        else
                                        {
                                            echo $p->laycot("select diachi from benhnhan where token=".$_SESSION['user_token']."");
                                        }
                                        ?>">
                    </div>  
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" name="update" value="Lưu"></input>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
        </div>
        
        <!-- Modal footer -->
        
        
      </div>
    </div>
  </div>
<?php
if(isset($_POST['update']))
{
    $ten = $_REQUEST['txtten'];
    $gioitinh = $_REQUEST['txtgioitinh'];
    $tuoi = $_REQUEST['txttuoi'];
    $sdt = $_REQUEST['txtsdt'];
    $diachi = $_REQUEST['txtdiachi'];
   

   // var_dump($_POST); exit();
    /*if($p->themxoasua("UPDATE benhnhan SET tenbenhnhan = '$ten', gioitinh ='$gioitinh', tuoi='$tuoi', diachi = '$diachi', sdt = '$sdt' WHERE id_benhnhan = '$id_user';")==1)
    {
        echo '<script>alert("Cập nhật thông tin thành công")</script>';
      
    }
    else
    {
        echo'Cập nhật thông tin không thành công';
    }*/
    if($ten!='' && $gioitinh !='' && $tuoi!='' && $sdt!='' && $diachi!='')
    {
        if(isset($_SESSION['id_user']))
        {
            if($p->themxoasua("UPDATE benhnhan SET tenbenhnhan = '$ten', gioitinh ='$gioitinh', namsinh='$tuoi', diachi = '$diachi', sdt = '$sdt' WHERE id_benhnhan = ".$_SESSION['id_user'].";")==1)
            {
            // echo '<script>alert("Cập nhật thông tin thành công")</script>';
            header("location:xemthongtinbn.php");
            }
            else
            {
                echo'Cập nhật thông tin không thành công';
            }
        }
        else
        {
            if($p->themxoasua("UPDATE benhnhan SET tenbenhnhan = '$ten', gioitinh ='$gioitinh', namsinh='$tuoi', diachi = '$diachi', sdt = '$sdt' WHERE token = ".$_SESSION['user_token'].";")==1)
            {
            // echo '<script>alert("Cập nhật thông tin thành công")</script>';
            header("location:xemthongtinbn.php");
            }
            else
            {
                echo'Cập nhật thông tin không thành công';
            }
        }

        }
    else
    {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin!")</script>';
    }
}

?>


</body>
<?php include("footer.php") ?>
</html>

