
<?php 
include("class/clsbenhnhan.php");
$p = new benhnhan();
$idtintuc = $_GET['id'];
$sql = "SELECT * FROM tintuc where id_tintuc='$idtintuc'";
$ketqua= mysqli_query($p->connect(),$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
        margin-left: 90px;
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
        <div class="container-fluid pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card-body">
                                <div class="blog-post">
                                    <?php while ($row=mysqli_fetch_array($ketqua)) 
                                        {            
                                    ?>      
                                        <h2 class="blog-post-title" style="text-align: center;font-size:40px; font-weight:bold"><?= $row['tieude'];  ?></h2>
                                        <p style="margin-left: 900px;" class="date-time hidden-xs hidden-sm"><i class="fa fa-calendar" aria-hidden="true"></i> <span><td> <?php echo $row['ngaydang']; ?></td></span></p> 
                                    <img src="img/<?php echo $row['hinhanh']  ?>" width="500" height="250" style="margin: 10px 300px;" /> 
                                                                    
                                        <p style="text-align:justify; font-size: 20px;" > <?php echo $row['noidung']; ?></p>
                                            <p style="margin-left: 900px ;"> <?php echo $row['tacgia']; ?></p>
                                    
                            <?php } ?>
                                </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            </div>
        </div>
    </section>
    <footer>
        <?php
            include("footer.php");
        ?>
    </footer>
</body>
</html>