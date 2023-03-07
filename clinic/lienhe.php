<?php
include("mail/indexm.php");
$p = new Mailer();
include("class/clsbenhnhan.php");
$q= new benhnhan();
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if(session_id()==='')
{
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
include("class/clsadmin.php");
$g = new quantrivien();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <link rel="stylesheet" href="./style/section.css">
 <style>
    .doctor{
        width: 1200px;
    
    margin: 0 auto;
    margin-top: 200px;
    margin-bottom: 10px;
    }
    .doctor h1{
        text-align: center;
    color: #000080;
    font-weight: bold;
    }
    .khoa{
    width: 1200px;
    margin: 0 auto;
    margin-top: 200px;
    height: 500px;
}


.doctor h1{
    text-align: center;
    color: #330099;
    font-weight: bold;
}
.doctor .list-doctor{
    display: flex;
    width: 1200px;
    
}
.list-doctor-dd, .list-doctor-noi, .list-doctor-ngoai, .list-doctor-tm{
    width: 300px;
    
}
.list-doctor-dd, .list-doctor-noi, .list-doctor-ngoai, .list-doctor-tm img{
    margin: 0 10px;
}

.list-doctor-hh, .list-doctor-tmh, .list-doctor-rhm, .list-doctor-tl{
    width: 300px;
    
}
.list-doctor-hh, .list-doctor-tmh, .list-doctor-rhm, .list-doctor-tl img{
    margin: 0 10px;
}
.doctor .list-doctor img{
    max-width: 100%;
    max-height: 100%;
    width: 250px;
    height: 250px;
   
}
.list-doctor .title-khoa{
    font-size: 18px;
}
.list-doctor a{
    color: #330099;
    font-weight: bold;
    
}
.list-doctor a:hover{
    color: red;
    text-decoration: none;
}
.listkhoa{
    display: flex;
    justify-content: center;
    margin: 0;
    height: 500px;
    width: 1200px;
}
#sanpham
{
	float: left;
	height: 200px;
	width: 250px;
	
	margin-top: 50px;
	margin-left: 40px;
}
#sanpham_ten
{
	float:left;
	height: 20px;
	margin-left: 50px;
	width:150px;
	font-weight:bold;
	color: #FC0;
	text-align: center;
	font-size: 15px;
    padding-top: 10px;
}
#sanpham_hinh
{
	float:left;
	height:200px;
	width:200px;	
    max-width: 100%;
    max-height: 100%;
    
}
 </style>
    
   
</head>
<body>
    <section  class="top__rated__area bg__white pt--100 pb--110">
            <div id="contacts" class="container">
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 30px;">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style="font-weight:bold; color:#330099">QUY ĐỊNH VÀ LIÊN HỆ</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--20">
                   
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            
                            <div class="htc__best__product__details" style="width:300px;  ">
                               <br>
                                <h5><a href="qdnv.php"  style="color:#330099;"><b>🚑 QUY ĐỊNH NHẬP VIỆN</b></a></h5>
                                <h5><a href="dvbh.php"style="color:#330099;"><b>🏥 BẢO HIỂM</b></a></h5>
                                <h5><a href="qdtk.php"style="color:#330099;"><b>🕛 QUY ĐỊNH THĂM KHÁM</b></a></h5>
                            </div>
                            
                            <video width="320" height="240" controls>
                               <source src="./img/dinhduong.mp4" type="video/mp4">
                            </video>
                            
                           <video width="320" height="240" controls>
                                <source src="./img/tieuhoa.mp4" type="video/mp4">
                          </video>
                           <video width="320" height="240" controls>
                                <source src="./img/tamly.mp4" type="video/mp4">
                          </video>
                          
                        </div>
                    </div>
                    

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            
                            <div id="htc__best__product__details" style="width:800px; height:600px; ">
                    <h2  style="text-align:center; margin-left:30px; color:red; "> 
                        <img src="./img/hh3.png"  style="width:160px;"></img> Nơi giải đáp những thắc mắc!!!</h2>
                                         <br>
                    <form name="contactus" method="post">
                         
                    <div>
                        <span><label>E-mail hệ thống:</label></span><br>
                        <span><input type="email" name="txtemail" required="ture" class="form-control" value="nhct1703@gmail.com" ></span>
                    </div>
                      <br>
                    <div>
                         <span><label>Tiêu đề:</label></span><br>
                        <span><input type="text" name="txttieude" required="true" class="form-control" value=""></span>
                    </div>
                      <br>
                    <div>
                        <span><label>Thắc mắc của bạn:</label></span><br>
                        <span><textarea name="txtmo" required="true" style="background-color:white;"class="form-control" > </textarea></span>
                    </div>
                      <br>
                     <div>
                         <span><button type="submit" class="btn btn-default" name="lienhe" style="background-color:#330099; color:white;">Submit</button></span>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        
</body>
</html>
<?php
if(isset($_POST['lienhe']))
{
    $title= $_REQUEST['txttieude'];
    $content = $_REQUEST['txtmo'];
    $addressMail = $_REQUEST['txtemail'];
    $p->sendmail($title,$content,$addressMail);
    if($q->themxoasua("INSERT INTO lienhe (email,tieude, noidung) VALUES ('$addressMail','$title', '$content')")==1)
    {
        header("location:section.php");

    }
}

?>