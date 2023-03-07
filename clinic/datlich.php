<?php

session_start();
include("./class/clsbenhnhan.php");
$p = new benhnhan();

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
    <link rel="stylesheet" href="./style/menu.css">
    <style>
        .header{text-align: center;}
        .schedule
        {
            width: 600px;
            border-radius: 10px;
            margin: 30px auto;
            border: 1px solid black;
            padding: 20px;
        }
       select.form-control{
        padding: 0px 12px;
       }
    </style>
</head>
<body>
<?php include("header.php"); ?>
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
    <div class="schedule">
        <div class="header">
            <h2>ĐẶT LỊCH KHÁM</h2>
        </div>
        <form action="datlich2.php" method="POST">
            
            <div class="form-group">
                <label for="chinhanh">Chọn chi nhánh</label>
                <select class="form-control" name="noilamviec" id="noilamviec">
                    <option value="">Chọn chi nhánh</option>
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
                <label for="khoa">Chọn chuyên khoa</label>
                <select class="form-control" name="id_khoa" id="id_khoa">
            
                </select>
            </div>
            <div class="form-group">
                <label for="ten">Triệu chứng</label>
                <textarea class="form-control" name ='trieuchung' rows="3" required="required"></textarea>
            </div>
            <div class="form-group">
                <label for="next"></label>
                <button style="margin-left: 480px;" type="submit" id="" name="nut" value="Next" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</body>
<?php include("footer.php") ?>
</html>
<script>
    jQuery(document).ready(function($)
    {
        $("#noilamviec").change(function(event){
            noilamviecId = $("#noilamviec").val();
            $.post('khoa.php', {"noilamviecid": noilamviecId}, function(data)
            {
                $("#id_khoa").html(data);
            });
        });
    });
    
</script>
