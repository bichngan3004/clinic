
<?php
ob_start();
include("class/config.php");

$p = new ketnoi();


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
     .card-info
    {
        width: 600px;
        border-radius: 10px;
            
            padding: 20px;
            margin: 0 auto;
    } 
    
    .card-header{
        border-bottom: 1px solid rgba(0,0,0,.125);
    padding: .75rem 1.25rem;
    position: relative;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    }
    .card-title{
        text-align: center;
       }
       .remind{
        font-size: 15px;
       
       margin-top: 20px;
       text-align: center;
    }
    </style>
</head>
<body>
    <?php
    include("menu.php");
    ?>
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">ĐĂNG NHẬP</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="" method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="" class="col-sm-12 col-form-label">Email</label>
                    <div class="col-sm-12">
                      <input type="email" class="form-control" id="txtem" name="txtem" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-12 col-form-label">Password</label>
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="Password">
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-info" name="nut" value="Sign in"/>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
                <div class="social-auth-links text-center mt-2 mb-3">
              <a href="controller.php" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                  </a></button>
                </div>
                <div class="remind">
                <span  >Bạn chưa có tài khoản vui lòng đăng kí <a href="register1.php">Tại đây!</a> </span>
                </div>
              </form>
            </div>
            <?php
            if(isset($_POST['nut']))
            {
                      $user = $_REQUEST['txtem'];
                      $pass = $_REQUEST['txtpass'];
                      if($user!='' && $pass!='')
                      {
                          if($p->login_user($user,$pass)==1) //bệnh nhân
                          {
                            header("location:index.php");
                          }
                          elseif($p->login_user($user,$pass)==2) //bác sĩ
                          {
                            header("location:doctor/xemttcanhan.php");
                          }
                          elseif($p->login_user($user,$pass)==3)
                          {
                            header("location:admin/helloadmin.php"); //admin
                          }
                          else
                          {
                            echo'<script>alert("Đăng nhập không thành công!")</script>';
                          }
                      }
                      else
                      {
                        echo'<script>alert("Vui lòng nhập đầy đủ thông tin!")</script>';
                      }
              }
              
            ?>
             <?php
        include("footer.php");
    ?>
</body>
</html>