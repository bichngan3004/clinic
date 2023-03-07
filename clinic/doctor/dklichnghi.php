<?php
    ob_start();
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['tentaikhoan']) && isset($_SESSION['id_user']) && isset($_SESSION['pass']) && isset($_SESSION['phanquyen'])==2)
    {
        include("../class/config.php");
        $q = new ketnoi();
        $q->confirm_login($_SESSION['id'], $_SESSION['user'],$_SESSION['pass'], $_SESSION['phanquyen'], $_SESSION['id_user'],$_SESSION['tentaikhoan']);
    }
    else
    {
        header("location:../login.php");
    }
    include("../class/clsbacsi.php");
    $p = new doctor();
    $id_bacsi=$_SESSION['id_user'];
    //echo $id_bacsi; exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/header.css">
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
    
        <div class="container" style="margin-left:60px;">
        <div class="row" style="border-bottom: solid 1px #e5e5e5;">
            <div class="col-3" style="padding-top: 50px">
                <form action="dklichnghi.php" method="POST">
                <div class="form-group">
                    <label class="m-0 font-weight-bolder">Đăng kí ngày nghỉ:</label>
                    <input type="date" class="form-control" name="ngay_ban" value="<?php echo date('Y-m-j',time()) ;?>">
                </div>
                <p class="m-0 font-weight-bolder">Chọn thời gian nghỉ: (Lưu ý: nếu nghỉ nguyên ngày chọn tất cả.)</p>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="mui_gio_ban1" value="07:00 - 09:00">
                <label class="custom-control-label" for="customCheck1">07:00 - 09:00</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2" name="mui_gio_ban2" value="09:00 - 11:00">
                <label class="custom-control-label" for="customCheck2">09:00 - 11:00</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck3" name="mui_gio_ban3" value="15:00 - 17:00">
                <label class="custom-control-label" for="customCheck3" >15:00 - 17:00</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck4" name="mui_gio_ban4" value="17:00 - 19:00">
                <label class="custom-control-label" for="customCheck4">17:00 - 19:00</label>
                </div>
                <br>
                <button style="margin-bottom: 10px;" type="submit" class="btn btn-primary" name="nghilam" >Xác nhận</button>
                </form>
            </div>
            <br>
            <Br>
            <div class="col-9">
                <h2 style="text-align: center;">THỜI GIAN NGHỈ LÀM</h2>
                <?php
                    $p->showlichnghi("SELECT * FROM lichnghi WHERE id_bacsi=".$id_bacsi."");
                ?>
            </div>
        </div>
   
<?php
if(isset($_POST['nghilam']))
{
   if(isset($_POST['mui_gio_ban1']))
   {
        $ngaynghi = $_REQUEST['mui_gio_ban1'].'_'.$_REQUEST['ngay_ban'];
        $sql = "INSERT INTO lichnghi (ngaynghi, id_bacsi) VALUES ('$ngaynghi', '$id_bacsi')";
        //// $ketqua = mysqli_query($p->connect(),$sql);
        if(mysqli_query($p->connect(),$sql)==true)
        {
           header("location: dklichnghi.php");
        }
        else
        {
            echo '<script>Đăng ký không thành công</script>';
        }  
   }
   if(isset($_POST['mui_gio_ban2']))
   {
        $ngaynghi = $_REQUEST['mui_gio_ban2'].'_'.$_REQUEST['ngay_ban'];
        $sql = "INSERT INTO lichnghi (ngaynghi, id_bacsi) VALUES ('$ngaynghi', '$id_bacsi')";
       // $ketqua = mysqli_query($p->connect(),$sql);
       if(mysqli_query($p->connect(),$sql)==true)
        {
            header("location: dklichnghi.php");
        }
        else
        {
            echo '<script>Đăng ký không thành công</script>';
        }  
   }
   if(isset($_POST['mui_gio_ban3']))
   {
        $ngaynghi = $_REQUEST['mui_gio_ban3'].'_'.$_REQUEST['ngay_ban'];
        $sql = "INSERT INTO lichnghi (ngaynghi, id_bacsi) VALUES ('$ngaynghi', '$id_bacsi')";
       // $ketqua = mysqli_query($p->connect(),$sql);
       if(mysqli_query($p->connect(),$sql)==true)
        {
            header("location: dklichnghi.php");
        }
        else
        {
            echo '<script>Đăng ký không thành công</script>';
        }  
   }
   if(isset($_POST['mui_gio_ban4']))
   {
        $ngaynghi = $_REQUEST['mui_gio_ban4'].'_'.$_REQUEST['ngay_ban'];
        $sql = "INSERT INTO lichnghi (ngaynghi, id_bacsi) VALUES ('$ngaynghi', '$id_bacsi')";
       // $ketqua = mysqli_query($p->connect(),$sql);
       if(mysqli_query($p->connect(),$sql)==true)
        {
            header("location: dklichnghi.php");
        }
        else
        {
            echo '<script>Đăng ký không thành công</script>';
        }  
   }
  // echo $ngaynghi; exit();
}
?>

</div>
<footer>
    <?php include("../footer.php")  ?>
</footer>
</body>
</html>