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
	margin-left: 10px;
	width:200px;
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
    <div id="introduces" class="introduce">
       
        <div class="introduce-img" >
            <img src="./img/bsvabe5.jpg" alt="" width="600px" height="450px">
        </div>
       
       
         <div class="introduce-noidung">
            <span>Chào mừng đến với</span>
            <h4 style="color: #330099">Phòng khám nhi khoa NT</h4>
            <p>Tọa lạc tại số 12 Nguyễn Văn Bảo,Phường 4, Quận Gò Vấp, TP.HCM. Với cơ sở vật chất hiện đại, tối tân, các bác sĩ, 
            y tá giàu kinh nghiệm trong lĩnh vực nhi khoa tư vấn, khám chữa bệnh cho trẻ, phục vụ cho bệnh nhân là những yếu tố 
            đem đến sự an tâm cho phụ huynh các bé trong nhiều năm qua và sẽ 
            tiếp tục cố gắng phát triển, để có thể giúp đỡ nhiều bệnh nhân hơn nữa. Mục tiêu là chăm sóc bảo vệ sức khỏe cho những
            thiên thần nhỏ bé tại TPHCM và các tỉnh thành lân cận. Điều quan trọng trọng ưu tiên hàng đầu của phòng khám là đem 
            đến cho khách hàng những dịch vụ khám bệnh điều trị, chăm sóc tốt nhất, an toàn hiệu quả.suốt chặng đường 10 năm phục 
            vụ, phòng khám tạo được sự tin tưởng của phụ huynh các bé.</p>
         </div>
        
    </div>


    <div id="khoas" class="khoa">
        <h1>CHUYÊN KHOA ĐIỀU TRỊ</h1>
        
       <!-- <div class="list-khoa">
            <div class="list-khoa-dd">
                <img src="./img/dd.jpg" alt="" width="200px" height="200px">
              <div style="margin: 10px 10px;"> <a href=""class="title-khoa">KHOA DINH DƯỠNG</a></div>
            </div>
            <div class="list-khoa-noi">
                <img src="./img/ntq.jpg" alt="" width="200px" height="200px">
                <div style="margin: 10px 20px;" ><a href="" class="title-khoa">NỘI TỔNG QUÁT</a></div>
            </div>
            <div class="list-khoa-ngoai">
                <img src="./img/nk.jpg" alt="" width="200px" height="200px">
                <div style="margin: 10px 40px;"><a href=""class="title-khoa">KHOA NGOẠI</a></div>
            </div>
            <div class="list-khoa-tm">
                <img src="./img/tm.jpg" alt="" width="200px" height="200px">
               <div style="margin: 10px 60px;"><a href="" class="title-khoa" >TIM MẠCH</a></div>
            </div>
        </div>
        
        <div class="list-khoa">
            <div class="list-khoa-hh">
                <img src="./img/hh.jpg" alt="" width="200px" height="200px">
              <div style="margin: 10px 60px;"> <a href=""class="title-khoa">HÔ HẤP</a></div>
            </div>
            <div class="list-khoa-tmh">
                <img src="./img/hh2.jpg" alt="" width="200px" height="200px">
                <div style="margin: 10px 30px;" ><a href="" class="title-khoa">TAI MŨI HỌNG</a></div>
            </div>
            <div class="list-khoa-rhm">
                <img src="./img/rhm.jpg" alt="" width="200px" height="200px">
                <div style="margin: 10px 30px;"><a href=""class="title-khoa">RĂNG HÀM MẶT</a></div>
            </div>
             <div class="list-khoa-tl">
                <img src="./img/tl2.jpg" alt="" width="200px" height="200px">
                <div style="margin: 10px 60px;"><a href=""class="title-khoa">TÂM LÝ</a></div>
            </div>
        </div>
-->
    
    <?php $g->showkhoa("SELECT * FROM khoa order by id_khoa asc"); ?>
    </div>
    
    
    
    <div id="doctors" class="doctor">
        <h1>ĐỘI NGŨ BÁC SĨ</h1>
        <!--<div class="list-doctor">
            <div class="list-doctor-dd">
                <img src="./img/6bs.jpg" alt="" >
              <div style="margin: 10px 10px;"> <a href=""class="title-khoa"><i>Chuyên khoa: Dinh Dưỡng</i> <br> Trần Tuệ Linh</a></div>
            </div>
            <div class="list-doctor-noi">
                <img src="./img/2bs.jpg" alt="" >
                <div style="margin: 10px 40px;" ><a href="" class="title-khoa"><i>Chuyên khoa: Nội</i> <br> Đỗ Đình Trung</a></div>
            </div>
            <div class="list-doctor-ngoai">
                <img src="./img/17bs.png" alt="">
                <div style="margin: 10px 30px;"><a href=""class="title-khoa"><i>Chuyên khoa: Ngoại</i> <br> Lê Quỳnh Thư</a></div>
            </div>
            <div class="list-doctor-tm">
                <img src="./img/3bs.jpg" alt="">
               <div style="margin: 10px 25px;"><a href="" class="title-khoa" ><i>Chuyên khoa: Tim Mạch</i> <br> Vũ Quốc Trung</a></div>
            </div>
        </div>
        
        
         <div class="list-doctor">
            <div class="list-doctor-hh">
                <img src="./img/9bs.png" alt="" >
              <div style="margin: 10px 10px;"> <a href=""class="title-khoa"><i>Chuyên khoa: Hô Hấp</i> <br> Phạm Bích Vân</a></div>
            </div>
            <div class="list-doctor-tmh">
             <img src="./img/1bs.jpg" alt="" >
             <div style="margin: 10px 5px;" ><a href="" class="title-khoa"><i>Chuyên khoa: Tai Mũi Họng</i> <br> Nguyễn Kiến Văn</a></div>
            </div>
            <div class="list-doctor-rhm">
                <img src="./img/13bs.png" alt="">
                <div style="margin: 10px 5px;"><a href=""class="title-khoa"><i>Chuyên khoa: Răng Hàm Mặt</i> <br> Trần Hữu Tâm</a></div>
            </div>
            <div class="list-doctor-tl">
                <img src="./img/15bs.jpg" alt="">
               <div style="margin: 10px 30px;"><a href="" class="title-khoa" ><i>Chuyên khoa: Tâm Lý</i> <br> Nguyễn Ngọc Diệp</a></div>
            </div>
        </div>
        
         <div class="list-doctor">
           <div class="list-doctor-dd">
                <img src="./img/10bs.jpg" alt="">
                <div style="margin: 10px 10px;"><a href=""class="title-khoa"><i>Chuyên khoa: Dinh Dưỡng</i> <br> Nguyễn Minh Triết</a></div>
            </div>
            <div class="list-doctor-tmh">
             <img src="./img/7bs.jpg" alt="">
             <div style="margin: 10px 5px;"><a href="" class="title-khoa" ><i>Chuyên khoa: Tai Mũi Họng</i> <br> Võ Anh Thảo</a></div>
            </div>
             <div class="list-doctor-tl">
                <img src="./img/bsd4.jpg" alt="" >
              <div style="margin: 10px 35px;"> <a href=""class="title-khoa"><i>Chuyên khoa: Tâm Lý</i> <br> Thẩm Vũ</a></div>
            </div>
             <div class="list-doctor-hh">
                <img src="./img/5bs.jpg" alt="" >
                <div style="margin: 10px 20px;" ><a href="" class="title-khoa"><i>Chuyên khoa: Hô Hấp</i> <br> Vương Khôi Nguyên</a></div>
            </div>
        </div>
-->
<?php $g->showbacsi("SELECT * FROM bacsi order by id_bacsi asc"); ?>
    </div>



    <section  class="top__rated__area bg__white pt--100 pb--110">
            <div id="contact" class="container">
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