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
     include("header2.php"); 
     include("menu2.php"); 
    ?>
   
     
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
            <div class="container" style="width:700px; margin-left:50px;">
                <h3 style="text-align: center;font-weight: bold">DANH SÁCH BỆNH NHÂN</h3> 
				<button class="btn btn-primary " data-toggle="modal" data-target="#them">Thêm bệnh nhân</button>
                <button style="float: right;margin-left: 2px;" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#sua">Cập nhật</button> 
                <button style="float: right;margin-left: 2px;" type="button" class="btn btn-primary"  data-toggle="modal" data-target="#xem">Xem</button>
				<?php
                   $link = $p->connect();
                   $sql = "select * from benhnhan";
                   $ketqua = mysqli_query($link,$sql);
                   @mysqli_close($link);
                   $i = mysqli_num_rows($ketqua);
                   if($i>0)
                   {
                       echo'  <table class="table table-bordered">
                           <tr style="text-align: center;font-weight: bold">
                                <th>STT</th>
                                <th scope="col">HỌ TÊN</th>
                                <th>GIỚI TÍNH</th>
                                <th>NĂM SINH</th>
                                <th>ĐỊA CHỈ</th>
                               
                           </tr>
                       ';
                       $dem = 1;
                       while($row = mysqli_fetch_array($ketqua))
                       {
                           $id_benhnhan = $row['id_benhnhan'];
                           $ten = $row['tenbenhnhan'];
                           $gioitinh = $row['gioitinh'];
                           $namsinh = $row['namsinh'];
                           $diachi = $row['diachi'];
                           echo ' 
                      
                               <tr>
                                   <td style="text-align: center;"><a href="?id='.$id_benhnhan.'">'.$dem.'</td>
                                   <td><a href="?id='.$id_benhnhan.'">'.$ten.'</td>
                                   <td><a href="?id='.$id_benhnhan.'">'.$gioitinh.'</td>
                                   <td><a href="?id='.$id_benhnhan.'">'.$namsinh.'</td>
                                   <td><a href="?id='.$id_benhnhan.'">'.$diachi.'</td>
                                   
                               </tr>
                             
                           
                           ';
                           $dem++;
                       }
                       echo'</table>';
                    }
               ?>  
       
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
                 <h4 class="modal-title">THÔNG TIN BỆNH NHÂN</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

      <!-- Modal body -->
               <div class="modal-body">
               <div id="bs">
                
                    <div id="bn_anh"><img src="../img/<?php  echo $p->laycot("select hinhanh from benhnhan where id_benhnhan='$layid' limit 1")?>" width="150" height="150" /></div>
                    <div id="bn_ten">Tên bệnh nhân: <?php  echo $p->laycot("select tenbenhnhan from benhnhan where id_benhnhan='$layid' limit 1")?></div>
                    <div id="bn_namsinh">Năm sinh: <?php  echo $p->laycot("select namsinh from benhnhan where id_benhnhan='$layid' limit 1")?></div>
                    <div id="bn_gioitinh">Giới tính: <?php  echo $p->laycot("select gioitinh from benhnhan where id_benhnhan='$layid' limit 1")?></div>
                    <div id="bn_sdt">Số điện thoại: <?php  echo $p->laycot("select sdt from benhnhan where id_benhnhan='$layid' limit 1")?></div>
                    <div id="bn_diachi">Địa chỉ: <?php  echo $p->laycot("select diachi from benhnhan where id_benhnhan='$layid' limit 1")?></div>
                    
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
                 <h4 class="modal-title">CẬP NHẬT THÔNG TIN BỆNH NHÂN</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

      <!-- Modal body -->
               <div class="modal-body">
              
        <form action="" method="POST">
                <div class="form-group">
                      <label class="font-weight-bolder">Tên bệnh nhân: </label>
                      <input type="text" class="form-control" name="txtten" value="<?php echo $p->laycot("select tenbenhnhan from benhnhan where id_benhnhan='$layid'") ?>">
                </div>
                    <label for="txtid"></label>
                    <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      <select class="form-control" name="txtgioitinh">
                      <option value="<?php echo $p->laycot("select gioitinh from benhnhan where id_benhnhan='$layid'") ?>" selected="selected" style="color:white;"><?php echo $p->laycot("select gioitinh from benhnhan where id_benhnhan='$layid'") ?></option>
                      <option value="Nữ">Nữ</option>
                      <option value="Nam">Nam</option>
                      </select>
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Năm sinh: </label>
                      <input type="text" class="form-control" name="txtns" value="<?php echo $p->laycot("select namsinh from benhnhan where id_benhnhan='$layid'") ?>">
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="txtsdt"  minlength="8" maxlength="12" required="required" value="<?php echo $p->laycot("select sdt from benhnhan where id_benhnhan='$layid'") ?>">
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="txtdiachi" minlength="8" value="<?php echo $p->laycot("select diachi from benhnhan where id_benhnhan='$layid'") ?>">
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


    <!--Modal nút THÊM THÔNG TIN-->

    <div class="modal" id="them">
       <div class="modal-dialog">
          <div class="modal-content">

      <!-- Modal Header -->
              <div class="modal-header">
                 <h4 class="modal-title">THÊM THÔNG TIN BỆNH NHÂN</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

      <!-- Modal body -->
               <div class="modal-body">
              
        <form action="" method="POST">
                <div class="form-group">
                      <label class="font-weight-bolder">Tên bệnh nhân: </label>
                      <input type="text" class="form-control" name="txtten" placeholder="Nhập họ tên bệnh nhân">
                </div>
                    
                <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      <select class="form-control" name="txtgioitinh">
                        <option value="Nữ">Nữ</option>
                        <option value="Nam">Nam</option>
                      </select>
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Năm sinh: </label>
                      <input type="text" class="form-control" name="txtns" placeholder="Nhập năm sinh">
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="txtsdt"  minlength="8" maxlength="10" required="required" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="txtdiachi" minlength="8" maxlength="80" required="required" placeholder="Nhập địa chỉ">
                </div> 
               
                </div> 
      <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="submit" id="nut" name="them" value="Thêm" class="btn btn-primary">Thêm</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </form>
          </div>
       </div>

    </div>

    <?php
       if(isset($_POST['them']))
       {
           $id_benhnhan=$_REQUEST['benhnhan'];
           $ten = $_REQUEST['txtten'];
           $gioitinh = $_REQUEST['txtgioitinh'];
           $namsinh = $_REQUEST['txtns'];
           $sdt = $_REQUEST['txtsdt'];
           $diachi = $_REQUEST['txtdiachi'];
           
       
           if($p->themxoasua("INSERT INTO benhnhan(tenbenhnhan,gioitinh,namsinh,sdt,diachi,hinhanh) VALUES ('$ten', '$gioitinh', '$namsinh', '$sdt', '$diachi', '$name')")==1)
           {
               
               header('location:qlbenhnhan2.php');

           }
           else
           {
               echo'<script>alert("Thêm bệnh nhân không thành công!")</script>';
           }
           
       }
       if(isset($_POST['xoa']))
       {
           $idxoa=$_REQUEST['txtid'];
           if($idxoa>0)
           {
               if($p->themxoasua("DELETE from benhnhan where id_benhnhan='$idxoa' limit 1")==1)
               {
                   header('location:qlbenhnhan2.php');
               }
               else
               {
                   echo'Xóa không thành công.';
               }
           }
           else
           {
               echo'Vui lòng chọn bệnh nhân cần xóa.';	
           }
       }
       if(isset($_POST['capnhat']))
       {
           $idsua=$_REQUEST['txtid'];
           $ten = $_REQUEST['txtten'];
           $gioitinh = $_REQUEST['txtgioitinh'];
           $namsinh = $_REQUEST['txtns'];
           $sdt = $_REQUEST['txtsdt'];
           $diachi = $_REQUEST['txtdiachi'];
           
           if($idsua>0)
           {
               if($p->themxoasua("UPDATE benhnhan SET tenbenhnhan = '$ten', gioitinh = '$gioitinh', namsinh = '$namsinh', diachi = '$diachi', sdt = '$sdt' WHERE id_benhnhan ='$idsua' LIMIT 1 ;")==1)
               {  
                   header('location:qlbenhnhan2.php');
               }
               else
               {
                   echo'<script>alert("Cập nhật thông tin không thành công!")</script>';	
               }
           }
           else
           {
               echo'<script>alert("Vui lòng chọn bệnh nhân cần cập nhật thông tin!")</script>';	
           }
       }
    ?>
    </body>
    </html>


    
