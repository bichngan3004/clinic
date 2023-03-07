<?php
if(!isset($_SESSION))
{
	session_start();
}

class ketnoi 
{
    function connect()
    {
        $con = mysqli_connect("localhost","root","","doan2");
        if(!$con)
        {
            echo'Không kết nối cơ sở liệu!';
            exit();
        }
        else
        {
           mysqli_set_charset($con,"utf8");
           return $con;
        }
    }
    function themxoasua($sql)
    {
        $link = $this->connect();
        if(mysqli_query($link,$sql))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    //hàm đăng nhập
    public function login_user($user,$pass)
	{ 
        $pass = md5($pass);
        $sql="select * from taikhoan where email='$user' and password='$pass'";
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        $i=mysqli_num_rows($ketqua);
        if($i==1)
        {
            while($row = mysqli_fetch_array($ketqua))
            {
                $id = $row['id'];
                $user = $row['email'];
                $pass = $row['password'];
                $ten =$row['tentaikhoan'];
                $id_user=$row['id_user'];
               // $token = $row['email'];
                $phanquyen =$row['phanquyen'];
                $token = $row['token'];
                if($phanquyen==1)
                {
                    //bệnh nhân
                   $_SESSION['id'] = $id;
                    $_SESSION['user'] = $user;
                    $_SESSION['pass']=$pass;
                    $_SESSION['phanquyen']=$phanquyen;
                    $_SESSION['id_user']= $id_user;
                    $_SESSION['tentaikhoan']= $ten;
                    $_SESSION['user_token'] = $token;
                    return 1;
                }
                elseif($phanquyen==2)
                {
                    //bác sĩ
                    $_SESSION['id'] = $id;
                    $_SESSION['user'] = $user;
                    $_SESSION['pass']=$pass;
                    $_SESSION['phanquyen']=$phanquyen;
                    $_SESSION['id_user']= $id_user;
                    $_SESSION['tentaikhoan']= $ten;
                    return 2;
                }
                elseif($phanquyen==3)
                {
                    //admin
                    $_SESSION['id'] = $id;
                    $_SESSION['user'] = $user;
                    $_SESSION['pass']=$pass;
                    $_SESSION['phanquyen']=$phanquyen;
                    $_SESSION['id_user']= $id_user;
                    $_SESSION['tentaikhoan']= $ten;
                    return 3;
                }
            }
        }
        else
        {
            return 0;
        }
    }
   
    //hàm xác nhận đăng nhập
    public function confirm_login($id,$user,$pass,$phanquyen,$id_user)
    {
        $link = $this->connect();
        $sql = "select id from taikhoan where id='$id' and email='$user' and password ='$pass' and phanquyen='$phanquyen' and id_user='$id_user'";
        $ketqua = mysqli_query($link,$sql);
        $i = mysqli_num_rows($ketqua);
        if($i!=1)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function confirmgg($id,$user,$phanquyen,$id_user,$token)
    {
        $link = $this->connect();
        $sql = "select id from taikhoan where id='$id' and email='$user' and phanquyen='$phanquyen' and id_user='$id_user' or token ='$token'";
        $ketqua = mysqli_query($link,$sql);
        $i = mysqli_num_rows($ketqua);
        if($i!=1)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

}
?>