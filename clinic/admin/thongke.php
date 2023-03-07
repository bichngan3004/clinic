<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <li><a href="thongke.php"><i class="fa fa-chart-pie"></i>&emsp;Thống kê</a></li>
            <li><a href="xemBNdki2.php"><i class="fa fa-user-pen"></i>&emsp;Bệnh nhân đăng ký khám</a></li>
            <li><a href="qlbenhnhan2.php"><i class="fa fa-user"></i>&emsp;Quản lý bệnh nhân</a></li>
         </ul>
    </nav>
    <section>
        <div class="information">
            <div class="container" style="width:800px; margin-left:50px;">
                <h3 style="text-align: center;font-weight: bold">thống kê</h3>
                            
                <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th scope="col">BỆNH NHÂN</th>
                        <th>TRIỆU CHỨNG</th>
                        <th>NGÀY HẸN KHÁM</th>
                        <th>GIỜ KHÁM</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nguyễn Thị Lan</td>
                        <td>àhrjmnxtymdhrrm </td>
                        <td>20/10/2022</td>
                        <td>9:00-10:00</td>
                    </tr>
                  
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    </section>
     
    <footer>
    <?php include("footer2.php");?>
    </footer>
     
    </body>
    </html>


    
