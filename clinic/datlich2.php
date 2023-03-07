<?php
session_start();

include("class/clsbenhnhan.php");
$p = new benhnhan();

if(isset($_POST['nut']))
{
$id_khoa = $_POST['id_khoa'];
$id_cn = $_POST['noilamviec'];
/////
///////
$_SESSION['trieuchung'] = $_POST['trieuchung'];

//var_dump($_POST); exit();
$sql = "select * from bacsi where id_khoa ='$id_khoa' and id_chinhanh='$id_cn'";

$ketqua = mysqli_query($p->connect(),$sql);
$i=mysqli_num_rows($ketqua);
if($i>0)
{


while($row= @mysqli_fetch_array($ketqua))
{
    echo"
    <div class='container'>
        <div class ='row doctor'>
            <div class ='col-4'>
                <div class='card'>
                    <div class='card_body'>
                        <p class='text-center'><img src='./img/".$row['hinhanh']."' width='100px' height='100px'></p>
                        <p><span>Tên bác sĩ: </span>".$row['tenbacsi']."</p>
                       
                        <p><span>Tên chuyên khoa: </span>".$p->laycot("SELECT tenkhoa FROM `khoa` WHERE id_khoa=".$row['id_khoa']."")."</p>
                        <p><span>Giới tính: </span>".$row['gioitinh']."</p>
                        <p><span>Số điện thoại: </span>".$row['sdt']."</p>
                        <p><span>Địa chỉ phòng khám: </span>".$p->laycot("SELECT tenchinhanh FROM `chinhanh` WHERE id_chinhanh=".$row['id_chinhanh']."")."</p>
                        <div class='row optionnut'>
                        <div class='col-3'>
                            <a href='datlich.php'button class='btn btn-outline-secondary mr-2'>Back</button></a>
                        </div>
                            <form action='datlich3.php' method='POST'>
                                <input type='hidden' name='bacsi' value=' ".$row['id_bacsi']."'/>
                                <input type='hidden' name='trieuchung' value=' ".$_POST['trieuchung']."'/>
                               
                                <div class='col-3 pl-0'><button class='btn btn-outline-primary' type='submit' name='next'>Select</button></div>
                            </form>
                    </div>        
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
        ";
   
}
}
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
    <style>
        .container{
            padding: 20px;
            width: 1200px;
        }
        .doctor{
            display: flex;
            justify-content: center;
          float: left;
          
        }
    .card{
            width: 300px;
            margin: 10px 20px;
        }
        .card_body{
            padding: 20px;
            margin-bottom: 10px;
          
        }
        .doctor{
            display: flex;
            justify-content: center;
        }
        .optionnut{
            
            display: flex;
            justify-content: space-between;
        }
        </style>
</head>
<body>

</body>
</html>