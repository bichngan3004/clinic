<?php
$con = mysqli_connect("localhost","root","","doan2");
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['id_user']) && isset($_SESSION['pass'])  && isset($_SESSION['phanquyen'])==1)
{
    
    include("class/config.php");
    $q = new ketnoi();
    $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'], $_SESSION['phanquyen'],$_SESSION['id_user']);
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
// include('mail/clsmail.php');
// $mail = new Mailer();

//$id_benhnhan = $_POST['id_benhnhan'];
/*$id_bacsi = $_SESSION['bacsi'];
$trieuchung = $_SESSION['trieuchung'];
$id_user=$_SESSION['id_user'];
//echo $id_user; exit();*/
if(!empty($_SESSION['user_token']))
{
    $g ="SELECT * FROM `taikhoan` WHERE token =".$_SESSION['user_token']."";
    $result= @mysqli_query($p->connect(),$g);
    $row  = @mysqli_fetch_array($result);
    $id_bacsi = $_SESSION['bacsi'];
    $trieuchung = $_SESSION['trieuchung'];
    $id_user=$row['id_user'];
}
else
{
    $id_bacsi = $_SESSION['bacsi'];
    $trieuchung = $_SESSION['trieuchung'];
    $id_user=$_SESSION['id_user'];
}
//$list ='Mã bệnh nhân:' .$_SESSION['id_user']  . 'Tên bệnh nhân:' . $_SESSION['tentaikhoan'];
if(isset($_POST['datlich']))
{
    //include("phpQRcode/qrlib.php");
//QRcode::png($list,'macode.png', QR_ECLEVEL_H);
   // echo '<img src="macode.png">';
    /* echo $_SESSION['id_user']; echo '<br>';
     echo $_SESSION['bacsi']; echo '<br>';
     echo $_SESSION['trieuchung']; echo '<br>';
     echo $_SESSION['ngayhen'];
     exit();*/
    //database cho nhập mã 
    

    
   // var_dump($_POST); exit();
   if(!empty($_SESSION['user_token']))
   {
    
/*if($p->themxoasua("INSERT INTO phieudkkham (ngayhen,trieuchung,phikham, id_benhnhan, id_bacsi)
        VALUES ('222', 'fff', '150000', '1','1'")==1)*/
        /*if($p->themxoasua("INSERT INTO phieudkkham(`ngayhen`,`trieuchung`,`phikham`,`id_benhnhan`,`id_bacsi`)
        VALUES ('$ngayhen','$trieuchung','15000','$id_user','$id_bacsi'")==1)
       
        { 
            header('location:sucesslich.php');
        }
        else
        {
            echo 'Khong thanh cong';
        }*/
        if(!empty($_POST['ngayhen']))
        {
            $link = $p->connect();
            $ngayhen = $_POST['ngayhen'];
            $_SESSION['ngayhen'] = $ngayhen;
            $sql1 ="INSERT INTO phieudkkham(`id_phieudkkham`,`ngayhen`,`ngaydatlich`,`trieuchung`,`phikham`,`id_benhnhan`,`id_bacsi`,`token`,`code_phieu`)
            VALUES (NULL,'$ngayhen',current_timestamp(),'$trieuchung','150000','$id_user','$id_bacsi',".$_SESSION['user_token'].",'no')";
            if(mysqli_query($p->connect(),$sql1)==true)
            {
                $sql2 = "SELECT *  FROM `phieudkkham`  WHERE `token` =".$_SESSION['user_token']." ORDER BY `id_phieudkkham` DESC LIMIT 1";
                $id_phieu1= $p->laycot($sql2);
               $_SESSION['phieukham']=$id_phieu1;// ràng buộc bên kia để chỉ là duy nhất.            
                $ketquapk1 = "SELECT * FROM phieudkkham";
                $phieukham1 = mysqli_query($p->connect(),$ketquapk1);
                $i1 = mysqli_num_rows($phieukham1);
                setcookie($id_phieu1,$i1, time() + 60*2, "/");//cookie 2 p
                //header("location: lichhenkham.php");
                header("location: sucesslich.php");
               
            }
            else
            {
                echo 'Khong thanh cong';
            }   
        }
        else
        {
            echo '<script>alert("Vui lòng chọn ngày khám!")</script>';
            header("refresh:1;url=datlich3.php");
        }
       
    }
   else
   {
   /* if($p->themxoasua("INSERT INTO phieudkkham (`ngayhen`,`trieuchung`,`phikham`, `id_benhnhan`, `id_bacsi`)
            VALUES ('$ngayhen', '$trieuchung', '150000', '$id_user','$id_bacsi'")==1)
    {

         header('location:sucesslich.php');
    }
   else
   {
         echo'Khong thanh cong fff';
   }*/
   
   if(!empty($_POST['ngayhen']))
   {
    $link = $p->connect();
    $ngayhen = $_POST['ngayhen'];
     $_SESSION['ngayhen'] = $ngayhen;

    $sql ="INSERT INTO phieudkkham(`id_phieudkkham`,`ngayhen`,`ngaydatlich`,`trieuchung`,`phikham`,`id_benhnhan`,`id_bacsi`,`code_phieu`)
            VALUES (NULL,'$ngayhen',current_timestamp(),'$trieuchung','150000','$id_user','$id_bacsi','no')";
            if(mysqli_query($p->connect(),$sql)==true)
            {
               $sql="SELECT *  FROM `phieudkkham`  WHERE `id_benhnhan` =".$_SESSION['id_user']." ORDER BY `id_phieudkkham` DESC LIMIT 1";
              $id_phieu= $p->laycot($sql);
              $_SESSION['phieukham']=$id_phieu;// ràng buộc bên kia để chỉ là duy nhất.            
                $ketquapk = "SELECT * FROM phieudkkham";
                $phieukham = mysqli_query($p->connect(),$ketquapk);
                $i = mysqli_num_rows($phieukham);
                setcookie($id_phieu,$i, time() + 60*2, "/");//cookie 2 p
                //header("location: lichhenkham.php");
                header("location: sucesslich.php");
            }
            else
            {
                echo 'Khong thanh cong';
            } 
    }  
    else
    {
        echo '<script>alert("Vui lòng chọn ngày khám!")</script>';
        header("refresh:1;url=datlich3.php");
    }
}
     
       
     
    
     /*else
     {
        echo 'Dang ky khong thanh cong';
     }*/
      
}

?>