<?php
class quantrivien
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
    function loaddsbacsi($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        @mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            echo'  <table class="table table-bordered">
                <tr style="text-align: center;font-weight: bold">
                    <th>STT</th>
                    <th scope="col">HỌ TÊN</th>
                    <th>GIỚI TÍNH</th>
                    <th>ĐỊA CHỈ</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>CHUYÊN KHOA</th>
                    <th>QUẢN LÝ THÔNG TIN</th>
                </tr>
            ';
            $dem = 1;
            while($row = mysqli_fetch_array($ketqua))
            {
                $id_bacsi = $row['id_bacsi'];
                $ten = $row['tenbacsi'];
                $gioitinh = $row['gioitinh'];
                $diachi = $row['diachi'];
                $sdt = $row['sdt'];
                session_start();
                $id_khoa = $_SESSION['tenkhoa'];
                echo ' 
           
                    <tr>
                        <td style="text-align: center;">'.$dem.'</td>
                        <td>'.$ten.'</td>
                        <td>'.$gioitinh.'</td>
                        <td>'.$diachi.'</td>
                        <td>'.$sdt.'</td>
                        <td>'.$id_khoa.'</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#xem">
 Xem
    </button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#sua">Sửa</button> 
						    <button class="btn btn-primary" data-toggle="modal" data-target="#xoa">Xóa</button>
					    </td>
                    </tr>
                  
                
                ';
                $dem++;
            }
            echo'</table>';
        }
    }
    function laycot($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        mysqli_close($link);
        $i=mysqli_num_rows($ketqua);
        $giatri ='';
        if($i>0)
        {
            while($row = mysqli_fetch_array($ketqua))
            {
                $id = $row['0'];
                $giatri = $id;
            }
        }
        return $giatri;
    }


   
    function loadbacsi($sql)
	{
        $link = $this->connect();
        $sql = "select * from bacsi ";
        $ketqua = mysqli_query($link,$sql);
        @mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
		{
			while($row=mysqli_fetch_array($ketqua))
			{
                $id_bacsi=$row['id_bacsi'];
				$anh=$row['hinhanh'];
				$ten=$row['tenbacsi'];
                $namsinh=$row['namsinh'];
				$gioitinh=$row['gioitinh'];
				$sdt=$row['sdt'];
                $diachi=$row['diachi'];
                $id_khoa=$row['id_khoa'];
                $noilv=$row['noilamviec'];
				echo '<div id="bs">
						<div id="bs_anh"><img src="../img/'.$anh.'" width="150" height="150" /></div>
						<div id="bs_ten">Tên bác sĩ: '.$ten.'</div>
						<div id="bs_namsinh">Năm sinh: '.$namsinh.'</div>
                        <div id="bs_gioitinh">Giới tính: '.$gioitinh.'</div>
                        <div id="bs_chuyenkhoa">Chuyên khoa: '.$this->laycot("select tenkhoa from khoa where id_khoa ='$id_khoa'").'</div>
                        <div id="bs_sdt">Số điện thoại: '.$sdt.'</div>
                        <div id="bs_diachi">Địa chỉ: '.$diachi.'</div>
                        <div id="bs_noilv">Nơi làm việc(chi nhánh): '.$noilv.'</div>
					  </div>'; 
			}
		}
		else
		{
			echo'Không có dữ liệu.';
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

    public function myupfile($name,$tmp_name,$folder)
	{
		if($name!=' '&& $tmp_name!=' ' && $folder!=' ')
		{
			$newname=$folder."/".$name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
    function loaddstt($sql)
    {
        $link = $this->connect();
        $sql = "select * from tintuc";
        $ketqua = mysqli_query($link,$sql);
        @mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            echo'  <table class="table table-bordered">
                <tr style="text-align: center;font-weight: bold">
                     <th>STT</th>
                     <th scope="col">TIÊU ĐỀ</th>
                     <th>NGÀY ĐĂNG</th>
                     <th>TÁC GIẢ</th> 
                </tr>
            ';
            $dem = 1;
            while($row = mysqli_fetch_array($ketqua))
            {
                $id_tintuc = $row['id_tintuc'];
                $td = $row['tieude'];
                $ngaydang = $row['ngaydang'];
                $tacgia = $row['tacgia'];
                echo ' 
                    <tr>
                        <td style="text-align: center;"><a href="?id='.$id_tintuc.'">'.$dem.'</td>
                        <td><a href="?id='.$id_tintuc.'">'.$td.'</td>
                        <td><a href="?id='.$id_tintuc.'">'.$ngaydang.'</td>
                        <td><a href="?id='.$id_tintuc.'">'.$tacgia.'</td>
                    </tr>';
                $dem++;
            }
            echo'</table>';
         }
    }
    public function showkhoa($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        @mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            while($row = mysqli_fetch_array($ketqua))
            {
                $id_khoa = $row['id_khoa'];
                $tenkhoa = $row['tenkhoa'];
                $hinhanh = $row['hinhanh'];
                echo '<div id="sanpham">
                        <div id="sanpham_hinh"><img src="img/'.$hinhanh.'" width="250" height="200" /></div>
                        <div id="sanpham_ten"><a href="khoact.php?idk='.$id_khoa.'">'.$tenkhoa.'</a></div>
                       
                    </div>';
            }
           
        }
    }
    public function showbacsi($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link,$sql);
        @mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            while($row = mysqli_fetch_array($ketqua))
            {
                $id_bacsi = $row['id_bacsi'];
                $tenbacsi = $row['tenbacsi'];
                $hinhanh = $row['hinhanh'];
                echo '<div id="sanpham">
                        <div id="sanpham_hinh"><img src="img/'.$hinhanh.'" width="230" height="200" /></div>
                        <div id="sanpham_ten"><a href="bacsict.php?idbs='.$id_bacsi.'">Bác sĩ: '.$tenbacsi.'</a></div>
                       
                    </div>';
            }
           
        }
    }
}

?>