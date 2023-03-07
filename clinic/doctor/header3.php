<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>HealthyCare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <style>

header{
    height: 120px;
  
    font-size: 15px;
    
}

.col-md-2{
    padding: 20px 0px;
}
#account{
  padding-left: 50px;
}
ul .parent{
  list-style: none;
}
ul .children{
  width: 150px;
  height: 50px;
  border: 1px solid black;
  list-style: none;
  display: none;
  
 
}
.children .children1 {
  border-bottom: 1px solid black;
 
}
.children{
  padding: 2px;
}

.parent:hover .children{
  display: block;
  color: white;
}
/*==Style cho menu===*/
#menu-acc ul {

  list-style-type: none;

}


#menu-acc ul li a:hover {
  background: #F1F1F1;
  color: #0C0A0A;
}
#menu-acc ul li > .sub-menu {
  display: none;
  position: absolute;
}
#menu-acc li {
 position: relative;
}
.sub-menu li {
  
  width: 120px;
  height: 30px;
}

.sub-menu ul li a {
  color: #f1f1f1;
  display: block;}
.sub-menu {
 display: none;
 position: absolute;

}
#menu-acc ul li:hover .sub-menu {
  display: block;
}
    </style>
</head>
<body>
    <div>
        <header class="row form-group" style="margin: 0;">
            <div class="col-md-6 te" id="logo">
                <img class="img-reponsive" style="width:18%; margin: 0px 200px; margin-top: 18px" src="../img/logo.png" alt="">
            </div>
            <div class="col-md-2" id="call-telephone" >
                <span><i class="fa fa-phone-square"></i></span>&ensp;
                <span><a href="Tel: 1900 1098"><b>1900 1098 </b></a></span>
            </div>
            <div class="col-md-2" id="email">
                <span><i class="fa fa-envelope"></i></span>
                <span class="iconemail"><a href="mailto:nhct1703@gmail.com"><b>nhct1703@gmail.com</b></a></span>
            </div>
            <div class="col-md-2" id="menu-acc">
                <!-- <span><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i>Đăng nhập</a></span>&ensp;
                <span><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i>Đăng xuất</a></span>&ensp; 
                <span class="icon-account"><i class="fa fa-user-circle"><a href=""><b>TÀI KHOẢN</b></a></i></span>-->
                <ul>
                    <li><i class="fa fa-user"></i><a href="">Tài khoản</a>
                         <ul class="sub-menu">
                             <li><a href="xemttcanhan.php">Thông tin chung</a></li>
                             <li><a href="../login.php">Đăng nhập</a></li>
                         </ul>
                    </li>
                </ul>

                
            </div>
        </header>
    </div>
</body>
</html>