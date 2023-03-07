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
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
#menu{
    height: 80px;
    border: 1px solid black;
    font-size: 15px;
    font-weight: bold;
    background-color: #330099;
    
}
#menu-list ul{
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    
}
#menu-list ul li{
 padding: 30px ;

    
    line-height: 30px;
}
#menu-list ul li a{
    color: white;
    transition: all 0.5s ease-out;
}
#menu-list ul li a:hover{
    color: aqua;
    text-decoration: none;
   
}
</style>
</head>
<body>
    <div class="row" style="margin: 0px; " id="menu" >
        <div class="col-sm-12" id="menu-list">
            <ul style="margin: 0px;">
            <li><a href="../index.php">TRANG CHỦ</a></li>
                <li><a href="#introduces">GIỚI THIỆU</a></li>
                <li><a href="#doctors">ĐỘI NGŨ BÁC SĨ</a></li>
                <li><a href="datlich.php">ĐẶT LỊCH</a></li>
                <li><a href="">TIN TỨC</a></li>
                <li><a href="#khoas">CHUYÊN KHOA</a></li>
                <li><a href="#contact">LIÊN HỆ</a></li>
            </ul>
        </div>
    </div>
</body>
</html>