<?php
include("class/clsbenhnhan.php");
$p = new benhnhan();
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
       
     
        nav {
        line-height:30px;
        
        height:300px;
        width:250px;
        float:left;
        padding:5px;
        }
        ul{
          list-style: none;
        }
        section {
        margin-left: 150px;
        width:350px;
        float:left;
        padding:10px;
        }
        footer {
        clear:both;
        }

        </style>
</head>
<body>
    <?php include("header.php") ?>
    <?php include("menu.php") ?>
    
      
    <nav>
      <ul>
          <li><a href="qdnv.php"  style="color:#330099;"></i><b>🚑 QUY ĐỊNH NHẬP VIỆN</b></a></li>
          <li><a href="dvbh.php"style="color:#330099;"></i><b>🏥 BẢO HIỂM</b></a></li>
          <li><a href="qdtk.php"style="color:#330099;"></i><b>🕛 QUY ĐỊNH THĂM KHÁM</b></a></li>
          <li><video width="320" height="230" controls>
                               <source src="./img/dinhduong.mp4" type="video/mp4">
                            </video></li>
          <li><video width="320" height="230" controls>
                                <source src="./img/tieuhoa.mp4" type="video/mp4">
                          </video></li>
          <li><video width="320" height="230" controls>
                                <source src="./img/tamly.mp4" type="video/mp4">
                          </video></li>
          
      </ul>
    </nav>
       
    <section>
      <div class="container">
          <?php
            $p->showtintuc("SELECT * FROM tintuc order by id_tintuc asc");
          ?>
      </div>
     </section>  
    
    <footer>
      <?php include("footer.php")  ?>
    </footer>
</body>
</html>