<?php
$con = mysqli_connect("localhost","root","","doan2");
/*
if(!isset($_COOKIE['test']))
{
    echo 'Hết thời gian để hủy';
}
else
{
    echo $_COOKIE['test'];
}*/
     session_start();
//var_dump($_SESSION); exit();
     if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['id_user']) && isset($_SESSION['tentaikhoan']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])==1)
     {
         include("class/config.php");
         $q = new ketnoi();
         $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'],$_SESSION['tentaikhoan'],$_SESSION['phanquyen'],$_SESSION['id_user']);
     }
     elseif(isset($_SESSION['user_token']))
    {
            
    }
    else
    {
        header("location: login.php");
    }
 
    

    include('class/clsbenhnhan.php');
    $p = new benhnhan();
  include("mail/sendlichkham.php");
  $q = new Mailer();
  
/*$id_bacsi = $_SESSION['bacsi'];
    $doctor = $p->show_info_doctor($_SESSION['bacsi']);
   $user = $p->show_info($_SESSION['tentaikhoan']);*/
  if(!empty($_SESSION['user_token']) )
  {
//echo $_SESSION['user_token'];
    $g ="SELECT * FROM `taikhoan` WHERE token =".$_SESSION['user_token']."";
    $result= mysqli_query($p->connect(),$g);
    
    $row  = @mysqli_fetch_array($result);
  // var_dump($row['id_user']); exit;
//$user1 = $p->show_info($row['tentaikhoan']);
    $id_bacsi = $_SESSION['bacsi'];
    $doctor = $p->show_info_doctor($_SESSION['bacsi']);
  }
else
{
    $id_bacsi = $_SESSION['bacsi'];
    $doctor = $p->show_info_doctor($_SESSION['bacsi']);
  $user = $p->show_info($_SESSION['tentaikhoan']);
  //var_dump($user2); exit();
}
    $array_ngayhen = explode('_', $_SESSION['ngayhen']);

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
    <style>
        body{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>
    <?php include("menu.php") ?>
<div class="container">
	<h2 class="text-center mt-4 mb-5">ĐẶT LỊCH THÀNH CÔNG</h2>
	<div class="use text-center just-content-center">
		<div class=" font-weight-bolde" style="font-family:tim; font-size:20px;">
        <!--Mã code-->
        <form action="" method="POST">
			<p>Bác sĩ: <?php echo $doctor['tenbacsi'];?></p>
			<p>Ngày hẹn: <?php echo date('j-m-Y', strtotime($array_ngayhen[1]));?></p>
			<p>Giờ hẹn: <?php 
                
				if($array_ngayhen[0] == 1):
					echo "7:00 - 9:00";
				elseif($array_ngayhen[0] ==2):
					echo "9:00 - 11:00";
				elseif($array_ngayhen[0] ==3):
					echo "15:00 - 17:00";
				else:
					echo "17:00 - 19:00";	
				endif;
				?></p>
			<p>Người đặt: <?php if(!empty($_SESSION['user_token']))
            {

                echo $row['tentaikhoan'];
            }
            else
            {
              
               echo $user['tentaikhoan']; 
            }
            ?>
                
        </p>
			<p>Triệu chứng: <?php echo $_SESSION['trieuchung']; ?></p>
			<p>Email: <?php if(!empty($_SESSION['user_token']))
            {
                echo $row['email'];
            }
            else
            {
                
                echo $user['email'];
            }
            ?></p>
			<p>Phí khám: 150.000vnđ</p>
           
		</div>
	
	</div>
	
	
     <div class="text-center"><a href="index.php" class="btn btn-primary">Xác nhận</a>
    </form>
      <?php
        if(isset($_POST['nut']))
        {
           /* $title= 'Xác nhận đăng ký lịch khám bệnh';
            $content = 'Cảm ơn bạn đã đến phòng khám chúng tôi! Bạn có hẹn với phòng khám vào lúc
            <table>
                        <tr>
                            <th>Bác sĩ</th>
                            <th>Ngày hẹn</th>
                            <th>Giờ hẹn</th>
                        </tr>
                        <tr>
                        <th></th>
                        <th>Ngày hẹn</th>
                        <th>Giờ hẹn</th>
                    </tr>
                        </table>';
            $addressMail = $_REQUEST['txtemail'];
            $q->sendmail($title,$content,$addressMail);*/
            $tenbacsi = $doctor['tenbacsi'];
        }

    ?>
</body>
</html>