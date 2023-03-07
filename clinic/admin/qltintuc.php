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
        table tr,td{
          padding: 5px;
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
    

    <div class="col-md-6" style="margin-left: 50px;">                    
       <form method="post" action="" enctype="multipart/form-data" id="form8" name="form8" >
           <table style="margin-left: 80px;" width="700" class="pt-5" border="1" cellpadding="5" cellspacing="0">
   <tr>
     <td colspan="2" class="text-center" style="font-weight:bold; font-size:20px;">QUẢN LÍ TIN TỨC</td>
   </tr>
  <tr>
     <td><b>Tiêu đề:</b></td>
     <td><label for="tieude"></label>
     <input type="text" name="txttieude" id="txttieude" value="<?php
        echo $p->laycot("select tieude from tintuc where id_tintuc='$layid'");
        ?>" />
        <label for="tin"></label>
        <input type="hidden" name="txtid" id="txtid" value="<?php echo $layid;
        ?>" />
     </td>
   </tr>
   <tr>
     <td><b>Nội dung:</b></td>
     <td><label for="textarea"></label>
     <textarea name="txtnoidung" id="txtnoidung" cols="50" rows="15">
    <?php
        echo $p->laycot("select noidung from tintuc where id_tintuc='$layid'");
        ?>
        </textarea></td>
   </tr>
   <tr>
     <td><b>Hình</b></td>
     <td><label for="fileField"></label>
     <input type="file" name="myfile" id="myfile" value="<?php
        echo $p->laycot("select hinhanh from tintuc where id_tintuc='$layid'");
        ?>"/>
        <label for="hinh"></label>
        <input type="hidden" name="txtid" id="txtid" value="<?php echo $layid;?>" /></td>
   </tr>
   <tr>
     <td><b>Tác giả:</b></td>
     <td><label for="textfield2"></label>
     <input type="text" name="txttacgia" id="txttacgia" value="<?php
        echo $p->laycot("select tacgia from tintuc where id_tintuc='$layid'");
        ?>" />
        <label for="tg"></label>
        <input type="hidden" name="txtid" id="txtid" value="<?php echo $layid;
        ?>" />
        </td>
   </tr>
   <tr>
     <td colspan="2" style="position:relative; right:-140px">     
      <input type="submit" name="nutthem" id="button" class="btn btn-primary" value="Đăng">
       <input type="submit" name="nutupdate" id="nut" class="btn btn-primary" value="Cập nhật" />
       <input type="submit" name="nutxoa" id="nut" class="btn btn-danger" value="Xóa" />
     </td>
   </tr>
 </table>
 <br> <br>
 <div class="information">
            <div class="container" style="width:700px; margin-left:50px;">
                <h3 style="text-align: center;font-weight: bold">DANH SÁCH TIN TỨC</h3> 
                <?php
                   $link = $p->connect();
                   $sql = "select * from tintuc";
                   $ketqua = mysqli_query($link,$sql);
                   @mysqli_close($link);
                   $i = mysqli_num_rows($ketqua);
                   if($i>0)
                   {
                       echo'  <table class="table table-bordered te">
                           <tr style="text-align: center;font-weight: bold">
                                <th>STT</th>
                                <th scope="col">TIÊU ĐỀ</th>
                                <th>NGÀY ĐĂNG</th>
                                <th>TÁC GIẢ</th>
                          
                           </tr>
                       ';
                       $dem = 1;
                       while($row = mysqli_fetch_array($ketqua))
                       {
                           $id_tintuc = $row['id_tintuc'];
                           $td = $row['tieude'];
                           $ngaydang = $row['ngaydang'];
                           $tacgia = $row['tacgia'];
                           echo ' 
                               <tr>
                                   <td style="text-align: center;"><a href="?id='.$id_tintuc.'">'.$dem.'</td>
                                   <td><a href="?id='.$id_tintuc.'">'.$td.'</td>
                                   <td><a href="?id='.$id_tintuc.'">'.$ngaydang.'</td>
                                   <td><a href="?id='.$id_tintuc.'">'.$tacgia.'</td>
                                  
                               </tr>';
                           $dem++;
                       }
                       echo'</table>';
                    }
               ?>  
                
            </div>
        </div>
        
    </div>
<?php
//thêm tin tức
if(isset($_POST['nutthem']))
{
  $tieude = $_REQUEST['txttieude'];
  $noidung = $_REQUEST['txtnoidung'];
  $tacgia = $_REQUEST['txttacgia'];
  $name=$_FILES['myfile']['name'];
  $tmp_name = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];
  $type = $_FILES['myfile']['type'];
  //echo $tieude; echo $noidung; echo $tacgia; echo $name; exit();
  if($name!='')
  {
    $name = time()."_".$name;
    if($p->myupfile($name,$tmp_name,"../img")==1)
    {
      $sql = "INSERT INTO tintuc(tieude, noidung,hinhanh,ngaydang,tacgia) VALUES ('$tieude', '$noidung', '$name', current_timestamp(), '$tacgia')";
      if(mysqli_query($p->connect(),$sql)==true)
      {
        header("location:qltintuc.php");
      }
      else
      {
        echo "<script>alert('Thêm không thành công!')</script>";
      }
    }
  }
  else
  {
    echo "<script>alert('Vui lòng chọn hình!')</script>";
  }
}
//cập nhật tin tức
if(isset($_POST['nutupdate']))
{
  $idsua = $_REQUEST['txtid'];
  $tieude = $_REQUEST['txttieude'];
  $noidung = $_REQUEST['txtnoidung'];
  $tacgia = $_REQUEST['txttacgia'];
  $name=$_FILES['myfile']['name'];
  $tmp_name = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];
  $type = $_FILES['myfile']['type'];
  if($p->myupfile($name,$tmp_name,"../img")==1)
  {
      if($idsua>0)
      {
          $sql = "UPDATE tintuc SET tieude = '$tieude',noidung = '$noidung',hinhanh= '$name', tacgia='$tacgia' WHERE id_tintuc ='$idsua' limit 1";
          if(mysqli_query($p->connect(),$sql)==true)
          {
            header("location:qltintuc.php");
          }
          else
          {
            echo "<script>alert('Cập nhật không thành công!')</script>";
          }
        
      }
  }
}
//xóa tin tức
if(isset($_POST['nutxoa']))
{
  $idxoa=$_REQUEST['txtid'];
  if($idxoa>0)
  {
    if($p->themxoasua("DELETE FROM tintuc WHERE id_tintuc='$idxoa'")==1)
    {
      header("location:qltintuc.php");
    }
    else
    {
      echo'<script>alert("Xoa không thành công")</script>';
    }
  }
  else
  {
    echo'<script>alert("Vui lòng chọn hàng cần xóa")</script>';
  }
}
?>
</form>
                           
                           
                       
                   </div>
                  
               </div>
           </div>
       </div>
      

    </section>
     
    <footer>
    <?php include("footer1.php");?>
    </footer>   
    </body>
    </html>


    
