<?php

class benhnhan
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
    function khoa($sql)
    {
        $link = $this->connect();
        $ketqua= mysqli_query($link,$sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if($i>0)
        {
            while($row = mysqli_fetch_array($ketqua))
            {
                //$id_khoa = $row['id_khoa'];
                $tenkhoa = $row['tenkhoa'];
                
                echo $tenkhoa;
                echo "<br>";
            }
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
   
    //Phía bác sĩ được bệnh nhân hẹn
		function show_lich_hen($id_bacsi){
			$link = $this->connect();
			$sql = "select * from phieudkkham where id_bacsi = '$id_bacsi' ";
			$result = mysqli_query($link ,$sql);
			$lichhen = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($link);
			return $lichhen; 
		}

		// lịch nghỉ bận dành cho bác sĩ 
		function show_lich_nghi($id_bacsi){
			$link = $this->connect();
			$sql = "select * from lichnghi where id_bacsi = '$id_bacsi' order by ngaynghi ASC ";
			$result = mysqli_query($link ,$sql);
			$lichnghi = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($link);
			return $lichnghi;
		}
        //
        
		function show_info_doctor($id_bacsi){
			$link = $this->connect();
			$sql = "select * from bacsi where id_bacsi = '$id_bacsi'";
			$result = mysqli_query($link ,$sql);
			$doctor = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($link);
			return $doctor;
        }
        function show_info($tentaikhoan){
			$link = $this->connect();
			$sql = "select * from taikhoan where tentaikhoan = '$tentaikhoan'";
			$result = mysqli_query($link ,$sql);
			$user = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($link);
			return $user; 
		}
		function showlichhen($id_bacsi){
			$link = $this->connect();
			$sql = "select * from phieudkkham where id_bacsi = '$id_bacsi'";
			$result = mysqli_query($link ,$sql);
			$user = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($link);
			return $user; 
		}
      
      
    public function laycot($sql)
	{
		$link=$this->connect(); //gọi lại kết nối
		$ketqua=mysqli_query($link,$sql);
		mysqli_close($link); //chạy xong đóng kết nối
		$i=mysqli_num_rows($ketqua);  ///chay  ra ket qua hang
		$giatri='';
		if($i>0)
		{
			
			while($row=mysqli_fetch_array($ketqua))
			{
				$id=$row['0'];
				$giatri=$id;
			}
		}
		return $giatri;
		
	}
     /*public function xemthongtin($sql)
	 {
	 	$link = $this->connect();
	 	$ketqua = mysqli_query($link,$sql);
	 	mysqli_close($link);
	 	$i = mysqli_num_rows($ketqua);
	 	if($i>0)
	 	{
	 		while($row = mysqli_fetch_array($ketqua))
	 		{
	 			$hoten = $row['tenbenhnhan'];
	 			$gioitinh = $row['gioitinh'];
	 			$tuoi = $row['tuoi'];
	 			$sdt = $row['sdt'];
	 			$diachi = $row['diachi'];
	 			$img = $row['hinhanh'];
	 			echo ' <p class="font-weight-bold">Họ và tên: '.$hoten.'</p>
                 <p class="font-weight-bold">Giới tính: '.$gioitinh.'</p>
                 <p class="font-weight-bold">Tuổi: '.$tuoi.'</p>
                 <p class="font-weight-bold">Số điện thoại: '.$sdt.'</p>
                 <p class="font-weight-bold">Địa chỉ: '.$diachi.'</p>
	 			<img src="./img/'.$img.'" width="150px" height="150px" alt="">'
	 			;
	 		}
			
	 	}
	 }  */
	 public function xemthongtin($sql)
	 {
	 	$link = $this->connect();
	 	$ketqua = mysqli_query($link,$sql);
	 	mysqli_close($link);
	 	$i = mysqli_num_rows($ketqua);
	 	if($i>0)
	 	{
	 		while($row = mysqli_fetch_array($ketqua))
	 		{
	 			$hoten = $row['tenbenhnhan'];
	 			$gioitinh = $row['gioitinh'];
	 			$tuoi = $row['namsinh'];
	 			$sdt = $row['sdt'];
	 			$diachi = $row['diachi'];
	 			$img = $row['hinhanh'];
	 			echo ' 
				 
			 <div class="information-details">
				<p class="font-weight-bold">Họ và tên: '.$hoten.'</p>
				<p class="font-weight-bold">Giới tính: '.$gioitinh.'</p>
				<p class="font-weight-bold">Năm sinh: '.$tuoi.'</p>
				<p class="font-weight-bold">Số điện thoại: '.$sdt.'</p>
				<p class="font-weight-bold">Địa chỉ: '.$diachi.'</p>
			 </div>
			 <div class="nut">
				 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate">Cập nhật</button>
			 </div>'
	 			;
	 		}
			
	 	}
	 }  
	 //upfile
	 public function myupfile($name,$tmp_name,$folder)
	{
		if($name!=''&& $tmp_name!='' && $folder!='')
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
    //tin tức
	public function showtintuc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link,$sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if($i>0)
		{
			while($row = mysqli_fetch_array($ketqua))
			{
				$id_tintuc = $row['id_tintuc'];
				$tieude = $row['tieude'];
				$noidung = $row['noidung'];
				$hinhanh = $row['hinhanh'];
				echo '<div class="tintuc" style="display:flex; margin: 10px 0px">
						<div class="image"><img src="img/'.$hinhanh.'" width="200" height="150" /></div>
						<div class="noidung" style="margin-left:20px; font-size:20px;"><a href="tintucct.php?id='.$id_tintuc.'">'.$tieude.'</a></div>
				</div>';
			}
		}
	} 
	
        
}
    
?>