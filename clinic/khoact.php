
<?php 
include("class/clsbenhnhan.php");
$p = new benhnhan();
$idkhoa = $_GET['idk'];
$sql = "SELECT * FROM khoa where id_khoa='$idkhoa'";
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
                                        <h2 class="blog-post-title" style="text-align: center;font-size:40px; font-weight:bold"><?= $row['tenkhoa'];  ?></h2>
                                       
                                    <img src="img/<?php echo $row['hinhanh']  ?>" width="500" height="250" style="margin: 10px 300px;" /> 
                                                                    
                                        <p style="text-align:justify; font-size: 20px;" > <?php echo $row['mota1']; ?></p>
                                        <p style="text-align:justify; font-size: 20px;" > <?php echo $row['mota2']; ?></p>
                                           
                                    
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